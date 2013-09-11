<?php

$hasheading = ($PAGE->heading);
$hasnavbutton = ($PAGE->button);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
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

$courseheader = $coursecontentheader = $coursecontentfooter = $coursefooter = '';
if (empty($PAGE->layout_options['nocourseheaderfooter'])) {
    $courseheader = $OUTPUT->course_header();
    $coursecontentheader = $OUTPUT->course_content_header();
    if (empty($PAGE->layout_options['nocoursefooter'])) {
        $coursecontentfooter = $OUTPUT->course_content_footer();
        $coursefooter = $OUTPUT->course_footer();
    }
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<!-- START OF HEADER -->

<div id="page-header">
	<div id="header">

		<?php if (!empty($PAGE->theme->settings->logo)) { ?>

			<div id="logo">
			</div>

		<?php } else { ?>

			<div id="nologo">
				<?php echo $PAGE->heading ?>
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
				<?php if ($hascustommenu) { ?> 
 					<div id="custommenu"><?php echo $custommenu; ?></div>
				<?php } ?> 
			</div>
			<?php if ($hasheading && empty($PAGE->theme->settings->logo)) { ?>
			   	<div id="headingtitle">
	    			<h1><?php echo $PAGE->heading ?></h1>
	    		</div>
	    	<?php } ?>

		</div>

	</div>
</div>
<!-- END OF HEADER -->




<div id="mypagewrapper">
	<div id="page">
		<div id="wrapper" class="clearfix">

          <?php if (!empty($courseheader)) { ?>
            <div id="course-header"><?php echo $courseheader; ?></div>
          <?php } ?>
<!-- START OF CONTENT -->

			<div id="page-content-wrapper" class="wrapper clearfix">
		    	<div id="page-content">
    		    	<div id="region-main-box">
        		    	<div id="region-post-box">

	            	    	<div id="region-main-wrap">
    	            	    	<div id="region-main">
        	            	    	<div class="region-content">

        	            	             <?php if ($hasnavbar) { ?>
        	    				<div class="navbar">
            					    <div class="wrapper">
	            	    			    <!-- <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div> -->
	    	        			    </div>
    	        				</div>
        				     <?php } ?>

                                        <?php echo $coursecontentheader; ?>
            	            	    	<?php echo $OUTPUT->main_content() ?>
                                        <?php echo $coursecontentfooter; ?>

	                	        	</div>
    	                		</div>
	    	            	</div>


                                   <!---------  PRINT THE BLOCKS  -------->
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
            <?php if (!empty($coursefooter)) { ?>
                <div id="course-footer"><?php echo $coursefooter; ?></div>
            <?php } ?>


		</div>
	</div>
</div>

<!-- START OF FOOTER -->

<?php if ($hasfooter) { ?>
	<div id="page-footer" class="wrapper">
		<p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
		<?php
        echo $OUTPUT->login_info();
		echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
		?>
	</div>
<?php } ?>

<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>