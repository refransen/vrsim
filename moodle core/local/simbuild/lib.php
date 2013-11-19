<?php

///////////////////////////////////////////////////////
// Find the ID number of the student inside 
// the SBC database
///////////////////////////////////////////////////////
function getSBCID($userid){
    global $DB;
    
    $sbcID = $userid;
    $sql = "SELECT * FROM {user} WHERE id=? OR idnumber=? LIMIT 1";
    if($sbcStudent = $DB->get_record_sql($sql, array($userid, $userid)) ){
        if($sbcStudent->idnumber !== "") {
            $sbcID = $sbcStudent->idnumber; 
        }    
    }
    return $sbcID;
}
///////////////////////////////////////////////////////
// Find all students for this class or course, based
// on current logged-in user's license id
//
// params: the group/class name, the course id, 
// if function should return an array of names or user objects
// return:  array of eligible students
///////////////////////////////////////////////////////
function getStudents($className, $courseid, $retStudName=true) {
    global $CFG, $DB, $USER;

    // Need the licensing API
    require_once($CFG->dirroot.'/licapi/config.php');
    require_once($CFG->dirroot.'/licapi/lic_api.php');

    //--------------------
    // Get the students for this course
    //--------------------
    $studentOptions = array();
    if ($className == 0) 
    { 
        $sqlUsers = "SELECT ra.userid as id 
    	     FROM {$CFG->prefix}role_assignments AS ra 
    	     INNER JOIN {$CFG->prefix}context AS ctx 
             JOIN {user} u
                 ON ra.contextid = ctx.id 
              WHERE ra.roleid = 5 
                AND u.id = ra.userid 
                AND ctx.instanceid = ".$courseid." 
                AND ctx.contextlevel = 50";

        // Rachel Fransen - Oct 30, 2013
	// You can only enroll users that belong to your theme AND 
	// your institution (license number)
        $params = array();
	if(!is_siteadmin($USER)) {
	      $sqlUsers .= " AND u.theme=:utheme";
	      $params['utheme'] = $USER->theme;
	
	       //Check if the license is valid
	       if($USER->theme == 'simbuild') {
	           $custID = $USER->institution;
	           $file = lic_getFile($custID); //$custID.".lic";
	           if(!lic_IsValid($file) || lic_hasExpired($file)) {
	               $custID = 0;
	           }
	
	           $sqlUsers .= " AND u.institution=:uinstitution";
	           $params['uinstitution'] = $custID;
	        }
	}  
                
        if ($dataUsers = $DB->get_records_sql($sqlUsers, $params)) {
            foreach($dataUsers as $singleUser) {
                $student = $DB->get_record('user', array('id'=>$singleUser->id));
                if($retStudName) {
                    $studentOptions[$singleUser->id] = $student->firstname.' '.$student->lastname;
                }
                else {
                    $studentOptions[$singleUser->id] = $student;
                }
            }
        }
    } 
    else  
    {
        if ($dataUsers  = groups_get_members($className, 'u.id', 'lastname ASC, firstname ASC')) {
            foreach($dataUsers as $singleUser) {
                $student = $DB->get_record('user', array('id'=>$singleUser->id));
                if($retStudName) {
                    $studentOptions[$singleUser->id] = $student->firstname.' '.$student->lastname;
                } 
                else {
                    $studentOptions[$singleUser->id] = $student;
                }
            }
        }            
    } 
    return $studentOptions;
}

///////////////////////////////////////////////////////
// Get all the classes for the current logged-in user
// depending on their SimBuild license
// return:  array of eligible classes
///////////////////////////////////////////////////////
function getClasses($courseid) {
    global $DB, $USER;

    $classOptions = array();
    $classOptions[0] = 'All';
    $groups = array();

    if(is_siteadmin()) {
        $groups = $DB->get_records('groups', array('courseid'=>$courseid));
    }
    else {
        $groups = $DB->get_records('groups', array('courseid'=>$courseid, 'enrolmentkey'=>$USER->institution));
    }
    if ($groups){
       foreach ($groups as $cgroup) {
            $classOptions[$cgroup->id] = $cgroup->name;
       }        
    }
    return $classOptions;
}

///////////////////////////////////////////////////////
// Determine mastery from an array of activities
// Returns an array of true/false for mastery
///////////////////////////////////////////////////////
function getAllActMastery($activities, $userid)  
{
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);
    
    $activitiesMastered = array();
    foreach($activities as $singleActivity)
    {
        $activityID =  $singleActivity->idactivity;
        $badgesCount = 0;
        $badgesEarned = 0;
        if($awards = $SBC_DB->get_records('award_has_activity', array('Activity_idActivity'=>$activityID)) )  
        {
    	   $badgesCount += count($awards);
           foreach($awards as $singleAward)   
           {
               if($badge = $SBC_DB->get_record_sql("SELECT * FROM {award} myaward WHERE myaward.idAward = ? ", array($singleAward->award_idaward)) )  
               {
                   $badgeID = $badge->idaward;	
                   if($badgeExists = $SBC_DB->count_records('awardstatus', array('Award_idAward'=>$badgeID, 'People_idPeople'=>$userid)) ) 
                   {   $badgesEarned++;  }
               }
           }
        }//end awards if
        
        // Get data for these activities
	$isActivityMastered = false;    
        if(isActivityPassed($userid, $singleActivity->guid) && ($badgesEarned >= $badgesCount))  
	{ $isActivityMastered = true; }

	$activitiesMastered[]  = $isActivityMastered ;
   }
   return $activitiesMastered;
}

