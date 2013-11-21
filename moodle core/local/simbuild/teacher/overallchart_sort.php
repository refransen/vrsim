<?php
////////////////////////////////////////////////////////////
// TEACHER - Overall Student Report
// This will restructure the chart depending on sort options
////////////////////////////////////////////////////////////
require(dirname(__FILE__) . '/../../../config.php');
require("../lib.php");

global $DB, $SBC_DB, $CFG;
$courseID = 4; 
$sortType = isset($_GET['sort']) ? $_GET['sort'] : null;
$sortDirection = isset($_GET['dir']) ? $_GET['dir'] : null; 
$classID = isset($_GET['class']) ? $_GET['class'] : null; 

$db_class = get_class($DB);
$SBC_DB = new $db_class(); // instantiate a new object of the same class as the original $DB
$SBC_DB->connect($CFG->sbc_dbhost, $CFG->sbc_dbUser, $CFG->sbc_dbPass, $CFG->sbc_dbName, false);

//--------------------
// Get the students for this course
//--------------------
$studentArr = getStudents($classID, $courseID, false); //array();	

$studentProgArr = array();
$studentTimeArr = array();
$studentNameArr = array();
$studentLearnArr = array();
foreach($studentArr as $singleStudent)
{    
    $studentID = $singleStudent->id;
    $sbcID = getSBCID($studentID);
    
    // Find student progress of all users
    $siteProgress = calculate_siteprogress($studentID);    
    $studentProgArr[$studentID] = $siteProgress;
    
    // Find student times (in seconds) of all users
    $newTime = calculate_totalTimeSpent($studentID);
    $studentTimeArr[$studentID] = $newTime;
    
    // Find firstnames of all students
    $studentNameArr[$studentID] = $singleStudent->firstname;
    
    // Find learning progress of all students
    $learnProgress = calculate_totalProfLearnMom($studentID); 
    $studentLearnArr[$studentID] = $learnProgress;
}
$finalStudentArr = $studentArr;
switch($sortType)
{
    case 'student':
    {
        natcasesort($studentNameArr);
        $newArray = $studentNameArr;
        if($sortDirection == "low") { 
            $newArray = array_reverse($studentNameArr, true); 
        }
        $finalStudentArr = array();
        foreach($newArray as $key=>$value) {
            $studentID = $key;
            $finalStudentArr[] = $studentArr[$studentID];
        }
    }break;
    case 'progress':
    {
        arsort($studentProgArr);
        $newArray = $studentProgArr;
        if($sortDirection == "low") {
            $newArray = array_reverse($studentProgArr, true); 
        }     
        $finalStudentArr = array();
        foreach($newArray as $key=>$value) {
            $studentID = $key;
            $finalStudentArr[] = $studentArr[$studentID];
        }
    }break;
    case 'time':
    {
         arsort($studentTimeArr);            
         $newArray = $studentTimeArr;
         if($sortDirection == "low") {
            $newArray = array_reverse($studentTimeArr, true); 
         }
         $finalStudentArr = array();      
         foreach($newArray as $key=>$value) {
             $studentID = $key;
             $finalStudentArr[] = $studentArr[$studentID];
         }
    }break;
    case 'learn':
    {
        arsort($studentLearnArr);
        $newArray = $studentLearnArr;
        if($sortDirection == "low") {
            $newArray = array_reverse($studentLearnArr, true); 
         }
        $finalStudentArr = array();
        foreach($newArray as $key=>$value) {
            $studentID = $key;
            $finalStudentArr[] = $studentArr[$studentID];
        }
    }break;
}

$finalStudentSort = htmlspecialchars(json_encode('student'), ENT_COMPAT);
$finalProgSort = htmlspecialchars(json_encode('progress'), ENT_COMPAT);
$finalTimeSort = htmlspecialchars(json_encode('time'), ENT_COMPAT);
$finalLearnSort = htmlspecialchars(json_encode('learn'), ENT_COMPAT);
$finalClassName = htmlspecialchars(json_encode($classID), ENT_COMPAT);

// Imges for the reports
$shedUrl =  $CFG->wwwroot.'/theme/simbuild/pix/charts/ShedIcon.png';
$ranchUrl = $CFG->wwwroot.'/theme/simbuild/pix/charts/HouseIcon.png';
$multiUrl = $CFG->wwwroot.'/theme/simbuild/pix/charts/MultiLevelHouseIcon.png';

$className = "downarrow";
echo '<tr><th>Student Name <div class="';
    if($sortType == 'student' && $sortDirection == 'high') 
    {$className = "uparrow"; }
    echo $className.'" onclick="sortStudents(this,'.$finalStudentSort.','.$finalClassName.')" ></div></th>
        <th class="progressth" >Site Progress
        <div class="';
    $className = "downarrow";
    if($sortType == 'progress' && $sortDirection == 'high') 
    {$className = "uparrow"; }
    echo $className.'" onclick="sortStudents(this,'.$finalProgSort.','.$finalClassName.')"></div>
            <div class="siteimages" >   
                 <div class="shed" style="background-image:url('.$shedUrl.');" ></div>
                 <div class="ranch" style="background-image:url('.$ranchUrl.');" ></div>
                 <div class="multilevel" style="background-image:url('.$multiUrl.');" ></div>
            </div>
        </th>
        <th>Time Spent  <div class="';
    $className = "downarrow";
    if($sortType == 'time' && $sortDirection == 'high') 
    { $className = "uparrow"; }
    echo $className.'" onclick="sortStudents(this,'.$finalTimeSort.','.$finalClassName.')"></div></th>
        <th>Learning Momentum  <div class="';
    $className = "downarrow";
    if($sortType == 'learn' && $sortDirection == 'high') 
    { $className = "uparrow"; }
    echo $className.'" onclick="sortStudents(this,'.$finalLearnSort.','.$finalClassName.')"></div></th>
    </tr>';
    
foreach($finalStudentArr as $singleStudent)
    {    
    	$student = $singleStudent->firstname.' '.$singleStudent->lastname;
    	$studentID = $singleStudent->id;
    	
        echo '<tr><td><p class="studentname" >'.$student.'</p></td>';
        
        $siteProgress = $studentProgArr[$studentID]; 

        echo '<td><p class="siteprogress" style="width:'.$siteProgress.'%;"></p> <div class="sitestripes" ></div></td>
        <td><p class="timeworked" >';
        
        $totalSeconds = $studentTimeArr[$studentID]; 
        $hours = floor($totalSeconds / 3600);
    	$minutes = floor(($totalSeconds / 60) % 60);
        $seconds = $totalSeconds % 60;
    	$newTime = sprintf("%2d : %02d : %02d", $hours, $minutes, $seconds);
        echo $newTime.'</p></td>';
        
        $learnProgress = $studentLearnArr[$studentID]; 
        
        $arrowProgress = $learnProgress - 5;
        $learnColor = '#85d52f';
        if($learnProgress <= 25)  {
             $learnColor = '#f06359';
        } else if($learnProgress > 25 && $learnProgress <= 50)  {
             $learnColor = '#f5d83e';
        }
        
        echo '
        <td><img src="'.$CFG->wwwroot.'/theme/simbuild/pix/progressreport/orange_arrow_up.png" style="margin-left:'.$arrowProgress.'%;" />
        <div class="chartbox" >
            <div class="learnprogress" style="width:'.$learnProgress.'%;background-color:'.$learnColor.';"></div>
            <div class="learnstripes" ></div>
	</div></td></tr>';
    }    

?>