<?php

class block_sbc_badges extends block_base {
    function init() {
        $this->title = get_string('displayname', 'block_sbc_badges');
    }

    function get_content() 
    {        
        global $CFG, $USER, $DB, $SBC_DB; 
              
        if ($this->content !== NULL) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }
        
        $db_class = get_class($DB);
	    $SBC_DB = new $db_class(); // instantiate a new object of the same class as the original $DB
	    $SBC_DB->connect($CFG->sbc_dbhost, $CFG->sbc_dbUser, $CFG->sbc_dbPass, $CFG->sbc_dbName, false);
	
	    // Get the SBC user id
	    $student = $DB->get_record("user", array("id"=>$USER->id));
	    $sbcID = $student->idnumber;

        $this->content = new stdClass;
        $this->content->text = '';
        $this->content->footer = '';
 
        if($USER->theme == "simbuild")
        {
            // Get all the badges that this user has
            $badgeCount = 0;
            $badgeEarned = 0;
            $uniqueBadges = array();
            $uniqueBadgeIcons = array();
            $actualBadges = "";
            
            // Loop through the awards table first
            $sql = "SELECT * FROM {award} award WHERE award.Type=?";
            $type = 'badge';
            $allBadges = $SBC_DB->get_records_sql($sql, array($type));
            $badgeCount += count($allBadges);
            foreach($allBadges as $badge) {
                $badgeID = $badge->idaward;	
	            $badgeName = get_string($badge->desc, 'theme_simbuild');
	            $badgeIcon = $CFG->wwwroot.'/theme/simbuild/pix/badgeicons/'.$badge->iconfilename.'.png';

		        // Badge is earned if it's entry exists
		        $sql = "SELECT * FROM {awardstatus} WHERE People_idPeople=? AND Award_idAward=? LIMIT 1";
		        $badgeExists = $SBC_DB->get_record_sql($sql, array($sbcID, $badgeID));
		        if($badgeExists && $badgeExists->comment != "")  {
		            // Only show unique badge names
		            if(!in_array($badge->desc, $uniqueBadges)) {
			            $uniqueBadges[] = $badge->desc;
			            // Customize the badge title to show the number of similar badges earned
			            $sameBadgeCount = 1;
			            $sql = "SELECT * FROM {award} award WHERE award.desc=? AND award.Type=?";
			            $otherBadges = $SBC_DB->get_records_sql($sql, array($badge->desc, $type));
			            foreach($otherBadges as $singleBadge) {
			                $sql = "SELECT * FROM {awardstatus} award WHERE award.Comment=? AND award.People_idPeople=?";
			                if($SBC_DB->record_exists_sql($sql, array($badge->desc, $sbcID)) ) {
			                   $sameBadgeCount++;
			                }
			            }
			            $badgeEarned += $sameBadgeCount;
			            $badgeName .= '('.$sameBadgeCount.')';
			            $actualBadges .= '<img src="'.$badgeIcon.'" title="'.$badgeName.'" />';
		            }  
		        } 
            }   // end foreach allbadges
                    
            if($actualBadges == "")
            { $actualBadges = get_string("nobadges", "block_sbc_badges"); }
            
            //-----------------------
            // Create the html for the block
            //-----------------------
            $numBadges = $badgeEarned.' of '.$badgeCount;
            $badgeProgress = 0;
            if($badgeCount > 0) {
                $badgeProgress = (int)(($badgeEarned/$badgeCount) * 100);
            }
            $myContent = '<div class="badgesContent">';     
            $myContent .= '<div class="toptitle" ><div class="progress-bar green"><span style="width:'.$badgeProgress.'%;">
            			<p>'.$numBadges.'</p></span></div></div>';
            $myContent .= '<div class="icons">'.$actualBadges.'</div>';
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