<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hascenter = $PAGE->blocks->region_has_content('center', $OUTPUT);
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));
$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));


$bodyclasses = array();
if ($showsidepre && !$showsidepost) 
{
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) 
{
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) 
{
    $bodyclasses[] = 'content-only';
}


echo $OUTPUT->doctype();
header("X-XSS-Protection: 0"); 

?>

<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">

<script src="<?php echo $CFG->wwwroot.'/local/RGraph/libraries/RGraph.common.core.js' ?> "></script>
<script src="<?php echo $CFG->wwwroot.'/local/RGraph/libraries/RGraph.common.dynamic.js' ?> "></script>
<script src="<?php echo $CFG->wwwroot.'/local/RGraph/libraries/RGraph.common.effects.js' ?> "></script>
<script src="<?php echo $CFG->wwwroot.'/local/RGraph/libraries/RGraph.common.tooltips.js' ?> "></script>
<script src="<?php echo $CFG->wwwroot.'/local/RGraph/libraries/RGraph.drawing.yaxis.js' ?> "></script>

<script src="<?php echo $CFG->wwwroot.'/local/RGraph/libraries/RGraph.bar.js' ?> "></script>
<script src="<?php echo $CFG->wwwroot.'/local/RGraph/libraries/RGraph.line.js' ?> "></script>
<!--[if lt IE 9]><script src="<?php echo $CFG->wwwroot.'/local/RGraph/excanvas/excanvas.js' ?> "></script><![endif]-->

<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot.'/theme/simbuild/style/sbc_dashboard.css' ?> ">
<script type="text/javascript" src="<?php echo $CFG->wwwroot.'/theme/simbuild/javascript/sbc_dashboard.js' ?> "></script>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<!-- START OF HEADER -->

<div id="page-header">
	<div id="header">

		<?php if (!empty($PAGE->theme->settings->logo)) { ?>
			<div id="logo">
			</div>
		<?php } else { ?>
			<div id="nologo">
				<a href="<?php echo $CFG->wwwroot; ?>" title="Home"><?php echo $PAGE->heading ?></a>
			</div>
		<?php } ?>

		<div id="loggedinas">
		    <?php if ($hasheading) {
       	    	        //echo $OUTPUT->login_info();
                        echo '<a href="/user/profile.php" >'.get_string('viewprofile').'</a><span> | </span>';
                        $logouturl = new moodle_url('/login/logout.php', array('sesskey'=>sesskey()));
                        echo '<a href="'.$logouturl.'">'.get_string('logout').'</a>';
   	        	echo $OUTPUT->lang_menu();
           		echo $PAGE->headingmenu;
                    } ?>
		</div>

		<div id="headerbottom">
	            <div id="menu">

                         <!-- <div id="homeicon">
                             <a href="<?php echo $CFG->wwwroot; ?>">
                             <img src="<?php echo $OUTPUT->pix_url('home_icon', 'theme')?>"></a>
                         </div> -->

			<?php if ($hascustommenu) { ?>
 				<div id="custommenu"><?php echo $custommenu; ?></div>
			<?php } ?>
		    </div>
		</div>

	</div>
</div>

<!-- END OF HEADER -->




<div id="mypagewrapper">
	<div id="page">
		<div id="wrapper" class="clearfix">

<!-- START OF CONTENT -->

			<div id="page-content-wrapper" class="wrapper clearfix">
		    	<div id="page-content">
    		    	<div id="region-main-box">
        		     <div id="region-post-box">
	            	    	    <div id="region-main-wrap">
    	            	    	    <div id="region-main">
        	            	    	<div class="region-content">
        	            	    	
        	            	    	<?php include('sbc_dashboard.php'); ?>
        	            	    	
            	            	    	<?php echo $OUTPUT->main_content() ?>

                                            <!--------- PRINT THE CENTER BLOCKS --------------->
                                            <?php if ($hascenter) { ?>
                                            <div id="region-center" class="block-region">
        		            	        <div class="region-content">
                                                <?php echo $OUTPUT->blocks_for_region('center') ?>
                                                </div>
                                            </div>
                                            <?php } ?>

	                	        </div>
    	                	    </div>
	    	                    </div>

                                   <!---------  PRINT THE SIDE BLOCKS  -------->
                                   <?php if ($hassidepre) { ?>
    		            	   <div id="region-pre" class="block-region">
        		            	<div class="region-content">
            		            	<?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                		    	</div>
	                	   </div>
	    	            	   <?php } ?>

		                   <?php if ($hassidepost) { ?>
    		            	   <div id="region-post" class="block-region">
        		            	<div class="region-content">
            		            	<?php echo $OUTPUT->blocks_for_region('side-post') ?>
                		    	</div>
	                	   </div>
	    	            	   <?php } ?>

                                   

    	    	    	     </div>
	    	    	</div>
	    		</div>
    		</div>

<!-- END OF CONTENT -->


		</div>
	</div>
</div>

<!-- START OF FOOTER -->

<?php if ($hasfooter) { ?>
	<div id="page-footer" class="wrapper">
		<p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
		<?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->standard_footer_html();
		?>
	</div>
<?php } ?>

<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>