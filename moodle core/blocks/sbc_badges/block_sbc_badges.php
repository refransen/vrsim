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
            $uniqueBadgeComments = array();
            $uniqueBadgeIcons = array();
            $actualBadges = "";
            
            // Get the total number of badges
            $sql = "SELECT * FROM {award} award WHERE award.Type=?";
            $type = 'badge';
            $allBadges = $SBC_DB->get_records_sql($sql, array($type));
            $badgeCount = count($allBadges);

            foreach($allBadges as $badge) {
                // Badge is earned if it's entry exists
                $sql = "SELECT * FROM {awardstatus} WHERE People_idPeople=? AND Award_idAward=?";
                $badgeExists = $SBC_DB->get_record_sql($sql, array($sbcID, $badge->idaward));
                if($badgeExists)  {
                    $badgeEarned++;
                    
                    $uniqueBadges[$badge->idaward] = $badge->desc;
                    if(!in_array($badgeExists->comment, $uniqueBadges) ){
                        $uniqueBadges[$badge->idaward] = $badgeExists->comment;
                    }
                } 
            }   // end foreach allbadges
            
            //print out the badges
            $finalBadges = array_unique($uniqueBadges);
            foreach($finalBadges as $key=>$value)  {
               $finalAward = $SBC_DB->get_record("award", array("idAward"=>$key));
               
               $badgeName = get_string($finalAward->desc, 'theme_simbuild');
               $badgeIcon = $CFG->wwwroot.'/theme/simbuild/pix/badgeicons/'.$finalAward->iconfilename.'.png';

               $sameBadgeCount = 1;
               // FIX: sometimes $value is empty in awardstatus and causes problems 
               // with counting badges of the same name
               if($value !== "") {
                    $sql = "SELECT * FROM {awardstatus} sameaw WHERE sameaw.Comment=? AND sameaw.People_idPeople=?";
                    if($sameBadges = $SBC_DB->get_records_sql($sql, array($value, $sbcID)) ){
                         $sameBadgeCount = count($sameBadges);
                    }
               }

                $badgeName .= '('.$sameBadgeCount.')';
                $actualBadges .= '<img src="'.$badgeIcon.'" title="'.$badgeName.'" />';
            }
                    
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