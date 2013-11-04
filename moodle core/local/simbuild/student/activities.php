<?php
////////////////////////////////////////////////////////////
// ACTIVITIES
// Student - Progress Report page
// This page shows the activities for a certain work order
//    SHED
////////////////////////////////////////////////////////////
require_once(dirname(__FILE__) . '/../../../config.php');
require_once('../lib.php');

global $SBC_DB, $DB, $CFG, $USER;

$db_class = get_class($DB);
$SBC_DB = new $db_class(); // instantiate a new object of the same class as the original $DB
$SBC_DB->connect($CFG->sbc_dbhost, $CFG->sbc_dbUser, $CFG->sbc_dbPass, $CFG->sbc_dbName, false);

$lmsStudent = $DB->get_record("user", array("id"=>$USER->id));
$sbcID = $lmsStudent->idnumber;

$orderID = isset($_GET['orderID']) ? $_GET['orderID'] : null;
$homeUrl = $CFG->wwwroot;

//======================================
// Find the activities for the orderid
//======================================
if($activities = $SBC_DB->get_records('activity', array('WorkOrder_idWorkOrder' => $orderID)))
{         
    $titlesStr = "";   
    $passedStr = "";  
    $masteredStr = "";
    $badgesStr = "";
    foreach($activities as $singleActivity)  {  
        $activityName = get_string($singleActivity->desc, 'theme_simbuild');   
        $activityID =  $singleActivity->idactivity;
        
        $titlesStr .= '<p>'.$activityName.'</p>';
        $tempPassed = '<p>&#x25A1;</p><br/>';
        $tempMastered = '<p>&#x25A1;</p><br/>';
        $tempBadges = '<div class="iconrow" ></div>';
        
        $isPassed = false;
        if(isActivityPassed($sbcID, $singleActivity->guid))  {
             $tempPassed = '<p class="greenBoxes" >&#x2713;</p><br/>';
             $isPassed = true;     
        }
        
        // Check for badges
        //-------------------------
        if($awards = $SBC_DB->get_records('award_has_activity', array('Activity_idActivity'=>$activityID)) )
        {
            $tempBadges = '<div class="iconrow" >';
            $badgesEarned = 0;
            $badgesCount = count($awards);
            $actualBadges = "";
            foreach($awards as $singleAward)  
            {
                if($badge = $SBC_DB->get_record_sql("SELECT * FROM {award} myaward WHERE myaward.idAward = ? ", array($singleAward->award_idaward)) )  
                {
                    $badgeID = $badge->idaward;
                    $badgeName = get_string($badge->desc, 'theme_simbuild');
	            $badgeIcon = $homeUrl.'/theme/simbuild/pix/badgeicons/'.$badge->iconfilename.'.png';
	            
	            //echo "Badge ID: ".$badgeID.", User: ".$sbcID."<br />";

	            // Badge is earned if it's entry exists
	            $sql = "SELECT * FROM {awardstatus} award WHERE award.Award_idAward = ? AND award.People_idPeople=?";
	            $badgeExists = $SBC_DB->get_recordset_sql($sql, array($badgeID, $sbcID));
	            if($badgeExists->valid())  {
	                 $badgesEarned++;
	                 if($isPassed) {     
	                    $actualBadges .= '<img src="'.$badgeIcon.'" title="'.$badgeName.'" />';
		         }
		         else {
		            $actualBadges .= '<img src="'.$homeUrl.'/theme/simbuild/pix/badgeicons/badge3_locked.png" title="'.$badgeName.'" />';
		         }
	            }
	            else {
	                $actualBadges .= '<img src="'.$homeUrl.'/theme/simbuild/pix/badgeicons/badge3_locked.png" title="'.$badgeName.'" />';
	             }
	             $badgeExists->close();
                }
            }
            if($actualBadges == "") {
               $actualBadges = '<div class="hiddenbadge" ></div>';
            }
            $tempBadges .= $actualBadges;

            // Check for mastered
            if($isPassed && ($badgesEarned >= $badgesCount))  
	    { $tempMastered = '<p class="greenBoxes" >&#x2713;</p><br/>'; }
            
            $tempBadges .= '</div>';          
        }
        // You can also master an activity that has no badges
        if($isPassed && count($awards) == 0) {
            $tempMastered = '<p class="greenBoxes" >&#x2713;</p><br/>'; 
        }
                  
        $passedStr .= $tempPassed;
        $masteredStr .= $tempMastered;
        $badgesStr .= $tempBadges;
    }
    
    // Start the html for the activities
    //-------------------
    echo '<div class="activities" >
            <h3>Activities in this Work Order</h3>
            <div class="titles" >'.$titlesStr.'</div></div>
            
    <div class="passedboxes" >
            <h3>Passed</h3>
            <div class="checkboxes" >'.$passedStr.'</div></div>
            
    <div class="masteredboxes" >
            <h3>Mastered</h3>
            <div class="checkboxes" >'.$masteredStr.'</div></div>
     
     <div class="badges" >
            <h3>Badges</h3>
            <div class="badgeicons" >'.$badgesStr.'</div></div></div>';      
}

?>