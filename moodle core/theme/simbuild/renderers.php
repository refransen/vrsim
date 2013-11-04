<?php

///////////////////////////////////////////
// Render custom menu items only for this
// theme
///////////////////////////////////////////
class theme_simbuild_core_renderer extends core_renderer 
{
    protected function render_custom_menu(custom_menu $menu) 
    {
        global $USER, $CFG;
        
        // Make sure you direct to the correct home url
        $homeURL = $CFG->wwwroot;
        $homeNode = current($menu->get_children());
        $homeNode->set_url(new moodle_url($CFG->wwwroot));
        
        //------------
        // Show a different progress report page per role
        //------------
        $reportURL = new moodle_url($homeURL.'/local/simbuild/student/progressreport.php');
	    if ($courses = enrol_get_my_courses(NULL, 'visible DESC, fullname ASC')) {
	        foreach($courses as $course)  {
	            $sbcCategory = 7;     // This is the course category for simbuild
	            if($course->category != $sbcCategory)   
	            {    continue;   }
	        
	            $context = context_course::instance($course->id);
	            $roleList = get_user_roles($context, $USER->id);
	            foreach($roleList as $singleRole)  {
	                if($singleRole->roleid < 5 && !is_siteadmin() && !isguestuser()) { 	             
	                    // Remove the "Home" link for teachers by resetting the menu bar
	                    $newMenuItems = array();
	                    $menu = new custom_menu($newMenuItems, current_language());
	                    $reportURL = new moodle_url($homeURL.'/local/simbuild/teacher/progressreport.php', array('id'=>$course->id));
	                    break;
	                }
	                else  {
	                    $reportURL = new moodle_url($homeURL.'/local/simbuild/student/progressreport.php', array('id'=>$course->id));
	                    }
	            }
	        }//end courses foreach
	    }

    	 $branchurl   = $reportURL;
         $branchsort  = 2;
         $title = get_string('progresslink', 'theme_simbuild'); 
         $branch = $menu->add( $title, $branchurl,  $title, $branchsort);
        
    	 $branchurl   = new moodle_url($homeURL.'/course/view.php?id=4&section=1');
         $branchsort  = 3;
         $title = get_string('knowledgelink', 'theme_simbuild');
         $branch = $menu->add( $title, $branchurl,  $title, $branchsort);
        
    	 $branchurl   = new moodle_url($homeURL.'/course/view.php?id=4&section=2');
         $branchsort  = 4;
         $title = get_string('resourcelink', 'theme_simbuild');
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