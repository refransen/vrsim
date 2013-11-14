<?php
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once ($CFG->dirroot.'/course/moodleform_mod.php');

class mod_vrlesson_mod_form extends moodleform_mod {

    function definition() {
        global $CFG, $DB;

        $mform =& $this->_form;

//-------------------------------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('name'), array('size'=>'64'));
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEANHTML);
        }
        $mform->addRule('name', null, 'required', null, 'client');

        $this->add_intro_editor(true, get_string('intro', 'vrlesson'));

        $mform->addElement('date_selector', 'timeavailablefrom', get_string('availablefromdate', 'vrlesson'), array('optional'=>true));

        $mform->addElement('date_selector', 'timeavailableto', get_string('availabletodate', 'vrlesson'), array('optional'=>true));

        $mform->addElement('date_selector', 'timeviewfrom', get_string('viewfromdate', 'vrlesson'), array('optional'=>true));

        $mform->addElement('date_selector', 'timeviewto', get_string('viewtodate', 'vrlesson'), array('optional'=>true));


        $countoptions = array(0=>get_string('none'))+
                        (array_combine(range(1, VRLESSON_MAX_ENTRIES),//keys
                                        range(1, VRLESSON_MAX_ENTRIES)));//values
        $mform->addElement('select', 'requiredentries', get_string('requiredentries', 'vrlesson'), $countoptions);
        $mform->addHelpButton('requiredentries', 'requiredentries', 'vrlesson');

        $mform->addElement('select', 'requiredentriestoview', get_string('requiredentriestoview', 'vrlesson'), $countoptions);
        $mform->addHelpButton('requiredentriestoview', 'requiredentriestoview', 'vrlesson');

        $mform->addElement('select', 'maxentries', get_string('maxentries', 'vrlesson'), $countoptions);
        $mform->addHelpButton('maxentries', 'maxentries', 'vrlesson');

        $ynoptions = array(0 => get_string('no'), 1 => get_string('yes'));
        $mform->addElement('select', 'comments', get_string('comments', 'vrlesson'), $ynoptions);

        $mform->addElement('select', 'approval', get_string('requireapproval', 'vrlesson'), $ynoptions);
        $mform->addHelpButton('approval', 'requireapproval', 'vrlesson');

        if($CFG->enablerssfeeds && $CFG->vrlesson_enablerssfeeds){
            $mform->addElement('select', 'rssarticles', get_string('numberrssarticles', 'vrlesson') , $countoptions);
        }

        $this->standard_grading_coursemodule_elements();

        $this->standard_coursemodule_elements();

//-------------------------------------------------------------------------------
        // buttons
        $this->add_action_buttons();
    }

    function vrlesson_preprocessing(&$default_values){
        parent::vrlesson_preprocessing($default_values);
    }

}

