<?php

require_once($CFG->dirroot.'/course/lib.php');

function get_worksite() {
    $worksite = optional_param('worksite', 0, PARAM_INT);
    $siteName = '';
    switch($worksite) {
    case 0:
        $siteName = 'shed';
    break;
    case 1:
        $siteName = 'ranch';
    break;
    case 2:
        $siteName = 'multilevel';
    break;
    }
    return $siteName;
}

function in_array_r($needle, $haystack, $strict = false) {
	foreach ($haystack as $item) {
	    if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
	            return true;
	    }
	}
	return false;
}   
    
class block_sbc_resources extends block_base {
    
    function init() {
        $this->title = get_string('displayname', 'block_sbc_resources');
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
        $glossaryArr = array();
        if($USER->theme == "simbuild")
        {
           if($mycourses = enrol_get_my_courses(NULL, 'visible DESC, fullname ASC'))
           { 
               foreach($mycourses as $course)  
               {  
                   $glossMod = $DB->get_record('modules', array('name'=>'glossary'));                   
                   $glossMods = $DB->get_records('course_modules', array('course'=>$course->id, 'module'=>$glossMod->id));
                   
                   foreach($glossMods as $singleMod)
                   {
                       $concept = get_worksite();
                       $singleGloss = $DB->get_record("glossary", array('id'=>$singleMod->instance));    
                       $glossaryArr[$singleMod->id] = $singleGloss;      
                   }
               }//end course foreach
           } else {
               // If the user has no courses, they can't see any resources
		$this->content->text = '<p>You must be enrolled to see resources</p>';
               return $this->content;
           }
           
            //-----------------------
            // Search all glossaries for information based on the concept
            // and record their rating
            //-----------------------
            $concept = get_worksite();            
            $entryRatingArr = array();
            
            foreach($glossaryArr as $singleGloss)  
            {        
                 $conceptArr = array();
                 $entries = $DB->get_records('glossary_entries', array('glossaryid'=>$singleGloss->id));                 
                 foreach($entries as $singleEntry)  {
                    $keywords = $DB->get_record('glossary_alias', array('entryid'=>$singleEntry->id));
                    $conceptArr[] = $singleEntry->concept;
                    $conceptArr[] = $singleEntry->definition;
                    if($keywords) {
                        $conceptArr[] = $keywords->alias;
                    }
                                        
                    // TODO: When more entries are there, then put this code back
                    // Right now it's commented out to make the list longer
                    $isFound = false;
                    foreach($conceptArr as $singleConcept) {
                        $myStrArr = explode(" ", $singleConcept);
                        foreach($myStrArr as $singleWord) {
                            $pos = strpos($singleWord, $concept);
	                        if($pos !== false) {
	                            $isFound = true;
	                            break;
	                        }
                        }
                    }       
                     
                    if($keywords) { 
                        $myStrArr = explode(",", $keywords->alias);
                        foreach($myStrArr  as $singleKey) {
                           $singleKey = trim($singleKey);
                           $pos = strpos($singleKey, $concept);
                           if($pos !== false) {
                              $isFound = true;
                              break;
                            }
                        } 
                    }
                    if(!$isFound)
                    { continue;  }          
                                    
                    $myRating = $DB->get_records('rating', array('component'=>'mod_glossary','itemid'=>$singleEntry->id));
                    $sumRatings = 0;
                    foreach($myRating as $singleRating) {
                         $sumRatings += $singleRating->rating;
                    }
                    
                    $actualStars = 0;
                    if(count($myRating) > 0) {
                        $actualStars = round($sumRatings/count($myRating));
                    }
                    $entryRatingArr[$singleEntry->id] = $actualStars;
                 }
           }
            
            //-----------------------
            // Now we will list information in order of rating
            //-----------------------
            arsort($entryRatingArr);
            $myContent = '<div class="activitycontent">';
            $activityLimit = 6;
            $counter = 0;
            foreach($entryRatingArr as $key=>$value) {
                $entryID = $key;
                $entryRating = $value;
                
                $singleEntry = $DB->get_record('glossary_entries', array('id'=>$entryID));   
                if($singleEntry) {
	                $singleGloss = $DB->get_record('glossary', array('id'=>$singleEntry->glossaryid));  
	                
	                $glossMod = $DB->get_record('modules', array('name'=>'glossary'));                   
	                $modID = $DB->get_record('course_modules', array('course'=>$course->id, 'module'=>$glossMod->id, 'instance'=>$singleGloss->id));
	            
	                
	                // Get the right icon for the glossary type
	                 $imageUrl = '';
	                 switch($singleGloss->name)
	                 {
		             case 'Vocabulary':{
		                 $imageUrl = '<img src="'.$CFG->wwwroot.'/theme/simbuild/pix/activityblock/glossary_Icon_here.png" />';
		             }break;
		             case 'Materials':  {
		                 $imageUrl = '<img src="'.$CFG->wwwroot.'/theme/simbuild/pix/activityblock/Wood-icon.png" />';
		             }  break;
		             case 'Skill Videos': {
		                 $imageUrl = '<img src="'.$CFG->wwwroot.'/theme/simbuild/pix/activityblock/video-icon.png" />';
		             }break;
	                 }
	                 // Start the html
	                 $myContent .= '<div class="activitySection">';
	                 $myContent .= $imageUrl;
	                 $entryUrl = $CFG->wwwroot.'/mod/glossary/view.php?id='.$modID->id.'&mode=entry&hook='.$entryID;
	                 $myContent .= '<a href="'.$entryUrl.'">'.$singleEntry->concept.'</a><br/>';
	                 
	                 // Draw the views   
	                 $logs = $DB->get_records_select('log', "course = ? AND cmid = ? AND module = ? AND (action = 'view')",
                            array($course->id, $modID->id, $glossMod->name), "id ASC"); 
	                 $numViews = count($logs);
	                 $myContent .= '<div class="numviews" ><p>'.$numViews.' Views</p></div>';
	                 $myContent .= '<div class="starrating" >';
	                     
	                 // Draw the stars    
	                 $totalStars = 4;
	                 for($i = 0; $i < $totalStars; $i++) {
	                     if($i < $entryRating) {
	                        //draw a yellow star
	                        $myContent .= '<span class="yellowstar" >&#x2605;</span>';
	                     } 
	                     else {
	                       // draw a blue star
	                       $myContent .= '<span class="bluestar" >&#x2605;</span>';
	                    }
	                 }
	                 $myContent .= '</div></div><hr />';
	                 $counter++;
	                 
	                 if($counter >= $activityLimit)
	                 { break; }
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