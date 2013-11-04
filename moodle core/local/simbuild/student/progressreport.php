<?php
/////////////////////////////////////////////////////////////////////
// Progress Report
//
// This is the main file that displays the progress report within
// the SBC student page 
/////////////////////////////////////////////////////////////////////
require_once('../../../config.php');   
require_once('/siteoverview.php');     

//CSS        
$PAGE->requires->css('/local/simbuild/student/progressreport.css');
$PAGE->requires->js('/local/simbuild/student/progressreport.js');

$PAGE->set_context(get_system_context());
$PAGE->set_pagelayout('admin');
$PAGE->set_title("Progress Report");
$PAGE->set_heading("Progress Report");
$PAGE->set_url($CFG->wwwroot.'/local/simbuild/student/progressreport.php');

// START THE FILTER BOXES
echo $OUTPUT->header();

// Get all the worksites
$allsites = $SBC_DB->get_records("worksite");
$allSiteGUID = array();
$siteOptions = array();
foreach($allsites as $singleSite) {
    $allSiteGUID[] = $singleSite->guid;
    $siteOptions[] = get_string($singleSite->desc, 'theme_simbuild');
}

//  FILTER ACTIONS
$worksite = optional_param('worksite', 0, PARAM_INT);
$userid   = optional_param('userid', '0', PARAM_INT);              // current selected student

// Populate the filters
$siteForm = 'Choose Worksite: ' . $OUTPUT->single_select(new moodle_url('/local/simbuild/student/progressreport.php', 
          array('userid'=>$userid)), 'worksite', $siteOptions, $selected = $worksite, '', $formid = 'fnsite');

echo '<div class="sitefilterbox" >'.$siteForm.'</div>';

// Create the first block
echo 
'<div class="block siteoverview" >
    <div class="header">
        <div class="title">
            <div class="block_action" onclick="toggleBlock1(\'sitecontent\')">
            	<img class="block-hider-hide" id="hideblock1" tabindex="0" alt="Hide Report" title="Hide Report" 
            		src="'.$CFG->wwwroot.'/theme/simbuild/pix_core/t/switch_minus.png" />
            	<img class="block-hider-show" id="showblock1" tabindex="0" alt="Show Report" title="Show Report" 
            		src="'.$CFG->wwwroot.'/theme/simbuild/pix_core/t/switch_plus.png" />
            </div>
            <h2>Worksite Overview</h2>
        </div>
    </div>
    <div class="content">
    	<div class="no-overflow" id="sitecontent">';
       $selectedSiteID = $allSiteGUID[$worksite];
       createOverviewPage($selectedSiteID);
    
echo '  </div>
    </div>
</div>';

// Create the second block
echo
'<div class="block workorder" >
    <div class="header">
        <div class="title">
            <div class="block_action" onclick="toggleBlock2(\'systemcontent\')">
            	<img class="block-hider-hide" id="hideblock2" tabindex="0" alt="Hide Report" title="Hide Report" 
            		src="'.$CFG->wwwroot.'/theme/simbuild/pix_core/t/switch_minus.png" />
            	<img class="block-hider-show" id="showblock2" tabindex="0" alt="Show Report" title="Show Report" 
            		src="'.$CFG->wwwroot.'/theme/simbuild/pix_core/t/switch_plus.png" />
            </div>
            <h2>Work Order Review</h2>
        </div>
    </div>
    <div class="content">
    	<div class="no-overflow" id="systemcontent"></div>
    </div>
</div>';

echo $OUTPUT->footer();
?>