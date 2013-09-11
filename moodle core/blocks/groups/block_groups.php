<?php

include_once($CFG->dirroot . '/course/lib.php');

class block_groups extends block_list {
   

    function init() 
    {       
       $this->title = get_string('blocktitle', 'block_groups');
    }

    function has_config() {
        return true;
    }

    function get_content() {
        global $CFG, $USER, $DB, $OUTPUT, $PAGE;

        if($this->content !== NULL) {
            return $this->content;
        }
        
        $myCourse = $this->page->course;

        $this->content = new stdClass;
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';

        if (empty($CFG->disablemycourses) and isloggedin() and !isguestuser()  and
           (has_capability('moodle/course:managegroups', context_course::instance($myCourse->id))) ) 
        {    
            $contentstring = "";
            $contentstring .= '<div id="existingClasses">';
            $contentstring .= '<h4><img src="'.$CFG->wwwroot.'/theme/vrsim/pix_core/i/group.png" />';
            $contentstring .= 'Existing Classes</h4></div>';
            $contentstring .= '<div id="classlist">';

            //Get the groups within this course
            $groups = groups_get_all_groups($myCourse->id);
            foreach($groups as $myGroup)
            {
            	$contentstring .= '<p>';
            	$contentstring .= print_group_picture($myGroup, $myCourse->id, false, true, false);
            	$contentstring .= $myGroup->name;
            	$contentstring .= '</p>';
            }
            $contentstring .= '</div>';
            $contentstring .= '<div id="classlink"><a href="'.$CFG->wwwroot.'/group/index.php?id='.$myCourse->id.'" >Edit Classes</a></div>';

            $this->content->items[] = $contentstring;  
        }
                
        return $this->content;
    }

    //////////////////////////////////////////////
    // Returns the role that best describes the groups block.
    ///////////////////////////////////////////////////
    public function get_aria_role() {
        return 'navigation';
    }
}