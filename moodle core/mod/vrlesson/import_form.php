<?php
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once($CFG->libdir.'/formslib.php');
require_once($CFG->libdir.'/csvlib.class.php');

class mod_vrlesson_import_form extends moodleform {

private $isTeacher = false;

    function definition() {
        global $CFG, $DB, $PAGE;
        $mform =& $this->_form;
        $cmid = $this->_customdata['id'];

        $mform->addElement('filepicker', 'recordsfile', get_string('csvfile', 'vrlesson'));
        $mform->addRule('recordsfile', get_string('nofilefound', 'vrlesson'), 'required', null, 'client');

        $delimiters = csv_import_reader::get_delimiter_list();
        $mform->addElement('select', 'fielddelimiter', get_string('fielddelimiter', 'vrlesson'), $delimiters);
        $mform->setDefault('fielddelimiter', 'comma');

        $mform->addElement('text', 'fieldenclosure', get_string('fieldenclosure', 'vrlesson'));

        $choices = textlib::get_encodings();
        $mform->addElement('select', 'encoding', get_string('fileencoding', 'mod_vrlesson'), $choices);
        $mform->setDefault('encoding', 'UTF-8');
        
        // Get the course context of this import form
        // TODO: RIGHT NOW, this only works because we have 1 course
        $d = optional_param('d', 0, PARAM_INT);              // database id
        if($d)
        {  
	        if (! $data = $DB->get_record('vrlesson', array('id'=>$d))) {
	            print_error('invalidid', 'vrlesson');
	        }
	        if (! $course = $DB->get_record('course', array('id'=>$data->course))) {
	            print_error('coursemisconf');
	        }
	        if (! $cm = get_coursemodule_from_instance('vrlesson', $data->id, $course->id)) {
	            print_error('invalidcoursemodule');
	        }
	        $record = NULL;
        }
        
        // If you are a teacher, choose the student you want to upload for
        if ($context = context_module::instance($cm->id))
        {
	      if (has_capability('mod/vrlesson:rate', $context))
	      {
	           $userList = get_enrolled_users($context, 'mod/vrlesson:viewentry');
	           $userNames = array();
	           $userNames[0] = "";
	           foreach($userList as $singleUser)
	           {
	                // Only put students on this list
	                if(!has_capability('mod/vrlesson:rate', $context, $singleUser->id)) 
	                {
	                    $this->isTeacher = true;
	           	    $tempStr = $singleUser->firstname.' '.$singleUser->lastname;
	           	    $userNames[$singleUser->id] = $tempStr;
	           	}
	           }
	           $mform->addElement('select', 'userlist', get_string('userlist', 'mod_vrlesson'), $userNames);
	           $mform->setDefault('userlist', $userNames[0]);
	           $mform->addRule('userlist', get_string('wronguserlist', 'vrlesson'), 'required', null, 'client');

	      }
        }

        $submit_string = get_string('submit');
        // data id
        $mform->addElement('hidden', 'd');
        $mform->setType('d', PARAM_INT);

        $this->add_action_buttons(false, $submit_string);
    }

    //===========================================
    //Custom validation should be added here
    //===========================================
    function validation($data, $files) 
    {        
        $errors = parent::validation($data, $files);
       
        if($this->isTeacher) 
        {
	    if($data['userlist'] == 0)  {
	    	$errors['userlist'] = get_string('wronguserlist', 'vrlesson');
	    	echo '<div class="importErrorBox" >'.$errors['userlist'].'</div>';
	    }
	}

        return $errors;
    }
}