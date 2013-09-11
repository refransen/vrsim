<?php
/////////////////////////////////////////////////////////////////////
// Progress Report
//
// This is the main file that displays the progress report within
// the SBC TEACHER page 
/////////////////////////////////////////////////////////////////////
require_once('../../../config.php');

//CSS
$PAGE->requires->css('/local/simbuild/teacher/progressreport.css');
$PAGE->requires->js('/local/simbuild/teacher/progressreport.js');

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
$reportType = optional_param('report', 'overview', PARAM_ALPHA);    // which report to display
$viewType = optional_param('view', 'class', PARAM_ALPHA);            // which view to show, class or student
$className = optional_param('class', '0', PARAM_INT);            // which class to show

//  EXTRA VARIABLES
$worksite = optional_param('worksite', 'shed', PARAM_ALPHA);

//--------------------
// Get the students for this course
//--------------------
$studentOptions = array();
if ($className == 0) 
{ 
    $sqlUsers = "SELECT ra.userid as id 
               FROM {$CFG->prefix}role_assignments AS ra 
         INNER JOIN {$CFG->prefix}context AS ctx 
                 ON ra.contextid = ctx.id 
              WHERE ra.roleid = 5 
                AND ctx.instanceid = ".$course->id." 
                AND ctx.contextlevel = 50";
                
    if ($dataUsers = $DB->get_records_sql($sqlUsers)) {
        foreach($dataUsers as $singleUser) {
            $student = $DB->get_record('user', array('id'=>$singleUser->id));
            $studentOptions[$singleUser->id] = $student->firstname.' '.$student->lastname;
        }
    }
} 
else  
{
    if ($dataUsers  = groups_get_members($className, 'u.id', 'lastname ASC, firstname ASC')) {
        foreach($dataUsers as $singleUser) {
            $student = $DB->get_record('user', array('id'=>$singleUser->id));
            $studentOptions[$singleUser->id] = $student->firstname.' '.$student->lastname;
        }
    }            
}    
//--------------------
// Create last filter option for single student
//--------------------
reset($studentOptions);
$firstID = key($studentOptions);
$selectedStudentID = $firstID;
$studentID = optional_param('student', $firstID, PARAM_INT);        // which student to display

// Find the actual selected student id
foreach($studentOptions as $key=>$value)
{
     if($key == $studentID)
     {    $selectedStudentID = $key; break; }
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
   'construction' => 'Construction Standards',
   'academic' => 'Academic Standards'
);
$reportForm = 'Choose Report: ' . $OUTPUT->single_select(new moodle_url('/local/simbuild/teacher/progressreport.php', 
          array('id'=>$id, 'class'=>$className, 'view'=>$viewType)), 'report', $reportOptions, $selected = $reportType, '', $formid = 'fnreport');

//--------------------
// Get all the classes (groups)
//--------------------
$classOptions = array();
$classOptions[0] = 'All';
if ($groups = $DB->get_records('groups', array('courseid'=>$course->id))){
    foreach ($groups as $cgroup) {
        $classOptions[$cgroup->id] = $cgroup->name;
    }        
}
$classForm = 'Choose Class: ' . $OUTPUT->single_select(new moodle_url('/local/simbuild/teacher/progressreport.php', 
          array('id'=>$id, 'report'=>$reportType, 'view'=>$viewType, 'student'=>$studentID)), 'class', 
          $classOptions, $selected = $className, '', $formid = 'fnclass');

$viewOptions = array(
   'class' => 'Class',
   'student' => 'Student'
);
$viewForm = 'Choose View: ' . $OUTPUT->single_select(new moodle_url('/local/simbuild/teacher/progressreport.php', 
          array('id'=>$id, 'report'=>$reportType, 'class'=>$className, 'student'=>$studentID)), 'view', 
          $viewOptions, $selected = $viewType, '', $formid = 'fnview');


$studentForm = 'Choose Student: ' . $OUTPUT->single_select(new moodle_url('/local/simbuild/teacher/progressreport.php', 
          array('id'=>$id, 'report'=>$reportType, 'class'=>$className, 'view'=>$viewType)), 'student', 
          $studentOptions, $selected = $studentID , '', $formid = 'fnstudent');

