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
require_once('vrsimlib.php');
require_once($CFG->libdir.'/csvlib.class.php');
require_once('import_form.php');

$id              = optional_param('id', 0, PARAM_INT);  // course module id
$d               = optional_param('d', 0, PARAM_INT);   // database id
$rid             = optional_param('rid', 0, PARAM_INT); // record id
$fielddelimiter  = optional_param('fielddelimiter', ',', PARAM_CLEANHTML); // characters used as field delimiters for csv file import
$fieldenclosure = optional_param('fieldenclosure', '', PARAM_CLEANHTML);   // characters used as record delimiters for csv file import
$selecteduser   = optional_param('userlist', '', PARAM_CLEANHTML);   // list of students, if viewing with teacher role

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

// Read the selected user. If teacher is uploading for a student,
// then the param will be used.
//-----------------------------
if ($selecteduser !== '') {
    $url->param('userlist', $selecteduser);
}
else  {
    $selecteduser = $USER->id; 
}

// Get the id of this page
//------------------------------
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
require_capability('mod/vrlesson:viewentry', $context);    // Rachel Fransen - changed permissions to allow all users

$form = new mod_vrlesson_import_form(new moodle_url('/mod/vrlesson/import.php'));

/// Print the page header
$PAGE->navbar->add(get_string('add', 'vrlesson'));
$PAGE->set_title('Import VRTEX Data');
$PAGE->set_heading($course->fullname);
navigation_node::override_active_url(new moodle_url('/mod/vrlesson/import.php', array('d' => $data->id)));
echo $OUTPUT->header();
echo $OUTPUT->heading_with_help(get_string('uploadrecords', 'mod_vrlesson'), 'uploadrecords', 'mod_vrlesson');

/// Groups needed for Add entry tab
$currentgroup = groups_get_activity_group($cm);
$groupmode = groups_get_activity_groupmode($cm);
      
