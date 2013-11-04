<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'theme_simbuild', language 'en', branch 'MOODLE_20_STABLE'
 *
 * @package   moodlecore
 * @copyright 2010 Patrick Malley
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'SimBuild';
$string['region-side-post'] = 'Right';
$string['region-side-pre'] = 'Left';
$string['region-center'] = 'Center';

// Language Strings
$string['progresslink'] = 'Progress Report';
$string['knowledgelink'] = 'Knowledge Center';
$string['resourcelink'] = 'Resources';

$string['viewprofile'] = 'View Profile';
$string['logout'] = "Logout";

//readme
$string['choosereadme'] = '<div class="clearfix">

<div class="theme_screenshot">

	<h2 style="padding-top:0.5em;">SimBuild</h2>
	<img src="simbuild/pix/screenshot.png" />

	<h3>Theme Discussion Forum:</h3>
	<p><a href="http://moodle.org/mod/forum/view.php?id=46">http://moodle.org/mod/forum/view.php?id=46</a></p>

	<h3>Theme Documentation:</h3>
	<p><a href="http://docs.moodle.org/en/Themes">http://docs.moodle.org/en/Themes</a></p>

	<h3>Theme Credits</h3>
	<p><a href="http://docs.moodle.org/en/Theme_credits">http://docs.moodle.org/en/Theme_credits</a></p>

	<h3>Report a bug:</h3>
	<p><a href="http://tracker.moodle.org">http://tracker.moodle.org</a></p>

</div>
<div class="theme_description">

	<h2>About</h2>
	<p>SimBuild is a two-column, fluid-width theme for Moodle 2.0. You can change the theme color scheme via the theme settings page.</p>

	<h2>Tweaks</h2>
	<p>This theme is built upon both Base and Canvas, two parent themes included in the Moodle core. If you wish to modify aspects of this theme beyond the settings offered, we advise creating a new theme that uses this theme, Base, and Canvas all as parents. This will ensure updates to any of those themes in the core will find their way into your new theme.</p>

	<h2>Credits</h2>
	<p>This theme was modified by Rachel Fransen, in use for the SimBuild LMS. The original code was created and is maintained by John Stabinger of NewSchool Learning. He can be contacted by email at contact@newschoollearning.com. </p>

	<h2>License</h2>
	<p>This, and all other themes included in the Moodle core, are licensed under the <a href="http://www.gnu.org/licenses/gpl.html">GNU General Public License</a>.</p>

</div>
</div>';

$string['configtitle'] = 'SimBuild settings';

$string['logo'] = 'logo';
$string['logodesc'] = 'Change the logo of this theme by entering the URL to a new one (i.e., http://www.somesite/animage.png). As a reference, the default logo is 265px wide by 60px high. A transparent PNG will work best.';

$string['linkcolor'] = 'link';
$string['linkcolordesc'] = 'Set the color of links in the theme, use html hex code.';

$string['linkhover'] = 'linkhover';
$string['linkhoverdesc'] = 'Set the color of links (on hover) in the theme, use html hex code.';

$string['maincolor'] = 'maincolor';
$string['maincolordesc'] = 'Set the color hex code of the header, dock bar and other areas. Looks best as a dark or saturated color.';

$string['maincolorlink'] = 'maincolorlink';
$string['maincolorlinkdesc'] = 'Link color for menu bar and block titles.';

$string['headingcolor'] = 'headingcolor';
$string['headingcolordesc'] = 'This is the heading color for large headings (site news, my courses) and other headings.';

///////////////////////////////////  Translations for SBC Dashboard //////////////////////////////////
/*** Overview Block ***/
$string['overviewtitle']	= 'SimBuild Overview';
$string['classrank'] 		= 'Class Rank';
$string['overallsiteprog'] 	= 'Overall Worksite Progress:';
$string['ordercomplete'] 	= 'Work Orders Passed';
$string['actpassed'] 		= 'Activities Passed';
$string['toolspassed'] 		= 'Tools Unlocked'; 
$string['tooltippassed'] 	= 'Tooltips Viewed';

/*** Construction Block ***/
$string['systitle']		= 'Systems Progress';
$string['sitesyscomplete']	= 'Worksite Systems Complete';

/*** Foundation Skills ***/
$string['SKILLTYPE_MATERIALS']	='Materials';
$string['SKILLTYPE_PLANS']	='Plans';
$string['SKILLTYPE_SAFETY']	='Safety';
$string['SKILLTYPE_TOOLS']	='Tools';

/*** Construction Skills ***/
$string['SKILLTYPE_CEILING']	='Ceiling';
$string['SKILLTYPE_DRYWALL']	='Drywall';
$string['SKILLTYPE_FLOOR']	='Floor';
$string['SKILLTYPE_ROOF']	='Roof';
$string['SKILLTYPE_STAIRS']	='Stairs';
$string['SKILLTYPE_WALLS']	='Walls';
$string['SKILLTYPE_WINDOWS_AND_DOORS']	='Windows & Doors';

/*** Academic Block ***/
$string['acadtitle']		='Academic Skills Progress';
$string['accomplete']		='Academics Complete';
$string['momtimetitle']		='Learning Momentum over Progress';

