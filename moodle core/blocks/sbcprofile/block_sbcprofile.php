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
 * Block displaying information about current logged-in user.
 *
 * This block can be used as anti cheating measure, you
 * can easily check the logged-in user matches the person
 * operating the computer.
 *
 * @package    block
 * @subpackage sbcprofile
 * @copyright  2010 Remote-Learner.net
 * @author     Olav Jordan <olav.jordan@remote-learner.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Displays the current user's profile information.
 *
 * @copyright  2010 Remote-Learner.net
 * @author     Olav Jordan <olav.jordan@remote-learner.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_sbcprofile extends block_base {
    /**
     * block initializations
     */
    public function init() 
    {
        $this->title   = 'My Profile'; //get_string('pluginname', 'block_sbcprofile');
    }

    /**
     * block contents
     *
     * @return object
     */
    public function get_content() {
        global $CFG, $USER, $DB, $SBC_DB, $OUTPUT, $PAGE;

        if ($this->content !== NULL) {
            return $this->content;
        }

        if (!isloggedin() or isguestuser()) {
            return '';      // Never useful unless you are logged in as real users
        }
        $user = $DB->get_record('user', array('id'=>$USER->id), '*', MUST_EXIST);

        $this->content = new stdClass;
        $this->content->text = '';
        $this->content->footer = '';

        $course = $this->page->course;
        
        $db_class = get_class($DB);
	$SBC_DB = new $db_class(); // instantiate a new object of the same class as the original $DB
	$SBC_DB->connect($CFG->sbc_dbhost, $CFG->sbc_dbUser, $CFG->sbc_dbPass, $CFG->sbc_dbName, false);

        // Rachel Fransen - Oct 2, 2013
	// Allow SBC users to see their avatar pictures from the ED
	$sql = "SELECT Avatar FROM {people} person WHERE person.idPeople=?";
	if($result = $SBC_DB->get_record_sql($sql, array($user->idnumber)) ) {
	   if($result->avatar == null) {
	       $this->content->text .= '<div class="myprofileitem picture">';
	       $this->content->text .= $OUTPUT->user_picture($user, array('size'=>100));
	   }
	   else if(!is_siteadmin($user)) {
	       $img = $CFG->wwwroot.'/vrsim/dbapi.php?getAvatar&id='.$user->idnumber;
	        $this->content->text .= '<div class="sbcavatar" ><div class="avatarimg" style="background-image: url('.$img.');"></div>';
	    }
	}
	else {
	    $this->content->text .= '<div class="profilepicture">';
	    $this->content->text .= $OUTPUT->user_picture($user, array('size'=>100));
	}	
	$this->content->text .= '</div>';
	
        /*if (!isset($this->config->display_picture) || $this->config->display_picture == 1) {
            $this->content->text .= '<div class="myprofileitem picture">';
            $this->content->text .= $OUTPUT->user_picture($USER, array('courseid'=>$course->id, 'size'=>'100',
                 'class'=>'profilepicture'));  // The new class makes CSS easier
            $this->content->text .= '</div>';
        } */   

        $this->content->text .= '<div class="myprofileitem fullname">'.fullname($USER).'</div>';

        if(!isset($this->config->display_city) || $this->config->display_city == 1) {
            $this->content->text .= '<div class="myprofileitem location">';
            $this->content->text .= format_string($USER->city);
        }
        
        if(!isset($this->config->display_country) || $this->config->display_country == 1) {
            $countries = get_string_manager()->get_list_of_countries();
            if (isset($countries[$USER->country])) {
                $this->content->text .= ', ' . $countries[$USER->country];
                $this->content->text .= '</div>';
            }
            else { $this->content->text .= '</div>'; }
        }
        else { $this->content->text .= '</div>'; }
        $this->content->text .= '<p></p>';

        if(!isset($this->config->display_description) || $this->config->display_description == 1) {
            $this->content->text .= '<div class="myprofileitem description">';
            $this->content->text .= format_string($user->description);
            $this->content->text .= '</div>';
        }

        if(!isset($this->config->display_email) || $this->config->display_email == 1) {
            $this->content->text .= '<div class="myprofileitem email">';
            $this->content->text .= obfuscate_mailto($USER->email, '');
            $this->content->text .= '</div>';
        }

        if(!empty($this->config->display_skype) && !empty($USER->skype)) {
            $this->content->text .= '<div class="myprofileitem skype">';
            $this->content->text .= 'Skype: ' . s($USER->skype);
            $this->content->text .= '</div>';
        }

        if(!empty($this->config->display_phone1) && !empty($USER->phone1)) {
            $this->content->text .= '<div class="myprofileitem phone1">';
            $this->content->text .= get_string('phone').': ' . s($USER->phone1);
            $this->content->text .= '</div>';
        }

        if(!empty($this->config->display_phone2) && !empty($USER->phone2)) {
            $this->content->text .= '<div class="myprofileitem phone2">';
            $this->content->text .= get_string('phone').': ' . s($USER->phone2);
            $this->content->text .= '</div>';
        }

        if(!empty($this->config->display_institution) && !empty($USER->institution)) {
            $this->content->text .= '<div class="myprofileitem institution">';
            $this->content->text .= format_string($USER->institution);
            $this->content->text .= '</div>';
        }

        if(!empty($this->config->display_firstaccess) && !empty($USER->firstaccess)) {
            $this->content->text .= '<div class="myprofileitem firstaccess">';
            $this->content->text .= get_string('firstaccess').': ' . userdate($USER->firstaccess);
            $this->content->text .= '</div>';
        }

        if(!empty($this->config->display_lastaccess) && !empty($USER->lastaccess)) {
            $this->content->text .= '<div class="myprofileitem lastaccess">';
            $this->content->text .= get_string('lastaccess').': ' . userdate($USER->lastaccess);
            $this->content->text .= '</div>';
        }

        if(!empty($this->config->display_currentlogin) && !empty($USER->currentlogin)) {
            $this->content->text .= '<div class="myprofileitem currentlogin">';
            $this->content->text .= get_string('login').': ' . userdate($USER->currentlogin);
            $this->content->text .= '</div>';
        }
        
        $this->content->text .= '<div class="myprofileitem profileicon">';
        $this->content->text .= '<img src="'.$CFG->wwwroot.'/theme/simbuild/pix/profile/profile_new.png" title="'.get_string('viewprofile','block_sbcprofile').'" />';
        $this->content->text .= '<a href="/user/profile.php" >'.get_string('viewprofile','block_sbcprofile').'</a>';
        $this->content->text .= '</div>';
        
        $this->content->text .= '<div class="myprofileitem messageicon">';
        $this->content->text .= '<img src="'.$CFG->wwwroot.'/theme/simbuild/pix/profile/email_new.png" title="'.get_string('viewmessages','block_sbcprofile').'" />';
        $this->content->text .= '<a href="/message/index.php">'.get_string('viewmessages', 'block_sbcprofile').'</a>';
        $this->content->text .= '</div>';
        
        $delimiter = '<a href="';
        $newLoginArr = explode($delimiter,$OUTPUT->login_info());
        $finalUrlArr = array();
        $finalUserName = "";
        $counter = 0;
        foreach($newLoginArr as $singleLogin) {
            $tempURL = explode('">', $singleLogin);            
            if($counter > 0)  { 
                $finalUrlArr[] = $tempURL[0];                
                $userName = explode(']', $tempURL[1]); 
                if($finalUserName == "" ) {$finalUserName = strip_tags($userName[0]); }
            }
            $counter ++;
        }
        
        // If logged in as another user, show a button
        // that lets you log back in as yourself
        if(count($finalUrlArr) > 2)
        {
           $userName = explode(" ", $finalUserName);
           $sql = "SELECT * FROM {user} WHERE firstname LIKE ? AND lastname LIKE ?";
           $oldUser = $DB->get_record_sql($sql, array($userName[0], $userName[1]));

	   $returnUrl = $finalUrlArr[0]; 
           if($oldUser) {
               $this->content->text .= '<div class="loginasinfo" ><div class="myprofileitem teacherpicture">';
               $this->content->text .= $OUTPUT->user_picture($oldUser, array('courseid'=>$course->id, 'size'=>'100',
                 'class'=>'profilepicture'));  // The new class makes CSS easier
               $this->content->text .= '</div>';
               
               //$siteID = 1; 
               //$sessionKey = explode("sesskey=",$returnUrl);
               //$returnUrl = $CFG->wwwroot.'/course/loginas.php?id='.$siteID.'&amp;user='.$oldUser->id.'&amp;sesskey='.$sessionKey[1];
           }
	        
           $this->content->text .= '<div class="logintitle" ><p>Logged in as: </p><h3>'.fullname($USER).'</h3>';
           $this->content->text .= '<a href="'.$returnUrl.'" >Return to your own profile?</a></div></div>';
        }
        
        $this->content->text .= '<div class="myprofileitem logoutbttn">';
        $logouturl = new moodle_url('/login/logout.php', array('sesskey'=>sesskey()));
        $this->content->text .= '<a href="'.$logouturl.'">'.get_string('logout').'</a>';
        $this->content->text .= '</div>';

        return $this->content;
    }

    /**
     * allow the block to have a configuration page
     *
     * @return boolean
     */
    public function has_config() {
        return false;
    }

    /**
     * allow more than one instance of the block on a page
     *
     * @return boolean
     */
    public function instance_allow_multiple() {
        //allow more than one instance on a page
        return false;
    }

    /**
     * allow instances to have their own configuration
     *
     * @return boolean
     */
    function instance_allow_config() {
        //allow instances to have their own configuration
        return false;
    }

    /**
     * instance specialisations (must have instance allow config true)
     *
     */
    public function specialization() {
    }

    /**
     * displays instance configuration form
     *
     * @return boolean
     */
    function instance_config_print() {
        return false;

        /*
        global $CFG;

        $form = new block_sbcprofile.phpConfigForm(null, array($this->config));
        $form->display();

        return true;
        */
    }

    /**
     * locations where block can be displayed
     *
     * @return array
     */
    public function applicable_formats() {
        return array('all'=>true);
    }

    /**
     * post install configurations
     *
     */
    public function after_install() {
    }

    /**
     * post delete configurations
     *
     */
    public function before_delete() {
    }

}