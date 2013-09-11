<?php
////////////////////////////////////////////////////////////
// Student - Progress Report page
// This page shows the Work Order review for: 
//     MULTILEVEL - WALLS and CEILING
////////////////////////////////////////////////////////////
require(dirname(__FILE__) . '/../../../../config.php');
global $SBC_DB, $DB, $CFG;

$db_class = get_class($DB);
$SBC_DB = new $db_class(); // instantiate a new object of the same class as the original $DB
$SBC_DB->connect($CFG->sbc_dbhost, $CFG->sbc_dbUser, $CFG->sbc_dbPass, $CFG->sbc_dbName, false);

$siteName = "SITE_MULTILEVEL_HOUSE";
$sysName = "SYSTEM_WALL_AND_CEILING";
$siteGUI = "ws-demosite3";
$siteID = 0;
$systemID = 0;

// Helper function that will sort 
// workorders per their column position
//-----------------------------
function cmp($a, $b)   {
    return strcmp($a->column, $b->column);
}

//////////////////////////////////////
// Get the SITE ID
//////////////////////////////////////
$mySite = $SBC_DB->get_record_sql("SELECT * FROM {worksite} site WHERE site.Desc = ? AND site.GUID = ?", array($siteName, $siteGUI));
$siteID = $mySite->idworksite;

//////////////////////////////////////
// Get the Systems
//////////////////////////////////////
$mySystem = $SBC_DB->get_record_sql("SELECT * FROM {system} system WHERE system.Desc = ? AND system.WorkSite_idWorkSite = ?", 
                        array($sysName, $siteID));
$systemID = $mySystem->idsystem;

//////////////////////////////////////
// Start the html output of the workoder graph
//////////////////////////////////////
echo '
<div class="ordergrid">
        <table class="ordercontainer">';

//////////////////////////////////////
// Get the Work Orders, row by row
//////////////////////////////////////    
function displayOrders($rowNum, $sysID)  
{                     
    global $SBC_DB;
          
    if($orders_row = $SBC_DB->get_records('workorder', array('System_idSystem' =>(int)$sysID, 'Row'=>$rowNum)) ) 
    {
	    usort($orders_row, "cmp");
	    $counter = 0;
	    $orderCount = count($orders_row);
	    
	    // FIX: need a better way for removing bad entries
	    foreach($orders_row as $singleRow)  {
	        if($singleRow->desc == "TEST")
	        {    $orderCount--; }
	    }
	    
	    echo '<tr>';
            $orderNameArr = array();
	    foreach($orders_row as $singleOrder)
	    {
	        if($singleOrder->desc == "TEST")
	        {    continue;  }

                // FIX: Remove duplicate order entries
	        if(in_array($singleOrder->desc,$orderNameArr))  
	        {
	            $orderCount--;
	            continue;
	        } else {
	            $orderNameArr[] = $singleOrder->desc;
	        }
	
              	$orderName = get_string($singleOrder->desc, 'theme_simbuild');
              	$orderID = (int)$singleOrder->idworkorder;

	        // Check the state of this order
	        // TODO: parse logs per session or userID
	        $orderDisplay = '<td class="workorderunit">
			     <div class="ordertext orderlocked" onclick="showActivities('.$orderID.', this)" >
			        <h3>'.$orderName.'</h3><hr />
		                <img src="/theme/simbuild/pix/progressreport/lockIcon_light.png" />
		                <h3><span>Locked</span></h3></div>';
		 
		// Check for Passing
		//-----------------------------               
	        if($orderLogs = $SBC_DB->get_records('workorderlog', array('WorkOrder_idWorkOrder'=>$singleOrder->idworkorder)))  {
		    foreach($orderLogs as $singleLog)  {
		         if((int)$singleLog->nbcompleted > 0)  
		         {
			     $orderDisplay = '<td class="workorderunit">
			              <div class="ordertext" onclick="showActivities('.$orderID.', this)" >
			                 <h3>'.$orderName.'</h3><hr />
		                         <span class="checkmark">&#x2713;</span><h3>Passed</h3></div>';
		         }
		    }
	        }
	        
	        // Check for mastery = all badges earned
	        //-----------------------------   
	        $badgesCount = 0;
	        $badgesEarned = 0;            
	         if($activities = $SBC_DB->get_records('activity', array('WorkOrder_idWorkOrder' => $orderID)))
	         {
	             foreach($activities as $singleActivity)  
	             {  
	                 $activityID =  $singleActivity->idactivity;
	                 if($awards = $SBC_DB->get_records('award_has_activity', array('Activity_idActivity'=>$activityID)) )  
	                 {
	                     $badgesCount = count($awards);
	                     foreach($awards as $singleAward)   
	                     {
		                 if($badge = $SBC_DB->get_record_sql("SELECT * FROM {award} myaward WHERE myaward.idAward = ? ", 
		                     	array($singleAward->award_idaward)) )  {
		                     $badgeID = $badge->idaward;	
		                     if($badgeExists = $SBC_DB->get_records('awardstatus', array('Award_idAward'=>$badgeID)) ) 
		                     {   $badgesEarned++;  }
		                 }
		             }
		             
		             // Display the mastery symbol
		             if($badgesCount == $badgesEarned)  {
			             $orderDisplay = '<td class="workorderunit">
			              <div class="ordertext" onclick="showActivities('.$orderID.', this)" >
			                 <h3>'.$orderName.'</h3><hr />
		                         <img src="/theme/simbuild/pix/progressreport/MasteredIcon_Small.png" />
		                         <h3>Mastered</h3></div>';
		             }
               
	                 }//end awards if
	             }
                 } //end activities if
	        
	        echo $orderDisplay;
	        $counter++;
	        
	        if($counter < $orderCount)  {
	             echo  '<div class="arrow"><span class="linehor"></span><div class="triangleright"></div></div>'; 
	        }
	        echo '</td>'; 
	        
	        // Echo out a placeholder column to make things spaced nicely
	        if($counter >= $orderCount && $counter < 3){
	            echo '<td></td>';
	        }
	    }
	    echo '</tr>';
	}
}	
displayOrders(0, $systemID);
displayOrders(1, $systemID);
displayOrders(2, $systemID);

//////////////////////////////////////
// Finish the html output of the workoder graph
//////////////////////////////////////
echo  '</tr>
        </table>
</div>';


//////////////////////////////////////
// Begin the html output of the activites
//////////////////////////////////////    	    
echo '<div class="bottominfo" id="activitiesInfo" >
</div>';


?>