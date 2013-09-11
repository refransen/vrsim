<?php
global $DB, $USER;

require_once($CFG->dirroot . '/mod/vrlesson/vrsimlib.php');
$newCSV = new vrlesson_csv();

$finalStartDate = 'Not Enrolled';
$finalEndDate = "--";
$teacherName = "None";
$className = "None";
$teacherMessageLink = $CFG->wwwroot.'/message/index.php';
$totalLessonPercent = 0;
$hasUploaded = false;     // if the student has uploaded anything yet
$currRID = 0;
$currDataID = 1;
$currCourseID = 3;
$vrLessonID = 24;


//-------------------------------------------
// Get the latest entry the user made or modified
//-------------------------------------------
if($latestEntry = $DB->get_records('vrlesson_records', array('userid'=>$USER->id), 'timemodified ASC'))
{
   $hasUploaded = true;
   
   $currentEntry = 0;
   foreach($latestEntry as $entry){
	 $currentEntry = $entry;
	 break;
    }
    $currRID = $currentEntry->id;
    $currDataID = $currentEntry->dataid;
}

// If the user has never uploaded, we need to set default to static entry
//-------------------------------------------
if(!$hasUploaded)
{
     $passesField = $DB->get_record('vrlesson_fields', array('dataid'=>$currDataID, 'name'=>'Passes'));
     $passesContent = $DB->get_records('vrlesson_content', array('fieldid'=>$passesField->id));
     foreach($passesContent as $singleContent)
     {
         if($singleContent->content === "Project not uploaded")  {
             $currRID = $singleContent->recordid;
             break;
         }
     }
}

// Let's find the current lesson then
//-------------------------------------------
$currentLesson = $DB->get_record('vrlesson', array('id'=>$currDataID));
$currentCourse = $DB->get_record('course', array('id'=>$currentLesson->course));
$currCourseID = $currentCourse->id;

$currLessonMod = $DB->get_record('course_modules', array('instance'=>$currentLesson->id, 'module'=>$vrLessonID));


// Get Current Section
//-------------------------------------------
/*$currSectionNum = 0;
$sectionInfo = unserialize($currentCourse->modinfo);
foreach($sectionInfo as $mySection)
{
    var_dump($mySection->sectionid).'<br >';
    if($mySection->id == $currentLesson->id)
    {
         $currSectionNum = $mySection->sectionid;
         break;
    }
} */
$currSection = $DB->get_record('course_sections', array('id'=>$currLessonMod->section));


// Get total amount of vrlessons in course
//-------------------------------------------
$completeLessons = $DB->get_records('course_modules', array('course'=>$currentLesson->course, 'module'=>$vrLessonID));
$totalLessInCourse = count($completeLessons);
$totalLessInSection = $DB->count_records('course_modules', array('course'=>$currentLesson->course, 'module'=>$vrLessonID, 'section'=>$currSection->id));

//-------------------------------------------
// Get the Project information
$totalProjects = $currentLesson->requiredentries;
$currentProject = $DB->get_records('vrlesson_content', array('recordid'=>$currRID), '', '*');
$allProjects = $DB->get_records('vrlesson_records', array('userid'=>$USER->id, 'dataid'=>$currDataID), "timemodified ASC");

$passesField = $DB->get_record('vrlesson_fields', array('dataid'=>$currDataID, 'name'=>'Passes'));
$projNameField = $DB->get_record('vrlesson_fields', array('dataid'=>$currDataID, 'name'=>'Project Name'));
$currProjName =  $DB->get_record('vrlesson_content', array('recordid'=>$currRID, 'fieldid'=>$projNameField->id));

$projectScore = $newCSV->get_highest_score($currProjName->content, $USER->id);


$projScoreArray = array();
$projShortNames = array();
$projCounter = 0;

$allProjects= array_reverse($allProjects, true);

