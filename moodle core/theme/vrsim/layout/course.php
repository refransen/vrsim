<?php
$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepre = $hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT);
$showsidepost = $hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT);
$hashidemenu = (!empty($PAGE->theme->settings->hidemenu));
$custommenu = $OUTPUT->custom_menu();
$hascustommenu = false; //(empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));
$haslogo = (!empty($PAGE->theme->settings->logo));
$hastitledate = (!empty($PAGE->theme->settings->titledate));
$hasceop = (!empty($PAGE->theme->settings->ceop));
$hasdisclaimer = (!empty($PAGE->theme->settings->disclaimer));
$hasemailurl = (!empty($PAGE->theme->settings->emailurl));
$hasprofilebarcustom = (!empty($PAGE->theme->settings->profilebarcustom));
$hasfacebook = (!empty($PAGE->theme->settings->facebook));
$hastwitter = (!empty($PAGE->theme->settings->twitter));
$hasgoogleplus = (!empty($PAGE->theme->settings->googleplus));
$hasflickr = (!empty($PAGE->theme->settings->flickr));
$haspicasa = (!empty($PAGE->theme->settings->picasa));
$hastumblr = (!empty($PAGE->theme->settings->tumblr));
$hasinstagram = (!empty($PAGE->theme->settings->instagram));
$hasblogger = (!empty($PAGE->theme->settings->blogger));
$haslinkedin = (!empty($PAGE->theme->settings->linkedin));
$hasyoutube = (!empty($PAGE->theme->settings->youtube));
$hasvimeo = (!empty($PAGE->theme->settings->vimeo));
$isfrontpage = $PAGE->bodyid == "page-site-index";

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}

echo $OUTPUT->doctype();

// Head

 echo html_writer::start_tag('html', array($OUTPUT->htmlattributes()));
 echo html_writer::start_tag('head');

  // Rachel Fransen - March 18, 2013
  // Add the headers for the graph info
  echo '<script src="'.$CFG->wwwroot.'/local/RGraph/libraries/RGraph.common.core.js"></script>
    <script src="'.$CFG->wwwroot.'/local/RGraph/libraries/RGraph.common.dynamic.js"></script>
    <script src="'.$CFG->wwwroot.'/local/RGraph/libraries/RGraph.common.tooltips.js"></script>
    <script src="'.$CFG->wwwroot.'/local/RGraph/libraries/RGraph.common.effects.js"></script>
    <script src="'.$CFG->wwwroot.'/local/RGraph/libraries/RGraph.radar.js"></script>
    <script src="'.$CFG->wwwroot.'/local/RGraph/libraries/RGraph.bar.js"></script>
    <!--[if lt IE 9]><script src="'.$CFG->wwwroot.'/local/RGraph/excanvas/excanvas.js"></script><![endif]-->';

 echo html_writer::start_tag('title');
 echo $PAGE->title;
 echo html_writer::end_tag('title');
 echo html_writer::empty_tag('link', array('rel'=>'shortcut icon','href'=>$OUTPUT->pix_url('favicon', 'theme')));
 echo $OUTPUT->standard_head_html();
 echo html_writer::end_tag('head');

// Body
	
 echo html_writer::start_tag('body', array('id'=>$PAGE->bodyid,'class'=>$PAGE->bodyclasses.' '.join(' ', $bodyclasses)));
 echo $OUTPUT->standard_top_of_body_html() ;

// Menu Bar

 echo html_writer::start_tag('div', array('id'=>'menuwrap'));
 echo html_writer::start_tag('div', array('id'=>'menuwrap960'));
 
// Home icon
 
 echo html_writer::start_tag('div', array('id'=>'homeicon'));
 echo html_writer::start_tag('a', array('href'=>$CFG->wwwroot, 'class'=>'homeiconlink'));
 if ($haslogo) {
 echo html_writer::empty_tag('img', array('src'=>$PAGE->theme->settings->logo)); }
 else { 
 echo html_writer::empty_tag('img', array('src'=>$OUTPUT->pix_url('logo', 'theme'))); }
 echo html_writer::end_tag('a');
 echo html_writer::end_tag('div');

// Custom menu
	
 if ((!isloggedin()) && ($hashidemenu)){}
 elseif ($hascustommenu) { 
 echo html_writer::start_tag('div', array('id'=>'menuitemswrap'));
 echo html_writer::start_tag('div', array('id'=>'custommenu'));
 echo $custommenu;
 echo html_writer::end_tag('div');
 echo html_writer::end_tag('div'); }
 
 // Page title header

 echo html_writer::start_tag('div', array('id'=>'page-title'));
 echo html_writer::start_tag('div', array('id'=>'page-title-inner'));
 echo $PAGE->title;
 echo html_writer::end_tag('div');

