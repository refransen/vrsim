<?php
/////////////////////////////////////////////////////////////////////
// Progress Report
//
// This is the main file that displays the progress report within
// the SBC TEACHER page 
/////////////////////////////////////////////////////////////////////
require_once('../../../config.php');
require_once('../lib.php');

//CSS
$PAGE->requires->css('/local/simbuild/teacher/progressreport.css');
$PAGE->requires->js('/local/simbuild/teacher/progressreport.js');
$PAGE->requires->js('/local/spin.js');

//--------------------
//   CREATE LOGIN
//--------------------
$id = required_param('id', PARAM_INT);   // course
if (!$course = $DB->get_record('course', array('id'=>$id))) {
    print_error('invalidcourseid');
}
require_course_login($course);
$PAGE->set_pagelayout('incourse');
$context = context_course::instance($course->id);

//--------------------
// Connect to the external database
//--------------------
global $SBC_DB;

$db_class = get_class($DB);
$SBC_DB = new $db_class(); // instantiate a new object of the same class as the original $DB
$SBC_DB->connect($CFG->sbc_dbhost, $CFG->sbc_dbUser, $CFG->sbc_dbPass, $CFG->sbc_dbName, false);

//--------------------
//   SET UP THIS PAGE
//--------------------
$PAGE->set_title("Progress Report");
$PAGE->set_heading("Progress Report");
$PAGE->set_url($CFG->wwwroot.'/local/simbuild/teacher/progressreport.php');

//--------------------
//  FILTER ACTIONS
//--------------------
$reportType = optional_param('report', 'overview', PARAM_ALPHA);    	// which report to display
$academicType = optional_param('academic', '0', PARAM_INT);		// Which academic skill to display (construction / academic skills only)
$constructType = optional_param('construction', '0', PARAM_INT);	// Which construction skill to display (construction / academic skills only)
$viewType = optional_param('view', 'class', PARAM_ALPHA);            	// which view to show, class or student
$className = optional_param('class', '0', PARAM_INT);            	// which class to show

//  EXTRA VARIABLES
$worksite = optional_param('worksite', 'shed', PARAM_ALPHA);

//--------------------
// Get the students for this course
//--------------------
$studentOptions = getStudents($className, $course->id);

//--------------------
// Create last filter option for single student
//--------------------
reset($studentOptions);
$firstID = key($studentOptions);
$selectedStudentID = $firstID;
$studentID = optional_param('student', $firstID, PARAM_INT);        // which student to display

// Find the actual selected student id
foreach($studentOptions as $key=>$value) {
     if($key == $studentID) {    
         $selectedStudentID = $key; break; 
     }
}

//--------------------
// Echo extra javascripts for the graphs
//--------------------
echo '
<script src="/local/RGraph/libraries/RGraph.common.core.js "></script>
<script src="/local/RGraph/libraries/RGraph.common.dynamic.js "></script>
<script src="/local/RGraph/libraries/RGraph.common.effects.js "></script>
<script src="/local/RGraph/libraries/RGraph.common.tooltips.js "></script>
<script src="/local/RGraph/libraries/RGraph.drawing.yaxis.js "></script>
<script src="/local/RGraph/libraries/RGraph.line.js "></script>
<script src="/local/RGraph/libraries/RGraph.bar.js "></script>
';

echo $OUTPUT->header();

////////////////////////////////////////
// Populate the filter boxes
////////////////////////////////////////
if($reportType == 'skills')  {
    $viewType = 'class';
}
else if($reportType !== 'overview')
{  $viewType = 'student'; }

$reportOptions = array(
   'overview' => 'Overview',
   'skills' => 'Class Skills',
   'construction' =>'Construction Skills',
   'academic' => 'Academic Skills'
);
$reportForm = 'Choose Report: ' . $OUTPUT->single_select(new moodle_url('/local/simbuild/teacher/progressreport.php', 
          array('id'=>$id, 'class'=>$className, 'student'=>$studentID)), 'report', $reportOptions, 
          $selected = $reportType, '', $formid = 'fnreport');