foreach($allProjects as $singleProject)
{
    $newRID = (int)$singleProject->id;
    $projectEntry = $DB->get_record('vrlesson_content', array('recordid'=>$newRID, 'fieldid'=>$projNameField->id));
    $newProjArray = explode(" ",$projectEntry->content);
    
    $tempPass = $DB->get_record('vrlesson_content', array('recordid'=>$newRID, 'fieldid'=>$passesField->id));

     // Get highest score of project
     $tempScore = $newCSV->get_highest_score($projectEntry->content, $USER->id);
     $projScoreArray[] = $tempScore; 

    if(count($newProjArray) > 1)
    {
        $firstLetter = substr($newProjArray[0],0,1);
        $secondLetter = substr($newProjArray[1],0,1);
        $newName = ''.$firstLetter.$secondLetter.'';
        
        if(!in_array($newName, $projShortNames))
        {  
           if($tempPass->content !== 'Project not uploaded')  {
               $projShortNames[] = $newName; 
               $projCounter++;
             }
        }
    } 
    else
    {
        $firstLetters = substr($newProjArray[0],0,2);

        if(!in_array($firstLetters, $projShortNames))
        {  
            if($tempPass->content !== 'Project not uploaded')  {
                $projShortNames[] = $firstLetters;
                $projCounter++;
            }
        }
    }

    if($projCounter > $totalProjects)
    {  break;  } 
} 

// This is hardcoded until we implement additional projects
if($projCounter < 1) 
{  
    $projShortNames[] = 'HT'; 
    $projShortNames[] = 'VT';
    $projShortNames[] = 'OT';
}
if($projCounter == 1)
{ 
  $projShortNames[] = 'VT';
  $projShortNames[] = 'OT';
}

if(count($projScoreArray) < $totalProjects)
{
    $index = count($projScoreArray) - 1;
    for($i=$index; $i < $totalProjects; $i++)
    {
         $projScoreArray[] = 0;
    }
}

//-------------------------------------------
// Get completed lessons
$completeCounter = 0;
foreach($completeLessons as $myLesson)  
{
    if($DB->get_record('course_modules_completion', array('userid'=>$USER->id, 'coursemoduleid'=>$myLesson->id)))
    {
        $completeCounter++;
    }
}
$totalLessonPercent = (int)(($completeCounter / $totalLessInCourse) * 100);

//-------------------------------------------
// Get the course teacher -- only they have the "rating" capability
$context = context_course::instance($currentLesson->course);
$userList = get_enrolled_users($context, 'mod/vrlesson:rate');
$teacher = 0;
foreach($userList as $user) {  $teacher = $user; break; }
$teacherName = $teacher->firstname.' '.$teacher->lastname;
$teacherMessageLink = $CFG->wwwroot.'/message/index.php?id='.$teacher->id;

//-------------------------------------------
// Get User's class (or group, with moodle speak)
$groups = groups_get_all_groups($currCourseID, $USER->id);
$tempName = "";
foreach($groups as $singleGroup)
{
   $tempName .= $singleGroup->name;
}
if(!empty($tempName))
{  $className = $tempName;  }

//-------------------------------------------
// Get User information
if($timeEnrolled = $DB->get_record('user_enrolments', array('userid'=>$USER->id, 'enrolid'=>$currCourseID)))
{
    $finalStartDate = date('F d, Y', $timeEnrolled->timestart);
    
    if(!empty($timeEnrolled->timeend))
    {  $finalEndDate = date('F d, Y', $timeEnrolled->timeend);  }
}

//-------------------------------------------
// Get and save the user's avatar info to this database field
$avatarFieldId = $DB->get_record('user_info_field', array('shortname'=>'useravatar'), 'id');
$avatarContent = $DB->get_record('user_info_data', array('userid'=>$USER->id, 'fieldid'=>$avatarFieldId->id));
                                              
$helmetImage = $CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/helmet2.png';
$shirtImage = $CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shirt1.png';
$glovesImage = $CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/gloves1.png';
$shoesImage = $CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shoes1.png';
$pantsImage = $CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/pants1.png';