// Frontpage date (if enabled)

 if (($isfrontpage) && ($hastitledate)) {
 echo html_writer::start_tag('div', array('id'=>'page-title-date'));
 echo date("l d F Y");
 echo html_writer::end_tag('div');
 } 
 else {}
 echo html_writer::end_tag('div');

// Profile block
 
 include('profileblock.php');

 echo html_writer::end_tag('div');
 echo html_writer::end_tag('div');
				

// Page Header (REQUIRED)

 echo html_writer::start_tag('div', array('id'=>'page-header'));
 echo html_writer::end_tag('div');

// Start of Moodle CONTENT

 echo html_writer::start_tag('div', array('id'=>'contentwrapper'));
 
 
 
// Page content

 echo html_writer::start_tag('div', array('id'=>'page-content'));
 echo html_writer::start_tag('div', array('id'=>'region-main-box'));
 echo html_writer::start_tag('div', array('id'=>'region-post-box'));
 echo html_writer::start_tag('div', array('id'=>'region-main-wrap'));
 echo html_writer::start_tag('div', array('id'=>'region-main'));
 echo html_writer::start_tag('div', array('class'=>'region-content'));
 echo html_writer::start_tag('div', array('id'=>'mainpadder'));
 
// Nav bar

 echo html_writer::start_tag('div', array('id'=>'jcontrols_button'));
 echo html_writer::start_tag('div', array('class'=>'jcontrolsleft'));
 if ($hasnavbar) {
 echo html_writer::start_tag('div', array('class'=>'navbar clearfix'));
 echo html_writer::start_tag('div', array('class'=>'breadcrumb'));
 echo $OUTPUT->navbar();
 echo html_writer::end_tag('div');
 echo html_writer::end_tag('div');
 }
 echo html_writer::end_tag('div');
 echo html_writer::start_tag('div', array('id'=>'ebutton'));
 if ($hasnavbar) { 
 echo $PAGE->button; 
 }
 echo html_writer::end_tag('div');
 echo html_writer::end_tag('div'); 
 
 // Ending tags for Main Content
 
 echo core_renderer::MAIN_CONTENT_TOKEN;
 echo html_writer::end_tag('div');
 echo html_writer::end_tag('div'); 
 echo html_writer::end_tag('div');
 echo html_writer::end_tag('div'); 
 
 // Print out the blocks
 if ($hassidepre) { 
 echo html_writer::start_tag('div', array('id'=>'region-pre', 'class'=>'block-region'));
 echo html_writer::start_tag('div', array('class'=>'region-content'));
 echo $OUTPUT->blocks_for_region('side-pre');
 echo html_writer::end_tag('div');
 echo html_writer::end_tag('div'); 
 } 
 
 if ($hassidepost) {
 echo html_writer::start_tag('div', array('id'=>'region-post', 'class'=>'block-region'));
 echo html_writer::start_tag('div', array('class'=>'region-content'));
 echo $OUTPUT->blocks_for_region('side-post');
 echo html_writer::end_tag('div');
 echo html_writer::end_tag('div'); 
 } 
 
 echo html_writer::end_tag('div'); 
 echo html_writer::end_tag('div'); 
 echo html_writer::end_tag('div'); 
 
// End of content

 echo html_writer::end_tag('div'); 
 echo html_writer::empty_tag('br', array('style'=>'clear: both;')); 

// Footer (REQUIRED CODE)

 echo html_writer::start_tag('div', array('id'=>'page-footer'));
 echo html_writer::end_tag('div'); 
 
// Footer 
 if ($hasfooter) {
 echo html_writer::start_tag('div', array('id'=>'footerwrapper'));
 echo html_writer::start_tag('div', array('id'=>'footerinner'));

  // Add scripts for course page layout
  if (!$PAGE->user_is_editing()) {
      echo '<script src="'.$CFG->wwwroot.'/theme/vrsim/javascript/pagescripts.js"></script>';
  }

 include('footer.php');
 echo html_writer::end_tag('div'); 
 
// Credit
 
 echo html_writer::start_tag('div', array('id'=>'themeorigin'));
 }
	 
// The end
	 
 echo $OUTPUT->standard_end_of_body_html();
 echo html_writer::end_tag('body'); 
 echo html_writer::end_tag('html'); 
	  ?>