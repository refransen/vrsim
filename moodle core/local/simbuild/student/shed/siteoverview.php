<?php
//////////////////////////////////////////////////////
// Student - Progress Report Page
// SHED - This displays the overview block
///////////////////////////////////////////////////////
require_once(dirname(__FILE__) . '/../../../../config.php');

$PAGE->requires->js('/local/simbuild/student/shed/workorders.js');
global $SBC_DB, $DB, $CFG;

$db_class = get_class($DB);
$SBC_DB = new $db_class(); // instantiate a new object of the same class as the original $DB
$SBC_DB->connect($CFG->sbc_dbhost, $CFG->sbc_dbUser, $CFG->sbc_dbPass, $CFG->sbc_dbName, false);

$siteName = "SITE_SHED";
$siteGUID = "ws-demosite1";
$siteID = 0;

//////////////////////////////////////
// Get the worksite and it's systems
//////////////////////////////////////
$mySite = $SBC_DB->get_record_sql("SELECT * FROM {worksite} site WHERE site.Desc = ? AND site.GUID = ?", array($siteName, $siteGUID));
$siteID = $mySite->idworksite;
$systems = $SBC_DB->get_records('system', array('WorkSite_idWorkSite' => $siteID));

//////////////////////////////////////
// Get system progress
//////////////////////////////////////
$unlockedSysArr = array();
$progressArr = array();

$unlockCount = 2;   // Hardcoded
$counter = 0;
foreach($systems as $singleSys)
{
    // Get unlocked systems
    //--------------------------
    // TODO:  Access database when data is available, and use a people_id
    if($systemLog = $SBC_DB->get_records('systemlog', array('System_idSystem'=>$singleSys->idsystem)))  {
        $unlockedSysArr = explode(';', $systemLog->unlocklst);
    }
    
    // FIX: Hardcoded values for now. Remove this later
    if($counter < $unlockCount)  {
        $unlockedSysArr[] = $singleSys->guid;
    }
    else  {
        $unlockedSysArr[] = "";
    }    
    
    // Get system progress
    //----------------------------
    $totalOrders = 0;
    $ordersComplete = 0;
    if($orders = $SBC_DB->get_records('workorder', array('System_idSystem' =>$singleSys->idsystem )))  {
        $totalOrders = count($orders);
        foreach($orders as $singleOrder) 
        {
            // TODO:  Access database when data is available, and use a people_id
            $orderLogs = $SBC_DB->get_records('workorderlog', array('WorkOrder_idWorkOrder'=>$singleOrder->idworkorder));
            foreach($orderLogs as $singleLog)  {
                if($singleLog->nbcompleted)
                {    
                    $ordersComplete++; 
                    break;
                }
            }
        }//end orders foreach
    }
    $systemPro = ($ordersComplete/$totalOrders) * 100;
    $progressArr[] = $systemPro;
    
    $counter++;
}
// FIX:  Hardcoded for now. Use function above to retrieve real values
$progressArr = array(100,50,0,0,0,0,0,0);

//////////////////////////////////////
// Get site progress
//////////////////////////////////////
$totalSystems = count($systems);
$totalSysComplete = 0;
$currSysIndex = 0;
$foundCurrent = false;

for($i=0; $i < count($progressArr); $i++)
{
    if($progressArr[$i] >= 100)  {
        $totalSysComplete++;
    }
    if($progressArr[$i] < 100 && !$foundCurrent)
    { 
        $currSysIndex = $i;
        $foundCurrent = true;
    }
}
$siteProgress = ($totalSysComplete/$totalSystems) * 100;

//////////////////////////////////////
// Get total playtime in site
//////////////////////////////////////
$siteLogs = $SBC_DB->get_records('worksitelog', array('WorkSite_idWorkSite'=>$siteID));
$totalSeconds = 0;
foreach($siteLogs as $singleLog)
{
    $totalSeconds += $singleLog->elapsetime;
}
$hours = floor($totalSeconds / 3600);
$mins = floor(($totalSeconds - ($hours*3600)) / 60);
//$secs = floor(($totalSeconds - ($hours*3600 ( - ($mins*60)) ));

$sitePlayTime = $hours.'hr '.$mins; //.' '.$secs.'sec';
// FIX:  this is hardcorded data for now. needs to change
$sitePlayTime = '0hr 10min 25sec';


//////////////////////////////////////
// Start the html code
//////////////////////////////////////
echo '
<div class="topinfo">
    	<img src="/theme/simbuild/pix/progressreport/Site_Shed.png" />
	<div class="titles" >
	    <h3>Work Site:</h3>
	    <h3>Total Worktime:</h3>
	    <h3>Site Progress:</h3> 
	</div>
	<div class="descriptions" >
	    <h3>'.get_string($siteName, "theme_simbuild").'</h3>
	    <h3>'.$sitePlayTime.'</h3>
	    <div class="progress-bar green" >
		<span style="width:'.$siteProgress.'%;"></span>
	    </div>
	</div>
</div>

<div class="bottominfo">
        <table>
            <tr>';

//////////////////////////////////////
// Display systems in html
//////////////////////////////////////   
$counter = 0;
foreach($systems as $singleSys)
{
    // TODO:  find the system still in progress and make that one the first active
    // chartbox class -> chartbox selected
    // img class -> hidden if unlocked

    $myID = $counter+1;
    echo '<td class="boxpadding" >
    	    <div class="chartbox';
    	    if($counter == $currSysIndex)  {
    	        echo ' selected';
    	    }
    	    echo '" id="chartbox'.$myID.'" onclick="showSystem('.$myID.', this)" >
    	        <div class="boxprogress';
    	        if($unlockedSysArr[$counter] === "") {
    	            echo ' locked';
    	        }
    	        echo '" style="width:'.$progressArr[$counter].'%">
                    <div class="boxtitle">
                    <img src="/theme/simbuild/pix/progressreport/lockIcon_dark.png" ';
                    
		    if($unlockedSysArr[$counter] !== "")  {
		        echo 'class="hidden"';
		    }
		    $titleName = get_string($singleSys->desc, "theme_simbuild");
                    echo '/><h3>'.$titleName.'</h3>
                    </div>
    	        </div>
    	    </div>
    	</td>
    <td class="spacer"></td>';  
    $counter++;	
}        
 
//////////////////////////////////////
// Finish the html table
//////////////////////////////////////   	    	
echo '</tr></table></div>';


?>