///////////////////////////////////////////////////////
// Determine mastery from a single activity
// Returns an array of true/false for mastery
///////////////////////////////////////////////////////
function getSingleActMastery($singleActivity, $userid)  
{
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);
   
    $activityID =  $singleActivity->idactivity;
    $badgesCount = 0;
    $badgesEarned = 0;
    if($awards = $SBC_DB->get_records('award_has_activity', array('Activity_idActivity'=>$activityID)) )  
    {
    	   $badgesCount += count($awards);
           foreach($awards as $singleAward)   
           {
               if($badge = $SBC_DB->get_record_sql("SELECT * FROM {award} myaward WHERE myaward.idAward = ? ", array($singleAward->award_idaward)) )  
               {
                   $badgeID = $badge->idaward;	
                   if($badgeExists = $SBC_DB->record_exists('awardstatus', array('Award_idAward'=>$badgeID, 'People_idPeople'=>$userid)) ) 
                   {   $badgesEarned++;  }
               }
           }
    }//end awards if
        
    //Assign mastery, also if no badges
    $isActivityMastered = false;    
    if(isActivityPassed($userid, $singleActivity->guid)) {
        if($badgesEarned >= $badgesCount || $badgesCount == 0) { 
            $isActivityMastered = true; }
    } 
    
   return $isActivityMastered;
}

///////////////////////////////////////////////////////
// Find out if a single activity is passed
// Return true or false
///////////////////////////////////////////////////////
function isActivityPassed($userid, $actGUID) {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    $searchKey =  '%Activity/'.$actGUID.'/Completed%'; 
    $sql = "SELECT MAX(Value) as 'value' FROM {profile} prof WHERE prof.People_idPeople=? AND prof.Key LIKE ?";
    if($actPassLogs = $SBC_DB->get_record_sql($sql, array($userid, $searchKey)) ){
        if((int)$actPassLogs->value > 0) { 
            return true;
        }
    } 
    return false;
}

///////////////////////////////////////////////////////
// Return the amount of passes for this activity
///////////////////////////////////////////////////////
function getActivityPasses($userid, $actGUID) {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    $searchKey =  '%Activity/'.$actGUID.'/Completed%'; 
    $sql = "SELECT MAX(Value) as 'value' FROM {profile} prof WHERE prof.People_idPeople=? AND prof.Key LIKE ?";
    if($actPassLogs = $SBC_DB->get_record_sql($sql, array($userid, $searchKey)) ){
        if((int)$actPassLogs->value > 0) { 
            $tempValue = (int)$actPassLogs->value;
            return $tempValue;
        }
    } 
    return 0;
}

///////////////////////////////////////////////////////
// Return the amount of attempts for this activity
///////////////////////////////////////////////////////
function getActivityAttempts($userid, $actGUID) {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    $searchKey = '%Activity/'.$actGUID.'/Attempts%';    
    $sql = "SELECT MAX(Value) as 'value' FROM {profile} prof WHERE prof.People_idPeople=? AND prof.Key LIKE ?";
    if($actAttemptLogs = $SBC_DB->get_record_sql($sql, array($userid, $searchKey)) ){
        if((int)$actAttemptLogs->value > 0) { 
            $tempValue = (int)$actAttemptLogs->value;
            return $tempValue;
        }
    } 
    return 0;
}

///////////////////////////////////////////////////////
// Find out if workorder is unlocked, but not passed
// Return true or false
///////////////////////////////////////////////////////
function getOrderUnlocked($userid, $orderGUID) {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

     // Search the profile table
    $searchKey = '%'.$orderGUID.'/Activity/%';
    $sql = "SELECT MAX(Value) as 'value'  FROM {profile} prof WHERE prof.People_idPeople=? AND prof.Key LIKE ?";
    if($orderLog = $SBC_DB->get_record_sql($sql, array($userid,$searchKey)) ) {
        if($orderLog->value > 0){
            return true;
        }
    }
    return false;
}

///////////////////////////////////////////////////////
// Find out if a single workorder is passed
// Return true or false
///////////////////////////////////////////////////////
function getOrderPassed($userid, $orderGUID) {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    // Search the profile table
    $searchKey = '%WorkOrderCompleted/'.$orderGUID.'%';
    $sql = "SELECT MAX(Value) as 'value' FROM {profile} prof WHERE prof.People_idPeople=? AND prof.Key LIKE ?";
    if($orderLog = $SBC_DB->get_record_sql($sql, array($userid,$searchKey)) ){
        if((int)$orderLog->value > 0) {  
            return true;
        }
    }
    return false;
}

///////////////////////////////////////////////////////
// Find total work orders passed, in all SBC
// Return int
///////////////////////////////////////////////////////
function getAllOrdersPassed($userid) {
   global $SBC_DB, $DB;
   // Make sure we are using the SBC user id 
   // when calculating SBC data
   $userid = getSBCID($userid);
   
   //Get total number of work orders
    $completeCount = 0;
    $workorders = $SBC_DB->get_records("workorder");
    foreach($workorders as $singleOrder)  
    {
        // Search the profile table
        $searchKey = '%WorkOrderCompleted/'.$singleOrder->guid.'%';
        $sql = "SELECT MAX(Value) as 'value' FROM {profile} prof WHERE prof.People_idPeople=? AND prof.Key LIKE ?";
        if($orderLog = $SBC_DB->get_record_sql($sql, array($userid,$searchKey)) ){
            if((int)$orderLog->value > 0) {                   
                $completeCount++;
            }
        }
    }
    return $completeCount;
}

///////////////////////////////////////////////////////
// Find total activities passed, in all SBC
// Return int 
///////////////////////////////////////////////////////
function getAllActivitiesPassed($userid) {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);
   
    $completeCount = 0;
    $activities = $SBC_DB->get_records("activity");
    foreach($activities as $singleAct)  {
        if(isActivityPassed($userid, $singleAct->guid)) {
            $completeCount++;
        }
    }
    return $completeCount;
}

///////////////////////////////////////////////////////
// Find total tools unlocked, in all SBC
// Return int 
///////////////////////////////////////////////////////
function getAllToolsPassed($userid) {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);
   
    //Get total number of work orders
    $completeCount = 0;
    $awardType = "tool";
    $sql = "SELECT * FROM {award} WHERE Type=?";
    if($tools = $SBC_DB->get_records_sql($sql, array($awardType)) ) {
    	foreach($tools as $singleTool)  {
            $sql = "SELECT * FROM {awardstatus} WHERE Award_idAward=? AND People_idPeople=?";
    	    if($myOrderLogs = $SBC_DB->get_records_sql($sql, array($singleTool->idaward, $userid)) )  
    	    { $completeCount++; }
    	}
    }
    return $completeCount;
}