//--------------------
// Get the skills
//--------------------
$constructOptions = array();
$constructIDs = array();
$myType = "Building";
if($results = $SBC_DB->get_records_sql("SELECT * FROM {skill} myskill WHERE myskill.Type = ?", array($myType)))
{
    foreach($results as $singleResult)  {
    	//FIX: Evetually remove concrete forms from the db
    	if($singleResult->desc !== "Concrete Forms")  {
            $constructOptions[] = get_string($singleResult->desc, "theme_simbuild");
            $constructIDs[] = $singleResult->idskill;
        }
    }
}
$constructForm = 'Choose Skill: '.$OUTPUT->single_select(new moodle_url('/local/simbuild/teacher/progressreport.php',
	array('id'=>$id, 'construction'=>$constructType, 'report'=>$reportType, 'class'=>$className, 'student'=>$studentID)), 'construction', 
	$constructOptions, $selected=$constructType, '', $formid='fnconstruct');

$academicOptions = array();
$academicIDs = array();
$myType = "Academic";
if($results = $SBC_DB->get_records_sql("SELECT * FROM {skill} myskill WHERE myskill.Type = ?", array($myType)))
{
    foreach($results as $singleResult)  {    	
        $academicOptions[] = get_string($singleResult->desc, "theme_simbuild");
        $academicIDs[] = $singleResult->idskill; 
    }
}

$academicForm = 'Choose Skill: '.$OUTPUT->single_select(new moodle_url('/local/simbuild/teacher/progressreport.php',
	array('id'=>$id, 'academic'=>$academicType, 'report'=>$reportType, 'class'=>$className, 'student'=>$studentID)), 'academic', 
	$academicOptions, $selected=$academicType, '', $formid='fnacademic');

//--------------------
// Get all the classes (groups)
//--------------------
$classOptions = getClasses($course->id); //array();
$classForm = 'Choose Class: ' . $OUTPUT->single_select(new moodle_url('/local/simbuild/teacher/progressreport.php', 
          array('id'=>$id, 'report'=>$reportType, 'student'=>$studentID)), 'class', 
          $classOptions, $selected = $className, '', $formid = 'fnclass');

$viewOptions = array(
   'class' => 'Class',
   'student' => 'Student'
);
$viewForm = 'Choose View: ' . $OUTPUT->single_select(new moodle_url('/local/simbuild/teacher/progressreport.php', 
          array('id'=>$id, 'report'=>$reportType, 'class'=>$className, 'student'=>$studentID)), 'view', 
          $viewOptions, $selected = $viewType, '', $formid = 'fnview');


$studentForm = 'Choose Student: ' . $OUTPUT->single_select(new moodle_url('/local/simbuild/teacher/progressreport.php', 
          array('id'=>$id, 'report'=>$reportType, 'class'=>$className)), 'student', 
          $studentOptions, $selected = $studentID , '', $formid = 'fnstudent');

////////////////////////////////////////
// Print the filter boxes
////////////////////////////////////////
echo '<div class="filterBox" >'.$classForm.'</div>';
if($viewType == 'student')  {
    echo '<div class="filterBox" >'.$studentForm.'</div>';
}
/*
if($reportType === 'overview')  {
    echo '<div class="filterBox" >'.$viewForm.'</div>';
}*/
echo '<div class="filterBox" >'.$reportForm.'</div>';
if($reportType === 'construction')  {
    echo '<div class="filterBox">'.$constructForm.'</div>';
}else if($reportType === 'academic') {
    echo '<div class="filterBox">'.$academicForm.'</div>';
}

////////////////////////////////////////
// Get block info
////////////////////////////////////////

// Get the title of the block
$blockTitle = "Progress Report";
switch($reportType)
{
    case 'overview':
    {
        if($viewType == 'class')
        { $blockTitle = 'Class Progress Report'; } 
        else
        { $blockTitle = 'Student Progress Report'; }
    }break;
    case 'skills':
    {
        $blockTitle = "Class Skills Report";
    }break;
    case 'construction':
    {
        $blockTitle = 'Construction Skills Report';
    }break;
    case 'academic':
    {
        $blockTitle = 'Academic Skills Report';
    }break;
}

////////////////////////////////////////
// Create the html of the content
////////////////////////////////////////
echo 
'<div class="block classoverview" >
    <div class="header">
        <div class="title">
            <div class="block_action" onclick="toggleBlock()">
            	<img class="block-hider-hide" id="hideblock" tabindex="0" alt="Hide Report" title="Hide Report" 
            		src="/theme/simbuild/pix_core/t/switch_minus.png" />
            	<img class="block-hider-show" id="showblock" tabindex="0" alt="Show Report" title="Show Report" 
            		src="/theme/simbuild/pix_core/t/switch_plus.png" />
            </div>
            <h2>'.$blockTitle.'</h2>
        </div>
    </div>
    <div class="content" >
    	<div class="no-overflow" id="reportcontent">';