/*** Academic Skills ***/
$string['SKILLTYPE_MATH']	='Math';
$string['SKILLTYPE_READING']	='Reading';
$string['SKILLTYPE_KNOWLEDGE']	='Knowledge';
$string['SKILLTYPE_PROBLEM_SOLVING']	='Problem Solving';

///////////////////////////////////  Translations for SBC Database  //////////////////////////////////
//-----------------------------
// Site Translations
//-----------------------------
$string['SITE_MULTILEVEL_HOUSE'] = 	'Multilevel House';
$string['SITE_RANCH_HOUSE'] = 		'Ranch House';
$string['SITE_SHED'] = 			'Shed';

//-----------------------------
// System Translations
//-----------------------------
$string['SYSTEM_COMPLETION'] = 		'Complete';
$string['SYSTEM_CONCRETE_FORMS'] = 	'Concrete Forms';
$string['SYSTEM_DEMO'] = 		'Demo';
$string['SYSTEM_DRYWALL'] = 		'Drywall';
$string['SYSTEM_FLOOR'] = 		'Floor';
$string['SYSTEM_FLOORS_AND_WALLS'] = 	'Floors & Walls';
$string['SYSTEM_INTRODUCTION'] = 	'Introduction';
$string['SYSTEM_ROOF'] = 		'Roof';
$string['SYSTEM_ROOF_AND_CEILING'] =    'Roof and Ceiling';
$string['SYSTEM_STAIRS'] = 		'Stairs';
$string['SYSTEM_WALL'] =                'Wall';
$string['SYSTEM_WALL_AND_CEILING'] = 	'Wall & Ceiling';
$string['SYSTEM_WINDOW_AND_DOOR'] = 	'Windows & Doors';
$string['SYSTEM_WORKSITE_PREPARATION'] = 'Worksite Preparation';
$string['SYSTEM_WORKSITE_REVIEW'] = 	 'Worksite Review';

//-----------------------------
// Work order Translations
//-----------------------------
$string['WO_BASIC_BLUEPRINT'] =		        'Read Blueprint 2';
$string['WO_BUILD_CONCRETE_FORMS'] =	    'Build Forms';
$string['WO_BUILD_EXTERIOR_WALL'] =	        'Wall Prep';
$string['WO_BUILD_EXTERIOR_WALL_PREP'] =    'Wall Math';
$string['WO_BUILD_INSPECTION_WALL'] = 	    'Wall Identify';
$string['WO_BUILD_INTERIOR_WALL'] =	    'Build Partitions';
$string['WO_BUILD_WALL_SECTION'] =	    'Build Wall';
$string['WO_BUILDING_PREP'] = 		    'Building Prep';
$string['WO_COMPLETION_MLH'] = 		    'Multilevel Complete';
$string['WO_COMPLETION_RANCH'] = 	    'Ranch Complete';
$string['WO_COMPLETION_SHED'] = 	    'Shed Complete';
$string['WO_CONSTRUCTION_MATH'] =       'Construction Math';
$string['WO_CUT_STUDS_AND_TRIMMERS'] =	'Material Prep';
$string['WO_DRYWALL_INSTALLATION'] = 	'Drywall Install';
$string['WO_DRYWALL_PREP'] = 		    'Drywall Prep';
$string['WO_DRYWALL_INSTALLATION'] = 	'Drywall Install';
$string['WO_DRYWALL_FINISH'] =		    'Drywall Finish';
$string['WO_FINISH_EXTERIOR_WALL'] =	'Drywall Finishing';
$string['WO_FINISH_ROOF'] =		        'Roof Finishing';
$string['WO_FRAME_CEILING'] =		    'Frame Ceiling';
$string['WO_FRAME_FLOOR'] =		        'Shed Floor Framing';
$string['WO_FRAME_GABLE_ROOF'] =	    'Build Gable Roof';
$string['WO_FRAME_HIP_ROOF'] =		    'Roof Prep';
$string['WO_FRAME_INTERIOR_WALL'] =	    'Interior Wall Framing';
$string['WO_FRAME_SHED_ROOF'] =		    'Shed Roof Prep';
$string['WO_FRAME_SHED_ROOF_2'] =       'Build Shed';
$string['WO_FRAME_STAIRS'] =		    'Stairs Framing';
$string['WO_HAND_TOOLS'] =		        'Hand & Power Tools';
$string['WO_HANG_DOOR_ON_FRAME'] =	    'Door Install';
$string['WO_HANG_DOOR_SETUP'] = 	    'Door Prep';
$string['WO_INTRODUCTION_SHED'] = 	    'Introduction Shed';
$string['WO_INTRODUCTION_RANCH'] =  	'Introduction Ranch';
$string['WO_INTRODUCTION_MLH'] = 	    'Introduction Multilevel';
$string['WO_INSTALL_INSULATION'] =	    'Insulation Install';
$string['WO_INSTALL_WINDOW'] =		    'Shed Window Install';
$string['WO_INSTALL_WINDOWS'] =		    'Ranch Window Install';
$string['WO_INSTALL_WINDOW_SETUP'] = 	'Window Prep';
$string['WO_INSULATE_ROOF'] = 		    'Build Roof';
$string['WO_LAYOUT_FLOOR'] =		    'Ranch Floor Framing';
$string['WO_MLH_SAFETY_SYSTEST'] = 	    'Advanced Blueprint Study';
$string['WO_MLH_FLOOR_FRAMING'] =       'Multilevel Floor Framing';
$string['WO_PLAN_GABLE_ROOF'] =		    'Ceiling Prep';
$string['WO_PLAN_GABLE_ROOF_PREP'] = 	'Gable Roof Prep';
$string['WO_PLAN_STAIRS'] = 		    'Stairs Prep';
$string['WO_PREPARATION_FLOOR'] = 	    'Floor Prep';
$string['WO_RANCH_BLUEPRINT_SYSTEST'] = 'Blueprint Study';
$string['WO_READ_BLUEPRINT'] =		    'Read Blueprint 1';
$string['WO_REVIEW_WORKSITE'] =		    'Review Worksite';
$string['WO_SETUP_WORK_AREA'] =		    'Work Area Setup';
$string['WO_SHED_SAFE_SYSTEST'] = 	    'Safety Study';
$string['WO_SHED_SAFETY'] =             'Basic Safety';
$string['WO_SHED_WINDOW_DOOR_TEST'] = 	'Shed Door Study';
$string['WO_SYSTEM_TEST_DOOR'] =	    'Insulation Study';
$string['WO_SYSTEM_TEST_DOOR_AND_WINDOW'] =	'Window & Door Study';
$string['WO_SYSTEM_TEST_DRYWALL'] =		    'Drywall Study';
$string['WO_SYSTEM_TEST_FLOOR'] =		    'Floor Study';
$string['WO_SYSTEM_TEST_FORMS'] =		    'Forms Study';
$string['WO_SYSTEM_TEST_HIP_ROOF'] =		'Hip Roof Study';
$string['WO_SYSTEM_TEST_INTERIOR_WALL'] =	'Interior Wall Study';
$string['WO_SYSTEM_TEST_ROOF'] =		'Gable Roof Study';
$string['WO_SYSTEM_TEST_STAIRS'] =		'Stairs Study';
$string['WO_SYSTEM_TEST_WALL'] =		'Wall Study';
$string['WO_TAPE_AND_MATH'] =			'Building Math';
$string['WO_TOOL_AND_MATERIAL_IDENTIFICATION']= 'Tools & Materials';
$string['WO_TRIM_WALL_AND_FLOOR'] =		    'Trim Interior';
$string['WO_TRIM_WALL_PREP'] = 			    'Interior Trim Prep';
$string['WO_TRIM_WALL_PREP_RENAME_1'] = 	'Interior Trim Install';
$string['WO_WORKSITE_WALKTHROUGH'] =		'Ranch Building Prep';
$string['WO_WORKSITE_CHECK'] = 			    'Wood Grading';

