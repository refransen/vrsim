<?php

require_once($CFG->dirroot.'/course/lib.php');

class block_sbc_activity extends block_base {
    function init() {
        $this->title = get_string('displayname', 'block_sbc_activity');
    }

    function get_content() 
    {        
        global $USER, $DB, $CFG;
        
        if ($this->content !== NULL) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        $this->content = new stdClass;
        $this->content->text = '';
        $this->content->footer = '';
 
        $timestart = round(time() - COURSE_MAX_RECENT_PERIOD, -2); // better db caching for guests - 100 seconds
        $activityArr = array();

        if($USER->theme == "simbuild")
        {
           if($mycourses = enrol_get_my_courses(NULL, 'visible DESC, fullname ASC'))
           { 
               foreach($mycourses as $course)  
               {  
                   $modinfo = get_fast_modinfo($course->id);
                   $mymodules = $DB->get_records('course_modules', array('course'=>$course->id));
                   
                   foreach($mymodules as $singleMod)
                   {
                       $modActivity = array();
                       $cm = $modinfo->get_cm($singleMod->id);
                       $myModName = $cm->name;
                   
                       //$singleMod->id = $log->cmid
                       $modName = $DB->get_record('modules', array('id'=>$singleMod->module));
                       $sql = "SELECT * FROM {log} WHERE time > ? AND course = ? AND cmid = ? AND module = ? AND (action = 'view') 
                       		AND userid = ? ORDER BY id ASC";
                       $logs = $DB->get_records_sql($sql, array($timestart, $course->id, $singleMod->id, $modName->name, $USER->id));
	               $modActivity ['name'] = $myModName;
	               $modActivity ['count'] = count($logs);
	               
	               $activityArr[] = $modActivity;
	                   
                   }//end modules foreach

               }//end course foreach
           }
           
            //-----------------------
            // Create the html for the block
            //-----------------------
            $myContent = '<div class="activitycontent">';
            foreach($activityArr as $myActivity)  
            {                        
                 switch($myActivity['name'])
                 {
	              case 'Vocabulary':
	             {
	                 $myContent .= '<div class="activitySection"><div class="toptitle" >';
	                 $myContent .= '<img src="'.$CFG->wwwroot.'/theme/simbuild/pix/activityblock/glossary_Icon_here.png" />';
	                 $myContent .= '<span>'.$myActivity['count'].'</span></div>';
	                 $myContent .= '<div class="bottitle" ><p>'.$myActivity['name'].' '.get_string("reviewed", "block_sbc_activity");
	                 $myContent .= '</p></div></div>';
	             }break;
	             case 'Materials':
	             {
	                 $myContent .= '<div class="activitySection"><div class="toptitle" >';
	                 $myContent .= '<img src="'.$CFG->wwwroot.'/theme/simbuild/pix/activityblock/Wood-icon.png" />';
	                 $myContent .= '<span>'.$myActivity['count'].'</span></div>';
	                 $myContent .= '<div class="bottitle" ><p>'.$myActivity['name'].' '.get_string("reviewed", "block_sbc_activity");
	                 $myContent .= '</p></div></div>';
	             }break;
	             case 'Skill Videos':
	             {
	                 $myContent .= '<div class="activitySection"><div class="toptitle" >';
	                 $myContent .= '<img src="'.$CFG->wwwroot.'/theme/simbuild/pix/activityblock/video-icon.png" />';
	                 $myContent .= '<span>'.$myActivity['count'].'</span></div>';
	                 $myContent .= '<div class="bottitle" ><p>'.$myActivity['name'].' '.get_string("reviewed", "block_sbc_activity");
	                 $myContent .= '</p></div></div>';
	             }break;
                 }
            }
            $myContent .= '</div>';
            $this->content->text = $myContent;
        }
                            
        if (!$this->content) {
	    $this->content = '<p class="message">'.get_string('nothingnew').'</p>';
	}

        return $this->content;
    }

    function applicable_formats() {
        return array('all' => true, 'my' => false, 'tag' => false);
    }
    
   
}