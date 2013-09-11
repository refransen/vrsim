<?php
/////////////////////////////////////////////////////////////////////
// Project Report
//
// This is the main file that displays the lesson report within
// the vrlesson mod
/////////////////////////////////////////////////////////////////////

    require_once(dirname(__FILE__) . '/../../../config.php');
    require_once($CFG->dirroot . '/mod/vrlesson/lib.php');
    require_once($CFG->dirroot . '/mod/vrlesson/vrsimlib.php');

    require_once($CFG->dirroot . '/group/externallib.php');
    require_once($CFG->libdir . '/completionlib.php');

    //CSS
    $PAGE->requires->css('/mod/vrlesson/reports/dbstyle.css');

/// One of these is necessary!
    $id = optional_param('id', 0, PARAM_INT);  // course module id
    $d = optional_param('d', 0, PARAM_INT);   // database id
    $rid = optional_param('rid', 0, PARAM_INT);    //record id
    $mode = optional_param('mode', '', PARAM_ALPHA);    // Force the browse mode  ('single')
    $filter = optional_param('filter', 0, PARAM_BOOL);
    // search filter will only be applied when $filter is true

    // Can use some custom functions in my own vrsim library
    $vroptions = new vrlesson_csv();
    
    $edit = optional_param('edit', -1, PARAM_BOOL);
    $page = optional_param('page', 0, PARAM_INT);
/// These can be added to perform an action on a record
    $approve = optional_param('approve', 0, PARAM_INT);    //approval recordid
    $delete = optional_param('delete', 0, PARAM_INT);    //delete recordid

    if ($id) {
        if (! $cm = get_coursemodule_from_id('vrlesson', $id)) {
            print_error('invalidcoursemodule');
        }
        if (! $course = $DB->get_record('course', array('id'=>$cm->course))) {
            print_error('coursemisconf');
        }
        if (! $data = $DB->get_record('vrlesson', array('id'=>$cm->instance))) {
            print_error('invalidcoursemodule');
        }
        $record = NULL;

    } else if ($rid) {
        if (! $record = $DB->get_record('vrlesson_records', array('id'=>$rid))) {
            print_error('invalidrecord', 'vrlesson');
        }
        if (! $data = $DB->get_record('vrlesson', array('id'=>$record->dataid))) {
            print_error('invalidid', 'vrlesson');
        }
        if (! $course = $DB->get_record('course', array('id'=>$data->course))) {
            print_error('coursemisconf');
        }
        if (! $cm = get_coursemodule_from_instance('vrlesson', $data->id, $course->id)) {
            print_error('invalidcoursemodule');
        }
    } else {   // We must have $d
        if (! $data = $DB->get_record('vrlesson', array('id'=>$d))) {
            print_error('invalidid', 'vrlesson');
        }
        if (! $course = $DB->get_record('course', array('id'=>$data->course))) {
            print_error('coursemisconf');
        }
        if (! $cm = get_coursemodule_from_instance('vrlesson', $data->id, $course->id)) {
            print_error('invalidcoursemodule');
        }
        $record = NULL;
    }

    require_course_login($course, true, $cm);

    $context = context_module::instance($cm->id);
    require_capability('mod/vrlesson:viewentry', $context);

/// If we have an empty Database then redirect because this page is useless without data
    if (has_capability('mod/vrlesson:rate', $context)) {
        if (!$DB->record_exists('vrlesson_fields', array('dataid'=>$data->id))) {      // Brand new database!
            redirect($CFG->wwwroot.'/mod/vrlesson/field.php?d='.$data->id);  // Redirect to field entry
        }
    }

