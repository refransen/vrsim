<?php
////////////////////////////////////////////////////////////
// Student - Progress Report page
// This page shows the activities for a certain work order
//    RANCH
////////////////////////////////////////////////////////////
require(dirname(__FILE__) . '/../../../../config.php');
global $SBC_DB, $DB, $CFG;

$db_class = get_class($DB);
$SBC_DB = new $db_class(); // instantiate a new object of the same class as the original $DB
$SBC_DB->connect($CFG->sbc_dbhost, $CFG->sbc_dbUser, $CFG->sbc_dbPass, $CFG->sbc_dbName, false);

$orderID = isset($_GET['orderID']) ? $_GET['orderID'] : null;

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
        $tempPassed = '<p>&#x25a2;</p>';
        $tempMastered = '<p>&#x25a2;</p>';
        $tempBadges = '<div class="iconrow" ></div>';
        
        $isPassed = 1;
        if($activityLogs = $SBC_DB->get_records_sql("SELECT * FROM {activitylog} log 
                              WHERE log.Activity_idActivity = ? AND log.Passed = ?", array($activityID, $isPassed)) )
        {
            $tempPassed = '<p>&#x2611;</p>';     
            foreach($activityLogs as $singleLog)  {
                if($singleLog->nbcompleted > 0)  {
                    $tempMastered = '<p>&#x2611;</p>';
                }
            }                
        }
        
        // Check for badges
        //-------------------------
        if($awards = $SBC_DB->get_records('award_has_activity', array('Activity_idActivity'=>$activityID)) )
        {
            $tempBadges = '<div class="iconrow" >';
            foreach($awards as $singleAward)  
            {
                if($badge = $SBC_DB->get_record_sql("SELECT * FROM {award} myaward WHERE myaward.idAward = ? ", array($singleAward->award_idaward)) )  
                {
                    $badgeID = $badge->idaward;
                    $badgeName = get_string($badge->desc, 'theme_simbuild');
	            $badgeIcon = $badge->iconfilename;

	            // Badge is earned if it's entry exists
	            // TODO: pull this info via People_idPeople
	            if($badgeExists = $SBC_DB->get_records('awardstatus', array('Award_idAward'=>$badgeID)) )  {
	                 $tempBadges .= '<img src="$badgeIcon" title="'.$badgeName.'" />';
	            }
	            else {
	                $tempBadges .= '<img src="/theme/simbuild/pix/badgeicons/badge2_locked.png" title="'.$badgeName.'" />';
	           }
                }
            }
            $tempBadges .= '</div>';
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