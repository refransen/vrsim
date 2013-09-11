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
$string['SYSTEM_CONCRETE_FORMS'] = 	'Concrete Forms';
$string['SYSTEM_DEMO'] = 		'Demo';
$string['SYSTEM_DRYWALL'] = 		'Drywall';
$string['SYSTEM_FLOOR'] = 		'Floor';
$string['SYSTEM_FLOORS_AND_WALLS'] = 	'Floors & Walls';
$string['SYSTEM_INTRODUCTION'] = 	'Introduction';
$string['SYSTEM_ROOF'] = 		'Roof';
$string['SYSTEM_STAIRS'] = 		'Stairs';
$string['SYSTEM_WALL_AND_CEILING'] = 	'Wall & Ceiling';
$string['SYSTEM_WINDOW_AND_DOOR'] = 	'Window & Door';
$string['SYSTEM_WORKSITE_PREPARATION'] = 'Worksite Preparation';
$string['SYSTEM_WORKSITE_REVIEW'] = 	'Worksite Review';

//-----------------------------
// Work order Translations
//-----------------------------
$string['WO_BASIC_BLUEPRINT'] =		'Basic Blueprint';
$string['WO_BUILD_CONCRETE_FORMS'] =	'Build Forms';
$string['WO_BUILD_EXTERIOR_WALL'] =	'Build Wall';
$string['WO_BUILD_INTERIOR_WALL'] =	'Build Partitions';
$string['WO_BUILD_WALL_SECTION'] =	'Build Wall Part';
$string['WO_CONSTRUCTION_MATH'] =       'Construction Math';
$string['WO_CUT_STUDS_AND_TRIMMERS'] =	'Cut Studs';
$string['WO_DRYWALL'] =			'Drywall Prep';
$string['WO_DRYWALL_FINISH'] =		'Drywall Finish';
$string['WO_FINISH_EXTERIOR_WALL'] =	'Finish Wall';
$string['WO_FINISH_ROOF'] =		'Finish Roof';
$string['WO_FRAME_CEILING'] =		'Frame Ceiling';
$string['WO_FRAME_FLOOR'] =		'Frame Floor';
$string['WO_FRAME_GABLE_ROOF'] =	'Frame Gable Roof';
$string['WO_FRAME_HIP_ROOF'] =		'Frame Hip Roof';
$string['WO_FRAME_INTERIOR_WALL'] =	'Frame Interior Wall';
$string['WO_FRAME_SHED_ROOF'] =		'Frame Shed Roof';
$string['WO_FRAME_STAIRS'] =		'Frame Stairs';
$string['WO_HAND_TOOLS'] =		'Hand Tools';
$string['WO_HANG_DOOR_ON_FRAME'] =	'Hang Door';
$string['WO_INTRODUCTION_SHED'] = 	'Introduction Shed';
$string['WO_INTRODUCTION_RANCH'] = 	'Introduction Ranch';
$string['WO_INDTRODUCTION_MLH'] = 	'Introduction Multilevel';
$string['WO_INSTALL_INSULATION'] =	'Install Insulation';
$string['WO_INSTALL_WINDOW'] =		'Install Window';
$string['WO_INSTALL_WINDOWS'] =		'Install Windows';
$string['WO_INSULATE_ROOF'] = 		'Frame Hip Roof';
$string['WO_LAYOUT_FLOOR'] =		'Layout Floor';
$string['WO_PLAN_GABLE_ROOF'] =		'Plan Roof';
$string['WO_PLAN_STAIRS'] = 		'Plan Stairs';
$string['WO_READ_BLUEPRINT'] =		'Read Blueprint';
$string['WO_REVIEW_WORKSITE'] =		'Review Site';
$string['WO_SETUP_WORK_AREA'] =		'Setup Work Area';
$string['WO_SYSTEM_TEST_DOOR'] =	'Door/Window Test';
$string['WO_SYSTEM_TEST_DOOR_AND_WINDOW'] =	'Door/Window Test';
$string['WO_SYSTEM_TEST_DRYWALL'] =		'Drywall Test';
$string['WO_SYSTEM_TEST_FLOOR'] =		'Floor Test';
$string['WO_SYSTEM_TEST_FORMS'] =		'Forms Test';
$string['WO_SYSTEM_TEST_HIP_ROOF'] =		'Hip Roof Test';
$string['WO_SYSTEM_TEST_INTERIOR_WALL'] =	'Interior Wall Test';
$string['WO_SYSTEM_TEST_ROOF'] =		'Roof Test';
$string['WO_SYSTEM_TEST_STAIRS'] =		'Stairs Test';
$string['WO_SYSTEM_TEST_WALL'] =		'Wall Test';
$string['WO_TAPE_AND_MATH'] =			'Building Math';
$string['WO_TOOL_AND_MATERIAL_IDENTIFICATION']= 'Tools & Materials';
$string['WO_TRIM_WALL_AND_FLOOR'] =		'Trim Interior';
$string['WO_WORKSITE_WALKTHROUGH'] =		'Safety Check';

