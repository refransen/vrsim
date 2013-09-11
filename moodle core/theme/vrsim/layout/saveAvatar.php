<?php

require_once('../../../config.php');
global $DB, $USER;
////////////////////////////////////////////////
// Saves the user's avatar clothing choices
////////////////////////////////////////////////
$clothingContent = $_POST['avatar'];

$avatarFieldId = $DB->get_record('user_info_field', array('shortname'=>'useravatar'), 'id');
$avatarContent = $DB->get_record('user_info_data', array('userid'=>$USER->id, 'fieldid'=>$avatarFieldId->id));
$value = clean_param($clothingContent, PARAM_CLEANHTML);

if($avatarContent)
{
	$content = new stdClass();
	$content->id = $avatarContent->id;
	$content->userid = $avatarContent->userid;
	$content->fieldid = $avatarContent->fieldid;
	$content->data = $value;
	
	if($DB->update_record('user_info_data', $content))  { 
	    echo "Success";
	}
	else  {
	    echo "Failure";
	}
}
else
{
	// This user hasn't saved before. We need to make a new entry
	$content = new stdClass();
	$content->userid = $USER->id;
	$content->fieldid = $avatarFieldId->id;
	$content->data = $value;
	
	if($DB->insert_record('user_info_data', $content))  { 
	    echo "Success";
	}
	else  {
	    echo "Failure";
	}
}



?>