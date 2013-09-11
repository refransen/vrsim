<?php
/**
 * Collapsed Topics Information
 *
 * A topic based format that solves the issue of the 'Scroll of Death' when a course has many topics. All topics
 * except zero have a toggle that displays that topic. One or more topics can be displayed at any given time.
 * Toggles are persistent on a per browser session per course basis but can be made to persist longer by a small
 * code change. Full installation instructions, code adaptions and credits are included in the 'Readme.txt' file.
 *
 * @package    course/format
 * @subpackage topcoll
 * @version    See the value of '$plugin->version' in version.php.
 * @copyright  &copy; 2009-onwards G J Barnard in respect to modifications of standard topics format.
 * @author     G J Barnard - gjbarnard at gmail dot com and {@link http://moodle.org/user/profile.php?id=442195}
 * @link       http://docs.moodle.org/en/Collapsed_Topics_course_format
 * @license    http://www.gnu.org/copyleft/gpl.html GNU Public License
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/filelib.php');
require_once($CFG->libdir . '/completionlib.php');

// Horrible backwards compatible parameter aliasing..
if ($ctopic = optional_param('ctopics', 0, PARAM_INT)) { // Collapsed Topics old section parameter.
    $url = $PAGE->url;
    $url->param('section', $ctopic);
    debugging('Outdated collapsed topic param passed to course/view.php', DEBUG_DEVELOPER);
    redirect($url);
}
if ($topic = optional_param('topic', 0, PARAM_INT)) { // Topics and Grid old section parameter.
    $url = $PAGE->url;
    $url->param('section', $topic);
    debugging('Outdated topic / grid param passed to course/view.php', DEBUG_DEVELOPER);
    redirect($url);
}
if ($week = optional_param('week', 0, PARAM_INT)) { // Weeks old section parameter.
    $url = $PAGE->url;
    $url->param('section', $week);
    debugging('Outdated week param passed to course/view.php', DEBUG_DEVELOPER);
    redirect($url);
}
// End backwards-compatible aliasing..

$context = context_course::instance($course->id);

if (($marker >= 0) && has_capability('moodle/course:setcurrentsection', $context) && confirm_sesskey()) {
    $course->marker = $marker;
    course_set_marker($course->id, $marker);
}

// Make sure all sections are created.
$courseformat = course_get_format($course);
$course = $courseformat->get_course();
course_create_sections_if_missing($course, range(0, $course->numsections));

$renderer = $PAGE->get_renderer('format_topcoll');

if (!empty($displaysection)) {
    $renderer->print_single_section_page($course, null, null, null, null, $displaysection);
} else {
    user_preference_allow_ajax_update('topcoll_toggle_' . $course->id, PARAM_ALPHANUM);

    $PAGE->requires->js_init_call('M.format_topcoll.init', array($CFG->wwwroot,
        $course->id,
        get_user_preferences('topcoll_toggle_' . $course->id),
        $course->numsections,
        get_config('format_topcoll', 'defaulttogglepersistence')));

    $tcsettings = $courseformat->get_settings();
    ?>
    <style type="text/css" media="screen">
    /* <![CDATA[ */

    /* -- Toggle -- */
    .course-content ul.ctopics li.section .content .toggle {
        background-color: <?php
                            if ($tcsettings['togglebackgroundcolour'][0] != '#') {
                                echo '#';
                            }
                            echo $tcsettings['togglebackgroundcolour'];
                          ?>;
    }

    /* -- Toggle text -- */
    .course-content ul.ctopics li.section .content .toggle a {
        color: <?php
                if ($tcsettings['toggleforegroundcolour'][0] != '#') {
                    echo '#';
                }
                echo $tcsettings['toggleforegroundcolour'];
               ?>;
        text-align: <?php
    switch ($tcsettings['togglealignment']) {
        case 1:
            echo 'left';
            break;
        case 3:
            echo 'right';
            break;
        default:
            echo 'center';
    }
    ?>;
    }

    /* -- What happens when a toggle is hovered over -- */
    .course-content ul.ctopics li.section .content div.toggle:hover
    {
        background-color: <?php
                            if ($tcsettings['togglebackgroundhovercolour'][0] != '#') {
                                echo '#';
                            }
                            echo $tcsettings['togglebackgroundhovercolour'];
                          ?>;
    }

    <?php
    // Dynamically changing widths with language.
    if ((!$PAGE->user_is_editing()) && ($PAGE->theme->name != 'mymobile')) {
        echo '.course-content ul.ctopics li.section.main .content, .course-content ul.ctopics li.tcsection .content {';
        echo 'margin: 0 ' . get_string('topcollsidewidth', 'format_topcoll');
        echo '}';
    }

    // Make room for editing icons.
    if (!$PAGE->user_is_editing()) {
        echo '.course-content ul.ctopics li.section.main .side, .course-content ul.ctopics li.tcsection .side {';
        echo 'width: ' . get_string('topcollsidewidth', 'format_topcoll');
        echo '}';
    }

    // Establish horizontal unordered list for horizontal columns.
    if ($tcsettings['layoutcolumnorientation'] == 2) {
        echo '.course-content ul.ctopics li.section {';
        echo 'display: inline-block;';
        echo 'vertical-align:top;';
        echo '}';
        echo 'body.ie7 .course-content ul.ctopics li.section {';
        echo 'zoom: 1;';
        echo '*display: inline;';
        echo '}';
    }
    ?>;
    /* ]]> */
    </style>
    <?php
    $renderer->print_multiple_section_page($course, null, null, null, null);
}

// Include course format js module.
$PAGE->requires->js('/course/format/topcoll/format.js');