///////////////////////////////////////////////////////
// Find total tooltips viewed, in all SBC
// Return int 
///////////////////////////////////////////////////////
function getAllToolTipsPassed($userid) {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);
   
    //Get total number of work orders
    $completeCount = 0;
    $awardType = "toolTip";
    $sql = "SELECT * FROM {award} WHERE Type=?";
    if($tools = $SBC_DB->get_records_sql($sql, array($awardType)) ) {
    	foreach($tools as $singleTool)  {
            $sql = "SELECT * FROM {awardview} WHERE Award_idAward=? AND People_idPeople=?";
    	    if($myOrderLogs = $SBC_DB->get_records_sql($sql, array($singleTool->idaward, $userid)) )  
    	    { $completeCount++; }
    	}
    }
    return $completeCount;
}

///////////////////////////////////////////////////////
// Determine the width of the graph
///////////////////////////////////////////////////////
function getGraphWidth($labelCount, $min=700) {
     $offset = 125;
     if($labelCount <= 4) {
        $offset = 80;
     }
     $graphWidth = $offset * $labelCount;
     if($graphWidth < 800)
     { $graphWidth = $min; }
     return $graphWidth;
}

////////////////////////////////////////////////////
// Calculate total progress in all sites
// @param int $id userid
// function returns siteprogress value of particular user
////////////////////////////////////////////////////
function calculate_siteprogress($userid) {
    global $SBC_DB, $CFG, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);
    $totalProgress = 0;

    //Get total number of work orders   
    $workorders = $SBC_DB->get_records("workorder");
    foreach($workorders as $singleOrder)  
    {
        // Search the profile table
        if(getOrderPassed($userid, $singleOrder->guid)) {                   
            $totalProgress++;
    	}
    }
    $orderCount = count($workorders);
    $finalProgress = (int)(($totalProgress / $orderCount) * 100);
    if($finalProgress > 100) {
        $finalProgress = 100;
    }

    return $finalProgress;
}

////////////////////////////////////////////////////
// Calculate total progress in a SINGLE site
// @param int $id userid, $siteid
// function returns siteprogress value of perticular user
////////////////////////////////////////////////////
function calculate_singleSiteProgress($userid, $siteid) {
    global $SBC_DB,$CFG, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    //Get total number of systems in this site
    $completeCount = 0;
    $totalCount = 0;
    $totalOrdersArr = array();
    if($systems = $SBC_DB->get_records("system", array("WorkSite_idWorkSite"=>$siteid)) )  {
        foreach($systems as $singleSystem)  {
            $workorders = $SBC_DB->get_records("workorder", array("System_idSystem"=>$singleSystem->idsystem));
            $totalCount += count($workorders);
            foreach($workorders as $singleOrder)  {
                if(getOrderPassed($userid, $singleOrder->guid)) {                   
                    $completeCount++;
                }
    	    }
        }
    }

    $totalProgress = (int)(($completeCount / $totalCount ) * 100);
    return $totalProgress ;
}

////////////////////////////////////////////////////
// Calculate total progress in a SINGLE site, using activities
// @param int $id userid, $siteid
// function returns siteprogress value of perticular user
////////////////////////////////////////////////////
function calculate_singleSiteActivityProgress($userid, $siteid) {
    global $SBC_DB,$CFG, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    //Get total number of systems in this site
    $completeCount = 0;
    $totalCount = 0;
    $totalOrdersArr = array();
    if($systems = $SBC_DB->get_records("system", array("WorkSite_idWorkSite"=>$siteid)) )  {
        foreach($systems as $singleSystem)  {
            $workorders = $SBC_DB->get_records("workorder", array("System_idSystem"=>$singleSystem->idsystem));
            foreach($workorders as $singleOrder) {
                $activities = $SBC_DB->get_records("activity" , array("WorkOrder_idWorkOrder"=>$singleOrder->idworkorder));
                $totalCount += count($activities );
                foreach($activities as $singleAct) {
                    if(isActivityPassed($userid, $singleAct->guid)) {                   
                        $completeCount++;
                    }
                }
            }
        }
    }
    $totalProgress = (int)(($completeCount / $totalCount ) * 100);
    return $totalProgress ;
}

////////////////////////////////////////////////////
// Calculate total time spent in SBC
// @param int $id userid
// RETURN: number of seconds
////////////////////////////////////////////////////
function calculate_totalTimeSpent($userid) {
 global $SBC_DB,$CFG, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    // First get all the worksite GUID
    $totalSiteTime = 0;
    $sql = "SELECT GUID FROM {worksite}";
    if($siteIDS = $SBC_DB->get_records_sql($sql)) {
        foreach($siteIDS as $singleID ) {

            $searchKey = 'Worksite/'.$singleID->guid.'/TotalTime';
            $sql = "SELECT Value as 'value' FROM {profile} prof WHERE prof.People_idPeople=? AND prof.Key LIKE ?";
            if($siteTime = $SBC_DB->get_record_sql($sql, array($userid,$searchKey)) ) {
                if(is_numeric($siteTime->value)) {
                    $totalSiteTime += (float)$siteTime->value;
                }
            }
        }
    } 
    return $totalSiteTime;
}

////////////////////////////////////////////////////
// Calculate total time spent in a Single Site
// @param int $id userid, $siteid
// function returns timespent(H:M:S) value of perticular user
////////////////////////////////////////////////////
function calculate_siteTimeSpent($userid, $siteGUID, $useText=false) {
    global $SBC_DB,$CFG, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);
    
    $totalSeconds = 0;
    $searchKey = 'Worksite/'.$siteGUID.'/TotalTime';
    $sql = "SELECT MAX(Value) as 'value' FROM {profile} prof WHERE prof.People_idPeople=? AND prof.Key LIKE ?";
    if($siteTime = $SBC_DB->get_record_sql($sql, array($userid,$searchKey)) ){
        if(is_numeric($siteTime->value)) {
            $totalSeconds = (float)$siteTime->value;
        }
    }     
    return $totalSeconds;
}