//-----------------------------
// Activity Translations
//-----------------------------
$string['ACT_CALCIT_CEILING_MATERIALS'] = 	'Calculate It - Ceiling Materials';
$string['ACT_CALCIT_COMMON_RAFTER'] = 		'Calculate - Common Rafter';
$string['ACT_CALCIT_CONSTRUCTION_MATH_1'] = 	'Calculate - Building Math 1';
$string['ACT_CALCIT_CONSTRUCTION_MATH_2'] = 	'Calculate - Building Math 2';
$string['ACT_CALCIT_DOOR_OPENING'] = 		'Calculate - Door Opening';
$string['ACT_CALCIT_DRYWALL'] = 		'Calculate - Drywall Material';
$string['ACT_CALCIT_EXTERIOR_DRYWALL_MATERIALS'] = 'Calculate - Drywall Exterior';
$string['ACT_CALCIT_FLOOR_MATERIALS_1'] = 	'Calculate - Floor Materials 1';
$string['ACT_CALCIT_FLOOR_MATERIALS_2'] = 	'Calculate - Floor Materials 2';
$string['ACT_CALCIT_GIRDERS_AND_JOISTS'] = 	'Calculate - Floor Bridging';
$string['ACT_CALCIT_INTERIOR_DRYWALL_MATERIALS'] = 'Calculate - Drywall Interior';
$string['ACT_CALCIT_RAFTERS'] = 		'Calculate - Hip Rafters';
$string['ACT_CALCIT_RISE_AND_RUN'] = 		'Calculate - Rise & Run';
$string['ACT_CALCIT_ROOF_MATERIALS'] = 		'Calculate - Roofing Material';
$string['ACT_CALCIT_STUDS_AND_TRIMMERS'] = 	'Calculate - Stud Length';
$string['ACT_CALCIT_STAIR_NUMBER'] = 		'Calculate - Stair Number';
$string['ACT_CALCIT_TRIM'] = 			'Calculate - Interior Trim';
$string['ACT_CALCIT_WALL_MATERIALS_1'] =	'Calculate - Wall Materials 1';
$string['ACT_CALCIT_WALL_MATERIALS_2'] =	'Calculate - Wall Materials 2';
$string['ACT_CALCIT_WEATHER_STRIPPING_AND_INSULATION'] = 'Calculate - Weatherproofing';
$string['ACT_CALCIT_UNIT_RISE_AND_RUN'] = 		'Calculate - Unit Rise & Run';
$string['ACT_COVERIT_DRYWALL'] =		'Cover - Drywall';
$string['ACT_COVERIT_INSULATION'] =		'Cover - Insulation';
$string['ACT_COVERIT_PLYWOOD'] =		'Cover - Plywood Floor';
$string['ACT_COVERIT_SHEATHING'] =		'Cover - Roof Sheathing';
$string['ACT_COVERIT_SHINGLES'] =		'Cover - Shingle Roof';
$string['ACT_CUT_SCENE_INTRO_SHED'] = 		'Shed Introduction';
$string['ACT_CUT_SCENE_INTRO_RANCH'] = 		'Ranch Introduction';
$string['ACT_CUT_SCENE_INTRO_MULTIL'] =		'Multilevel Introduction';
$string['ACT_DECISION_TREE_DOOR_SHED'] =	'Decisions - Shed Door';
$string['ACT_DECISION_TREE_FLOOR'] =		'Decisions - Floor Frame';
$string['ACT_DECISION_TREE_RANCH_DOOR'] =	'Decisions - Ranch Door';
$string['ACT_DECISION_TREE_RANCH_WINDOW'] =	'Decisions - Ranch Window';
$string['ACT_DECISION_TREE_WINDOW'] =		'Decisions - Shed Window';
$string['ACT_FRAME_CEILING'] =			'Frame - Ceiling';
$string['ACT_FRAME_FORMS'] =			'Frame Assembly - Concrete Forms';
$string['ACT_FRAME_GABLE_ROOF'] =		'Frame - Gable Roof';
$string['ACT_FRAME_GABLE_ROOF_REVIEW'] = 	'Frame - Gable Roof Review';
$string['ACT_FRAME_HIP_ROOF'] =			'Frame - Hip Roof';
$string['ACT_FRAME_METAL_STUDS'] =		'Frame - Metal Stud Wall';
$string['ACT_FRAME_RANCH_FLOOR'] =		'Frame - Ranch Floor';
$string['ACT_FRAME_RANCH_WALL'] =		'Frame Assembly - Ranch Wall';
$string['ACT_FRAME_ROOF'] = 			'Frame- Roof';
$string['ACT_FRAME_READING'] = 			'Tape Reading - Framing Square';
$string['ACT_FRAME_SAWHORSE'] =			'Frame - Sawhorse';
$string['ACT_FRAME_SCAFFOLDING'] =		'Frame - Scaffolding';
$string['ACT_FRAME_SHED_ROOF'] =		'Frame - Shed Roof';
$string['ACT_FRAME_TRIM'] =			'Frame - Interior Trim';
$string['ACT_FRAME_WALL'] =			'Frame - Wall';
$string['ACT_FRAME_WALL_REVIEW'] = 		'Frame - Wall Review';
$string['ACT_GRADEIT_LUMBER'] =			'Grade It - Lumber';
$string['ACT_GRADEIT_LUMBER2'] =                'Grade It - Lumber';
$string['ACT_INSPECTION_CEILING'] =		'Inspect - Ceiling Frame';
$string['ACT_INSPECTION_DRYWALL'] =		'Inspect - Drywall Panels';
$string['ACT_INSPECTION_DRYWALL_FINISHING'] =	'Inspect - Drywall Finishing';
$string['ACT_INSPECTION_METAL_FRAME'] =		'Inspect - Metal Frame Wall';
$string['ACT_INSPECTION_MULTILEVEL_ROOF'] =	'Inspect - Multilevel Roof';
$string['ACT_INSPECTION_R5'] =			'Inspect - Floor';
$string['ACT_INSPECTION_R5_REVIEW'] = 		'Inspect - Floor Review';
$string['ACT_INSPECTION_R7'] =			'Inspect - Wall Frame';
$string['ACT_INSPECTION_R8'] =			'Inspect - Wall Partition';
$string['ACT_INSPECTION_ROOF_FINISH_PARTS'] = 	'Identification - Roof Finishing';
$string['ACT_INSPECTION_STAIRS'] =		'Inspect - Stairs';
$string['ACT_INSPECTION_STAIRS_REVIEW'] = 	'Inspect - Stairs Review';
$string['ACT_INSPECTION_TRIM'] = 		'Inspect - Trim Defects';
$string['ACT_INSTALL_TRIM'] = 			'Install It - Trim';
$string['ACT_INSTALLIT_INSULATION'] =		'Install - Insulation';
$string['ACT_INSTALLIT_LEVEL'] =		'Install - Level';
$string['ACT_INSTALLIT_NAILING'] =		'Install  - Nail Frame';
$string['ACT_INSTALLIT_RANCH_HINGES'] =		'Install - Door Hinges';
$string['ACT_INSTALLIT_RANCH_LEVEL'] =		'Install - Ranch Window';
$string['ACT_INSTALLIT_SHED_LOCK'] =		'Install - Door Lock';
$string['ACT_INSTALLIT_SHINGLES'] = 		'Install - Shingle Roof';
$string['ACT_INSTALLIT_SHINGLES_REVIEW'] = 	'Install - Shingling Review';
$string['ACT_INSTALLIT_WEATHER_STRIPPING'] =	'Install It - Weather Stripping';
$string['ACT_JOINTIT_DRYWALL'] =		'Hand Jointing - Drywall';
$string['ACT_LOADBEARING'] =			'Loadbearing';
$string['ACT_LOADBEARING_GABLE_ROOF'] =		'Loadbearing - Gable Roof';
$string['ACT_LOADBEARING_M5'] =			'Loadbearing - Multilevel Beams';
$string['ACT_LOADBEARING_M8'] =			'Loadbearing - Multileve Roof';
$string['ACT_LOADBEARING_M3'] = 		'Loadbearing - Multilevel Floor';
$string['ACT_LOADBEARING_RANCH_WALL'] =		'Loadbearing - Ranch Wall';
$string['ACT_LOADBEARING_ROOF'] =		'Loadbearing - Roof';
$string['ACT_LOADBEARING_SHED_ROOF'] =		'Loadbearing - Shed Roof';
$string['ACT_LOADBEARING_SHED_WALL'] =		'Loadbearing - Shed Wall';
$string['ACT_MARKING_RAFTERS_MULTILEVEL_ROOF']= 'Mark Rafters - Hip Roof';
$string['ACT_MARKING_RAFTERS_RANCH_ROOF'] =	'Mark Rafters - Gable Roof';
$string['ACT_MARKING_RAFTERS_STAIRS'] =		'Mark Rafters - Stair Treads';
$string['ACT_MATERIAL_SNAP'] =			'Identify Building Materials';
$string['ACT_MEASURECUT_ANGLES'] =		'Measure & Cut  - Angle Cut';
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
$string['ACT_QUIZ_ANGLES'] = 			'Quiz - Angles and Lengths';
$string['ACT_QUIZ_BLUEPRINT_BASICS'] =		'Quiz - Blueprint Basics';
$string['ACT_QUIZ_BLUEPRINT_BASICS_1'] =	'Quiz - Shed Blueprint';
$string['ACT_QUIZ_BLUEPRINT_BASICS_2'] =	'Quiz - Ranch Blueprint';
$string['ACT_QUIZ_BLUEPRINT_DIMENSIONS'] =	'Quiz - Blueprint Dimensions';
$string['ACT_QUIZ_BUILDING_CODES'] = 		'Quiz - Building Codes';
$string['ACT_QUIZ_CONCRETE_FORM_MATERIALS'] =	'Quiz - Forms Materials';
$string['ACT_QUIZ_CONCRETE_FORMS'] =		'System Test - Forms';
$string['ACT_QUIZ_DOOR_AND_WINDOW'] =		'System Test - Door/Window';
$string['ACT_QUIZ_DRYWALL'] =			'System Test - Drywall';
$string['ACT_QUIZ_DRYWALL_MATERIALS'] =		'Quiz - Drywall Materials';
$string['ACT_QUIZ_DRYWALL_TOOLS'] =		'Quiz - Drywall Tools';
$string['ACT_QUIZ_FASTENING_TOOLS'] =		'Quiz - Floor Fasteners';
$string['ACT_QUIZ_FLOOR_AND_WALLS'] =		'System Test - Floor & Walls';
$string['ACT_QUIZ_FLOOR_FRAMING_CODE'] =	'Quiz - Floor Framing Code';
$string['ACT_QUIZ_FLOOR_FRAMING_MATERIALS'] =	'Quiz - Floor Frame Materials';
$string['ACT_QUIZ_FLOORING_1'] =		'System Test - Ranch Floor';
$string['ACT_QUIZ_FLOORING_2'] =		'System Test - ML Floor';
$string['ACT_QUIZ_FRAMING_TOOLS'] = 		'Quiz - Framing Tools';
$string['ACT_QUIZ_GABLE_ROOF'] =		'System Test - Gable Roof';
$string['ACT_QUIZ_HIP_ROOF'] =			'System Test - Hip Roof';
$string['ACT_QUIZ_INTERIOR_WALLS_AND_TRIM'] =	'Quiz - Interior Finishing';
$string['ACT_QUIZ_MATERIAL_IDENTIFICATION'] =	'Quiz - Identify Materials';
$string['ACT_QUIZ_MULTILEVEL_REVIEW_1'] = 	'Quiz - Multilevel Review';
$string['ACT_QUIZ_RANCH_REVIEW_1'] = 		'Quiz - Ranch Review';
$string['ACT_QUIZ_ROOFING'] =			'System Test - Shed Roof';
$string['ACT_QUIZ_ROOFING_FRAMING_BASICS'] =	'Quiz - Roof Framing Basics';
$string['ACT_QUIZ_ROOF_FINISHING'] = 		'Quiz - Roof Finishing';
$string['ACT_QUIZ_SHED_REVIEW_1'] =             'Quiz - Shed Review';
$string['ACT_QUIZ_STAIR_DETAILS'] =             'Quiz - Stair Details';
$string['ACT_QUIZ_STAIRS'] =			'System Test - Stairs';
$string['ACT_QUIZ_SAFETY_BASICS'] =             'Quiz - Safety Basics';
$string['ACT_QUIZ_TOOL_IDENTIFICATION_1'] =	'Quiz - Identify Tools 1';
$string['ACT_QUIZ_TOOL_IDENTIFICATION_2'] =	'Quiz - Identify Tools 2';
$string['ACT_QUIZ_TOOL_IDENTIFICATION_3'] =	'Quiz - Identify Tools 3';
$string['ACT_QUIZ_TOOL_MAINTAINING_1'] =	'Quiz - Maintain Tools 1';
$string['ACT_QUIZ_TOOL_MAINTAINING_2'] =	'Quiz - Maintain Tools 2';
$string['ACT_QUIZ_TOOL_SAFETY'] =		'Quiz - Tool Safety';
$string['ACT_QUIZ_TOOLS'] =			'Quiz - Tools';
$string['ACT_QUIZ_VENTILATION'] = 		'Quiz - Ventilation & Insulation';
$string['ACT_QUIZ_WALL_FRAMING_BASICS'] =	'Quiz - Wall Framing Basics';
$string['ACT_QUIZ_WINDOW_AND_DOOR'] =		'Quiz - Window and Door';
$string['ACT_RANCH_SAFETY_SNAP'] =		'Safety - Ranch Interior';
$string['ACT_RANCH_SAFETY_SNAP_EXTERIOR'] =	'Safety - Ranch Exterior';
$string['ACT_SAFETY_SNAP'] =			'Safety - ML Work Area';
$string['ACT_SANDIT_DRYWALL'] =			'Sand - Drywall';
$string['ACT_SHED_SAFETY_SNAP'] =		'Safety - Shed Work Area';
$string['ACT_SMEARIT_MECHANICAL_JOINTING'] =	'Mechanical Jointing-Drywall';
$string['ACT_SPEED_SQUARE_READING'] = 		'Tape Reading - Speed Square';
$string['ACT_SYSTEM_TEST_WALL'] =		'System Test - Wall';
$string['ACT_TAPE_READING'] =			'Tape Reading - Markings';
$string['ACT_TAPE_READING_BASIC'] =		'Tape Reading - Basic';
$string['ACT_TAPE_READING_DISTANCE'] =		'Tape Reading - Distance';
$string['ACT_TAPE_READING_STUDS'] =		'Tape Reading - Studs';
$string['ACT_TAPE_READING_REVIEW'] = 		'Tape Reading - Review';
$string['ACT_TOOLBOX'] = 			'ToolBox';
$string['ACT_WORKSITE_SNAP'] =			'Final Worksite Review';