if (!$formdata = $form->get_data()) 
{
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

    $iid = csv_import_reader::get_new_iid('modvrlesson');
    $cir = new csv_import_reader($iid, 'modvrlesson');

    // Read the CSV file and create a new instance of
    // our custom parsing class
    $filecontent = $form->get_file_content('recordsfile');
    $newCSV = new vrlesson_csv();
    $newCSV->format($filecontent);

    $allprojects = $newCSV->get_final_project();   // Get multidimensional array of all project metadata    
    $allpasses = $newCSV->get_all_passes();        // Get multidimensional array of all passes within each project
    
    $recordsadded = 0;     // amount of new entries added
    $recordsupdated = 0;   // amount of current entries that were updated

    $currentUserName = $DB->get_record('user', array('id'=>$selecteduser));
    echo '<h3>Importing file for: '.$currentUserName->firstname.' '.$currentUserName->lastname.'</h3><br />';

    // $cir->init();
    // loop through all the projects in the csv file
    foreach($allprojects as $myproject)
    {
        $csvName = $myproject[0];
        $csvProcess = $myproject[1];
        $csvEnvironment = $myproject[2];
        $csvPolarity = $myproject[3];
        $csvVolts = $myproject[4];
        $csvScore = $myproject[5];
        $csvTime = $myproject[6];  // [6]=> Time Modified ( "9:4:2012 15:35:29" ) 
        $csvType = $myproject[7];  // type, ie 7018
        $csvProjNum = $myproject[8];
        
        //var_dump($myproject).'<br />';
        //var_dump($selecteduser);
                
         // Find the default lesson this project belongs to
         $tempLesson = $newCSV->get_default_lesson_new($csvName, $csvType, $course, $selecteduser);
         if(!$tempLesson)
         {
             echo '<br /><h4>All lessons within this file have been completed!<h4><br />';
             break;
         }
         
         echo '<br /><strong>Project Number: </strong>'.$csvProjNum.'<br />';
         echo 'Lesson Name: '.$tempLesson->name.'<br />';
         echo 'Project Name: '.$csvName.'<br />';
         echo 'Project Score: '.$csvScore.'<br />';
                             
         // Find all the scores for this project
         $newDataID = $tempLesson->id;
         $projectScore = $newCSV->get_highest_score($csvName, $selecteduser, $tempLesson->id);
         $highestEntryID = $newCSV->get_highest_entryid();
         
         // Get the lesson with the highest score
         if($highestLesson = $DB->get_record('vrlesson_records', array('id'=>$highestEntryID)))  
         {
             $namefield = $DB->get_record('vrlesson_fields', array('dataid'=>$newDataID, 'name'=>'Project Name'), '*', MUST_EXIST);
	     $scorefield = $DB->get_record('vrlesson_fields', array('dataid'=>$newDataID, 'name'=>'Score'), '*', MUST_EXIST);
	     $attemptsfield = $DB->get_record('vrlesson_fields', array('dataid'=>$newDataID, 'name'=>'Total Attempts'), '*', MUST_EXIST);
	        
	     $dbName = $DB->get_record('vrlesson_content', array('recordid'=>$highestEntryID,'fieldid'=>$namefield->id),'*', MUST_EXIST);  
	     // See project name exists in the moodle DB
	     if($csvName === $dbName->content) 
	     {                    	            	
	         // Did the user upload to this project already?
	         // If yes, then we need to check the score.
	         if($dbAttempts = $DB->get_record('vrlesson_content', array('recordid'=>$highestEntryID, 'fieldid'=>$attemptsfield->id)))
	         {
	             if((int)$dbAttempts->content > 0)  
		     {
			 // If the score is greater, then create a new db entry
			 if((int)$csvScore > (int)$projectScore)  
			 {
			     // add instance to vrlesson_record
			     $mylesson = $DB->get_record('vrlesson', array('id'=>$newDataID));
			     if ($newRecordID = vrlesson_add_user_record($mylesson, $currentUserName, 0)) 
			     {  
				$newCSV->createNewProject($newDataID, $newRecordID, $myproject);
				$recordsadded++;
			     }
			 }
			 // if score was same or lower, simply update the project constants
			 else  
			 {
			     $newCSV->updateCurrentProject($newDataID, $dbName->recordid, $myproject);
			     $recordsupdated++;
			 }
	             }
	             // If the user did not upload to this project yet,
		     // we need to write the project details for the first time
		     else
		     {            	   
		         // add instance to vrlesson_record
		         $mylesson = $DB->get_record('vrlesson', array('id'=>$newDataID));
		         if ($newRecordID = vrlesson_add_user_record($mylesson, $currentUserName, 0)) {  
		             $newCSV->createNewProject($newDataID, $newRecordID, $myproject);
		             $recordsadded++;
		         }
		     }
	         }
	     }
         }
         // If the user did not upload to this project yet,
	 // we need to write the project details for the first time
	 else
	 {            	
	     // add instance to vrlesson_record
	     $mylesson = $DB->get_record('vrlesson', array('id'=>$newDataID));
	     if ($newRecordID = vrlesson_add_user_record($mylesson, $currentUserName, 0)) {  
	         $newCSV->createNewProject($newDataID, $newRecordID, $myproject);
	         $recordsadded++;
	     }
	 }         
         
         // Check completion status of all lessons
         $newCSV->set_completion_status($course->id, $selecteduser);
        
    } // end of project foreach
    
    $cir->close();
    $cir->cleanup(true);
    
}

// Notify file progress
echo '<p><strong>IMPORT RESULTS:</strong></p>';
echo $OUTPUT->notification($recordsadded. ' '. get_string('recordssaved', 'vrlesson'), '');
echo $OUTPUT->notification($recordsupdated. ' '. get_string('recordsupdated', 'vrlesson'), '');

//Redirect properly after import
echo $OUTPUT->continue_button('import.php?d='.$data->id);

/// Finish the page
echo $OUTPUT->footer();