////////////////////////////////////////////////////
// Calculate total learning momentum in SBC, now
// using the PROFILE table
// @param int $id userid
////////////////////////////////////////////////////
function calculate_totalProfLearnMom($userid, $startDate="", $endDate="", $year="") {
    global $SBC_DB, $CFG, $DB;
    
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    // Learning Momentum: (sum activities passed)/(Sum of activities attempted)

    $activityAttempts = 0;
    $activityPass = 0;
    $activities = $SBC_DB->get_records("activity");
    foreach($activities as $singleActivity) 
    {
         $tempAttempts = getActivityAttempts($userid, $singleActivity->guid);
         $tempPassed = getActivityPasses($userid, $singleActivity->guid);
         
        // echo "Attempts: ".$tempAttempts.", Passed: ".$tempPassed."<br />";

         if($startDate !== "" && $endDate !== "") {
    	    if($startDate == $endDate && $year == "") {
                $day = "";
                if($startDate) {
       		    $day =  date('d', strtotime($startDate));
       		}
       		else {
       		    $day = $startDate;
       		}

                $searchKey = '%Activity/'.$singleActivity->guid.'/Attempts%';
                $sql = "SELECT MAX(Value) as 'value' FROM {profile} prof WHERE prof.People_idPeople=? AND prof.Key LIKE ? AND 
                           DAY(prof.last_modif) = ?";
                $tempAttempts = 0;           
		if($actAttemptLogs = $SBC_DB->get_record_sql($sql, array($userid, $searchKey, $day)) ){		
                    $tempAttempts = (int)$actAttemptLogs->value;     
                }           
		    
                $searchKey = '%Activity/'.$singleActivity->guid.'/Completed%';
		$sql = "SELECT Value as 'value' FROM {profile} prof WHERE prof.People_idPeople=? AND prof.Key LIKE ? AND 
                            DAY(prof.last_modif) = ?";
                $tempPassed = 0;            
		if($actPassLogs = $SBC_DB->get_record_sql($sql, array($userid, $searchKey, $day)) )  {
                    $tempPassed = (int)$actPassLogs->value;
                }
            }
            else if($year !== "")  {
                $myDate = $startDate->format('Y-m-d H:i:s');
       		$month =  date('m', strtotime($myDate));
        
                $searchKey = '%Activity/'.$singleActivity->guid.'/Attempts%';
                $sql = "SELECT Value as 'value' FROM {profile} prof WHERE prof.People_idPeople=? AND prof.Key LIKE ? AND 
                           MONTH(prof.last_modif) = ? AND YEAR(prof.last_modif) = ? LIMIT 1";
		$actAttemptLogs = $SBC_DB->get_record_sql($sql, array($userid, $searchKey, $month, $year));
                $tempAttempts = (int)$actAttemptLogs->value; 
		    
                $searchKey = '%Activity/'.$singleActivity->guid.'/Completed%';
		 $sql = "SELECT Value as 'value' FROM {profile} prof WHERE prof.People_idPeople=? AND prof.Key LIKE ? AND 
                           MONTH(prof.last_modif) = ? AND YEAR(prof.last_modif) = ? LIMIT 1";
		$actPassLogs = $SBC_DB->get_record_sql($sql, array($userid, $searchKey, $month, $year));
                $tempPassed = (int)$actPassLogs->value;
            }    
         }
         
         $activityAttempts += $tempAttempts ;
         $activityPass += $tempPassed ;        
    }
    $learningMom = 0;
    if($activityAttempts > 0) {
        $learningMom = (int)(($activityPass/$activityAttempts) * 100);
        if($learningMom > 100) { $learningMom = 100; }
    }
    //echo 'User: '.$userid.', Passed: '.$activityPass.', Attempts: '.$activityAttempts.', Mom:'.$learningMom .'<br />';
    return $learningMom;
}

//////////////////////////////////////////////////////////////////
// Create data and labels for the overall- student reports
// This function will create "day" labels and data
//////////////////////////////////////////////////////////////////
function createDailyOverall($userid)  {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    $graphLabels = array();
    $graphData = array();
    
    $sql = "SELECT MIN(last_modif) AS 'time' FROM {profile} prof WHERE prof.People_idPeople=?";
    $startTime = $SBC_DB->get_recordset_sql($sql, array($userid));

    $sql = "SELECT MAX(last_modif) AS 'time' FROM {profile} prof WHERE prof.People_idPeople=?";
    $endTime = $SBC_DB->get_recordset_sql($sql, array($userid));
    
    // Print out all day labels
    $start = new DateTime (end($startTime)['time']);
    $end = new DateTime (end($endTime)['time']);
    $interval = new DateInterval ('P1D');

    // Then create the period range, including the starting day and up to the ending day.
    // Doesn't include the last day, which is why we added one day extra when creating the ending timestamp.
    $range = new DatePeriod ($start, $interval, $end);

    // Run through the days of the next week, and build up the output string.
    $counter = 0;
    $lastDate = "";
    foreach ($range as $date) {
        $lastDate = $date;
        $graphLabels[] = $date->format('D').' - '.$date->format('d');
        $myDate = $date->format('Y-m-d H:i:s');
        $graphData[] = calculate_totalProfLearnMom($userid, $myDate, $myDate);
        $counter++;
    }
    // If there is only one date, the foreach loop will never be run
    if($counter == 0) {
        $lastDate = $end;
        $graphLabels[] = $end->format('D').' - '.$end->format('j');
        $myDate = $end->format('Y-m-d H:i:s');
        $graphData[] = calculate_totalProfLearnMom($userid, $myDate, $myDate);
    }

    // If only one data, show the next day to make a line
    if($counter <= 1) {
       $lastDate->modify('+1 day');
       $graphLabels[] = $lastDate->format('D').' - '.$lastDate->format('d');
       $graphData[] = 0;
    } 
    
    $oldStart = strtotime(end($startTime)['time']);
    $finalStart = date('F d, Y', $oldStart);
    
    $oldEnd = strtotime(end($endTime)['time']);
    $finalEnd = date('F d, Y', $oldEnd); 

    $tempLabel = $finalStart.' - '.$finalEnd;
    if(!$startTime) {
        $tempLabel = '2013';
    }
    
    $finalArray['title'] = $tempLabel;
    $finalArray['labels'] = $graphLabels;
    $finalArray['data'] = $graphData;
    
    return $finalArray;
}