if($avatarContent)
{  
   $clothingArray = explode(",", $avatarContent->data);  
   foreach($clothingArray as $clothing)
   {
   	$clothingImage = explode(": ", $clothing); 
	switch($clothingImage[0])
	{
	   case 'Helmet':  {
	   	$helmetImage = $clothingImage[1];
	   }break;
	   case 'Shirt':  {
	   	$shirtImage = $clothingImage[1];
	   }break;
	   case 'Gloves':  {
	   	$glovesImage = $clothingImage[1];
	   }break;
	   case 'Shoes':  {
	   	$shoesImage = $clothingImage[1];
	   }break;
	   case 'Pants':  {
	   	$pantsImage = $clothingImage[1];
	   }break;
	}
   }
}


//-------------------------------------------
// Render the Page
//-------------------------------------------
echo 
'<div class="container" >   
    <div class="colmask rightmenu">
        <div class="colleft">
            <div class="col1">      
                <!-- Column 1 start --> 
                <div class="classinfo" >
                   <h3>Enrollment</h3>
                   <div class="studentinfo" >
                       <p>Started: <span style="color:black;">'.$finalStartDate.'</span><br />
                       Completed: <span style="color:black;">'.$finalEndDate.'</span></p>
                   </div>
                </div>
                <div class="avatarwidget">
                    <img class="avatarbg" src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/bgAvatar.jpg" />
                    <div class="defaultavatar" id="defaultavatar">
                        <img id="helmet" src="'.$helmetImage.'" />
                        <img id="shirt" src="'.$shirtImage.'" />
                        <img id="gloves" src="'.$glovesImage.'" />
                        <img id="shoes" src="'.$shoesImage.'" />
                        <img id="pants" src="'.$pantsImage.'" />
                    </div>
                    <div class="clothingslider">
                    	<img id="iconhelmet" src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/helmet.jpg" onclick="toggleHelmets();" />
                    	<img id="iconshirt" src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/jacket.jpg" onclick="toggleShirts();" />
                    	<img id="icongloves" src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/gloves.jpg" onclick="toggleGloves();" />
                    	<img id="iconpants" src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/pants.jpg" onclick="togglePants();" />
                    	<img id="iconshoes" src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/shoes.jpg" onclick="toggleShoes();" />                    	
                    </div>
                    <div id="helmetchoices" >
                    	<a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/helmet2.png" onclick="swaphelmet(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/helmet.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/helmet3.png" onclick="swaphelmet(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/helmet3.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/helmet4.png" onclick="swaphelmet(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/helmet4.jpg" />
                        </a>  
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/helmet5.png" onclick="swaphelmet(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/helmet5.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/helmet6.png" onclick="swaphelmet(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/helmet6.jpg" />
                        </a> 
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/helmet7.png" onclick="swaphelmet(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/helmet7.jpg" />
                        </a>                                                                          			
                    </div>
                    <div id="shirtchoices" >
                    	<a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shirt1.png" onclick="swapshirt(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/jacket.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shirt2.png" onclick="swapshirt(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/jacket2.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shirt4.png" onclick="swapshirt(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/jacket4.jpg" />
                        </a>  
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shirt5.png" onclick="swapshirt(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/jacket5.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shirt6.png" onclick="swapshirt(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/jacket6.jpg" />
                        </a> 
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shirt7.png" onclick="swapshirt(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/jacket7.jpg" />
                        </a>                                                                          			
                    </div>
                    <div id="glovechoices" >
                    	<a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/gloves1.png" onclick="swapgloves(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/gloves.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/gloves2.png" onclick="swapgloves(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/gloves2.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/gloves4.png" onclick="swapgloves(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/gloves4.jpg" />
                        </a>  
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/gloves5.png" onclick="swapgloves(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/gloves5.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/gloves6.png" onclick="swapgloves(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/gloves6.jpg" />
                        </a> 
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/gloves7.png" onclick="swapgloves(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/gloves7.jpg" />
                        </a>                                                                          			
                    </div>
                    <div id="pantchoices" >
                    	<a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/pants1.png" onclick="swappants(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/pants.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/pants2.png" onclick="swappants(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/pants2.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/pants4.png" onclick="swappants(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/pants4.jpg" />
                        </a>  
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/pants5.png" onclick="swappants(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/pants5.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/pants6.png" onclick="swappants(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/pants6.jpg" />
                        </a> 
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/pants7.png" onclick="swappants(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/pants7.jpg" />
                        </a>                                                                          			
                    </div>
                    <div id="shoechoices" >
                    	<a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shoes1.png" onclick="swapshoes(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/shoes.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shoes2.png" onclick="swapshoes(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/shoes2.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shoes4.png" onclick="swapshoes(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/shoes4.jpg" />
                        </a>  
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shoes5.png" onclick="swapshoes(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/shoes5.jpg" />
                        </a>
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shoes6.png" onclick="swapshoes(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/shoes6.jpg" />
                        </a> 
                        <a href="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingAvatar/shoes7.png" onclick="swapshoes(this); return false;">
                           <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/avatar/ClothingIcons/shoes7.jpg" />
                        </a>                                                                          			
                    </div>
                </div>
            </div>
            <div class="col2">
                <!-- Column 2 start -->
                <div class="classinfo" >
                   <h3>Class Information</h3>
                   <div class="studentinfo" >
                       <p>Teacher: <span style="color:black;">'.$teacherName.'</span><br />
                       My Class: <span style="color:black;">'.$className.'</span></p>
                   </div>
                   <div class="avatarbutton"><a href="'.$teacherMessageLink.'" >Contact Teacher</a></div>
                </div>
                
                <!-- Total Lesson Completed -->
                <div class="lessoncompleted" >
                    <h3>Total Lessons Completed</h3>';
                       if($totalLessonPercent < 1)  {
                           echo '<div class="progress-bar white" id="totallessonbar">';
                           echo '<span style="width:9%;" >';
                           echo '<p style="color:black; ">';
                       }
                       else if ($totalLessonPercent < 100)  { 
                           echo '<div class="progress-bar red" id="totallessonbar">';
                           echo '<span style="width:'.$totalLessonPercent.'%;" >';
                           echo '<p>'; 
                       }
                       else if ($totalLessonPercent >= 100)  { 
                           echo '<div class="progress-bar-complete green" id="totallessonbar">';
                           echo '<span style="width:'.$totalLessonPercent.'%;" >';
                           echo '<p>'; 
                       }
                      echo $totalLessonPercent.'%</p></span>
                    </div>
                    <div class="avatarbutton"><a href="'.$CFG->wwwroot.'/course/view.php?id='.$currCourseID.'" >View Lessons</a></div>
                </div>
                
                <!-- Current Lesson -->
                <div class="currlesson" >
                    <h3>Current Lesson: <span style="color:black;">'.$currentLesson->name.'</span></h3>';
                        if($completeCounter >= $totalLessInSection)  {
                            echo '<div class="progress-block-complete gray" id="totallessonbar">';
                        }
                        else  {
                            echo '<div class="progress-block gray" id="totallessonbar">';
                        }
                        $romanString = "I";
                        for($i = 0; $i < $totalLessInSection; $i++)
                        {
                            if($i < $completeCounter)  {
                            	echo '<span class="greenblock">';
                            }
                            else  { echo '<span>';  }
                            echo '<p>'.$romanString.'</p></span>';
                            $romanString .= "I";
                        }
                    echo '</div>
                    <div class="avatarbutton"><a href="'.$CFG->wwwroot.'/mod/vrlesson/view.php?d='.$currentLesson->id.'" >View Details</a></div>
                </div>
                
                <!-- Current Project-->
                <div class="currproject" >
                    <h3>Projects Completed</h3>';
                    
                        $myGreenString = "";
                        $myGreenCount = 0;
                        for($i = 0; $i < count($projShortNames); $i++)
                        {
                             if((int)$projScoreArray[$i] >= (int)$currentLesson->scale) {
                                 $myGreenString .= '<span class="greenblock">';
                                 $myGreenCount++;
                              } 
                              else 
                              {   $myGreenString .= '<span>';  }
                              $myGreenString .= '<p>'.$projShortNames[$i].'</p></span>';
                        }
                    if($myGreenCount >= count($projShortNames))  {
                       echo '<div class="progress-block-complete gray" id="currprojectbar">';
                    }
                    else
                    {
                        echo '<div class="progress-block gray" id="currprojectbar">';
                    }
                    echo $myGreenString;

                    echo '</div>
                    <p></p>
                    <p style="padding-bottom:0px;margin-bottom:0px;">Current Project: <span style="color:black;">'.$currProjName->content.'</span></p>';
                    if($projectScore < 100)  {
                    	 echo '<div class="progress-bar red" id="totalprojectbar">';
                    }
                    else  {
                        echo '<div class="progress-bar-complete green" id="totalprojectbar">';
                    }
                    echo  '<span style="width:'.$projectScore.'%;" >';
                    if($projectScore < 1)  {
                    	echo '<p style="color:black;" >';
                    }
                    else   {
                        echo '<p>';
                    }
                    echo $projectScore.'%</p></span>
                    </div>
                    <div class="avatarbutton"><a href="'.$CFG->wwwroot.'/mod/vrlesson/view.php?d='.$currentLesson->id.'&rid='.$currRID.'" >View Details</a></div>
                </div>
                
                <!-- Achievements -->
                <div class="achievements" >
                    <h3>Achievements</h3>
                    <p></p>';
                    if($hasUploaded)  
                    {
	                echo '<div class="achievementtopic" >
	                       <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/achievements/Achievement1_Icon.png" />
	                       <p><strong>Perfect Speed</strong><br />
	                       <span style="color:black;">Keep a constant speed without making mistakes</span></p>
	                    </div>
	                    <div class="achievementtopic" >
	                       <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/achievements/Achievement2_Icon.png" />
	                       <p><strong>The Right Angle</strong><br />
	                       <span style="color:black;">Maintain the perfect welding angle for an entire pass</span></p>
	                    </div>
	                    <div class="achievementtopic" >
	                       <img src="'.$CFG->wwwroot.'/theme/vrsim/pix/achievements/Achievement3_Icon.png" />
	                       <p><strong>Passing Along</strong><br />
	                       <span style="color:black;">All passes completed with no defects</span></p>
	                    </div>
	                </div>';
                   }
                   else
                   { echo '<p>No achievements have been earned yet</p>';  }
            echo '</div>
        </div>
    </div>
</div>

<script type="text/javascript">
//<![CDATA[

function saveClothing()
{
   var helmetImage = document.getElementById("helmet").src;
   var shirtImage = document.getElementById("shirt").src;
   var glovesImage = document.getElementById("gloves").src;
   var shoesImage = document.getElementById("shoes").src;
   var pantsImage = document.getElementById("pants").src;

   /*  Helmet: helmet5.png,Shirt: shirt1.png,Gloves: gloves4.png,Shoes: shoes1.png,Pants: pants1.png */
   var clothingString = new String();
   clothingString = "Helmet: " + helmetImage + ",";
   clothingString += "Shirt: " + shirtImage + ",";
   clothingString += "Gloves: " + glovesImage + ",";
   clothingString += "Shoes: " + shoesImage + ",";
   clothingString += "Pants: " + pantsImage;
   
    Y.io("'.$CFG->wwwroot.'/theme/vrsim/layout/saveAvatar.php", {
      method:"post",
      data: "avatar=" + clothingString,
      on: {
          success: function(id, o) {
                 /* alert(o.responseText); */
            }
      }
    });
}
    
//]]>
</script>


';


?>