//-----------------------------
// Activity Translations
//-----------------------------
$string['ACT_CALCIT_CEILING_MATERIALS'] = 	        'Calculate - Ceiling Materials';
$string['ACT_CALCIT_COMMON_RAFTER'] = 		        'Calculate - Common Rafter';
$string['ACT_CALCIT_CONSTRUCTION_MATH_1'] = 	    'Calculate - Board Feet';
$string['ACT_CALCIT_CONSTRUCTION_MATH_2'] = 	    'Calculate - Building Math Basics';
$string['ACT_CALCIT_DOOR_OPENING'] = 		        'Calculate - Door Opening';
$string['ACT_CALCIT_DRYWALL'] = 		            'Calculate - Drywall Material';
$string['ACT_CALCIT_EXTERIOR_DRYWALL_MATERIALS'] = 'Calculate - Drywall Exterior Wall';
$string['ACT_CALCIT_FLOOR_MATERIALS_1'] = 	        'Calculate - Girders & Joists';
$string['ACT_CALCIT_FLOOR_MATERIALS_2'] = 	        'Calculate - Floor Materials 2';
$string['ACT_CALCIT_GIRDERS_AND_JOISTS'] =  	    'Calculate - Solid Bridging';
$string['ACT_CALCIT_INTERIOR_DRYWALL_MATERIALS'] =  'Calculate - Drywall Interior Wall';
$string['ACT_CALCIT_RAFTERS'] = 		            'Calculate - Common Rafters';
$string['ACT_CALCIT_RISE_AND_RUN'] = 		        'Calculate - Rise & Run';
$string['ACT_CALCIT_ROOF_MATERIALS'] = 		        'Calculate - Roofing Material';
$string['ACT_CALCIT_STUDS_AND_TRIMMERS'] = 	        'Calculate - Stud Length';
$string['ACT_CALCIT_STAIR_NUMBER'] = 		        'Calculate - Stair Number';
$string['ACT_CALCIT_TRIM'] = 			            'Calculate - Interior Trim';
$string['ACT_CALCIT_WALL_MATERIALS_1'] =	        'Calculate - Wall Materials';
$string['ACT_CALCIT_WALL_MATERIALS_2'] =	        'Calculate - Housewrap';
$string['ACT_CALCIT_WEATHER_STRIPPING_AND_INSULATION'] = 'Calculate - Weatherproofing';
$string['ACT_CALCIT_UNIT_RISE_AND_RUN'] = 		'Calculate - Unit Rise & Run';
$string['ACT_COVERIT_DRYWALL'] =		        'Cover - Drywall';
$string['ACT_COVERIT_INSULATION'] =		        'Cover - Insulation';
$string['ACT_COVERIT_PLYWOOD'] =		        'Cover - Plywood Floor';
$string['ACT_COVERIT_SHEATHING'] =		        'Cover - Roof Sheathing';
$string['ACT_COVERIT_SHINGLES'] =		        'Cover - Shingle Roof';
$string['ACT_CUT_SCENE_INTRO_SHED'] = 		    'Shed Introduction';
$string['ACT_CUT_SCENE_INTRO_RANCH'] = 		    'Ranch Introduction';
$string['ACT_CUT_SCENE_INTRO_MULTILEVEL'] = 	'Multilevel House Introduction';
$string['ACT_CUT_SCENE_COMPLETE_MULTILEVEL'] = 	'Multilevel House Complete';
$string['ACT_CUT_SCENE_COMPLETE_RANCH'] = 	    'Ranch Complete';
$string['ACT_CUT_SCENE_COMPLETE_SHED'] = 	    'Shed Complete';
$string['ACT_DECISION_TREE_DOOR_SHED'] =	    'Decisions - Shed Door';
$string['ACT_DECISION_TREE_FLOOR'] =		    'Decisions - Floor Frame';
$string['ACT_DECISION_TREE_FLOOR_REVIEW'] =     'Decisions - Floor Frame Review';
$string['ACT_DECISION_TREE_RANCH_DOOR'] =	    'Decisions - Ranch Door';
$string['ACT_DECISION_TREE_RANCH_WINDOW'] =	    'Decisions - Ranch Window';
$string['ACT_DECISION_TREE_WINDOW'] =		    'Decisions - Shed Window';
$string['ACT_FRAME_CEILING'] =			        'Frame - Ceiling';
$string['ACT_FRAME_FORMS'] =			        'Frame Assembly - Concrete Forms';
$string['ACT_FRAME_GABLE_ROOF'] =		        'Frame - Gable Roof';
$string['ACT_FRAME_GABLE_ROOF_REVIEW'] = 	    'Frame - Gable Roof Review';
$string['ACT_FRAME_HIP_ROOF'] =			        'Frame - Hip Roof';
$string['ACT_FRAME_METAL_STUDS'] =		        'Frame - Metal Wall Frame';
$string['ACT_FRAME_RANCH_FLOOR'] =		        'Frame - Ranch Floor';
$string['ACT_FRAME_RANCH_WALL'] =		        'Frame - Ranch Wall';
$string['ACT_FRAME_ROOF'] = 			        'Frame- Roof';
$string['ACT_FRAME_READING'] = 			        'Tool Reading - Framing Square';
$string['ACT_FRAME_SAWHORSE'] =			        'Frame - Sawhorse';
$string['ACT_FRAME_SCAFFOLDING'] =		        'Frame - Scaffolding';
$string['ACT_FRAME_SHED_ROOF'] =		        'Frame - Shed Roof';
$string['ACT_FRAME_WALL'] =			            'Frame - Wall';
$string['ACT_FRAME_WALL_REVIEW'] = 		        'Frame - Wall Review';
$string['ACT_GRADEIT_LUMBER'] =			        'Grade Lumber 2';
$string['ACT_GRADEIT_LUMBER2'] =                'Grade Lumber 3';
$string['ACT_INSPECTION_CEILING'] =		        'Identify - Ceiling Frame';
$string['ACT_INSPECTION_DRYWALL'] =		        'Inspect - Drywall Panels';
$string['ACT_INSPECTION_DRYWALL_FINISHING'] =	'Inspect - Drywall Finishing';
$string['ACT_INSPECTION_METAL_FRAME'] =		    'Inspect - Metal Wall Frame';
$string['ACT_INSPECTION_MULTILEVEL_ROOF'] =	    'Identify - Hip Roof';
$string['ACT_INSPECTION_R5'] =			        'Inspect - Floor';
$string['ACT_INSPECTION_R5_REVIEW'] = 		    'Inspect - Floor Review';
$string['ACT_INSPECTION_R7'] =			        'Inspect - Ranch Wall';
$string['ACT_INSPECTION_R8'] =			        'Identify - Wall Partition';
$string['ACT_INSPECTION_ROOF_FINISH'] = 	    'Inspect - Roof Finishing';
$string['ACT_INSPECTION_ROOF_FINISH_PARTS'] = 	'Identify - Roof Finishing';
$string['ACT_INSPECTION_STAIRS'] =		        'Identify - Stairs';
$string['ACT_INSPECTION_STAIRS_REVIEW'] = 	    'Identify - Stairs Review';
$string['ACT_INSPECTION_TRIM'] = 		        'Inspect - Trim Defects';
$string['ACT_INSTALL_TRIM'] = 			        'Install - Interior Trim';
$string['ACT_INSTALLIT_INSULATION'] =		    'Install - Insulation';
$string['ACT_INSTALLIT_LEVEL'] =		        'Install - Level Window';
$string['ACT_INSTALLIT_NAILING'] =		        'Install - Nail Frame';
$string['ACT_INSTALLIT_RANCH_HINGES'] =		    'Install - Door Hinges';
$string['ACT_INSTALLIT_RANCH_LEVEL'] =		    'Install - Ranch Window Level';
$string['ACT_INSTALLIT_SHED_LOCK'] =		    'Install - Door Lock';
$string['ACT_INSTALLIT_SHINGLES'] = 		    'Install - Shingle Roof';
$string['ACT_INSTALLIT_SHINGLES_REVIEW'] = 	    'Install - Shingle Review';
$string['ACT_INSTALLIT_WEATHER_STRIPPING'] =	'Install - Weather Stripping';
$string['ACT_JOINTIT_DRYWALL'] =		        'Install - Hand Jointing';
$string['ACT_LOADBEARING_GABLE_ROOF'] =		        'Loadbearing - Gable Roof';
$string['ACT_LOADBEARING_M5'] =			        'Loadbearing - Multilevel Beams';
$string['ACT_LOADBEARING_M8'] =			        'Loadbearing - Hip Roof';
$string['ACT_LOADBEARING_M3'] = 		        'Loadbearing - Multilevel Floor';
$string['ACT_LOADBEARING_RANCH_WALL'] =		    'Loadbearing - Ranch Wall';
$string['ACT_LOADBEARING_ROOF'] =		        'Loadbearing - Roof';
$string['ACT_LOADBEARING_SHED_ROOF'] =		    'Loadbearing - Shed Roof';
$string['ACT_LOADBEARING_SHED_WALL'] =		    'Loadbearing - Shed Wall';
$string['ACT_MARKING_RAFTERS_MULTILEVEL_ROOF']= 'Mark Rafters - Hip Roof';
$string['ACT_MARKING_RAFTERS_RANCH_ROOF'] =	'Mark Rafters - Gable Roof';
$string['ACT_MARKING_RAFTERS_STAIRS'] =		'Mark Rafters - Stair Treads';
$string['ACT_MATERIAL_SNAP'] =			'Identify Building Materials';
$string['ACT_MEASURECUT_DRYWALL'] =		'Measure & Cut - Drywall';
$string['ACT_MEASURECUT_GABLE_ROOF'] =		'Measure & Cut - Gable Roof';
$string['ACT_MEASURECUT_SAWHORSE'] =		'Measure & Cut - Sawhorse';
$string['ACT_MEASURECUT_STAIRS'] =		'Measure & Cut - Stair Tread';
$string['ACT_MEASURECUT_WALL_FRAME'] =		'Measure & Cut - Wall Frame';
$string['ACT_MEASURECUT_WALL_FRAME_1'] =	'Measure & Cut - Wall Studs';
$string['ACT_PROCEDURE_GABLE_ROOF'] =		'Procedure - Gable Roof';
$string['ACT_PROCEDURE_HIP_ROOF'] =		'Procedure - Hip Roof';
$string['ACT_PROCEDURE_MULTILEVEL'] =		'Procedure - Multilevel House';
$string['ACT_PROCEDURE_RANCH'] =		'Procedure - Ranch';
$string['ACT_PROCEDURE_RANCH_FLOOR'] =		'Procedure - Ranch Floor';
$string['ACT_PROCEDURE_SHED'] =                 'Procedure - Shed';
$string['ACT_PROCEDURE_STAIRS'] = 		'Procedure - Stairs';
$string['ACT_QUIZ_ADVANCED_BLUEPRINT'] =	'Quiz - Multi-level Blueprint';
$string['ACT_QUIZ_ANGLES'] = 			'Quiz - Angles & Lengths';
$string['ACT_QUIZ_BLUEPRINT_BASICS'] =		'Quiz - Blueprint Basics';
$string['ACT_QUIZ_BLUEPRINT_BASICS_1'] =	'Study - Blueprints';
$string['ACT_QUIZ_BLUEPRINT_BASICS_2'] =	'Quiz - Ranch Blueprint';
$string['ACT_QUIZ_BLUEPRINT_DIMENSIONS'] =	'Quiz - Blueprint Dimensions';
$string['ACT_QUIZ_BUILDING_CODES'] = 		'Quiz - Building Codes';
$string['ACT_QUIZ_CONCRETE_FORM_MATERIALS'] =	'Quiz - Forms Materials';
$string['ACT_QUIZ_CONCRETE_FORMS'] =		'Study - Forms';
$string['ACT_QUIZ_DOOR_AND_WINDOW'] =		'Study - Window & Door';
$string['ACT_QUIZ_DRYWALL'] =			'Study - Drywall';
$string['ACT_QUIZ_DRYWALL_MATERIALS'] =		'Quiz - Drywall Materials';
$string['ACT_QUIZ_DRYWALL_TOOLS'] =		'Quiz - Drywall Tools';
$string['ACT_QUIZ_FASTENING_TOOLS'] =		'Quiz - Fastening Tools';
$string['ACT_QUIZ_FLOOR_AND_WALLS'] =		'Study - Walls';
$string['ACT_QUIZ_FLOOR_FRAMING_CODE'] =	'Quiz - Floor Framing Code';
$string['ACT_QUIZ_FLOOR_FRAMING_MATERIALS'] =	'Quiz - Floor Frame Materials';
$string['ACT_QUIZ_FLOORING_1'] =		'Study - Ranch Floor';
$string['ACT_QUIZ_FLOORING_2'] =		'Study - Multilevel Floor';
$string['ACT_QUIZ_FRAMING_TOOLS'] = 		'Quiz - Metal Frame Tools';
$string['ACT_QUIZ_GABLE_ROOF'] =		'Study - Gable Roof';
$string['ACT_QUIZ_HIP_ROOF'] =			'Study - Hip Roof';
$string['ACT_QUIZ_INTERIOR_WALLS_AND_TRIM'] =	'Study - Interior Wall';
$string['ACT_QUIZ_MATERIAL_IDENTIFICATION'] =	'Quiz - Identify Materials 1';
$string['ACT_QUIZ_MULTILEVEL_REVIEW_1'] = 	'Study - Multilevel Review';
$string['ACT_QUIZ_RANCH_REVIEW_1'] = 		'Study - Ranch Review';
$string['ACT_QUIZ_ROOFING'] =			'Study - Shed Roof';
$string['ACT_QUIZ_ROOFING_FRAMING_BASICS'] =	'Quiz - Roof Framing Basics';
$string['ACT_QUIZ_ROOF_FINISHING'] = 		'Quiz - Roof Finishing';
$string['ACT_QUIZ_SHED_REVIEW_1'] =             'Study - Shed Review';
$string['ACT_QUIZ_SHED_S8'] = 			'Study - Safety Basics';
$string['ACT_QUIZ_STAIR_DETAILS'] =             'Quiz - Stair Details';
$string['ACT_QUIZ_STAIRS'] =			'Study - Stairs';
$string['ACT_QUIZ_SCAFFOLDING_SAFETY'] = 	'Study - Advanced Blueprint';
$string['ACT_QUIZ_TOOL_IDENTIFICATION_1'] =	'Quiz - Identify Tools 1';
$string['ACT_QUIZ_TOOL_IDENTIFICATION_2'] =	'Quiz - Identify Tools 2';
$string['ACT_QUIZ_TOOL_IDENTIFICATION_3'] =	'Quiz - Identify Tools 3';
$string['ACT_QUIZ_TOOL_MAINTAINING_1'] =	'Quiz - Maintain Tools 1';
$string['ACT_QUIZ_TOOL_MAINTAINING_2'] =	'Quiz - Identify Materials 2';
$string['ACT_QUIZ_TOOL_SAFETY'] =		'Quiz - Tool Safety';
$string['ACT_QUIZ_TOOLS'] =			'Quiz - Tools';
$string['ACT_QUIZ_VENTILATION'] = 		'Quiz - Ventilation & Insulation';
$string['ACT_QUIZ_WALL_FRAMING_BASICS'] =	'Quiz - Wall Framing Basics';
$string['ACT_QUIZ_WINDOW_AND_DOOR'] =		'Study - Insulation';
$string['ACT_QUIZ_SHED_WINDOW_DOOR_TEST'] = 	'Study - Shed Door';
$string['ACT_RANCH_SAFETY_SNAP'] =		'Safety - Ranch Interior';
$string['ACT_RANCH_SAFETY_SNAP_EXTERIOR'] =	'Safety - Ladders';
$string['ACT_SAFETY_SNAP'] =			'Safety - ML Work Area';
$string['ACT_SANDIT_DRYWALL'] =			'Install - Sanding';
$string['ACT_SHED_GRADEIT'] = 			'Grade Lumber 1';
$string['ACT_SHED_SAFETY'] = 			'Shed Safety';
$string['ACT_SMEARIT_MECHANICAL_JOINTING'] =	'Mechanical Jointing-Drywall';
$string['ACT_SPEED_SQUARE_READING'] = 		'Tool Reading - Speed Square';
$string['ACT_SYSTEM_TEST_WALL'] =		'Study - Ranch Wall';
$string['ACT_TAPE_READING'] =			'Tape Reading - Markings';
$string['ACT_TAPE_READING_BASIC'] =		'Tape Reading - Basic';
$string['ACT_TAPE_READING_DISTANCE'] =		'Tape Reading - Distance';
$string['ACT_TAPE_READING_STUDS'] =		'Tape Reading - Studs';
$string['ACT_TAPE_READING_REVIEW'] = 		'Tape Reading - Review';
$string['ACT_WORKSITE_SNAP'] =			'Final Worksite Review';