//////////////////////////////////////////////////////////////////
// Create data and labels for student dashboard - ACADEMIC CHART
// This function will create "day" labels and data, for a current month
//////////////////////////////////////////////////////////////////
function createDailySkillData($userid, $skillid)  {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    // Find the current date of activity
    $sql = "SELECT MAX(last_modif) AS 'time' FROM {profile} prof WHERE prof.People_idPeople=?";
    $endTime = $SBC_DB->get_recordset_sql($sql, array($userid));
    $end = new DateTime (end($endTime)['time']);
    $month = $end->format('n');
    $year = $end->format('Y');

    // Find first day of the current month
    $startTime = date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
    $start = new DateTime($startTime);
   
    // if user wasn't enrolled at start time, then we 
    // don't want to show empty dates
    $sql = "SELECT MIN(last_modif) AS 'time' FROM {profile} prof WHERE prof.People_idPeople=?";
    $enrolledTime = $SBC_DB->get_recordset_sql($sql, array($userid));
    $enrolled = new DateTime(end($enrolledTime)['time']);
    if($enrolled > $start)  {
        $start = $enrolled;
    }

    // Going to interate one day
    $interval = new DateInterval ('P1D');

    // Then create the period range, including the starting day and up to the ending day.
    $range = new DatePeriod ($start, $interval, $end);

    // Run through the days of the next week, and build up the output string.
    $graphLabels = array();
    $graphData = array();
    $counter = 0;
    $lastDate = "";
    foreach ($range as $date) {
    	$lastDate = $date;
        $graphLabels[] = $date->format('D').' - '.$date->format('j');
        $myDate = $date->format('Y-m-d H:i:s');
        $userProgressData = findDateSkillProgress($userid, $skillid, $myDate);
        $graphData[] = $userProgressData['learning'];
        $counter++;
    }    

    // If there is only one date, the foreach loop will never be run
    if($counter == 0) {
        $lastDate = $end;
        $graphLabels[] = $end->format('D').' - '.$end->format('j');
        $myDate = $end->format('Y-m-d H:i:s');
        $userProgressData = findDateSkillProgress($userid, $skillid, $myDate);
        $graphData[] = $userProgressData['learning'];
    }

    // If only one data, show the next day to make a line
    if($counter <= 1) {
       $lastDate->modify('+1 day');
       $graphLabels[] = $lastDate->format('D').' - '.$lastDate->format('d');
       $graphData[] = 0;
    } 
    
    $oldEnd = strtotime(end($endTime)['time']);
    $finalEnd = date('F Y', $oldEnd); 
    if(!$endTime) 
    { $finalEnd = '--'; }
    
    $finalArray['title'] = $finalEnd;
    $finalArray['labels'] = $graphLabels;
    $finalArray['data'] = $graphData;
    
    $endTime->close();  
    $enrolledTime->close();
    
    return $finalArray;
}


//////////////////////////////////////////////////////////////////
// Create data and labels for the overall- student reports
// This function will create "week" labels and data
//////////////////////////////////////////////////////////////////
function createWeeklyOverall($userid)  {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    $graphLabels = array();
    $graphData = array();
    
    $sql = "SELECT MIN(last_modif) AS 'time' FROM {profile} prof WHERE prof.People_idPeople=?";
    $startTime = $SBC_DB->get_recordset_sql($sql, array($userid));

    $sql = "SELECT MAX(last_modif) AS 'time' FROM {profile} prof WHERE prof.People_idPeople=?";
    $endTime = $SBC_DB->get_recordset_sql($sql, array($userid));
    
    // Print out all day labels
    $start = new DateTime (end($startTime)['time']);
    $end = new DateTime (end($endTime)['time']);
    $interval = new DateInterval ('P6D');

    // Then create the period range, including the starting day and up to the ending day.
    // Doesn't include the last day, which is why we added one day extra when creating the ending timestamp.
    $range = new DatePeriod ($start, $interval, $end);

    // Run through the days of the next week, and build up the output string.
    $counter = 1;
    foreach ($range as $date) {
        $graphLabels[] = 'Week '.$counter;
        
        $currDate = $date->format('Y-m-d H:i:s');        
        $week =  date('W', strtotime($currDate ));
        $year =  date('Y', strtotime($currDate ));
        $from = date("Y-m-d H:i:s", strtotime("{$year}-W{$week}-1")); //Returns the date of monday in week
        $to = date("Y-m-d H:i:s", strtotime("{$year}-W{$week}-7"));   //Returns the date of sunday in week              
        $graphData[] = calculate_totalProfLearnMom($userid, $from, $to);
        $counter++;
    }  
    // If there is only one date, the foreach loop will never be run
    if($counter == 1) {
       $graphLabels[] = 'Week 1';
        
        $currDate = $end->format('Y-m-d H:i:s');        
        $week =  date('W', strtotime($currDate ));
        $year =  date('Y', strtotime($currDate ));
        $from = date("Y-m-d H:i:s", strtotime("{$year}-W{$week}-1")); //Returns the date of monday in week
        $to = date("Y-m-d H:i:s", strtotime("{$year}-W{$week}-7"));   //Returns the date of sunday in week               
        $graphData[] = calculate_totalProfLearnMom($userid);

        $graphLabels[] = 'Week 2';
        $graphData[] = 0;
    }
    if($counter == 2) {
      $graphLabels[] = 'Week '.$counter;
      $graphData[] = 0;
    }

    $oldStart = strtotime(end($startTime)['time']);
    $finalStart = date('F d, Y', $oldStart);
    
    $oldEnd = strtotime(end($endTime)['time']);
    $finalEnd = date('F d, Y', $oldEnd); 
    
    $timeLabel = $finalStart.' - '.$finalEnd;
    if(!$startTime ) {
        $timeLabel = '2013';
    }
    
    $finalArray['title'] = $timeLabel;
    $finalArray['labels'] = $graphLabels;
    $finalArray['data'] = $graphData;
    
    $startTime->close(); 
    $endTime->close();    
    
    return $finalArray;
}