/// Paging options:
    $perpage   = optional_param('perpage', 20, PARAM_INT);
    $sort      = optional_param('sort', 'coursename', PARAM_ALPHANUM);
    $dir       = optional_param('dir', 'ASC', PARAM_ALPHA);
    //  ACTION
    $action    = optional_param('action', 'list', PARAM_ALPHA);
    $view      = optional_param('view', 'student', PARAM_ALPHA);
    $group     = optional_param('group', '0', PARAM_INT);
    $project   = optional_param('project', '0', PARAM_INT);    // current selected project
    $userid    = optional_param('userid', '0', PARAM_INT);     // current selected student
    $projectid = optional_param('projectid', '0', PARAM_INT);     // current selected project recrod id

    
    // Use SVG to draw sideways text if supported
    $svgcleverness = can_use_rotated_text();

    if ($svgcleverness) {
        $PAGE->requires->js('/mod/vrlesson/reports/dbdata.js');
        $PAGE->requires->js_function_call('textrotate_init', null, true);
    }
    
    $PAGE->set_url('/reports/projectreport.php');
    $PAGE->set_pagelayout('course');
    
    // Set the site title
    //------------------------------------------
    $pageName = 'Project Report';
    $PAGE->set_title($pageName);
    $PAGE->set_heading($SITE->fullname);                                                   

    /// Print header
    //------------------------------------------
    $PAGE->navbar->add($pageName, new moodle_url('/reports/projectreport.php'));
    echo $OUTPUT->header();

    // Display the lesson title
    //------------------------------------------
    echo '<div id="titlesection" >';
    echo '<div id="myheader" ><h3>'.$pageName.'</h3></div><div id="blankheader" ></div>';
    echo '<p></p>';

    // Get the project name
    //----------------------------------------
    $nameField = $DB->get_record('vrlesson_fields', array('dataid'=>$data->id, 'name'=>'Project Name'));
    $projects = $DB->get_records('vrlesson_content', array('fieldid'=>$nameField->id));
    $projNameArray = array();
    foreach($projects as $singleProj)
    {
        $projNameArray[] = $singleProj->content;
    }
    $projNameArray = array_unique($projNameArray);

    // TODO: Get the project id
    //------------------------------------------
    if(empty($projectid))
    { 
        $projects = $DB->get_records('vrlesson_records', array('dataid'=>$data->id));
        $projRID = 0;
        foreach($projects as $singleProj)
        {  $projectid  = $singleProj->id;  break; }
    }

    // Get the content for this project
    //-------------------------------------------
    $descField = $DB->get_record('vrlesson_fields', array('dataid'=>$data->id, 'name'=>'Project Description'));
    $datafield = $DB->get_record('vrlesson_fields', array('dataid'=>$data->id, 'type'=>'menu', 'name'=>'Name Menu'));
    $processfield = $DB->get_record('vrlesson_fields', array('dataid'=>$data->id, 'name'=>'Process'));     

    $projectName = $projNameArray[$project];
    $projDesc = $DB->get_record('vrlesson_content', array('recordid'=>$projectid, 'fieldid'=>$descField->id));
    $projProcess = $DB->get_record('vrlesson_content', array('recordid'=>$projectid, 'fieldid'=>$processfield->id));
    $menuoptions = explode("\n",$datafield->param1);

    // Print the lesson description
    //------------------------------------------
    $myLessonURL = new moodle_url('/mod/vrlesson/reports/dbreport.php', array('id'=>$PAGE->cm->id));

    echo '<h4>Project Name: <p>'.$projectName.'</p></h4>
    <h4>Description:  <p>'.$projDesc->content.'</p></h4>
    <div class="createbutton">
     <a href="'.$myLessonURL.'">View Lesson Report</a></div>
    </div>';

    
    // Create the table filters
    //------------------------------------------
    $viewopts = array('student' => 'Student','class' => 'Class');
    $viewform = 'Choose View: ' . $OUTPUT->single_select(new moodle_url('/mod/vrlesson/reports/projectreport.php', 
          array('id'=>$id, 'group'=>$group)), 'view', $viewopts, $selected = $view, '', $formid = 'fnview');
    
    $groupopts = array();
    $groupopts[0] = 'All';
    if ($groups = $DB->get_records('groups', array('courseid'=>$course->id))){
        foreach ($groups as $cgroup) {
            $groupopts[$cgroup->id] = $cgroup->name;
        }        
    }
    $groupform = 'Choose Class: ' . $OUTPUT->single_select(new moodle_url('/mod/vrlesson/reports/projectreport.php', 
          array('id'=>$id, 'view'=>$view) ), 'group', $groupopts, $selected = $group, '', $formid = 'fnclass');

    $projectsform = 'Choose Project: ' . $OUTPUT->single_select(new moodle_url('/mod/vrlesson/reports/projectreport.php', 
          array('id'=>$id, 'view'=>$view, 'group'=>$group, 'userid'=>$userid)), 'project', $projNameArray, $selected = $project, '', $formid = 'fnproject');
    
    // Print the table filters
    //------------------------------------------
    echo '<table class="filtertable" ><tr><td>'.$viewform.'</td>'.
         '<td>'.$groupform.'</td>'.
         '<td>'.$projectsform.'</td>'.
         '</tr></table>';
    
    // USERS that have entry
    //------------------------------------------
    if ($group == 0) { 
        $sqlUsers = "SELECT ra.userid as id 
                       FROM {$CFG->prefix}role_assignments AS ra 
                 INNER JOIN {$CFG->prefix}context AS ctx 
                         ON ra.contextid = ctx.id 
                      WHERE ra.roleid = 5 
                        AND ctx.instanceid = ".$course->id." 
                        AND ctx.contextlevel = 50";
                        
        if (!$dataUsers = $DB->get_records_sql($sqlUsers)) {
            redirect($CFG->wwwroot.'/mod/vrlesson/view.php?d='.$data->id);  // Redirect to main DB page
        }
                                    
    }else{
        if (!$dataUsers  = groups_get_members($group, 'u.id', 'lastname ASC, firstname ASC')) {
            redirect($CFG->wwwroot.'/mod/vrlesson/view.php?d='.$data->id);  // Redirect to main DB page
        }            
    }
    
    // CREATE THE STUDENT VIEW
    //------------------------------------------
    switch($view)
    {  
        case 'student':  
        {
            // see project data for individual students. 
            // Change data display with AJax based on project
            echo '<div class="studentcontent" ><div class="studentlist" >
                  <h3>Student Names</h3>
                <ul>';

            // Create the list of students
           foreach ($dataUsers as $student) 
           {
                $user = $DB->get_record('user', array('id'=>$student->id));
                
                // If no user is selected, set the default to the first student on the list
                if(empty($userid))
                { $userid = $student->id; }
                
                // Highlight the current user
                if($student->id == $userid)
                {  echo '<li class="liselected" >'; }
                else
                {  echo '<li>';  }
                
                $myURL = new moodle_url('/mod/vrlesson/reports/projectreport.php', 
                     array('id'=>$id, 'view'=>$view, 'group'=>$group, 'userid'=>$student->id, 'project'=>$project, 'projectid'=>$projectid));
                     
                echo '<a href="'.$myURL.'" >'.$user->firstname.' '.$user->lastname.'</a></li>';
            }
            echo '</ul>';
  
	    // Get current selected user name
	    $currUser = $DB->get_record('user', array('id'=>$userid));
	          
            // Get user score
            $score = $vroptions->get_highest_score($projectName, $currUser->id);
            $highestEntryID = $vroptions->get_highest_entryid();
            $projectid = $highestEntryID;

            // Get user technique data
            $numAttempts = 0;
            $attemptsField = $DB->get_record('vrlesson_fields', array('dataid'=>$data->id, 'name'=>'Total Attempts'));
            if($attemptContent = $DB->get_record('vrlesson_content', array('recordid'=>$projectid, 'fieldid'=>$attemptsField->id)))
            {
               $numAttempts = $attemptContent->content;
            }
            $guidanceMess = "None";
            if($score < $data->scale)
            {
            	if($numAttempts < 3)  {
            	    $guidanceMess = "Student should attempt this project again";
            	}
                else  {
                    $guidanceMess = "Student needs personal attention to pass this project";
                }
            }

            // Create some defaults
            $pos = $ctwd = $ta = $wa = $spd = 0;
            $worstTechName = $bestTechName = "None";
	    $worstTechScore = $bestTechScore = 0; 
	    $myDate = "--";
	    $myTime = "--";
	
            // Parse the Passes data
            $passField = $DB->get_record('vrlesson_fields', array('dataid'=>$data->id, 'name'=>'Passes'));
            if($passcontent = $DB->get_record('vrlesson_content', array('recordid'=>$projectid, 'fieldid'=>$passField->id)))
            {
	            $passcontent = explode("\n", $passcontent->content);
	            $techData = explode(";", $passcontent[0]);
	            $techArray = array();
	            foreach($techData as $singleData)
	            {
	                 $tempArray = explode(": ", $singleData);
	          	 switch($tempArray[0])
	          	 {
	               	    case 'Position':  {
	                       $pos = (int)$tempArray[1];
	                       $techArray['Position'] = $pos;
	                    } break;
	                    case 'CTWD':  {
	                       $ctwd = (int)$tempArray[1];
	                       $techArray['CTWD'] = $ctwd;
	               	    } break;
	               	    case 'Travel Angle':  {
	                       $ta = (int)$tempArray[1];
	                       $techArray['Travel Angle'] = $ta;
	               	    } break;
	              	    case 'Work Angle':  {
	                       $wa = (int)$tempArray[1];
	                       $techArray['Work Angle'] = $wa;
	              	    } break;
	               	    case 'Speed':  {
	                       $spd = (int)$tempArray[1];
	                       $techArray['Speed'] = $spd;
	               	    } break;
	               	    case 'Date':  {
	                       $myDate = $tempArray[1];
	               	    }
	               	    break;
	               	    case 'Time':  {
	                       $myTime = $tempArray[1];
	               	    } break;
	          	}
	            }
	            
	            asort($techArray);
	            $worstTechName = key($techArray);
	            if(!empty($worstTechName))
	            {  $worstTechScore = $techArray[$worstTechName]; }
	
	            arsort($techArray);
	            $bestTechName = key($techArray);
	            if(!empty($bestTechName)) 
	           {   $bestTechScore = $techArray[$bestTechName];  }
	    }

            // Create the student data
            //----------------------------
            echo '</div>
            <div class="studentdisplay" >
                <div class="studentchart" >
                    <h3>Average Scores:</h3>
                    <h4 style="text-align:center;" >Project Attempts: <span>'.$numAttempts.'</span></h4>
                    <h4 style="text-align:center;" >Overall Score: ';
                    if($score >= $data->scale)
                    {  echo '<span class="greenGrade" >';  }
                    else 
                    {  echo '<span>';   }
                    echo $score.'%</span></h4>
                    <canvas id="radarchart" width="300" height="250" >[No canvas support]</canvas>
                </div>
                <div class="studentinfo" >
                   <h3>Student Name: <span>'.$currUser->firstname.' '.$currUser->lastname.'</span></h3>
                   <h4>Project Name: <span>'.$projectName.'</span></h4>
                   <h4>Process: <span>'.$projProcess->content.'</span></h4>
                   <h4>Date: <span>'.$myDate.'</span></h4>
                   <h4>Time Completed: <span>'.$myTime.'</span></h4>
                   <div class="spacer" ></div>
                   <h4>Guidance Needed: <span>'.$guidanceMess.'</span></h4>
                   <div class="spacer" ></div>
                   <h3 class="progressheader" >Best Technique: <span>'.$bestTechName.'</span></h3>';
                   if($bestTechScore >= $data->scale)
                   {  echo '<div class="progress-bar-complete green" >'; }
                   else
                   {  echo '<div class="progress-bar red">'; }
                   echo  '<span style="width:'.$bestTechScore.'%;" >';
                   if($bestTechScore <= 10)
                   {  echo '<p style="color:black;" >'; }
                   else  {  echo '<p>'; }
                   echo $bestTechScore.'%</p></span>
                   </div>
                   <h3 class="progressheader" >Needs Improvement: <span>'.$worstTechName.'</span></h3>
                   <div class="progress-bar red">
                       <span style="width:'.$worstTechScore.'%;" >';
                   if($worstTechScore <= 10)
                   {  echo '<p style="color:black;" >';  }
                   else  {  echo '<p>';  }    
                   echo $worstTechScore.'%</p></span>
                   </div>
                </div>
            </div></div>';   

         // Draw the technique radar
         //---------------------------
         $techString = $pos.','.$ctwd.','.$ta.','.$wa.','.$spd;

         echo "<script type=\"text/javascript\" >
         var radar1 = new RGraph.Radar('radarchart', [".$techString."]); 
         radar1.Set('chart.labels.offset', 18);
         radar1.Set('chart.ymax', 100);
         radar1.Set('chart.gutter.right', 30);

         radar1.Set('chart.background.circles.color', ['#6e6e6e']); 
         radar1.Set('chart.strokestyle', ['black']);
         radar1.Set('chart.highlights', true);

         radar1.Set('chart.labels', ['Position', 'CTWD', 'Travel Angle','Work Angle','Speed']);
         radar1.Set('chart.text.color', '#b20700'); 
         radar1.Set('chart.tooltips', [".$techString."]);
         radar1.Set('chart.colors', ['Gradient(blue:rgba(254,198,0,255):rgba(84,244,0,255))']);
         radar1.Set('chart.colors.alpha',0.9); 

         radar1.Set('chart.labels.axes', 'n');
         radar1.Set('chart.labels.axes.boxed', [false,false,false,false,false]);
         radar1.Set('chart.labels.axes.boxed.zero', false);
         radar1.Set('chart.labels.axes.bold.zero',true);
         radar1.Set('chart.labels.axes.bold', [true,true,true,true,true]);
         RGraph.Effects.Radar.Grow(radar1);
         </script>";
             
              
        }break;
        case 'class':  
        {
            // Create some defaults
            $pos = $ctwd = $ta = $wa = $spd = 0;
            $worstTechName = $bestTechName = "None";
	    $worstTechScore = $bestTechScore = 0; 
	    $techArray = array();
	    $usersNoUpload = 0; 	// Keep track of users that didn't upload yet
	    
            // Get the technique averages for all students
            foreach ($dataUsers as $student) 
            {
                // Get user score
                $vroptions->get_highest_score($projectName, $student->id);
                $highestEntryID = $vroptions->get_highest_entryid();
                
                if($highestEntryID == 0)
                {   $usersNoUpload++;  }
	
                // Parse the Passes data
                $passField = $DB->get_record('vrlesson_fields', array('dataid'=>$data->id, 'name'=>'Passes'));
                if($passcontent = $DB->get_record('vrlesson_content', array('recordid'=>$highestEntryID, 'fieldid'=>$passField->id)))
                {
	            $passcontent = explode("\n", $passcontent->content);
	            $techData = explode(";", $passcontent[0]);
	            foreach($techData as $singleData)
	            {
	                 $tempArray = explode(": ", $singleData);
	          	 switch($tempArray[0])
	          	 {
	               	    case 'Position':  {
	                       $pos += (int)$tempArray[1];
	                       $techArray['Position'] = $pos;
	                    } break;
	                    case 'CTWD':  {
	                       $ctwd += (int)$tempArray[1];
	                       $techArray['CTWD'] = $ctwd;
	               	    } break;
	               	    case 'Travel Angle':  {
	                       $ta += (int)$tempArray[1];
	                       $techArray['Travel Angle'] = $ta;
	               	    } break;
	              	    case 'Work Angle':  {
	                       $wa += (int)$tempArray[1];
	                       $techArray['Work Angle'] = $wa;
	              	    } break;
	               	    case 'Speed':  {
	                       $spd += (int)$tempArray[1];
	                       $techArray['Speed'] = $spd;
	               	    } break;
	          	}
	            }
	        }
            }
            $totalStudents = count($dataUsers) - $usersNoUpload;
            // Now we need to average all the scores
            $pos = (int)($pos / $totalStudents);
            $ctwd =  (int)($ctwd / $totalStudents);
            $ta = (int)($ta / $totalStudents);
            $wa = (int)($wa / $totalStudents);
            $spd = (int)($spd / $totalStudents);

            asort($techArray);
	    $worstTechName = key($techArray);
	    if(!empty($worstTechName))
	    {  $worstTechScore = (int)($techArray[$worstTechName] / $totalStudents); }
	
	    arsort($techArray);
	    $bestTechName = key($techArray);
	    if(!empty($bestTechName)) 
	    {   $bestTechScore = (int)($techArray[$bestTechName] / $totalStudents);  }

           /* $bestTechName = "Speed";
            $bestTechScore = 90;
            $worstTechName = "Position";
            $worstTechScore = 50; */
            
            echo '
            <div class="barcontent" >
            	<div id="barchart">
                    <canvas id="classtech" width="500" height="450" >[No canvas support]</canvas>
             	</div>
             	<div id="gradeInfo">
                     <h3>Highest Class Technique</h3>';
                     if($bestTechScore >= $data->scale)  
                     {  echo '<div class="passaveragegrade">';  }
                     else
                     {  echo '<div class="averagegrade" >';  }
                     echo $bestTechName;
                     if(!empty($bestTechName) && $bestTechName !== "")
                     { echo ': '; }
                     echo $bestTechScore.'%</div>';

                     echo '<div class="spacer" ></div>
                     <h3>Lowest Class Technique: <span>'.$worstTechName.'</span></h3>
                     <div class="progress-bar red">
                         <span style="width:'.$worstTechScore.'%;" ><p>'.$worstTechScore.'%</p></span>
                     </div>
                     <div class="spacer" ></div>';
                     if($usersNoUpload > 0)
                     {
                          echo '<h3>Number of users with zero attempts</h3>
             	          <div class="averagegrade" style="width:40px;" >'.$usersNoUpload.'</div>';
                     }
              echo' </div>
            </div>';

        // This prints out the required HTML markup
        $techString = $pos.','.$ctwd.','.$ta.','.$wa.','.$spd;

        echo '<script type="text/javascript" >';
        echo' var barchart = new RGraph.Bar("classtech", ['.$techString.']);
              barchart.Set("chart.title", "");
              barchart.Set("chart.ymax", 100);
              barchart.Set("chart.hmargin", 25);
              barchart.Set("chart.labels.above", true);
              barchart.Set("chart.labels.above.size", 16); 
              barchart.Set("chart.text.angle", 45);   
              barchart.Set("chart.axis.linewidth", 1); 
              barchart.Set("chart.title.xaxis", "Project Techniques"); 
              barchart.Set("chart.title.yaxis", "Class Average Scores"); 
              barchart.Set("chart.title.xaxis.pos", 0.30);
              barchart.Set("chart.title.yaxis.pos", 0.35);    
              
              barchart.Set("chart.background.grid.vlines", false);
              barchart.Set("chart.gutter.bottom", 110); 
              barchart.Set("chart.gutter.left", 90);  
              barchart.Set("chart.labels", ["Position", "CTWD", "Travel Angle","Work Angle","Speed"]);
              barchart.Set("chart.colors.sequential", true);
              barchart.Set("chart.strokestyle", "black");
              barchart.Set("chart.colors", ["#f2ed40", "#9ccb3b", "#f6971f", "#1fe2f4", "#3a5caa"]);
              RGraph.Effects.Bar.Grow(barchart);
       </script>';

        }break;
        
    } 
   
    echo $OUTPUT->footer();