//-----------------------------
// Activity Type Translations
//-----------------------------
$string['ACTTYPE_ASSEMBLY'] = 	        'Frame';
$string['ACTTYPE_CALCULATE'] = 	        'Calculate';
$string['ACTTYPE_COMPLETION'] = 	'Completion';
$string['ACTTYPE_COVER'] = 	        'Cover';
$string['ACTTYPE_DECISION_SEQUENCE'] = 	'Decision Sequence';
$string['ACTTYPE_GRADING'] = 	        'Grade';
$string['ACTTYPE_IDENTIFICATION'] = 	'Identify';
$string['ACTTYPE_INSPECTION'] = 	'Inspect';
$string['ACTTYPE_INSTALL'] = 	        'Install';
$string['ACTTYPE_INTRODUCTION'] = 	'Introduction';
$string['ACTTYPE_LOADBEARING'] = 	'Loadbearing';
$string['ACTTYPE_MEASURE_AND_CUT'] = 	'Measure & Cut';
$string['ACTTYPE_MARKING_RAFTERS'] = 	'Mark Rafters';
$string['ACTTYPE_NONE'] = 	        'None';
$string['ACTTYPE_PROCEDURE'] = 	        'Procedure';
$string['ACTTYPE_SAFETY'] = 	        'Safety';
$string['ACTTYPE_SYSTEM_SUBTEST'] = 	'Study';
$string['ACTTYPE_TOOL_READING'] = 	'Tool Reading';
$string['ACTTYPE_OUTRO'] = 	        'Outro';