//////////////////////////////////////////////////////////////////
// Create data and labels for the overall- student reports
// This function will create "month" labels and data
//////////////////////////////////////////////////////////////////
function createMonthlyOverall($userid)  {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    $graphLabels = array();
    $graphData = array();
    
    $sql = "SELECT MIN(last_modif) AS 'time' FROM {profile} prof WHERE prof.People_idPeople=?";
    $startTime = $SBC_DB->get_recordset_sql($sql, array($userid));

    $sql = "SELECT MAX(last_modif) AS 'time' FROM {profile} prof WHERE prof.People_idPeople=?";
    $endTime = $SBC_DB->get_recordset_sql($sql, array($userid));
    
    // Print out all day labels
    $start = new DateTime (end($startTime)['time']);
    $end = new DateTime (end($endTime)['time']);
    $interval = date_diff($start, $end);

    // Then create the period range, including the starting day and up to the ending day.
    // Doesn't include the last day, which is why we added one day extra when creating the ending timestamp.
    $range = new DatePeriod ($start, $interval, $end);

    // Run through the days of the next week, and build up the output string.
    $counter = 0;
    $lastDate = '';
    foreach ($range as $date) {
        $lastDate = $date; 
        $graphLabels[] = $date->format('M Y'); 
        $currDate = $date->format('Y-m-d H:i:s');        
        $year =  date('Y', strtotime($currDate ));
                      
        $graphData[] = calculate_totalProfLearnMom($userid, $date, $date, $year);
        $counter++;
    }    
    // If there is only one date, the foreach loop will never be run
    if($counter == 0) {
        $lastDate = $end; 
        $graphLabels[] = $end->format('M Y'); 
        $currDate = $end->format('Y-m-d H:i:s');        
        $year =  date('Y', strtotime($currDate ));                     
        $graphData[] = calculate_totalProfLearnMom($userid, $end, $end, $year);
    }

    if($counter  <= 1)  
    {
       $lastDate->modify('+1 month');
       $graphLabels[] = $lastDate->format('M Y'); 
       $graphData[] = 0;   
    }
    
    $oldStart = strtotime(end($startTime)['time']);
    $finalStart = date('F d, Y', $oldStart);
    
    $oldEnd = strtotime(end($endTime)['time']);
    $finalEnd = date('F d, Y', $oldEnd); 
    
    $timeLabel = $finalStart.' - '.$finalEnd;
    if(!$startTime) {
        $timeLabel = '2013';
    }
    
    $finalArray['title'] = $timeLabel;
    $finalArray['labels'] = $graphLabels;
    $finalArray['data'] = $graphData;
    
    $startTime->close(); 
    $endTime->close();
    
    return $finalArray;
}

//////////////////////////////////////////////////////////////////
// Used in the Class Skills report
// Using Profile Table, find maximum skill progress
//////////////////////////////////////////////////////////////////
function findProfileSkillProgress($studentid, $skillId)  {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($studentid);

    $thisSkill = $SBC_DB->get_record("skill", array("idSkill"=>$skillId));
    $totalAttempts = 0;
    $totalPassed = 0;
    $searchKey = '%Skill/'.$thisSkill->guid.'/Tried%';
    $sql = "SELECT MAX(Value) as 'value' FROM {profile} prof WHERE prof.People_idPeople = ? AND prof.Key LIKE ?";
    if ($skillAttempts = $SBC_DB->get_record_sql($sql, array($userid, $searchKey)) ) {
        $totalAttempts = (int)$skillAttempts->value;
    }
    
    $searchKey = '%Skill/'.$thisSkill->guid.'/Passed%';	
    $sql = "SELECT MAX(Value) as 'value' FROM {profile} prof WHERE prof.People_idPeople = ? AND prof.Key LIKE ?";
    if($skillPassed = $SBC_DB->get_record_sql($sql, array($userid, $searchKey)) ) {    
        $totalPassed = (int)$skillPassed->value;
    }
   // $skillPassed->close();

    //echo 'Student: '.$userid.', Skill: '.$thisSkill->guid.', Attempts: '.$activityAttempts.', Passed: '.$activityPass.'<br />';
    $learningMom = 0;
    if($totalAttempts > 0) { 
        $learningMom = (int)(($totalPassed /$totalAttempts) * 100);
        if($learningMom > 100) 
        { $learningMom = 100; }
    }
    
    // Check all activities with this skill for progress
    $passedCount = 0;
    $sql = "SELECT * FROM {activity_has_skill} activity WHERE activity.Skill_idSkill = ?";
    $activitiesWithSkill = $SBC_DB->get_records_sql($sql,array($skillId)) ;  
    $totalActCount = count($activitiesWithSkill);
    
    foreach($activitiesWithSkill as $singleSkill) {
        $singleAct = $SBC_DB->get_record("activity", array("idActivity"=>$singleSkill->activity_idactivity));
        if(isActivityPassed($userid, $singleAct->guid)) {
            $passedCount++;
        }
    }
    /*echo "User: ".$userid.", ";
    echo "skill: ". $thisSkill->guid.", Passed: ".$totalPassed .", Attempts: ".$totalAttempts.", Total Acts: ".$totalActCount.", Activites Passed:".$passedCount."<br/>"; */
   
    $finalProgress = 0;
    if($totalActCount > 0) {
        $finalProgress = (int)(($passedCount / $totalActCount) * 100);    
    }
    $progressArr['progress'] = $finalProgress;    
    $progressArr['learning'] = $learningMom; 
    
    return $progressArr;
}

