<?php
/////////////////////////////////////////////////////////////////////
// Lesson Report
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
    $id = optional_param('id', 0, PARAM_INT);            // course module id
    $d = optional_param('d', 0, PARAM_INT);              // database id
    $mode = optional_param('mode', '', PARAM_ALPHA);     // Force the browse mode  ('single')
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
    $lesson    = optional_param('lesson', '0', PARAM_INT);
    
    // Use SVG to draw sideways text if supported
    $svgcleverness = can_use_rotated_text();

    if ($svgcleverness) {
        $PAGE->requires->js('/mod/vrlesson/reports/dbdata.js');
        $PAGE->requires->js_function_call('textrotate_init', null, true);
    }
    
    $PAGE->set_url('/reports/dbreport.php');
    $PAGE->set_pagelayout('course');
    
    // Set the site title
    //------------------------------------------
    $pageName = 'Lesson Report';
    $PAGE->set_title($pageName);
    $PAGE->set_heading($SITE->fullname);                                                   

    /// Print header
    //------------------------------------------
    $PAGE->navbar->add($pageName, new moodle_url('/reports/dbreport.php'));
    echo $OUTPUT->header();

    // Display the lesson title
    //------------------------------------------
    echo '<div id="titlesection" >';
    echo '<div id="myheader" ><h3>'.$pageName.'</h3></div><div id="blankheader" ></div>';
    echo '<p></p>';

    // Get all the lessons for this section (aka process)
    //-------------------------------------------------------
    $allCourseMods = $DB->get_records('course_modules', array('section'=>$cm->section, 'course'=>$cm->course, 'module'=>24));
    $allLessons = array();
    $allLessonNames = array();
    foreach($allCourseMods as $singleMod)
    {
        if($myLesson = $DB->get_record('vrlesson', array('id'=>$singleMod->instance, 'course'=>$singleMod->course)))
        {   
            $allLessons[] = $myLesson;  
            $allLessonNames[] = $myLesson->name;
        }
    }
    if(empty($lesson))
    {
        $lesson = 0;
    }

    $data = $allLessons[$lesson];

    // Get the lesson description
    $startWord = 'descinfo" >';
    $pos = strpos($data->intro, $startWord);
    $pos2 = strpos($data->intro, "</p>");
    $introText = 'This is my lesson description';
    if($pos !== false)  {
        $pos += strlen($startWord);
        $introText = substr($data->intro, $pos, $pos2);
        $introText = trim($introText);
        $introText = strip_tags($introText);
    }

    // Print the lesson description
    //------------------------------------------
    $myProjURL = new moodle_url('/mod/vrlesson/reports/projectreport.php', array('id'=>$PAGE->cm->id));
    echo '<h4>Process: <p>'.$data->name.'</p></h4>
    <h4>Description:  <p>'.$introText.'</p></h4>
    <div class="createbutton">
     <a href="'.$myProjURL.'">View Project Report</a></div>
    </div>';
    
    // Create the table filters
    //--------------------------------
    $viewopts = array('student' => 'Student','class' => 'Class');
    $viewform = 'Choose View: ' . $OUTPUT->single_select(new moodle_url('/mod/vrlesson/reports/dbreport.php', 
          array('id'=>$id, 'group'=>$group, 'lesson'=>$lesson)), 'view', $viewopts, $selected = $view, '', $formid = 'fnview');
    
    $groupopts = array();
    $groupopts[0] = 'All';
    if ($groups = $DB->get_records('groups', array('courseid'=>$course->id))){
        foreach ($groups as $cgroup) {
            $groupopts[$cgroup->id] = $cgroup->name;
        }        
    }
    $groupform = 'Choose Class: ' . $OUTPUT->single_select(new moodle_url('/mod/vrlesson/reports/dbreport.php', 
          array('id'=>$id, 'view'=>$view, 'lesson'=>$lesson) ), 'group', $groupopts, $selected = $group, '', $formid = 'fnclass');

    $lessonsform = 'Choose Lesson: ' . $OUTPUT->single_select(new moodle_url('/mod/vrlesson/reports/dbreport.php', 
          array('id'=>$id, 'view'=>$view, 'group'=>$group)), 'lesson', $allLessonNames, $selected = $lesson, '', $formid = 'fnproject');
    
    // Print the table filters
    //------------------------------------------
    echo '<table class="filtertable" ><tr>
          <td>'.$viewform.'</td>'.
         '<td>'.$groupform.'</td>'.
         '<td>'.$lessonsform.'</td>'.
         '</tr></table>';
    
    // Get the short project names
    //----------------------------------------
    $nameField = $DB->get_record('vrlesson_fields', array('dataid'=>$data->id, 'name'=>'Project Name'));
    $projects = $DB->get_records('vrlesson_content', array('fieldid'=>$nameField->id));
    $projNameArray = array();
    foreach($projects as $singleProj)
    {
        $projNameArray[] = $singleProj->content;
    }
    $menuoptions = array_unique($projNameArray);
    
    // USERS that have entry
    if ($group == 0) { 
        $sqlUsers = "SELECT ra.userid as id 
                       FROM {$CFG->prefix}role_assignments AS ra 
                 INNER JOIN {$CFG->prefix}context AS ctx 
                         ON ra.contextid = ctx.id 
                      WHERE ra.roleid = 5 
                        AND ctx.instanceid = ".$course->id." 
                        AND ctx.contextlevel = 50";
                        
        if (! $dataUsers = $DB->get_records_sql($sqlUsers)) {
            redirect($CFG->wwwroot.'/mod/vrlesson/field.php?d='.$data->id);  // Redirect to field entry
        }
                                    
    }else{
        if (! $dataUsers  = groups_get_members($group, 'u.id', 'lastname ASC, firstname ASC')) {
            redirect($CFG->wwwroot.'/mod/vrlesson/field.php?d='.$data->id);  // Redirect to field entry
        }            
    }
    
    // CREATE THE STUDENT VIEW
    //------------------------------------------
    if ($view == 'student') 
    {  
          
        $columns = array('dbstudent', 'menu0', 'menu1', 'menu2', 'process', 'complete', 'note');
        
        $dbstudent = 'CRITERIA';
        $progress = 'PROGRESS';
        $complete = 'COMPLETE?';
        $note = 'TEACHER NOTES';
        
        $menuCounter = 0;
        foreach($menuoptions as $myOption)
        {
            $menuvar = 'menu'.$menuCounter;
            
            $newKey = str_replace('"', '', $myOption);
            $nameArray = explode(" ", $newKey);
            $finalName = $nameArray[0].' ' .$nameArray[1];
            
            $$menuvar = strtoupper($finalName); 
            $menuCounter++;
        }

        if ($sort) {
            $sortSq = " ORDER BY $sort $dir";
        }

        //---------------------------------------
        // Make the headers row of the table
        //---------------------------------------
        $header_dbstudent = new html_table_cell($dbstudent);
        
        $header_menu0 = new html_table_cell("<a href=\"#\">$menu0</a>");
        $header_menu0->attributes['class'] = 'vertical';
      
        $header_menu1 = new html_table_cell("<a href=\"#\" >$menu1</a>");
        $header_menu1->attributes['class'] = 'vertical';
      
        $header_menu2 = new html_table_cell("<a href=\"#\" >$menu2</a>");
        $header_menu2->attributes['class'] = 'vertical';
      
        $header_process = new html_table_cell("<a href=\"#\" >$progress</a>");
        $header_process->attributes['class'] = 'vertical';
      
        $header_complete = new html_table_cell("<a href=\"#\" >$complete</a>");
        $header_complete->attributes['class'] = 'vertical';
      
        $header_note = new html_table_cell($note);
      
        $table = new html_table();
        $table->head = array(       
               $header_dbstudent,
               $header_menu0,
               $header_menu1,
               $header_menu2,
               $header_process,
               $header_complete,
               $header_note
        );
                 
        $table->attributes['class'] = 'rotateheaders';
        
        //---------------------------------------
        // Create second row, with icons
        //---------------------------------------
        $head_dbstudent = new html_table_cell("STUDENT NAME");
        $head_dbstudent->attributes['class'] = 'head';
        
        $head_menu0 = new html_table_cell("<img src=\"$CFG->wwwroot/mod/assign/pix/icon.gif\" >");
        $head_menu0->attributes['class'] = 'head';
      
        $head_menu1 = new html_table_cell("<img src=\"$CFG->wwwroot/mod/assign/pix/icon.gif\" >");
        $head_menu1->attributes['class'] = 'head';
      
        $head_menu2 = new html_table_cell("<img src=\"$CFG->wwwroot/mod/assign/pix/icon.gif\" >");
        $head_menu2->attributes['class'] = 'head';
      
        $head_process = new html_table_cell("%");
        $head_process->attributes['class'] = 'progresshead';
      
        $head_complete = new html_table_cell("<img src=\"$CFG->wwwroot/pix/i/course.gif\" >");
        $head_complete->attributes['class'] = 'head';
      
        $head_note = new html_table_cell('');
        $header_note->attributes['class'] = '';
        
        $row = new html_table_row();
        
        $row->cells = array(       
               $head_dbstudent,
               $head_menu0,
               $head_menu1,
               $head_menu2,
               $head_process,
               $head_complete,
               $head_note
        );

        $table->data[] = $row;    

        $counter = ($page * $perpage);
       
        foreach ($dataUsers as $student) 
        {
            $row = new html_table_row();
            $user = $DB->get_record('user', array('id'=>$student->id));

        
            $usersearchurl = new moodle_url('/mod/vrlesson/view.php?', array('d' => $data->id,
                                                                        'mode' => 'list',
                                                                        'perpage' => 10,
                                                                        'search' => '',
                                                                        'sort' => 0,
                                                                        'order' => "ASC",
                                                                        'advanced' => 1,
                                                                        'filter' => 1,
                                                                        'f_1' => '',
                                                                        'u_fn' => $user->firstname,
                                                                        'u_ln' => $user->lastname
                                                                        ));            
           
            $cell_student = new html_table_cell($user->firstname.' '.$user->lastname);
           
            //Initilize progress percentage for all students
            $progress=0;
            $commentcounter=0;
            $currentComment = "";
           
            //For each menu item, calculate row
            $optionCounter = 0;
            foreach($menuoptions as $myOption)
            {
                $menuvar = 'cell_menu'.$optionCounter;
                
                //Clean unwanted characters
                $singleLesson = trim($data->name);
                $score = $vroptions->get_highest_score($myOption, $student->id, $data->id);
                $highestEntryID = $vroptions->get_highest_entryid();
                $projectid = $highestEntryID;
                
                $currLesson = $allLessons[$lesson];
                $tempCM = get_coursemodule_from_instance('vrlesson', $currLesson->id, $course->id);
                $tempContext = context_module::instance($tempCM->id);
                if ($record = $DB->get_record('vrlesson_records', array('id'=>$highestEntryID, 'dataid'=>$data->id)))
                {
                    $comments = $DB->get_records('comments', array('contextid'=>$tempContext->id, 'commentarea'=>'database_entry'));
                    $commentArr = array();
                    foreach($comments as $singleComment)
                    {
                        $testRecord = $DB->get_record('vrlesson_records', array('id'=>$singleComment->itemid));
                        
                        // Get current lesson
                        $lessonName = $allLessons[$lesson]->name;
                        $currentLess = $DB->get_record('vrlesson', array('name'=>$lessonName));
                        if($testRecord->userid == $user->id)
                        {
                            $commentArr[] = $singleComment->content;
                        }
                    }
                    $commentcounter = count($commentArr); 
                    arsort($commentArr);  
                    $currentComment = current($commentArr);  
                    if(!empty($currentComment))
                    {    $currentComment .= '<br />';   }                 
                
                     // Grade is only 0 if they never uploaded
                     if($score > 0)
                     {  $grade = $score;  }
                     else
                     {   $grade = -1;  }
                        
                } else {
                    $grade = -2;
                }
           
                if ($grade > -1){
                    $$menuvar = new html_table_cell('<span>'.$grade.'</span>'); 
                }else{
                    $$menuvar = new html_table_cell('<span></span>'); 
                }
                
                $scaleMax = 100;
                if ($grade >= 70){
                    $$menuvar->attributes['class'] = 'db-green';
                    $progress += $scaleMax/count($menuoptions);
                } else if ($grade > -1) {
                    $$menuvar->attributes['class'] = 'db-red';
                    $progress += $scaleMax/(2*count($menuoptions));
                } else if ($grade > -2) {
                    $$menuvar->attributes['class'] = 'db-gray';
                }
                $optionCounter++;
           }
           
           $cell_process = new html_table_cell(round($progress));
           
           if ($progress >= $data->scale){
               $cell_process->attributes['class'] = 'progressGreen';
               $cell_complete = new html_table_cell("<img src='$CFG->wwwroot/pix/i/tick_green_big.gif'>");
           }else{
               $cell_complete = new html_table_cell('');
           }
              
           $cell_note = new html_table_cell($currentComment.'<a href="'.$usersearchurl->out().'">All Comments('.$commentcounter.')</a>');
           $cell_note->attributes['class'] = 'teacherComments';
                  
           $row->cells = array($cell_student, 
                               $cell_menu0, 
                               $cell_menu1, 
                               $cell_menu2, 
                               $cell_process, 
                               $cell_complete,
                               $cell_note);
           $table->data[] = $row;
        }

        echo html_writer::table($table);
        
    } 
    //------------------------------------------------
    // Render the view for Class - with graph
    //------------------------------------------------
    else if ($view == 'class') 
    {
        //Initilize progress percentage for all students
        $numofprogress=0;
        $totalprogress=0;

        //Initilize progress percentage for all students
        $numofgradedentry = 0;
        $totalgrade = 0;         
        
        foreach ($dataUsers as $student) 
        { 
            //Initilize progress percentage for all students
            $progress=0;
            $user = $DB->get_record('user', array('id'=>$student->id)); 
            
            //For each menu item, calculate row
            foreach($menuoptions as $myOption)
            {           
                //Clean unwanted caharacters
                $myOption = trim($myOption);
                 
		$score = $vroptions->get_highest_score($myOption, $student->id, $data->id);
                $highestEntryID = $vroptions->get_highest_entryid();
                if ($record = $DB->get_record('vrlesson_records', array('id'=>$highestEntryID, 'dataid'=>$data->id)))
                {
                    // Grade is only 0 if they never uploaded
                    if($score > 0)
                    {  
                         $grade = $score;  
                      	 $totalgrade += $grade;
                      	 ++$numofgradedentry; 
                    }
                    else
                    {   $grade = -1;  }
                       
                } else {
                    $grade = -2;
                }
                
                if ($grade >= 70){
                    $progress += $data->scale/count($menuoptions);
                } else if ($grade > -1) {
                    $progress += $data->scale/(2*count($menuoptions));
                } else if ($grade > -2) {
                    $progress = 0;
                }                             
                
            }
            ++$numofprogress;
            $totalprogress += $progress;
        }
        
        if ($numofgradedentry > 0){
            $averagegrade = round(($totalgrade/$numofgradedentry), 1);
        }else{
            $averagegrade = 0;
        }
        
        if ($numofprogress > 0){
            $averageproggress = round(($totalprogress/$numofprogress));
        }else{
            $averageproggress = 0;
        }        
        
        //GRAPH DATA AND JS
        $graphdata = array();     
           
        //For each menu item, calculate row
        foreach($menuoptions as $myOption)
        { 
            //Clean unwanted caharacters
            $myOption = trim($myOption);
            $numofgradedentry = 0;
            $totalgrade = 0;
            
            foreach ($dataUsers as $student) 
            {                         
                $user = $DB->get_record('user', array('id'=>$student->id)); 
                $score = $vroptions->get_highest_score($myOption, $student->id, $data->id);
                $highestEntryID = $vroptions->get_highest_entryid();  

                if ($record = $DB->get_record('vrlesson_records', array('id'=>$highestEntryID, 'dataid'=>$data->id)))
                {
                    // Grade is only 0 if they never uploaded
                    if($score > 0)
                    {  
                         $grade = $score;  
                      	 $totalgrade += $grade;
                      	 ++$numofgradedentry; 
                    }
                    else
                    {   $grade = -1;  }

                } else {
                    $grade = -2;
                }             
            }
            $graphdata[$myOption] = round(($totalgrade/$numofgradedentry));
        }
        
        // This simply makes a string out of the array of data
        $myData = '';
        $myLabel = '';
        
        foreach ($graphdata as $key => $value) 
        {
            $myData .= $value.','; 
            $newKey = str_replace('"', '', $key);
            $nameArray = explode(" ", $newKey);
            $finalName = $nameArray[0].' ' .$nameArray[1];
            $myLabel .= '"'.$finalName.'",'; 
        }
        $myData = trim($myData, ',');
        $myLabel = trim($myLabel, ',');
        
        echo '<div class="chartcontent" >
             <div id="barchart">
                  <canvas id="cvs" width="550" height="500" >[No canvas support]</canvas>
             </div>
             <div id="gradeInfo">
                 <h3>Grade Average For This Lesson</h3>';
                 if((int)$averagegrade >= (int)$data->scale)  
                 {  echo '<div class="passaveragegrade">';  }
                 else
                 {  echo '<div class="averagegrade" >';  }
                 echo $averagegrade.'</div>
                 <div class="spacer" ></div>
                 <h3>Class Progress in This Lesson</h3>';
                 if($averageproggress >= 100)
                   {  echo '<div class="progress-bar-complete green" >'; }
                   else
                   {  echo '<div class="progress-bar red">'; }
                   echo  '<span style="width:'.$averageproggress.'%;" >';
                   if($averageproggress <= 10)
                   {  echo '<p style="color:black;" >'; }
                   else  {  echo '<p>'; }
                   echo $averageproggress.'%</p></span>
                 </div>
             </div>
        </div>';

        // This prints out the required HTML markup
        echo '<script type="text/javascript" >';
        echo 'var data = ['.$myData.'];
              var barchart = new RGraph.Bar("cvs", data);
              barchart.Set("chart.title", "");
              barchart.Set("chart.ymax", 100);
              barchart.Set("chart.hmargin", 60);
              barchart.Set("chart.labels.above", true);
              barchart.Set("chart.labels.above.size", 16); 
              barchart.Set("chart.text.angle", 45);   
              barchart.Set("chart.axis.linewidth", 1); 
              barchart.Set("chart.title.xaxis", "Projects"); 
              barchart.Set("chart.title.yaxis", "Class Average Scores"); 
              barchart.Set("chart.title.xaxis.pos", 0.30);
              barchart.Set("chart.title.yaxis.pos", 0.35);    
              barchart.Set("chart.background.grid.vlines", false);
              barchart.Set("chart.gutter.bottom", 110); 
              barchart.Set("chart.gutter.left", 60);  
              barchart.Set("chart.labels", ['.$myLabel.']);
              barchart.Set("chart.colors.sequential", true);
              barchart.Set("chart.strokestyle", "black");
              barchart.Set("chart.colors", ["#f2ed40", "#9ccb3b", "#3a5caa"]);
              RGraph.Effects.Bar.Grow(barchart);
       </script>';

    } else {
        echo "UNKNOWN VIEW";
    }    
    
    echo $OUTPUT->footer();