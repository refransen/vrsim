<?php
////////////////////////////////////////////////////////////
// SHED_SYSTEMS
// Student - Progress Report page
// This page shows the Work Order review for:  SHED
////////////////////////////////////////////////////////////
require_once(dirname(__FILE__) . '/../../../config.php');
require_once('../lib.php');

global $SBC_DB, $DB, $CFG;

$db_class = get_class($DB);
$SBC_DB = new $db_class(); // instantiate a new object of the same class as the original $DB
$SBC_DB->connect($CFG->sbc_dbhost, $CFG->sbc_dbUser, $CFG->sbc_dbPass, $CFG->sbc_dbName, false);  

$sysName = isset($_GET['system']) ? $_GET['system'] : null;

// Helper function that will sort 
// workorders per their column position
//-----------------------------
function cmp($a, $b)   {
    return strcmp($a->column, $b->column);
}

//////////////////////////////////////
// Get the Systems
//////////////////////////////////////
$siteID = 0;
$systemID = 0;
if($mySystem = $SBC_DB->get_record_sql("SELECT * FROM {system} WHERE idSystem= ?", array($sysName)) ) {
    $systemID = $mySystem->idsystem;
    
    // Get the SITE ID
    $mySite = $SBC_DB->get_record_sql("SELECT * FROM {worksite} site WHERE site.idWorkSite = ?", array($mySystem->worksite_idworksite));
    $siteID = $mySite->idworksite;
}

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
    global $SBC_DB, $DB, $USER, $CFG;
    $lmsStudent = $DB->get_record("user", array("id"=>$USER->id));
    $sbcID = $lmsStudent->idnumber;
    
    $homeUrl = htmlspecialchars(json_encode($CFG->wwwroot), ENT_COMPAT);
    $passedCount = 0;
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
	    foreach($orders_row as $singleOrder)
	    {
	        if($singleOrder->desc == "TEST")
	        {    continue;  }
	
              	$orderName = get_string($singleOrder->desc, 'theme_simbuild');
              	$orderID = (int)$singleOrder->idworkorder;

	        // Check the state of this order
	        $orderDisplay = '<td class="workorderunit">
			     <div class="ordertext orderlocked" onclick="showActivities('.$homeUrl.','.$orderID.', this)" >
			        <h3>'.$orderName.'</h3><hr />';
		$orderDisplay .= '<h3><span></span></h3></div>';
		 
		// Check for Passing
		//-----------------------------   
		 if(getOrderPassed($USER->id, $singleOrder->guid))  {
	             $orderDisplay = '<td class="workorderunit">
	               <div class="ordertext" onclick="showActivities('.$homeUrl.','.$orderID.', this)" >
	                   <h3>'.$orderName.'</h3><hr />
                           <span class="checkmark">&#x2713;</span><h3>Passed</h3>
                       </div>';	
                       $passedCount++;	   
	         }else	         
	         // If simply unlocked, but not passed, make it blue
		 //-----------------------------  		     
	         if(getOrderUnlocked($USER->id, $singleOrder->guid)) {
	             $orderDisplay = '<td class="workorderunit">
		        <div class="ordertext" onclick="showActivities('.$homeUrl.','.$orderID.', this)" >
		          <h3>'.$orderName.'</h3><hr /><span></span><h3></h3></div>';
	         }
	        
	         if($activities = $SBC_DB->get_records('activity', array('WorkOrder_idWorkOrder' => $orderID)))
	         {
	             // Check for mastery = all badges earned
	             //----------------------------- 
	             $masteredArr = getAllActMastery($activities, $USER->id);
	             $masteryCount = 0;
	             foreach($masteredArr as $singleMastery)  {  
	                 if($singleMastery)  {
	                     $masteryCount++;  
	                 }
	             }
	             if($masteryCount >= count($masteredArr)) 
	             {
	                 $orderDisplay = '<td class="workorderunit">
		              <div class="ordertext" onclick="showActivities('.$homeUrl.','.$orderID.', this)" >
		                 <h3>'.$orderName.'</h3><hr />
	                         <img src="'.$CFG->wwwroot.'/theme/simbuild/pix/progressreport/MasteredIcon_Small.png" />
	                         <h3>Mastered</h3></div>';
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