//////////////////////////////////////////////////////////////////
// Find progress in a certain skill, on a certain date
//////////////////////////////////////////////////////////////////
function findDateSkillProgress($studentid, $skillID, $mydate)  {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($studentid);

    $thisSkill = $SBC_DB->get_record("skill", array("idSkill"=>$skillID));

    $activitiesWithSkill = $SBC_DB->get_records_sql("SELECT * FROM {activity_has_skill} activity WHERE activity.Skill_idSkill = ?",
	    				array($skillID));
    $totalActCount = count($activitiesWithSkill);
    $activityAttempts = 0;
    $activityPass =  0;
    $passedCount = 0;
    $learningMom = 0;	

    $searchKey = '%Skill/'.$thisSkill->guid.'/Tried%';
    $sql = "SELECT Value FROM {profile} prof WHERE prof.People_idPeople = ? AND prof.Key LIKE ? AND 
                date_sub(?, interval 1 day) < prof.last_modif AND prof.last_modif > ?";
    $skillAttempts = $SBC_DB->get_recordset_sql($sql, array($userid, $searchKey, $mydate, $mydate));
    $activityAttempts = (int)end($skillAttempts )['value'];
    $skillAttempts->close();
    
    $searchKey = '%Skill/'.$thisSkill->guid.'/Passed%';	
    $sql = "SELECT Value FROM {profile} prof WHERE prof.People_idPeople = ? AND prof.Key LIKE ? AND 
                date_sub(?, interval 1 day) < prof.last_modif AND prof.last_modif > ?";
    $skillPassed = $SBC_DB->get_recordset_sql($sql, array($userid, $searchKey, $mydate, $mydate));
    $activityPass = (int)end($skillPassed )['value'];
    $skillPassed->close();

    //echo 'Student: '.$userid.', Skill: '.$thisSkill->guid.', Attempts: '.$activityAttempts.', Passed: '.$activityPass.'<br />';

    if($activityAttempts > 0) { 
        $passedCount++; 
        $learningMom = (int)(($activityPass/$activityAttempts) * 100);
        if($learningMom > 100) 
        { $learningMom = 100; }
    }
   
    $finalProgress = 0;
    if($totalActCount > 0) {
        $finalProgress = (int)(($passedCount / $totalActCount) * 100);    
    }
    $progressArr['progress'] = $finalProgress;    
    $progressArr['learning'] = $learningMom; 
    
    return $progressArr;
}

//////////////////////////////////////////////////////////////////
// Used in the Construction standards report
// Find progress in a certain skill
//////////////////////////////////////////////////////////////////
function createConSkillReport($userid, $skillid) {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    $workOrderIDS = array();
    $orderNames = array();
    $ordersPassed = array();
    $ordersMastered = array();   
    $graphLabels = array();
    $graphData = array();
    $orderPassCount = 0;

    $activitiesWithSkill = $SBC_DB->get_records_sql("SELECT * FROM {activity_has_skill} activity WHERE activity.Skill_idSkill = ?",
	    			array($skillid));
    // Create list of work orders that have this skill
    foreach($activitiesWithSkill as $singleAct)
    {
        $activity = $SBC_DB->get_record("activity", array("idActivity"=>$singleAct->activity_idactivity));
        if(!in_array($activity->workorder_idworkorder, $workOrderIDS))  {
    	    $workOrderIDS[] = $activity->workorder_idworkorder;
    	}
    }
    
    // Go through each work order to collect passed, mastered, learning momentum data
    foreach($workOrderIDS as $singleID)
    {
        $isOrderPassed = false;
        $isOrderMastered = false;
        $workorder = $SBC_DB->get_record("workorder", array("idWorkOrder"=>(int)$singleID)); 
        if(getOrderPassed($userid, $workorder->guid)) {                   
            $orderPassCount++; 
            $isOrderPassed = true; ;
        }
        
        // Let's check if the work order was mastered,
        // which means all badges would be earned
        $activityPass = 0;
        $activityAttempts = 0;
        $learningMom = 0;
        $actPassCount = 0;
        $actMastCount = 0;
        $activities = $SBC_DB->get_records("activity", array("WorkOrder_idWorkOrder"=>$workorder->idworkorder));
        foreach($activities as $singleActivity)  
        {  
            $activityID =  $singleActivity->idactivity;
            if(getSingleActMastery($singleActivity, $userid)) {
                $actMastCount++;
            } 
            
            $activityAttempts += getActivityAttempts($userid, $singleActivity->guid); 
            $numPasses = getActivityPasses($userid, $singleActivity->guid);
            $activityPass += $numPasses;
            if($numPasses  > 0 ){
                $actPassCount++;
            }

        } // end activity foeach        
                
        // Get the learning momentum for this work order
        if($activityAttempts > 0) {
            $learningMom = (int)(($activityPass/$activityAttempts) * 100);
            if($learningMom > 100) { $learningMom = 100; }
        }

        $graphData[] = $learningMom;  
                
        // Get mastery for this work order
        $ordersPassed[] = $isOrderPassed;
	if($isOrderPassed && $actMastCount >= count($activities))  
	{ $isOrderMastered = true; }
	$ordersMastered[]  = $isOrderMastered;
	
	//We can also get the site information
    	$orderSystem = $SBC_DB->get_record("system", array("idSystem"=>$workorder->system_idsystem));
    	$orderSite = $SBC_DB->get_record("worksite", array("idWorkSite"=>$orderSystem->worksite_idworksite));
    	$siteName = get_string($orderSite->desc, "theme_simbuild");
            	
    	// Just show the first word of the site name
    	$siteNameArr = explode(" ", $siteName);
    	$newName = $siteNameArr[0].' - ';
    	$finalName = str_pad($newName, 10," ",STR_PAD_RIGHT);
	$finalName = str_replace(" ", "&nbsp;", $finalName );
	
        // Create labels for workorders and graph    	
        $orderNames[] = $finalName.' '.get_string($workorder->desc, 'theme_simbuild');
        $graphLabels[] = $newName[0].': '.get_string($workorder->desc, 'theme_simbuild');
        
        //echo 'Order: '.get_string($workorder->desc, 'theme_simbuild').', Activities Passed: '.$actPassCount.'<br />';

    }
    arsort($orderNames);
    rsort($graphLabels);
    
    // Sort the learning momentum and send to the rgraph
    $studentData = array();
    foreach ($orderNames as $key => $value) {
        $studentData[] = $graphData[$key];
    }
    
    // Get total progress (passed) for this system
    $totalOrders = count($orderNames);
    //$studentProgress = (int)(($orderPassCount/$totalOrders) * 100);
    
    $progressData = findProfileSkillProgress($userid, $skillid);
    $studentProgress = $progressData['progress']; 
    
    // Return all the data
    $finalDataArr['graphdata'] = $studentData;
    $finalDataArr['graphlabels'] = $graphLabels;
    $finalDataArr['ordernames'] = $orderNames;
    $finalDataArr['orderpassed'] = $ordersPassed ;
    $finalDataArr['ordermasterd'] = $ordersMastered;
    $finalDataArr['totalprogress'] = $studentProgress;

    return $finalDataArr;
}

