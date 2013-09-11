<?php
/////////////////////////////////////////////////////////////////////
// Progress Report
//
// This is the main file that displays the progress report within
// the SBC student page 
/////////////////////////////////////////////////////////////////////
require_once('../../../config.php');

//CSS
$PAGE->requires->css('/local/simbuild/student/progressreport.css');
$PAGE->requires->js('/local/simbuild/student/progressreport.js');

$PAGE->set_context(get_system_context());
$PAGE->set_pagelayout('admin');
$PAGE->set_title("Progress Report");
$PAGE->set_heading("Progress Report");
$PAGE->set_url($CFG->wwwroot.'/local/simbuild/student/progressreport.php');

//  FILTER ACTIONS
$worksite = optional_param('worksite', 'shed', PARAM_ALPHA);
$systemArr = array('system_intro', 'system_prepare', 'system_floorWall', 'system_windowDoor', 'system_roof', 'system_review');
switch($worksite)
{
    case 'ranch':
    {
        $systemArr = array('system_intro', 'system_prepare', 'system_floor', 'system_wallCeiling',  'system_roof', 'system_windowDoor', 'system_review');
    }break;
    case 'multilevel':
    {
        $systemArr = array('system_intro', 'system_prepare', 'system_floor', 'system_wallCeiling', 'system_stairs', 'system_roof', 
        'system_windowDoor', 'system_drywall', 'system_review');
    }break;
}
$system   = $systemArr[1];
$userid   = optional_param('userid', '0', PARAM_INT);              // current selected student

// START THE FILTER BOXES
echo $OUTPUT->header();

// Populate the filter box
$siteOptions = array('shed' => 'Shed','ranch' => 'Ranch House', 'multilevel' => 'Multilevel House');
$siteForm = 'Choose Site: ' . $OUTPUT->single_select(new moodle_url('/local/simbuild/student/progressreport.php', 
          array('userid'=>$userid)), 'worksite', $siteOptions, $selected = $worksite, '', $formid = 'fnsite');

// Print the filter box
echo '<div class="sitefilterbox" >'.$siteForm.'</div>';

// Create the first block
echo 
'<div class="block siteoverview" >
    <div class="header">
        <div class="title">
            <div class="block_action" onclick="toggleBlock1(\'sitecontent\')">
            	<img class="block-hider-hide" id="hideblock1" tabindex="0" alt="Hide Report" title="Hide Report" 
            		src="/theme/simbuild/pix_core/t/switch_minus.png" />
            	<img class="block-hider-show" id="showblock1" tabindex="0" alt="Show Report" title="Show Report" 
            		src="/theme/simbuild/pix_core/t/switch_plus.png" />
            </div>
            <h2>Site Overview</h2>
        </div>
    </div>
    <div class="content">
    	<div class="no-overflow" id="sitecontent">';

	// Choose which site to display
        include($worksite.'/siteoverview.php');  
    
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
            		src="/theme/simbuild/pix_core/t/switch_minus.png" />
            	<img class="block-hider-show" id="showblock2" tabindex="0" alt="Show Report" title="Show Report" 
            		src="/theme/simbuild/pix_core/t/switch_plus.png" />
            </div>
            <h2>Work Order Review</h2>
        </div>
    </div>
    <div class="content">
    	<div class="no-overflow" id="systemcontent">';
    	
	// Choose which system to display
        include($worksite.'/'.$system.'.php'); 
    
echo '
    	</div>
    </div>
</div>';


echo $OUTPUT->footer();
?>