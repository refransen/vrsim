<?php
require_once($CFG->dirroot.'/licapi/config.php');
require_once($CFG->dirroot.'/licapi/lic_api.php');
	
class block_sbc_manageusers  extends block_base {
    function init() {
        $this->title = get_string('displayname', 'block_sbc_manageusers');
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
        
        if(!is_siteadmin() && $USER->theme == 'simbuild') {
             $custID = $USER->institution;
             $licenseFile = lic_getFile($custID); 
             if(!lic_IsValid($licenseFile)) { 
                $this->content->text = "Cannot manage users with an invalid Simbuild LMS license.";
                return $this->content;
             }
        }

        if($USER->theme == "simbuild")
        {
           $usercontext   = context_user::instance($USER->id, IGNORE_MISSING);
           $myContent = '<table><tbody>';
          
           if(has_capability('moodle/user:create', $usercontext)) {
               $myContent .= '<tr><td><img src="'.$CFG->wwwroot.'/theme/simbuild/pix/studenticons/AddUser_Icon.png"';
               $myContent .= ' width="17" height="19" alt="Create User" /></td><td><span style="text-decoration: underline;">';
               $myContent .= '<a href="'.$CFG->wwwroot.'/user/editadvanced.php?id=-1" title="Create User">Create users</a></span></td></tr>';
           } 
           $myContent .= '<tr><td><img src="'.$CFG->wwwroot.'/theme/simbuild/pix/studenticons/EnrollUser_Icon.png"';
           $myContent .= ' width="17" height="19" alt="Enroll User" /></td><td><span style="text-decoration: underline;">';
           $myContent .= '<a href="'.$CFG->wwwroot.'/enrol/users.php?id=4" title="Enroll Users">Enroll users</a></span></td></tr>';
           
           $myContent .= '<tr><td><img src="'.$CFG->wwwroot.'/theme/simbuild/pix/studenticons/ExistingClasses_Icon.png"';
           $myContent .= ' width="18" height="14" alt="Manage Classes" /></td><td><span style="text-decoration: underline;">';
           $myContent .= '<a href='.$CFG->wwwroot.'/group/index.php?id=4" title="Manage Classes">Manage classes</a></span></td></tr>';
	   $myContent .=  '</tbody></table>';
	   
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