//////////////////////////////////////////////////////////////////
// Used in the Academic standards report
// Find progress in a certain skill
//////////////////////////////////////////////////////////////////
function createActSkillReport($userid, $skillid)  {
    global $SBC_DB, $DB;
    // Make sure we are using the SBC user id 
    // when calculating SBC data
    $userid = getSBCID($userid);

    $totalActPassed = 0;
    $activitiesPassed = array();
    $activitiesMastered = array();
    $progressBarData = array();
    $progressBarLabels = array();
    $graphData = array();
    $graphLabels = array();
    $activityGroupnames = array();	
    $currentActivities = array();
    
    $activitiesWithSkill = $SBC_DB->get_records_sql("SELECT * FROM {activity_has_skill} activity WHERE activity.Skill_idSkill = ?",
	    			array($skillid));	    			
    foreach($activitiesWithSkill as $myActivity) 
    {
       $activity = $SBC_DB->get_record("activity", array("idActivity"=>$myActivity->activity_idactivity));
     		
        // Get the activty group name
        $currentActivities[] = $activity;
        $displayName = get_string($activity->type, 'theme_simbuild');
	if(!in_array($displayName , $activityGroupnames)) {
	   $activityGroupnames[$activity->type] = $displayName;
	}
    }
    natcasesort($activityGroupnames);
    
    // Gather data based on activity groups
    foreach($activityGroupnames as $key=>$value)
    {
        // Look through current activities and 
        // only use those that belong to this group
        $groupActivities = array();
        foreach($currentActivities as $currentAct)  {
            if($currentAct->type == $key)  {
                $groupActivities[] = $currentAct;
            }
        }
        
        // Now go through each group and calculate data
        // Gather data for each group of activities
        $activityPass = 0;
        $activityAttempts = 0;
        $learningMom = 0;
        $actPassCount = 0;
        $actMastered = 0;
	foreach($groupActivities as $singleActivity)  {    
            // Check for passed, used for total skill progress calc
            $numAttempts = getActivityAttempts($userid, $singleActivity->guid);
            $activityAttempts += $numAttempts;
            $numPasses = getActivityPasses($userid, $singleActivity->guid);
            $activityPass += $numPasses;
            if($numPasses  > 0 ){
                $actPassCount++;
            }
            
            if(getSingleActMastery($singleActivity, $userid)) {
                $actMastered++;
            }
	} 
	
	    // Get the learning momentum for this work order
        if($activityAttempts > 0) {
            $learningMom = (int)(($activityPass/$activityAttempts) * 100);
            if($learningMom > 100) { $learningMom = 100; }
        }
        $graphData[] = $learningMom; 
        
        // Check for pass / mastered for the whole activity group
        $isActivityPassed = false;
        if($actPassCount >= count($groupActivities) )  {
            $isActivityPassed = true;
        }
        $activitiesPassed[] = $isActivityPassed;
        
        $isActivityMastered = false; 
        if($isActivityPassed && ($actMastered >= count($groupActivities)))  
	    { $isActivityMastered = true; }
	    $activitiesMastered[]  = $isActivityMastered ;
        
        // Get the progress for this group
        $groupCount = count($groupActivities);
        $tempProgress = 0;
        if($groupCount > 0) {
            $tempProgress = (int)(($actPassCount/$groupCount) * 100);
        }
        $progressBarData[] = $tempProgress;
        $progressBarLabels[] = $actPassCount.' of '.$groupCount;
    }
    
    // Prepare activity group names for display  
    foreach($activityGroupnames as $singleName) {
        $graphLabels[] = $singleName; 
    }
    
    // Calculate total progress for this skill
    $progressData = findProfileSkillProgress($userid, $skillid);
    $studentProgress = $progressData['progress']; 
    
    // Return all the data
    $finalDataArr['graphdata'] = $graphData;
    $finalDataArr['graphlabels'] = $graphLabels;
    $finalDataArr['grouppassed'] = $activitiesPassed;
    $finalDataArr['groupmastered'] = $activitiesMastered;
    $finalDataArr['groupprogress'] = $progressBarData;
    $finalDataArr['totalprogress'] = $studentProgress;
    $finalDataArr['barlabels'] = $progressBarLabels;
    
    return $finalDataArr;   		    			
}




?>