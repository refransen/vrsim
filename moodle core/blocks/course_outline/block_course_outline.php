<?php

include_once($CFG->dirroot . '/course/lib.php');

class block_course_outline extends block_list {
   
    private $currSection = 0;
    private $currCourse = 0;
    private $currLesson = 0;
    private $currCourseID =0;
    private $isCoursePage = false;

    function init() 
    {
        global $DB, $USER, $PAGE, $COURSE;
        $currDataId = 1;

        //Get current record
        if($latestEntry = $DB->get_records('vrlesson_records', array('userid'=>$USER->id), 'timemodified DESC'))
	{	  
	    foreach($latestEntry as $entry)
	    {
	         $currDataId = $entry->dataid;
		 break;
	    }
	}

        // Check if we are on a lesson page. 
        // If so, make sure to show the correct lesson in the block
        $myContext = (int)$PAGE->context->instanceid;
        $myCourseID = (int)$COURSE->id;
        $currentMod = $DB->get_record('course_modules', array('course'=>$myCourseID, 'module'=>24, 
                             'id'=>$myContext));
        if($currentMod)
        {   
            $currDataId = $currentMod->instance;
            $this->isCoursePage = true;
        }

	$this->currLesson = $DB->get_record('vrlesson', array('id'=>$currDataId));
	$this->currCourseID = $this->currLesson->course;
	$this->currCourse = $DB->get_record('course', array('id'=>$this->currCourseID));
	
	$currLessonModule = $DB->get_record('course_modules', array('course'=>$this->currCourseID, 'module'=>24, 
                             'instance'=>$this->currLesson->id));

	$allSections = get_fast_modinfo($this->currCourseID, $USER->id)->get_section_info_all();
        foreach($allSections as $section)
        {
             // TODO: see if this is necessary check
             //if(course_get_format($this->currCourse)->is_section_current($section))  
             if($section->id == $currLessonModule->section)  
             {
                 $this->currSection = $section;
                 break;
             }
        }
        
       $this->title = get_string('blocktitle', 'block_course_outline');
    }

    function has_config() {
        return true;
    }

    function get_content() {
        global $CFG, $USER, $DB, $OUTPUT, $PAGE;

        if($this->content !== NULL) {
            return $this->content;
        }
        
        if($USER->theme == 'vrsim') {
            $this->page->requires->js('/blocks/course_outline/block_outline_js.js');
        }

        $this->content = new stdClass;
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';

        $icon  = '<img src="' . $OUTPUT->pix_url('i/course') . '" class="icon" alt="" />';

        $adminseesall = true;
        if (isset($CFG->block_course_outline_adminview)) {
           if ( $CFG->block_course_outline_adminview == 'own'){
               $adminseesall = false;
           }
        }

        if (empty($CFG->disablemycourses) and isloggedin() and !isguestuser() /* and
           !(has_capability('moodle/course:update', context_system::instance()) and  $adminseesall)*/ ) {    // Just print My Courses
            
                $coursecontext = context_course::instance($this->currCourseID);
                $linkcss = $this->currCourse->visible ? "" : " class=\"dimmed\" ";
                               
                $myactivities = get_array_of_activities($this->currCourseID);
                $activityList = "";     
                
                // Loop through all the lessons in this current section      	
                foreach($myactivities as $activity)
		{
		     if($activity->sectionid == $this->currSection->id && $activity->mod == 'vrlesson')  
		     {		
		          // Print out the lesson name		          
		          $activityList .= '<li class="outlinelesson" id="'.$activity->id.'" onclick="showHideProjects(this)" >'.$activity->name.'</li>'; 

		          $nameField = $DB->get_record('vrlesson_fields', array('dataid'=>$activity->id, 'name'=>'Project Name'));
		          $passesField = $DB->get_record('vrlesson_fields', array('dataid'=>$activity->id, 'name'=>'Passes'));
		          $projectRecords = $DB->get_records('vrlesson_records', array('dataid'=>$activity->id, 'userid'=>$USER->id),
		                                 'timemodified ASC');
		                                 
		          $menuField = $DB->get_record('vrlesson_fields', array('dataid'=>$activity->id, 'name'=>'Name Menu'));
		          $menuOptions = explode("\n", $menuField->param1);
		          		          
		          // Loop through all the projects in this lesson
		          foreach($menuOptions as $singleMenu)
		          {
                               $projectCSS = "outlineproject";
                               $attemptCSS = "outlineattempt";
                
                               // If we are on a course page, let's open up the appropriate links
                               if($this->isCoursePage)
                               {
                                    // Check if this lesson is equal to the page you're on
                                    if((int)$activity->id === (int)$this->currLesson->id)
                                    {
                                         $projectCSS = "outlineproject_open";
                                         $attemptCSS = "outlineattempt_open";
                                    }
                               }

		               // Print out the short names of the projects
		               $singleMenu = trim($singleMenu);
	                       $activityList .='<ul class="'.$projectCSS.'" id="'.$activity->id.'" onclick="showHideAttempts(this)" ><span></span>'.$singleMenu;

	                       // Loop through all the attempts in each project
	                       $attemptCounter = 0;
	                       foreach($projectRecords as $singleRecord)
		               {     
		                    if(!$singleRecord) { continue; }
		                    
		               	    $projectMenuName = $DB->get_record('vrlesson_content', array('recordid'=>$singleRecord->id, 'fieldid'=>$menuField->id));
		                    $passesContent = $DB->get_record('vrlesson_content', array('recordid'=>$singleRecord->id, 'fieldid'=>$passesField->id));

				    // Print out each attempt
		               	    if($projectMenuName->content === $singleMenu && $passesContent->content !== "Project not uploaded")
		               	    {
			                    $activityList .= '<li class="'.$attemptCSS.'" ><a 
		                            href="'.$CFG->wwwroot.'/mod/'.$activity->mod.'/view.php?d='.$activity->id.'&rid='.$singleRecord->id.'" 
		                            title="'.$singleMenu.'" ><span>o</span>'.$singleMenu.' #'.$attemptCounter.'</a></li>'; 
		                            $attemptCounter++;
	                            }
		               }
		               $activityList .= '</ul>';
		          }

                             
                     }
                }
                $this->content->items[] = $activityList;  
                
                /// If we can update any course of the view all isn't hidden, show the view all courses link
                if (has_capability('moodle/course:update', context_system::instance()) || empty($CFG->block_course_outline_hideallcourseslink)) {
                    //$this->content->footer = "<a href=\"$CFG->wwwroot/course/index.php\">".get_string("fulllistofcourses")."</a> ...";
                }
            
            if ($this->content->items) { // make sure we don't return an empty list
                return $this->content;
            }
        }
        return $this->content;
    }

    ////////////////////////////////////////////////////////////////////////
    // Returns the role that best describes the course outline block.
    // @return string
    ////////////////////////////////////////////////////////////////////////
    public function get_aria_role() {
        return 'navigation';
    }
}