//-----------------------------
// Badge Translations
//-----------------------------
$string['BADGE_COMPLETE_1_TRY'] = 	'Completed on the first try';
$string['BADGE_COMPLETE_TIME'] = 	'Completed in the allotted time';
$string['BADGE_EFFICIENTCOVERAGE'] =	'Efficient Coverage';
$string['BADGE_HAMMER'] =		'Assemble Master\nComplete an Assemble activity in 30 seconds or less.\nEarned: 6/22/13';
$string['BADGE_LEASTWASTE'] =		'Least amount of waste';
$string['BADGE_LOCKED'] =		'Badge Locked';
$string['BADGE_PERFECTACCURACY'] =	'Perfect Accuracy';
$string['BADGE_PERFECTCHOICES'] =	'Perfect Choices';
$string['BADGE_PERFECTCUTS'] =		'Perfect Cuts';
$string['BADGE_PERFECTGRADING'] =	'Perfect Grading';
$string['BADGE_PERFECTMEASUREMENTS'] =	'Perfect Measurements';
$string['BADGE_PERFECT_PLACEMENT'] = 	'Perfect Placement';
$string['BADGE_SAW'] =			'Fastest Saw in the West\nSawhorse in 20 seconds or less.';
$string['BADGE_TAPE'] =			'Tape Ace\nBasics with zero incorrect choices.';
$string['BADGE_UM_GRADE0'] =		'You graded all pieces correctly!';
$string['BADGE_UM_INSPECTION0'] =	'You identified all parts correctly!';
$string['BADGE_UM_INSPECTION1'] =	'You have found all the defects!';
$string['BADGE_UM_LEASTWASTE0'] =	'You have produced the least amount of waste!';
$string['BADGE_UM_MARKRAFTER0'] =	'You have marked a rafter perfectly!';
$string['BADGE_UM_MEASUREDCUT0'] =	'You have made all perfect length cuts!';
$string['BADGE_UM_QUIZ0'] =		'You answered every question correctly!';
$string['BADGE_WALL_EARNED'] =		'Earned:';