////////////////////////////////////////
// Print the filter box
////////////////////////////////////////
echo '
<div class="filterBox" >'.$reportForm.'</div>
<div class="filterBox" >'.$classForm.'</div>';

if($reportType === 'overview')  {
    echo '<div class="filterBox" >'.$viewForm.'</div>';
}
if($viewType == 'student')  {
    echo '<div class="filterBox" >'.$studentForm.'</div>';
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
        $blotckTitle = 'Construction Standards Report';
    }break;
    case 'academic':
    {
        $blockTitle = 'Academic Standards Report';
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
		    echo '<table class="overviewtable">
		    <tr>
		        <th>Student Name <div class="downarrow"></div></th>
		        <th class="progressth" >Site Progress
		        <div class="downarrow"></div>
		            <div class="siteimages" >   
		                <div class="shed"></div>
		                <div class="ranch"></div>
		                <div class="multilevel"></div>
		            </div>
		        </th>
		        <th>Time Spent  <div class="downarrow"></div></th>
		        <th>Learning Momentum  <div class="downarrow"></div></th>
		    </tr>';
		    foreach($studentOptions as $student)
		    {
		        echo '<tr><td><p class="studentname" >'.$student.'</p></td>';
		        
		        $siteOffset = 2;
		        $siteProgress = 35 - $siteOffset;
		        echo '<td><p class="siteprogress" style="width:'.$siteProgress.'%;"></p> <div class="sitestripes" ></div></td>
		        <td><p class="timeworked" >';
		        $time = '1 : 00 : 12'; 
		        echo $time.'</p></td>';
		        
		        $learnProgress = 20;
		        $arrowProgress = $learnProgress - 5;
		        $learnColor = '#85d52f';
		        if($learnProgress <= 25)  {
		             $learnColor = '#f06359';
		        } else if($learnProgress > 25 && $learnProgress <= 50)  {
		             $learnColor = '#f5d83e';
		        }
		        
		        echo '
		        <td><img src="/theme/simbuild/pix/progressreport/orange_arrow_up.png" style="margin-left:'.$arrowProgress.'%;" />
		        <div class="chartbox" >
		            <div class="learnprogress" style="width:'.$learnProgress.'%;background-color:'.$learnColor.';"></div>
		            <div class="learnstripes" ></div>
			</div></td></tr>';
		    }    
		    echo  '</table>';
	    }
	    else
	    {
	        // Get our single student
	        $student = $DB->get_record('user', array('id'=>$selectedStudentID));
	        $enrollmentDate = "July 15, 2013";
	        
	        $studentData = array(50, 40, 30, 50, 75, 75, 75, 50, 40, 30, 50, 75, 75, 75);
	        $graphLabels = array('Mon','Tues','Wed','Thur','Fri','Sat','Sun', 'Mon','Tues','Wed','Thur','Fri','Sat','Sun');
	        $studentProgress = 60;
	        
	    	echo "
	    	<script src='/local/simbuild/teacher/overviewreport.js' ></script>
	    	<script>
	    	window.onload = function ()
		{
		    DrawWeeklyChart(".json_encode($studentData).",".json_encode($graphLabels).");
		    
		    var yaxis = new RGraph.Drawing.YAxis('axes', 57)
		    .Set('max', overallstudent.max)
		    .Set('numticks', 2)
		    .Set('colors', ['black'])
		    .Set('numlabels', 3)
		    .Set('labels.specific', ['Excellent','Good','Low'])
		    .Draw();
		}
	    	</script>";
	    	echo '
	    	<div class="topoverview">
	    	    <div class="studentinfo">
	    	        <div class="myprofileitem picture">';
		            echo $OUTPUT->user_picture($student, array('courseid'=>$course->id, 'size'=>'100','class'=>'profilepicture')); 
		         echo '</div>
		         <h3>'.$studentOptions[$selectedStudentID].'</h3>
		         <h3>Enrolled: '.$enrollmentDate.'</h3>
		         <div class="button" >
		             <h3>View Dashboard</h3>
		         </div>
	    	    </div>
	    	    <div class="progressinfo">
	    	        <h3>Overall Simbuild Progress: <span>'.$studentProgress.'%</span></h3>
	    	        <div class="progress-bar green">
			    <span style="width:'.$studentProgress.'%;"></span>
		        </div>
	    	    </div>
	    	</div>
	    	
	    	<div class="bottomoverview">
	    	    <h3 class="title">Learning Momentum over Time</h3>
	    	    <div class="canvasdiv">
        		<canvas id="axes" width="60" height="225" style=""></canvas>
       			<div class="chartdiv">
            		    <canvas id="overallstudent" width="1000" height="225" >[No canvas support]</canvas>
        		</div>
    		    </div>
    		    <div class="chartbuttons">
    		      	<div class="button" onclick="" >
        		    <h3>Overall</h3>
    			</div>
    			<div class="button" onclick="" >
        		    <h3>Weekly</h3>
    			</div>
    			<div class="button" onclick="" >
        		    <h3>Monthly</h3>
    			</div>
    		    </div>
	    	</div>';
	    	
	    }

	}break;
	
	case 'skills':
	{
	    $academicData = array(60, 51, 40, 78);
	    $academicLineData = array(72, 60, 30, 80);
            $academicLabels = array('Reading','Knowledge','Math','Prob Solving');
            
            $foundationData = array(43, 52, 58, 65);
            $foundationLineData = array(30, 58, 75, 50);
            $foundationLabels = array('Blueprints','Safety','Tools','Materials');
            
            $buildingData = array(34, 49, 44, 40, 32, 29, 16);
            $buildingLabels = array('Floor', 'Walls', 'Ceiling', 'Roof', 'Stairs', 'Windows & Doors', 'Drywall');
            
	    echo "
    	    <script src='/local/simbuild/teacher/classSkillsReport.js' ></script>
    	    <script>
    	    window.onload = function ()
	    {
	        DrawAcademicSkills(".json_encode($academicData).",".json_encode($academicLineData ).",".json_encode($academicLabels).");
	        DrawFoundationSkills(".json_encode($foundationData).",".json_encode($foundationLineData).",".json_encode($foundationLabels).");
	        DrawBuildingSkills(".json_encode($buildingData).",".json_encode($buildingLabels).");
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
	    	    <canvas id="academicskills" width="375" height="200">[No canvas support]</canvas>
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
	    	    <canvas id="foundationskills" width="375" height="200">[No canvas support]</canvas>
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
	    //Get the selection from the left menu block
	    $standardName = "Floor";
    
            // Get our single student
            $student = $DB->get_record('user', array('id'=>$selectedStudentID));
            $enrollmentDate = "July 15, 2013";
        
            $studentData = array(50, 40, 30, 50, 75, 75, 75, 50);
            $graphLabels = array('S9','S10','S11','S12','R5','R6','M3', 'M3a');
            $studentProgress = 40;
        
    	    echo "
    	    <script src='/local/simbuild/teacher/constructionReport.js' ></script>
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
    	    echo '
    	    <div class="topoverview">
    	        <div class="studentinfo">
    	            <div class="myprofileitem picture">';
	                echo $OUTPUT->user_picture($student, array('courseid'=>$course->id, 'size'=>'100','class'=>'profilepicture')); 
	             echo '</div>
	             <h3>'.$studentOptions[$selectedStudentID].'</h3>
	             <h3>Enrolled: '.$enrollmentDate.'</h3>
	             <div class="button" >
	                 <h3>View Dashboard</h3>
	             </div>
    	        </div>
    	        <div class="progressinfo">
    	            <h3>'.$standardName.' Progress: <span>'.$studentProgress.'%</span></h3>
    	            <div class="progress-bar green">
		        <span style="width:'.$studentProgress.'%;"></span>
	            </div>
    	        </div>
    	    </div>
    	
    	    <div class="bottomoverview">
    	        <h3 class="title">Construction Standard: '.$standardName.'</h3>
    	        <p class="title">Learning Momentum over Work Orders</p>
    	        <div class="canvasdiv">
		    <canvas id="axes" width="60" height="225" style=""></canvas>
		    <div class="chartdiv">
    		        <canvas id="constructionStudent" width="1000" height="225" >[No canvas support]</canvas>
		    </div>
	        </div> 
    	    </div>
    	    
    	    <div class="orderinfo">
                <div class="activities">
                    <h3>Work Orders with this Standard</h3>
	                <div class="titles">
	                    <p>Activity Name</p>
	                    <p>Activity Name</p>
	                    <p>Activity Name</p>
	                    <p>Activity Name</p>
	                </div>
               </div>
            <div class="passedboxes">
                <h3>Passed</h3>
                <div class="checkboxes">
                   <p>▢</p>
                    <p>▢</p>
                    <p>▢</p>
                    <p>▢</p>
                </div>
            </div>
            <div class="masteredboxes">
                <h3>Mastered</h3>
                <div class="checkboxes">
                    <p>▢</p>
                    <p>▢</p>
                    <p>▢</p>
                    <p>▢</p>
               </div>
            </div>
    	    	
        </div>';
	}break;
	
	case 'academic':
	{
	    //Get the selection from the left menu block
	    $standardName = "Math";
    
            // Get our single student
            $student = $DB->get_record('user', array('id'=>$selectedStudentID));
            $enrollmentDate = "July 15, 2013";
        
            $studentData = array(50, 40, 30, 50, 75, 75);
            $graphLabels = array('Calculate it','Tape Reading','Measure & Cut','Marking Rafters','Quizzes','Review');
            $studentProgress = 40;
            
            $progressBarArr = array(100, 60, 50, 40, 30, 0);
        
    	    echo "
    	    <script src='/local/simbuild/teacher/academicReport.js' ></script>
    	    <script>
    	    window.onload = function ()
	    {
	        DrawAcademicReport(".json_encode($studentData).",".json_encode($graphLabels).");
	    
	        var yaxis = new RGraph.Drawing.YAxis('axes', 57)
	        .Set('max', academicStudent.max)
	        .Set('numticks', 2)
	        .Set('colors', ['black'])
	        .Set('numlabels', 3)
	        .Set('labels.specific', ['Excellent','Good','Low'])
	        .Draw();
	    }
    	    </script>";
    	    echo '
    	    <div class="topoverview">
    	        <div class="studentinfo">
    	            <div class="myprofileitem picture">';
	                echo $OUTPUT->user_picture($student, array('courseid'=>$course->id, 'size'=>'100','class'=>'profilepicture')); 
	             echo '</div>
	             <h3>'.$studentOptions[$selectedStudentID].'</h3>
	             <h3>Enrolled: '.$enrollmentDate.'</h3>
	             <div class="button" >
	                 <h3>View Dashboard</h3>
	             </div>
    	        </div>
    	        <div class="progressinfo">
    	            <h3>'.$standardName.' Progress: <span>'.$studentProgress.'%</span></h3>
    	            <div class="progress-bar green">
		        <span style="width:'.$studentProgress.'%;"></span>
	            </div>
    	        </div>
    	    </div>
    	
    	    <div class="bottomoverview">
    	        <h3 class="title">Academic Standard: '.$standardName.'</h3>
    	        <p class="title">Learning Momentum over Activity Groups</p>
    	        <div class="canvasdiv">
		    <canvas id="axes" width="60" height="225" style=""></canvas>
		    <div class="chartdiv">
    		        <canvas id="academicStudent" width="1000" height="225" >[No canvas support]</canvas>
		    </div>
	        </div> 
    	    </div>
    	    
    	    <div class="activityinfo">
                <div class="activities">
                    <h3>Activity Groups</h3>
	                <div class="titles">
	                    <p>Calculate It</p>
	                    <p>Tape Reading</p>
	                    <p>Measure & Cut</p>
	                    <p>Marking Rafters</p>
	                    <p>Quizzes</p>
	                    <p>Review</p>
	                </div>
               </div>
               <div class="passedBars" >
                   <h3>Passed</h3>
                   <div class="activitybars" >';
                       foreach($progressBarArr as $singleProgress)
                       {
                           echo '<div class="progress-bar green"><span style="width:'.$singleProgress.'%;"></span></div>';
                       }
                   echo '    
                   </div>
               </div>
               
                <div class="masteredboxes">
                    <h3>Mastered</h3>
                    <div class="checkboxes">
                       <p>▢</p>
                       <p>▢</p>
                       <p>▢</p>
                       <p>▢</p>
                       <p>▢</p>
                       <p>▢</p>
                   </div>
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