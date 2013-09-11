<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file is part of the vrlesson module for Moodle
 *
 * @copyright 2005 Martin Dougiamas  http://dougiamas.com
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package mod-vrlesson
 */

require_once('../../config.php');
require_once('lib.php');
require_once($CFG->libdir.'/csvlib.class.php');
require_once('import_form.php');

$id              = optional_param('id', 0, PARAM_INT);  // course module id
$d               = optional_param('d', 0, PARAM_INT);   // database id
$rid             = optional_param('rid', 0, PARAM_INT); // record id
$fielddelimiter  = optional_param('fielddelimiter', ',', PARAM_CLEANHTML); // characters used as field delimiters for csv file import
$fieldenclosure = optional_param('fieldenclosure', '', PARAM_CLEANHTML);   // characters used as record delimiters for csv file import

$url = new moodle_url('/mod/vrlesson/import.php');
if ($rid !== 0) {
    $url->param('rid', $rid);
}
if ($fielddelimiter !== '') {
    $url->param('fielddelimiter', $fielddelimiter);
}
if ($fieldenclosure !== '') {
    $url->param('fieldenclosure', $fieldenclosure);
}

if ($id) {
    $url->param('id', $id);
    $PAGE->set_url($url);
    $cm     = get_coursemodule_from_id('vrlesson', $id, 0, false, MUST_EXIST);
    $course = $DB->get_record('course', array('id'=>$cm->course), '*', MUST_EXIST);
    $data   = $DB->get_record('vrlesson', array('id'=>$cm->instance), '*', MUST_EXIST);

} else {
    $url->param('d', $d);
    $PAGE->set_url($url);
    $data   = $DB->get_record('vrlesson', array('id'=>$d), '*', MUST_EXIST);
    $course = $DB->get_record('course', array('id'=>$data->course), '*', MUST_EXIST);
    $cm     = get_coursemodule_from_instance('vrlesson', $data->id, $course->id, false, MUST_EXIST);
}

require_login($course, false, $cm);

$context = context_module::instance($cm->id);
require_capability('mod/vrlesson:manageentries', $context);
$form = new mod_vrlesson_import_form(new moodle_url('/mod/vrlesson/import.php'));

/// Print the page header
$PAGE->navbar->add(get_string('add', 'vrlesson'));
$PAGE->set_title($data->name);
$PAGE->set_heading($course->fullname);
navigation_node::override_active_url(new moodle_url('/mod/vrlesson/import.php', array('d' => $data->id)));
echo $OUTPUT->header();
echo $OUTPUT->heading_with_help(get_string('uploadrecords', 'mod_vrlesson'), 'uploadrecords', 'mod_vrlesson');

/// Groups needed for Add entry tab
$currentgroup = groups_get_activity_group($cm);
$groupmode = groups_get_activity_groupmode($cm);

if (!$formdata = $form->get_data()) {
    /// Upload records section. Only for teachers and the admin.
    echo $OUTPUT->box_start('generalbox boxaligncenter boxwidthwide');
    require_once('import_form.php');
    $form = new mod_vrlesson_import_form(new moodle_url('/mod/vrlesson/import.php'));
    $formdata = new stdClass();
    $formdata->d = $data->id;
    $form->set_data($formdata);
    $form->display();
    echo $OUTPUT->box_end();
    echo $OUTPUT->footer();
    die;
} else {
    // Large files are likely to take their time and memory. Let PHP know
    // that we'll take longer, and that the process should be recycled soon
    // to free up memory.
    @set_time_limit(0);
    raise_memory_limit(MEMORY_EXTRA);

    $iid = csv_import_reader::get_new_iid('moddata');
    $cir = new csv_import_reader($iid, 'moddata');

    $filecontent = $form->get_file_content('recordsfile');
    $readcount = $cir->load_csv_content($filecontent, $formdata->encoding, $formdata->fielddelimiter);
    unset($filecontent);
    if (empty($readcount)) {
        print_error('csvfailed','vrlesson',"{$CFG->wwwroot}/mod/vrlesson/edit.php?d={$data->id}");
    } else {
        if (!$fieldnames = $cir->get_columns()) {
            print_error('cannotreadtmpfile', 'error');
        }
        // check the fieldnames are valid
        $fields = $DB->get_records('vrlesson_fields', array('dataid'=>$data->id), '', 'name, id, type');
        $errorfield = '';
        foreach ($fieldnames as $name) {
            if (!isset($fields[$name])) {
                $errorfield .= "'$name' ";
            }
        }

        if (!empty($errorfield)) {
            print_error('fieldnotmatched','vrlesson',"{$CFG->wwwroot}/mod/vrlesson/edit.php?d={$data->id}",$errorfield);
        }

        $cir->init();
        $recordsadded = 0;
        while ($record = $cir->next()) {
            if ($recordid = vrlesson_add_record($data, 0)) {  // add instance to vrlesson_record
                $fields = $DB->get_records('vrlesson_fields', array('dataid'=>$data->id), '', 'name, id, type');

                // Insert new vrlesson_content fields with NULL contents:
                foreach ($fields as $field) {
                    $content = new stdClass();
                    $content->recordid = $recordid;
                    $content->fieldid = $field->id;
                    $DB->insert_record('vrlesson_content', $content);
                }
                // Fill vrlesson_content with the values imported from the CSV file:
                foreach ($record as $key => $value) {
                    $name = $fieldnames[$key];
                    $field = $fields[$name];
                    $content = new stdClass();
                    $content->fieldid = $field->id;
                    $content->recordid = $recordid;
                    if ($field->type == 'textarea') {
                        // the only field type where HTML is possible
                        $value = clean_param($value, PARAM_CLEANHTML);
                    } else {
                        // remove potential HTML:
                        $patterns[] = '/</';
                        $replacements[] = '&lt;';
                        $patterns[] = '/>/';
                        $replacements[] = '&gt;';
                        $value = preg_replace($patterns, $replacements, $value);
                    }
                    // for now, only for "latlong" and "url" fields, but that should better be looked up from
                    // $CFG->dirroot . '/mod/vrlesson/field/' . $field->type . '/field.class.php'
                    // once there is stored how many contents the field can have.
                    if (preg_match("/^(latlong|url)$/", $field->type)) {
                        $values = explode(" ", $value, 2);
                        $content->content  = $values[0];
                        // The url field doesn't always have two values (unforced autolinking).
                        if (count($values) > 1) {
                            $content->content1 = $values[1];
                        }
                    } else {
                        $content->content = $value;
                    }
                    $oldcontent = $DB->get_record('vrlesson_content', array('fieldid'=>$field->id, 'recordid'=>$recordid));
                    $content->id = $oldcontent->id;
                    $DB->update_record('vrlesson_content', $content);
                }
                $recordsadded++;
                print get_string('added', 'moodle', $recordsadded) . ". " . get_string('entry', 'vrlesson') . " (ID $recordid)<br />\n";
            }
        }
        $cir->close();
        $cir->cleanup(true);
    }
}

if ($recordsadded > 0) {
    echo $OUTPUT->notification($recordsadded. ' '. get_string('recordssaved', 'vrlesson'), '');
} else {
    echo $OUTPUT->notification(get_string('recordsnotsaved', 'vrlesson'), 'notifysuccess');
}

echo $OUTPUT->continue_button('import.php?d='.$data->id);

/// Finish the page
echo $OUTPUT->footer();