////////////////////////////////////////
// add logic for each report type
////////////////////////////////////////    
    switch($reportType)
    {
    	case 'overview':
    	{
    	    if($viewType == 'class')  
    	    {
                    $finalID = json_encode($course->id);
                    $finalSort = htmlspecialchars(json_encode('student'), ENT_COMPAT);
                    $finalProgSort = htmlspecialchars(json_encode('progress'), ENT_COMPAT);
                    $finalTimeSort = htmlspecialchars(json_encode('time'), ENT_COMPAT);
                    $finalLearnSort = htmlspecialchars(json_encode('learn'), ENT_COMPAT);
                    $finalClassName = htmlspecialchars(json_encode($className), ENT_COMPAT);
                 
		    echo '<table class="overviewtable" id="overviewtable">
		    <tr>
		        <th>Student Name <div class="downarrow" onclick="sortStudents(this,'.$finalSort.','.$finalClassName.')" ></div></th>
		        <th class="progressth" >Worksite Progress
		        <div class="downarrow" onclick="sortStudents(this,'.$finalProgSort.','.$finalClassName.')"></div>
		            <div class="siteimages" >   
		                <div class="shed"></div>
		                <div class="ranch"></div>
		                <div class="multilevel"></div>
		            </div>
		        </th>
		        <th>Time Spent  <div class="downarrow" onclick="sortStudents(this,'.$finalTimeSort.','.$finalClassName.')"></div></th>
		        <th>Learning Momentum  <div class="downarrow" onclick="sortStudents(this,'.$finalLearnSort.','.$finalClassName.')"></div></th>
		    </tr>';
		    
		    foreach($studentOptions as $key=>$value)
		    {
		    	$student = $value;
		    	$studentID = $key;
		    	
		        echo '<tr><td><p class="studentname" >'.$student.'</p></td>';
		        
		        $siteProgress = calculate_siteprogress($studentID);
		        echo '<td><p class="siteprogress" style="width:'.$siteProgress.'%;"></p>'; // <div class="sitestripes" ></div></td>
		        echo '<td><p class="timeworked" >';
		        
		        $totalSeconds = calculate_totalTimeSpent($studentID);	
		        $hours = floor($totalSeconds / 3600);
			$minutes = floor(($totalSeconds / 60) % 60);
			$seconds = $totalSeconds % 60;
			$newTime = sprintf("%2d : %02d : %02d", $hours, $minutes, $seconds);
                        echo $newTime.'</p></td>';
		        
		        $learnProgress = calculate_totalProfLearnMom($studentID); 
		      
		        $arrowProgress = $learnProgress - 5;
		        $learnColor = '#85d52f';
		        if($learnProgress <= 25)  {
		             $learnColor = '#f06359';
		        } else if($learnProgress > 25 && $learnProgress <= 50)  {
		             $learnColor = '#f5d83e';
		        }
		        
		        echo '
		        <td><div class="chartbox" >
		            <img src="/theme/simbuild/pix/progressreport/orange_arrow_up.png" style="left:'.$arrowProgress.'%;" />
		            <div class="learnprogress" style="width:'.$learnProgress.'%;background-color:'.$learnColor.';"></div>
		            <div class="learnstripes" ></div>
			</div></td></tr>';
		    }    
		    echo  '</table>';
	    }
	    else
	    {
	        // CURRENTLY NOT BEING USED
	        // Get our single student
	        $student = $DB->get_record('user', array('id'=>$selectedStudentID));
	        
            	// Get User enrollment
	    	$enrollmentDate = '--';
	    	if($studentEnroll = $DB->get_record('user_enrolments', array('userid'=>$selectedStudentID)) ){
                    $enrollmentDate = date('F d, Y', $studentEnroll->timestart);
            	}

                // Create data for the daily report
                $finalDailyData = createDailyOverall($selectedStudentID);
                $dayData= $finalDailyData['data'];
                $dayLabels = $finalDailyData['labels'];
                $dayTitle = $finalDailyData['title'];

                // Create data for the weekly report
                $finalWeekData = createWeeklyOverall($selectedStudentID);
                $weekData = $finalWeekData['data'];
                $weekLabels = $finalWeekData['labels'];
                $weekTitle = $finalWeekData['title'];

                // Create data for the monthly report
                $finalMonthData = createMonthlyOverall($selectedStudentID);
                $monthData = $finalMonthData['data'];
                $monthLabels = $finalMonthData['labels'];
                $monthTitle = $finalMonthData['title'];
                
                $newDayData = json_encode($dayData);
    		$newDayLabels = htmlspecialchars( json_encode($dayLabels), ENT_COMPAT);
    		
    		$newWeekData = json_encode($weekData);
    		$newWeekLabels = htmlspecialchars( json_encode($weekLabels), ENT_COMPAT);
    		
    		$newMonthData = json_encode($monthData);
    		$newMonthLabels = htmlspecialchars( json_encode($monthLabels), ENT_COMPAT);

                // FIX: create hard-code data for SBC student
                if($studentID == 22 )  { 
                    $dayTitle = 'September 01, 2013 - September 5, 2013';
                    $dayLabels = array('Mon - 01', 'Tues - 02', 'Wed - 03', 'Thur - 04', 'Fri - 05'); 
                    $newDayLabels = htmlspecialchars( json_encode($dayLabels), ENT_COMPAT);
                    $weekLabels = array('Week 1, Week 2');
                    $newWeekLabels = htmlspecialchars( json_encode($weekLabels), ENT_COMPAT);
                    $monthLabels = array('Sept 2013', 'Oct 2013');
                    $newMonthLabels = htmlspecialchars( json_encode($monthLabels), ENT_COMPAT);

                    $dayData = array(70, 50, 65, 30, 85);
                    $newDayData = json_encode($dayData);

                    $weekData = array(58,0);
                    $newWeekData = json_encode($weekData);

                    $monthData= array(40, 0);
                    $newMonthData = json_encode($monthData);
                }
	        // Get total SBC progress
	        $studentProgress = calculate_siteprogress($selectedStudentID);
	        if($selectedStudentID == 22 ) { $studentProgress = 33; }	
	        
	        $graphWidth = getGraphWidth(count($dayLabels));        
	        
	        // Create link for dashboard
	        $loginURL = $CFG->wwwroot.'/course/loginas.php?id='.$course->id.'&amp;user='.$selectedStudentID.'&amp;sesskey='.$USER->sesskey;
	    	echo '
	    	<div class="topoverview">
	    	    <div class="studentinfo">
	    	        <div class="myprofileitem picture">';
		            echo $OUTPUT->user_picture($student, array('courseid'=>$course->id, 'size'=>'100','class'=>'profilepicture')); 
		         echo '</div>
		         <h3>'.$studentOptions[$selectedStudentID].'</h3>
		         <h3>Enrolled: '.$enrollmentDate.'</h3>
		         <a href="'.$loginURL.'" ><div class="button" >
		             <h3>View Dashboard</h3>
		         </div></a>
	    	    </div>
	    	    <div class="progressinfo">
	    	        <h3>Overall Simbuild Progress: <span>'.$studentProgress.'%</span></h3>
	    	        <div class="progress-bar green">
			    <span style="width:'.$studentProgress.'%;"></span>
		        </div>
	    	    </div>
	    	</div>
	    	
	    	<div class="bottomoverview" >'; 
	    	//echo "<script src='/local/simbuild/teacher/overviewreport.js' ></script>
	    	echo "
	    	<script>
	    	window.onload = function ()
		{
		    DrawOverallChart(".json_encode($dayData).",".json_encode($dayLabels).");
		    
		    var yaxis = new RGraph.Drawing.YAxis('axes', 57)
		    .Set('max', overallstudent.max)
		    .Set('numticks', 2)
		    .Set('colors', ['black'])
		    .Set('numlabels', 3)
		    .Set('labels.specific', ['Excellent','Good','Low'])
		    .Draw();
		}
		
	    	</script>"; echo '
	    	    <h3 class="title">Learning Momentum over Time</h3>
	    	    <p class="title">'.$dayTitle.'</p>
	    	    <div class="canvasdiv" >
        		<canvas id="axes" width="60" height="225" style=""></canvas>
       			<div class="chartdiv" id="chartdiv">
            		    <canvas id="overallstudent" width="'.$graphWidth.'" height="225" >[No canvas support]</canvas>
        		</div>
    		    </div>
    		    <div class="chartbuttons">
    		      	<div class="button selected" onclick="OnButtonClick(this,'.$newDayData .','.$newDayLabels.')" >
        		    <h3>Overall</h3>
    			</div>
    			<div class="button" onclick="OnButtonClick(this,'.$newWeekData.','.$newWeekLabels.')" >
        		    <h3>Weekly</h3>
    			</div>
    			<div class="button" onclick="OnButtonClick(this,'.$newMonthData.','.$newMonthLabels.')" >
        		    <h3>Monthly</h3>
    			</div>
    		    </div>
	    	</div>';
	    	
	    }

	}break;
	
	case 'skills':
	{
	    //Find all the academic skills
	    $academicData = array();
	    $academicLineData = array();
	    $academicLabels = array();
	    foreach($academicIDs as $skillID)  
	    {
	        $labelName = '';
	        if($skillName= $SBC_DB->get_record_sql("SELECT * FROM {skill} myskill WHERE myskill.idSkill= ?", array($skillID)) ) {
	            $labelName = $skillName->desc;
	        }
	        $academicLabels[] = get_string($labelName, "theme_simbuild"); 

	        $totalProgress = 0;
	        $totalLearn = 0;
		foreach($studentOptions as $key=>$value)
		{
		    $studentID = $key;
	            $studentData = findProfileSkillProgress($studentID, $skillID);
	            $totalProgress += $studentData['progress'];   
	            $totalLearn +=  $studentData['learning']; 
	        }
	        $totalStudents = count($studentOptions);
	        $averageProgress = 0;
	        $averageLearn  = 0;
	        if($totalStudents > 0 ) {
	            $averageProgress = (int)($totalProgress / $totalStudents);
	            $averageLearn = (int)($totalLearn / $totalStudents );
	        }
	        
	        $academicData [] = $averageProgress;
	        $academicLineData[] = $averageLearn;
	    } 
	    if(count($academicIDs) == 0) {
	        $academicData = array(0, 0, 0, 0);
	        $academicLineData = array(0, 0, 0, 0);
	        $academicLabels = array('','','','');
	    }

            $foundationData = array();
            $foundationLineData = array();
            $foundationLabels = array();
            
            $foundationIDS= array();
	    $myType = "Carpentry";
	    if($results = $SBC_DB->get_records_sql("SELECT * FROM {skill} myskill WHERE myskill.Type = ?", array($myType)))  {
		foreach($results as $singleResult)  {
		    $foundationIDS[] = $singleResult->idskill; 
		}
	    }
            foreach($foundationIDS as $skillID)  
	    {
	        $labelName = '';
	    	if($skillName = $SBC_DB->get_record_sql("SELECT * FROM {skill} myskill WHERE myskill.idSkill= ?", array($skillID)) ) {
	    	    $labelName = get_string($skillName->desc, "theme_simbuild");
	    	}	    	
	        $foundationLabels[] = $labelName;; 
	        
	        $totalProgress = 0;
	        $totalLearn = 0;
		foreach($studentOptions as $key=>$value)
		{
		    $studentID = $key;
	            $studentData = findProfileSkillProgress($studentID, $skillID);
	            $totalProgress += $studentData['progress'];   
	            $totalLearn +=  $studentData['learning']; 
	        }
	        $totalStudents = count($studentOptions);
	        $averageProgress = 0;
	        $averageLearn  = 0;
	        if($totalStudents > 0 ) {
	            $averageProgress = (int)($totalProgress / $totalStudents);
	            $averageLearn = (int)($totalLearn / $totalStudents );
	        }
	        
	        $foundationData[] = $averageProgress;
	        $foundationLineData[] = $averageLearn;
	    }
	    if(count($foundationIDS) == 0) {
	        $foundationData = array(0,0,0,0);
                $foundationLineData = array(0,0,0,0);
                $foundationLabels = array('','','','');
	    }
            
            $buildingData = array();
            $buildingLineData = array();
            $buildingLabels = array();
            foreach($constructIDs  as $skillID)  
	    {
	        $labelName = '';
	        if($skillName= $SBC_DB->get_record_sql("SELECT * FROM {skill} myskill WHERE myskill.idSkill= ?", array($skillID)) ) {
                    $tempLabel = str_replace("and", "&", $skillName->desc);
                    $labelName = $tempLabel;
                }
	        $buildingLabels [] = get_string($labelName, "theme_simbuild");
                
	        $totalProgress = 0;
	        $totalLearn = 0;
		foreach($studentOptions as $key=>$value)
		{
		    $studentID = $key;
	            $studentData = findProfileSkillProgress($studentID, $skillID);
	            $totalProgress += $studentData['progress'];   
	            $totalLearn +=  $studentData['learning']; 
	        }
	        $totalStudents = count($studentOptions);
	        $averageProgress = 0;
	        $averageLearn  = 0;
	        if($totalStudents > 0 ) {
	            $averageProgress = (int)($totalProgress / $totalStudents);
	            $averageLearn = (int)($totalLearn / $totalStudents );
	        }
	        
	        $buildingData [] = $averageProgress;
	        $buildingLineData [] = $averageLearn;
	    }
	    if(count($constructIDs) == 0 ) {
	        $buildingData = array(0,0,0,0);
                $buildingLineData = array(0,0,0,0);
                $buildingLabels = array('','','','');
	    }
            
	    echo "
    	    <script>
    	    window.onload = function ()
	    {
	        DrawAcademicSkills(".json_encode($academicData).",".json_encode($academicLineData).",".json_encode($academicLabels).");
	        DrawFoundationSkills(".json_encode($foundationData).",".json_encode($foundationLineData).",".json_encode($foundationLabels).");
	        DrawBuildingSkills(".json_encode($buildingData).",".json_encode($buildingLineData).",".json_encode($buildingLabels).");
	    }
    	    </script>";
    	   
    	    echo '
    	    <div class="topskills" >
    	    	<div class="leftcolumn" >
    	    	    <div class="charttitle" >
    	    	        <div class="titletext" >
    	    	            <h3>Academic Skills</h3>
    	    	            <p>Class Progress vs. Momentum</p>
    	    	        </div>
    	    	        <div class="chartkey">
    	    	            <div class="chartbox" >
    	    	                <div class="icon">
    	    	                    <div class="lineicon" ></div>
    	    	                    <p>Learning</p>
    	    	                </div>
    	    	                <div class="icon">
    	    	                    <div class="baricon" ></div>
    	    	                    <p>Progress</p>
    	    	                </div>
    	    	            </div>
    	    	        </div>
    	    	    </div>
	    	    <canvas id="academicskills" width="375" height="210">[No canvas support]</canvas>
	    	</div>
	    	<div class="rightcolumn" >
	    	    <div class="charttitle" >
    	    	        <div class="titletext" >
    	    	            <h3>Foundation Skills</h3>
    	    	            <p>Class Progress vs. Momentum</p>
    	    	        </div>
    	    	        <div class="chartkey">
    	    	            <div class="chartbox" >
    	    	                <div class="icon">
    	    	                    <div class="lineicon" ></div>
    	    	                    <p>Learning</p>
    	    	                </div>
    	    	                <div class="icon">
    	    	                    <div class="baricon" ></div>
    	    	                    <p>Progress</p>
    	    	                </div>
    	    	            </div>
    	    	        </div>
    	    	    </div>
	    	    <canvas id="foundationskills" width="375" height="210">[No canvas support]</canvas>
	    	</div>
	    </div>
    	    
    	    <div class="bottomskills" >
    	        <div class="charttitle" >
    	    	        <div class="titletext" >
    	    	            <h3>Construction Skills</h3>
    	    	            <p>Class Progress vs. Momentum</p>
    	    	        </div>
    	    	        <div class="chartkey">
    	    	            <div class="chartbox" >
    	    	                <div class="icon">
    	    	                    <div class="lineicon" ></div>
    	    	                    <p>Learning</p>
    	    	                </div>
    	    	                <div class="icon">
    	    	                    <div class="baricon" ></div>
    	    	                    <p>Progress</p>
    	    	                </div>
    	    	            </div>
    	    	        </div>
    	    	    </div>
    	        <canvas id="buildingskills" width="750" height="200">[No canvas support]</canvas>
    	    </div>
    	    ';
    	    

	}break;
	
	case 'construction':
	{
	    //Get the selection from the skill filter
	    $standardName = $constructOptions[$constructType];
	    $currSkillID = $constructIDs[$constructType];
	    
	    // Get our single student
	    $student = $DB->get_record('user', array('id'=>$selectedStudentID));
	    if(!$student) {
	        echo '<p>There are no students available.</p>';
	        break;
	    }
            
            // Get User enrollment
	    $enrollmentDate = '--';
	    if($studentEnroll = $DB->get_record('user_enrolments', array('userid'=>$selectedStudentID)) ){
                $enrollmentDate = date('F d, Y', $studentEnroll->timestart);
            }
	    	    
	    $finalDataArr = createConSkillReport($selectedStudentID, $currSkillID);
	    $studentData = $finalDataArr['graphdata'];
    	    $graphLabels = $finalDataArr['graphlabels'];
    	    $orderNames = $finalDataArr['ordernames'];
    	    $ordersPassed = $finalDataArr['orderpassed'];
    	    $ordersMastered = $finalDataArr['ordermasterd'];
    	    $studentProgress = $finalDataArr['totalprogress'];
            
            // If there are too many orders, expand the graph width
            $graphWidth = getGraphWidth(count($graphLabels), 600) * 1.2;
            	                   
    	    echo "
    	    <script>
    	    window.onload = function ()
	    {
	        DrawConstructionReport(".json_encode($studentData).",".json_encode($graphLabels).");
	    
	        var yaxis = new RGraph.Drawing.YAxis('axes', 57)
	        .Set('max', constructionStudent.max)
	        .Set('numticks', 2)
	        .Set('colors', ['black'])
	        .Set('numlabels', 3)
	        .Set('labels.specific', ['Excellent','Good','Low'])
	        .Draw();
	    }
    	    </script>";
	     $loginURL = $CFG->wwwroot.'/course/loginas.php?id='.$course->id.'&amp;user='.$selectedStudentID.'&amp;sesskey='.$USER->sesskey;
    	    echo '
    	    <div class="topoverview">
    	        <div class="studentinfo">
    	            <div class="myprofileitem picture">';
	                echo $OUTPUT->user_picture($student, array('courseid'=>$course->id, 'size'=>'100','class'=>'profilepicture')); 
	             echo '</div>
	             <h3>'.$studentOptions[$selectedStudentID].'</h3>
	             <h3>Enrolled: '.$enrollmentDate.'</h3>
	             <a href="'.$loginURL.'" ><div class="button" >
	                 <h3>View Dashboard</h3>
	             </div></a>
    	        </div>
    	        <div class="progressinfo">
    	            <h3>'.$standardName.' Progress: <span>'.$studentProgress.'%</span></h3>
    	            <div class="progress-bar green">
		        <span style="width:'.$studentProgress.'%;"></span>
	            </div>
    	        </div>
    	    </div>
    	
    	    <div class="bottomoverview">
    	        <h3 class="title">Construction Skill: '.$standardName.'</h3>
    	        <p class="title">Learning Momentum over Work Orders</p>
    	        <div class="canvasdiv">
		    <canvas id="axes" width="60" height="225" style=""></canvas>
		    <div class="chartdiv">
    		        <canvas id="constructionStudent" width="'.$graphWidth.'" height="225" >[No canvas support]</canvas>
		    </div>
	        </div> 
	        
    	    </div>
    	    
    	    <div class="orderinfo">
                <div class="activities">
                    <h3>Work Orders with this Skill</h3>
	                <div class="titles">';
	                
	                // Now get the individual work ordrs for this skill
	                $findShed = false;
	                $findRanch = false;
	                $findMulti = false;
		        foreach($orderNames as $singleName)  {
		            if($singleName[0] == 'S' )  {
		                $className = "shed";
		                if(!$findShed) {$findShed = true; }
		                else { $className .= " hidden";  }
		                echo  '<div class="'.$className.'"></div>';
		            } else if($singleName[0] == 'R' )  {
		                $className = "ranch";
		                if(!$findRanch) { $findRanch= true; }
		                else { $className .= " hidden";  }
		                echo  '<div class="'.$className.'"></div>';
		            }else if($singleName[0] == 'M' )  {
		                $className = "multilevel";
		                if(!$findMulti) { $findMulti = true; }
		                else { $className .= " hidden";  }
		                echo  '<div class="'.$className.'"></div>';
		            }
		            echo '<p>'.$singleName.'</p><br />';
		        }
		echo '</div>
               </div>
            <div class="passedboxes">
                <h3>Passed</h3>
                <div class="checkboxes">';
                foreach ($orderNames as $key => $value)
                {
                   if(!$ordersPassed[$key]) 
                   {  echo '<p>&#x25A1;</p>'; }
                   else {  echo '<p class="greenBoxes" >&#x2713;</p>';  }                   
                }                    
          echo '</div>
            </div>
            <div class="masteredboxes">
                <h3>Mastered</h3>
                <div class="checkboxes">';
                foreach ($orderNames as $key => $value)
                {
                   if(!$ordersMastered[$key]) 
                   {  echo '<p>&#x25A1;</p>'; }
                   else {  echo '<p class="greenBoxes">&#x2713;</p>';  }                   
                } 
          echo '</div>
            </div>
        </div>';
	}break;
	
	case 'academic':
	{
	    //Get the selection from the left menu block
	    $standardName = $academicOptions[$academicType];
	    $currSkillID = $academicIDs[$academicType];
	    
	    // Get our single student
	    $student = $DB->get_record('user', array('id'=>$selectedStudentID));
	    if(!$student) {
	        echo '<p>There are no students available.</p>';
	        break;
	    }
	        
	    // Get User enrollment
	    $enrollmentDate = '--';
	    if($studentEnroll = $DB->get_record('user_enrolments', array('userid'=>$selectedStudentID)) ){
                $enrollmentDate = date('F d, Y', $studentEnroll->timestart);
            }
            
            // Get the data for this chart
            $finalDataArr = createActSkillReport($selectedStudentID, $currSkillID );
            $graphData = $finalDataArr['graphdata'];
    	    $graphLabels = $finalDataArr['graphlabels'];
    	    $activitiesMastered = $finalDataArr['groupmastered'];
    	    $progressBarData = $finalDataArr['groupprogress'];
    	    $progressBarLabels = $finalDataArr['barlabels'];
    	    $studentProgress = $finalDataArr['totalprogress'];    
	    
            // If there are too many orders, expand the graph width
            $graphWidth = getGraphWidth(count($graphLabels)); 
        
    	    echo "
    	    <script>
    	    window.onload = function ()
	    {
	        DrawAcademicReport(".json_encode($graphData).",".json_encode($graphLabels).");
	    
	        var yaxis = new RGraph.Drawing.YAxis('axes', 57)
	        .Set('max', academicStudent.max)
	        .Set('numticks', 2)
	        .Set('colors', ['black'])
	        .Set('numlabels', 3)
	        .Set('labels.specific', ['Excellent','Good','Low'])
	        .Draw();
	    }
    	    </script>";
	     $loginURL = $CFG->wwwroot.'/course/loginas.php?id='.$course->id.'&amp;user='.$selectedStudentID.'&amp;sesskey='.$USER->sesskey;
    	    echo '
    	    <div class="topoverview">
    	        <div class="studentinfo">
    	            <div class="myprofileitem picture">';
	                echo $OUTPUT->user_picture($student, array('courseid'=>$course->id, 'size'=>'100','class'=>'profilepicture')); 
	             echo '</div>
	             <h3>'.$studentOptions[$selectedStudentID].'</h3>
	             <h3>Enrolled: '.$enrollmentDate.'</h3>
	             <a href="'.$loginURL.'" ><div class="button" >
	                 <h3>View Dashboard</h3>
	             </div></a>
    	        </div>
    	        <div class="progressinfo">
    	            <h3>'.$standardName.' Progress: <span>'.$studentProgress.'%</span></h3>
    	            <div class="progress-bar green">
		        <span style="width:'.$studentProgress.'%;"></span>
	            </div>
    	        </div>
    	    </div>
    	
    	    <div class="bottomoverview">
    	        <h3 class="title">Academic Skill: '.$standardName.'</h3>
    	        <p class="title">Learning Momentum over Activity Groups</p>
    	        <div class="canvasdiv">
		    <canvas id="axes" width="60" height="225" style=""></canvas>
		    <div class="chartdiv">
    		        <canvas id="academicStudent" width="'.$graphWidth.'" height="225" >[No canvas support]</canvas>
		    </div>
	        </div> 
    	    </div>
    	    
    	    <div class="activityinfo">
                <div class="activities">
                    <h3>Activity Groups</h3>
	                <div class="titles">';
	                foreach($graphLabels as $singleName) {
	                    echo '<p style="display:block;" >'.$singleName.'</p>';
	                }
	                    
	          echo '</div>
               </div>
               <div class="passedBars" >
                   <h3>Passed</h3>
                   <div class="activitybars" >';
                       $progressCounter = 0;
                       foreach($progressBarData as $singleProgress)  {
                           $progressText = $progressBarLabels[$progressCounter];
                           echo '<div class="progress-bar green"><span style="width:'.$singleProgress.'%;"><p>'.$progressText.'</p></span></div>';
                           $progressCounter++;
                       }
                   echo '    
                   </div>
               </div>
               
                <div class="masteredboxes">
                    <h3>Mastered</h3>
                    <div class="checkboxes">';
                       foreach($activitiesMastered as $singleMaster) {
                           if(!$singleMaster) 
                           {  echo '<p>&#x25A1;</p>'; }
                   	   else 
                   	   {  echo '<p class="greenBoxes">&#x2713;</p>';  } 
                       }    
                       
                   echo '</div>
                </div>
        </div>';
	}break;
    }

/////////////////////////////////////////////
// Finish outputting the html
////////////////////////////////////////////
echo   '</div>
    </div>
</div>';



echo $OUTPUT->footer();
?>