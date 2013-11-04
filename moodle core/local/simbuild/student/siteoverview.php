<?php
//////////////////////////////////////////////////////
// SITE OVERVIEW
// Student - Progress Report Page
// SHED - This displays the overview block
///////////////////////////////////////////////////////
function createOverviewPage($siteGUID) {
   global $SBC_DB, $DB, $CFG, $USER;

    /*$db_class = get_class($DB);
    $SBC_DB = new $db_class(); // instantiate a new object of the same class as the original $DB
    $SBC_DB->connect($CFG->sbc_dbhost, $CFG->sbc_dbUser, $CFG->sbc_dbPass, $CFG->sbc_dbName, false);
        */
    $lmsStudent = $DB->get_record("user", array("id"=>$USER->id));
    $sbcID = $lmsStudent->idnumber;

    //////////////////////////////////////
    // Get the worksite and it's systems
    //////////////////////////////////////
    $siteID = 0;
    $siteName = "None";
    $sql = "SELECT * FROM {worksite} site WHERE site.GUID = ?";
    if($mySite = $SBC_DB->get_record_sql($sql, array($siteGUID)) ) {
            $siteID = $mySite->idworksite;
            $siteName = get_string($mySite->desc, 'theme_simbuild');
            $systems = $SBC_DB->get_records('system', array('WorkSite_idWorkSite'=>$siteID));
    }
    else {
        echo "This worksite cannot be found";
        return;
    }

    //////////////////////////////////////
    // Get system progress
    //////////////////////////////////////
    $unlockedSysArr = array();
    $progressArr = array();

    $counter = 0;
    foreach($systems as $singleSys)
    {
        // Get system progress
        //----------------------------
        $totalOrders = 0;
        $ordersComplete = 0;
        if($orders = $SBC_DB->get_records('workorder', array('System_idSystem' =>$singleSys->idsystem )))  {
            $totalOrders = count($orders);
            foreach($orders as $singleOrder) {
                if(getOrderPassed($sbcID, $singleOrder->guid)){    
                     $ordersComplete++; 
                }
            }
        }
        $systemPro = (int)(($ordersComplete/$totalOrders) * 100);
        $progressArr[] = $systemPro;
        
        $counter++;
    }

    // Get current system
    $currSysIndex = 0;
    $foundCurrent = false;
    for($i=0; $i < count($progressArr); $i++)
    {
        if($progressArr[$i] < 100 && !$foundCurrent)
        { 
            $currSysIndex = $i;
            $foundCurrent = true;
        }
    }

    // Get site progress
    $siteProgress = calculate_singleSiteActivityProgress($USER->id, $siteID); 

    // Get total playtime in site
    $totalSeconds = calculate_siteTimeSpent($USER->id, $mySite->guid, true); 
    $hours = floor($totalSeconds / 3600);
    $minutes = floor(($totalSeconds / 60) % 60);
    $seconds = $totalSeconds % 60;
    $sitePlayTime = sprintf("%2dhr %02dmin %02dsec", $hours, $minutes, $seconds);
    
    // Get the right site image
    $siteImage = '';
    switch($siteName) {
        case get_string('SITE_SHED', 'theme_simbuild'):
            $siteImage = $CFG->wwwroot.'/theme/simbuild/pix/progressreport/Site_Shed.png';
            break;
        case get_string('SITE_RANCH_HOUSE', 'theme_simbuild'): 
            $siteImage = $CFG->wwwroot.'/theme/simbuild/pix/progressreport/Site_RanchHouse.png';
            break;
        case get_string('SITE_MULTILEVEL_HOUSE', 'theme_simbuild'):  
            $siteImage = $CFG->wwwroot.'/theme/simbuild/pix/progressreport/Site_MultiLevel.png';
            break;
    }

    //////////////////////////////////////
    // Start the html code
    //////////////////////////////////////
    echo '
    <div class="topinfo">
            <img src="'.$siteImage.'" />
        <div class="titles" >
            <h3>Worksite:</h3>
            <h3>Total Worktime:</h3>
            <h3>Worksite Progress:</h3> 
        </div>
        <div class="descriptions" >
            <h3>'.$siteName.'</h3>
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
        // chartbox class -> chartbox selected
        // img class -> hidden if unlocked
        $homeUrl = htmlspecialchars(json_encode($CFG->wwwroot), ENT_COMPAT); 
        $myID = $counter+1;
        echo '<td class="boxpadding" >
                <div class="chartbox';
                if($counter == $currSysIndex)  {
                    echo ' selected';
                }
                echo '" id="chartbox'.$myID.'" onclick="showSystem('.$homeUrl.','.$singleSys->idsystem.', this)" >
                    <div class="boxprogress';
                    if($progressArr[$counter] == 0) {
                        echo ' locked';
                    }
                    echo '" style="width:'.$progressArr[$counter].'%">
                        <div class="boxtitle">';
                        // Hiding the locked icon for now
                        /*<img src="/theme/simbuild/pix/progressreport/lockIcon_dark.png" ';                  
                if($progressArr[$counter] > 0)  {
                    echo 'class="hidden"';
                }*/
                $titleName = get_string($singleSys->desc, "theme_simbuild");
                        //echo '/>';
                        echo '<h3>'.$titleName.'</h3>
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
}

?>