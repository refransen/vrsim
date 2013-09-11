<?php

///////////////////////////////////////////
// Render custom menu items only for this
// theme
///////////////////////////////////////////
class theme_simbuild_core_renderer extends core_renderer 
{
    protected function render_custom_menu(custom_menu $menu) 
    {
        global $USER;
        
        //------------
        // Show a different progress report page per role
        //------------
        $reportURL = new moodle_url('/local/simbuild/student/progressreport.php');
	if ($courses = enrol_get_my_courses(NULL, 'visible DESC, fullname ASC')) {
	    foreach($courses as $course)  {
	        $sbcCategory = 7;     // This is the course category for simbuild
	        if($course->category != $sbcCategory)   
	        {    continue;   }
	        
	        $context = context_course::instance($course->id);
	        $roleList = get_user_roles($context, $USER->id);
	        foreach($roleList as $singleRole)
	        {
	             if($singleRole->roleid < 5 && !is_siteadmin() && !isguestuser()) { 
	                  $reportURL = new moodle_url('/local/simbuild/teacher/progressreport.php', array('id'=>$course->id));
	                  break;
	             }
	             else  {
	                  $reportURL = new moodle_url('/local/simbuild/student/progressreport.php', array('id'=>$course->id));
	             }
	        }
	    }
	}

    	 $branchurl   = $reportURL;
         $branchsort  = 2;
         $title = get_string('progresslink'); 
         $branch = $menu->add( $title, $branchurl,  $title, $branchsort);
        
    	 $branchurl   = new moodle_url('/course/view.php?id=4&section=1');
         $branchsort  = 3;
         $title = get_string('knowledgelink');
         $branch = $menu->add( $title, $branchurl,  $title, $branchsort);
        
    	 $branchurl   = new moodle_url('/course/view.php?id=4&section=2');
         $branchsort  = 4;
         $title = get_string('resourcelink');
         $branch = $menu->add( $title, $branchurl,  $title, $branchsort);
 
        return parent::render_custom_menu($menu);
    }

    protected function render_custom_menu_item(custom_menu_item $menunode) 
    {
        $transmutedmenunode = new theme_simbuild_transmuted_custom_menu_item($menunode);
        return parent::render_custom_menu_item($transmutedmenunode);
    }
}

?>