//-----------------------------
// Badge Translations
//-----------------------------
$string['BADGE_ALL_Assembly'] = 	'Completed All Frame Activities';
$string['BADGE_ALL_CalculateIt'] =  	'Completed All Calculate Activities';
$string['BADGE_ALL_CoverIt'] = 	        'Completed All Cover Activities';
$string['BADGE_ALL_Decision'] = 	'Completed All Decision Sequence Activities';
$string['BADGE_ALL_GradeIt'] = 	        'Completed All Grade Activities';
$string['BADGE_ALL_HandJointing'] = 	'Completed All Hand Jointing Activities';
$string['BADGE_ALL_Inspections'] = 	'Completed All Inspect Activities';
$string['BADGE_ALL_InstallIt'] = 	'Completed All Install Activities';
$string['BADGE_ALL_LoadBearing'] = 	'Completed All Loadbearing Activities';
$string['BADGE_ALL_MarkingRafter'] = 	'Completed All Mark Rafter Activities';
$string['BADGE_ALL_MeasureCut'] = 	'Completed All Measure & Cut Activities';
$string['BADGE_ALL_Procedure'] = 	'Completed All Procedure Activities';
$string['BADGE_ALL_Quiz'] = 	        'Completed All Study Activities';
$string['BADGE_ALL_Saftey'] = 	        'Completed All Safety Activities';
$string['BADGE_ALL_SandIt'] = 	        'Completed All Sanding Activities';
$string['BADGE_ALL_TapeReading'] = 	'Completed All Tape Reading Activities';
$string['BADGE_ALL_ToolReading'] = 	'Completed All Tool Reading Activities';
$string['BADGE_COMPLETE_1_TRY'] = 	'Completed On The First Try';
$string['BADGE_COMPLETE_TIME'] = 	'Completed In The Allotted Time';
$string['BADGE_EFFICIENTCOVERAGE'] = 	'Efficient Coverage';
$string['BADGE_LEASTWASTE'] = 	        'Least Amount of Waste';
$string['BADGE_LOCKED'] = 	        'Badge Locked';
$string['BADGE_MLH_Assembly'] = 	'Completed all Multilevel House Frame Activities';
$string['BADGE_MLH_CalculateIt'] = 	'Completed all Multilevel House Calculate Activities';
$string['BADGE_MLH_CoverIt'] = 	        'Completed all Multilevel House Cover Activities';
$string['BADGE_MLH_Decision'] = 	'Completed all Multilevel House Decision Activities';
$string['BADGE_MLH_GradeIt'] = 	        'Completed all Multilevel House Grade Activities';
$string['BADGE_MLH_HandJointing'] = 	'Completed all Multilevel House Hand Jointing Activities';
$string['BADGE_MLH_Identification'] = 	'Completed All Multilevel House Identify Activities';
$string['BADGE_MLH_Inspections'] = 	'Completed all Multilevel House Inspect Activities';
$string['BADGE_MLH_InstallIt'] = 	'Completed all Multilevel House Install Activities';
$string['BADGE_MLH_LoadBearing'] = 	'Completed all Multilevel House Loadbearing Activities';
$string['BADGE_MLH_MarkingRafter'] = 	'Completed all Multilevel House Mark Rafters Activities';
$string['BADGE_MLH_MeasureCut'] = 	'Completed all Multilevel House Measure & Cut Activities';
$string['BADGE_MLH_Procedure'] = 	'Completed all Multilevel House Procedure Activities';
$string['BADGE_MLH_Quiz'] = 	        'Completed all Multilevel House Study Activities';
$string['BADGE_MLH_Saftey'] = 	        'Completed all Multilevel House Safety Activities';
$string['BADGE_MLH_SandIt'] = 	        'Completed all Multilevel House Sanding Activities';
$string['BADGE_MLH_TapeReading'] = 	'Completed all Multilevel House Tape Reading Activities';
$string['BADGE_MLH_ToolReading'] = 	'Completed all Multilevel House Tool Reading Activities';
$string['BADGE_MLH_Tools'] = 	        'Unlocked All Tools';
$string['BADGE_PERFECT_PLACEMENT'] = 	'Perfect Placement';
$string['BADGE_PERFECTACCURACY'] = 	'Perfect Accuracy';
$string['BADGE_PERFECTCHOICES'] = 	'Perfect Choices';
$string['BADGE_PERFECTCUTS'] = 	        'Perfect Cuts';
$string['BADGE_PERFECTGRADING'] = 	'Perfect Grading';
$string['BADGE_PERFECTMEASUREMENTS'] = 	'Perfect Measurements';
$string['BADGE_RANCH_Assembly'] = 	'Completed All Ranch House Frame Activities';
$string['BADGE_RANCH_CalculateIt'] = 	'Completed All Ranch House Calculate Activities';
$string['BADGE_RANCH_CoverIt'] = 	'Completed All Ranch House Cover Activities';
$string['BADGE_RANCH_Decision'] = 	'Completed All Ranch House Decision Sequence Activities';
$string['BADGE_RANCH_GradeIt'] = 	'Completed All Ranch House Grade Activities';
$string['BADGE_RANCH_HandJointing'] = 	'Completed All Ranch House Hand Jointing Activities';
$string['BADGE_RANCH_Identification'] = 'Completed All Ranch House Identify Activities';
$string['BADGE_RANCH_Inspections'] = 	'Completed All Ranch House Inspect Activities';
$string['BADGE_RANCH_InstallIt'] = 	'Completed All Ranch House Install Activities';
$string['BADGE_RANCH_LoadBearing'] = 	'Completed All Ranch House Loadbearing Activities';
$string['BADGE_RANCH_MarkingRafter'] = 	'Completed All Ranch House Mark Rafters Activities';
$string['BADGE_RANCH_MeasureCut'] = 	'Completed All Ranch House Measure & Cut Activities';
$string['BADGE_RANCH_Procedure'] = 	'Completed All Ranch House Procedure Activities';
$string['BADGE_RANCH_Quiz'] = 	        'Completed All Ranch House Study Activities';
$string['BADGE_RANCH_Saftey'] = 	'Completed All Ranch House Safety Activities';
$string['BADGE_RANCH_SandIt'] = 	'Completed All Ranch House Sanding Activities';
$string['BADGE_RANCH_TapeReading'] = 	'Completed All Ranch House Tape Reading Activities';
$string['BADGE_RANCH_ToolReading'] = 	'Completed All Ranch House Tool Reading Activities';
$string['BADGE_RANCH_Tools'] = 	        'Unlocked All Ranch House Tools';
$string['BADGE_SHED_Assembly'] = 	'Completed All Shed Frame Activities';
$string['BADGE_SHED_CalculateIt'] = 	'Completed All Shed Calculate Activities';
$string['BADGE_SHED_CoverIt'] = 	'Completed All Shed Cover Activities';
$string['BADGE_SHED_Decision'] = 	'Completed All Shed Decision Sequence Activities';
$string['BADGE_SHED_GradeIt'] = 	'Completed All Shed Grade Activities';
$string['BADGE_SHED_HandJointing'] = 	'Completed All Shed Hand Jointing Activities';
$string['BADGE_SHED_Identification'] = 	'Completed All Shed Identify Activities';
$string['BADGE_SHED_Inspections'] = 	'Completed All Shed Inspect Activities';
$string['BADGE_SHED_InstallIt'] = 	'Completed All Shed Install Activities';
$string['BADGE_SHED_LoadBearing'] = 	'Completed All Shed Loadbearing Activities';
$string['BADGE_SHED_MarkingRafter'] = 	'Completed All Shed Mark Rafters Activities';
$string['BADGE_SHED_MeasureCut'] = 	'Completed All Shed Measure & Cut Activities';
$string['BADGE_SHED_Procedure'] = 	'Completed All Shed Procedure Activities';
$string['BADGE_SHED_Quiz'] = 	        'Completed All Shed Study Activities';
$string['BADGE_SHED_Saftey'] = 	        'Completed All Shed Safety Activities';
$string['BADGE_SHED_SandIt'] = 	        'Completed All Shed Sanding Activities';
$string['BADGE_SHED_TapeReading'] = 	'Completed All Shed Tape Reading Activities';
$string['BADGE_SHED_ToolReading'] = 	'Completed All Shed Tool Reading Activities';
$string['BADGE_SHED_Tools'] = 	        'Unlocked All Shed Tools';
$string['BADGE_UM_GRADE0'] = 	        'You graded all pieces correctly!';
$string['BADGE_UM_INSPECTION0'] = 	'You identified all parts correctly!';
$string['BADGE_UM_INSPECTION1'] = 	'You found all the defects!';
$string['BADGE_UM_LEASTWASTE0'] = 	'You produced the least amount of waste!';
$string['BADGE_UM_MARKRAFTER0'] = 	'You marked a rafter perfectly!';
$string['BADGE_UM_MEASUREDCUT0'] = 	'You made all perfect length cuts!';
$string['BADGE_UM_QUIZ0'] = 	        'You answered every question correctly!';
$string['BADGE_WALL_EARNED'] = 	        'Earned:';