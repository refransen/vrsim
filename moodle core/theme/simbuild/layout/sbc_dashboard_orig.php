<?php
/////////////////////////////////////////////////////////////
// Creates content SBC Dashboard
/////////////////////////////////////////////////////////////
global $CFG, $DB, $SBC_DB, $USER;
require_once($CFG->dirroot . '/local/simbuild/lib.php');

$db_class = get_class($DB);
$SBC_DB = new $db_class(); // instantiate a new object of the same class as the original $DB
$SBC_DB->connect($CFG->sbc_dbhost, $CFG->sbc_dbUser, $CFG->sbc_dbPass, $CFG->sbc_dbName, false);

//----------------------------------------------------
// Create content for the overview block
//----------------------------------------------------
// FIX:  take this input
$courseID = 4;
$classID = 0;

// Find users groups/classs
$usergroups = groups_get_all_groups($courseID, $USER->id, 0, 'g.id');
// TODO: This only sets the first class. What to do with multiple classes?
$options = array();
foreach ($usergroups as $group) {
    if(isset($group->id)) {
        $options[] = $group->id;
    }
}
$classID = current($options);
        
if ($classID != 0) 
{ 
    if ($dataUsers  = groups_get_members($classID, 'u.id', 'lastname ASC, firstname ASC')) {
        foreach($dataUsers as $singleUser) {
            $singleStudent = $DB->get_record('user', array('id'=>$singleUser->id));
            $studentID = $singleStudent->idnumber;

            $siteProgress = calculate_siteprogress($studentID);
            $siteProgressArr[$studentID] = $siteProgress;
        }
        // Compare site progress to create a rank
        arsort($siteProgressArr); 
               
        $counter = 1;
	foreach($siteProgressArr as $key=>$value) {
	    if($key == $USER->idnumber)
	    {break;}
	    $counter++;
	}
	
	$classRank = $counter;
	$totalSiteProgress = $siteProgressArr[$studentID];
    }
}
else {
    // If user has no class, then calculate just for him
    $classRank = '--';
    $totalSiteProgress = calculate_siteprogress($USER->id);
}


// Screen positions in width%
$shedStartPos = 20; 
$ranchStartPos = 60; $ranchEndPos = 68;  
$multiPos = 100;
$overviewContent = '
<div class="topinfo" >
	<div class="classrank" >
	    <h3><span lang="en" class="multilang">'.get_string("classrank", "theme_simbuild").'</span></h3>
	    <p class="numberClass">'.$classRank.'</p>
	</div>
	<div class="overallprogress" >
	    <h3><span lang="en" class="multilang">'.get_string("overallsiteprog", "theme_simbuild").'</span>
	       <span class="numberClass">'.$totalSiteProgress.'%</span></h3>
	    <div class="circleSmall green star" ></div>
	    <div class="circle';
	    if($totalSiteProgress >= $shedStartPos) 
	    {  $overviewContent .= ' green shed';  }  
	    else if ($totalSiteProgress > 0) { $overviewContent .= ' gray shed'; } 
	    else {  $overviewContent .= ' gray shedgray'; }
	    $overviewContent .= '" ></div>
	    <div class="circle';
	    
	    if($totalSiteProgress >= $ranchStartPos) 
	    {  $overviewContent .= ' green ranch';  } 
	    else if($totalSiteProgress >= $shedStartPos) 
	    { $overviewContent .= ' gray ranch'; }
	    else 
	    {   $overviewContent .= ' gray ranchgray';  }
	    $overviewContent .= '" ></div>
	    <div class="circle';
	    
	    if($totalSiteProgress >= $multiPos) 
	    { $overviewContent .= ' green multilevel'; } 
	    else if($totalSiteProgress >= $ranchStartPos) 
	    {  $overviewContent .= ' gray multilevel';  }
	    else 
	    { $overviewContent .= ' gray multilevelgray';}
	     $overviewContent .= '" ></div>
	    <div class="progress-bar green" >
	         <span style="width:'.$totalSiteProgress.'%;"></span>
	    </div>
	</div>
</div>';

$ordersComplete = getAllOrdersPassed($USER->idnumber);
$activityComplete = getAllActivitiesPassed($USER->idnumber);
$toolsUnlocked = getAllToolsPassed($USER->idnumber);
$toolTipsUnlocked = getAllToolTipsPassed($USER->idnumber);
$overviewContent .= '
<div class="bottominfo" >
    <div class="bottomBox" >
    <div class="boxpadding" >
        <div class="stats" >
            <img src="/theme/simbuild/pix/charts/ClipBoardIcon.png" />
            <span class="numberClass" >'.$ordersComplete.'</span>
        </div>
        <div class="statsTitle" >
            <span lang="en" class="multilang" >'.get_string("ordercomplete", "theme_simbuild").'</span>
        </div>
    </div>
    </div>

    <div class="bottomBox" >
    <div class="boxpadding" >
        <div class="stats" >
            <img src="/theme/simbuild/pix/charts/tapeIcon_short.png" />
            <span class="numberClass" >'.$activityComplete.'</span>
        </div>
        <div class="statsTitle" >
            <span lang="en" class="multilang">'.get_string("actpassed", "theme_simbuild").'</span>
        </div>
    </div>
    </div>

    <div class="bottomBox" >
    <div class="boxpadding" >
        <div class="stats" >
            <img src="/theme/simbuild/pix/charts/hammerIcon_Color.png" />
            <span class="numberClass" >'.$toolsUnlocked.'</span>
        </div>
        <div class="statsTitle" >
            <span lang="en" class="multilang">'.get_string("toolspassed", "theme_simbuild").'</span>
        </div>
    </div>
    </div>
    
    <div class="bottomBox" >
    <div class="boxpadding" >
        <div class="stats" >
            <img src="/theme/simbuild/pix/charts/redToolbox.png" />
            <span class="numberClass" >'.$toolTipsUnlocked.'</span>
        </div>
        <div class="statsTitle" >
            <span lang="en" class="multilang">'.get_string("tooltippassed", "theme_simbuild").'</span>
        </div>
    </div>
    </div>
</div>';


$blockTitle = get_string("overviewtitle", "theme_simbuild");
$contentName = htmlspecialchars( json_encode('overviewcontent'), ENT_COMPAT);
echo 
'<div class="block sbcOverview" >
    <div class="header">
        <div class="title">
            <div class="block_action" onclick="toggleBlock('.$contentName.')" >
            	<img class="block-hider-hide" id="hideblock" tabindex="0" alt="Hide Report" title="Hide Report" 
            		src="/theme/simbuild/pix_core/t/switch_minus.png" />
            	<img class="block-hider-show" id="showblock" tabindex="0" alt="Show Report" title="Show Report" 
            		src="/theme/simbuild/pix_core/t/switch_plus.png" />
            </div>
            <h2>'.$blockTitle.'</h2>
        </div>
    </div>
    <div class="content" >
    	<div class="no-overflow" id="overviewcontent" >'.$overviewContent.'
    	</div>
    </div>
</div>';

//----------------------------------------------------
// Create content for the Construction Systems Block
//----------------------------------------------------
$buildingData = array();
$buildingLabels = array();
$totalProgress = 0;
$myType = "Building";
$constructSkills = $SBC_DB->get_records_sql("SELECT * FROM {skill} myskill WHERE myskill.Type = ?", array($myType));
$totalSkills = count($constructSkills);
foreach($constructSkills as $singleSkill)  
{
    if($singleSkill->desc == "Concrete Forms") { $totalSkills--; continue; }
    $labelName = $SBC_DB->get_record_sql("SELECT * FROM {skill} myskill WHERE myskill.idSkill= ?", array($singleSkill->idskill));
    $tempLabel = str_replace("and","&", $labelName->desc);
    $buildingLabels[] = get_string($tempLabel, "theme_simbuild");

    $studentData = findProfileSkillProgress($USER->idnumber, $singleSkill->idskill);
    $totalProgress += $studentData['progress'];    
    $buildingData[] = $studentData['progress'];
}

// Prepare data for the graph
$totalSysProgress = 0;
if($totalSkills > 0 ) {
    $totalSysProgress = (int)($totalProgress / $totalSkills); 
}
$graphBarLabels = array();
foreach($buildingData as $singleData) {
    $graphBarLabels[] = $singleData.'%';
}
$finalGraphData = json_encode($buildingData);
$finalBarLabels = json_encode($graphBarLabels);
$finalGraphLabels = json_encode($buildingLabels);

$overviewContent = '
<div class="toptitle" >
    <img src="/theme/simbuild/pix/charts/systemsProgressIcon.png" />
    <span class="numberClass">'.$totalSysProgress.'%</span>
    <h3>'.get_string("sitesyscomplete", "theme_simbuild").'</h3>
</div>
<canvas id="systemProgChart" width="800" height="225">[No canvas support]</canvas>';

$overviewContent .= "
<script>
        bar = new RGraph.Bar('systemProgChart', ".$finalGraphData .")
        .Set('background.grid.dashed', true)
        .Set('chart.background.barcolor1', '#fafafa')
        .Set('chart.background.barcolor2', '#fafafa')
        .Set('text.font', 'Verdana')
        .Set('ymax', 100)
        .Set('hmargin', 20)
        .Set('numyticks', 10)
        .Set('background.grid.autofit.numhlines', 10)
        .Set('background.grid.autofit.numvlines', 40)
        .Set('ylabels.count', 3)
        .Set('ylabels.specific', ['100', '50', '0'])
        .Set('labels',".$finalGraphLabels.")
        .Set('labels.above.specific', ".$finalBarLabels.")
        .Set('colors', ['#f58323'])
        .Draw();
</script>";


$blockTitle = get_string("systitle", "theme_simbuild");
$contentName = htmlspecialchars( json_encode('systemcontent'), ENT_COMPAT);

echo 
'<div class="block sbcSystemsProgress" >
    <div class="header">
        <div class="title">
            <div class="block_action" onclick="toggleBlock('.$contentName.')">
            	<img class="block-hider-hide" id="hideblock" tabindex="0" alt="Hide Report" title="Hide Report" 
            		src="/theme/simbuild/pix_core/t/switch_minus.png" />
            	<img class="block-hider-show" id="showblock" tabindex="0" alt="Show Report" title="Show Report" 
            		src="/theme/simbuild/pix_core/t/switch_plus.png" />
            </div>
            <h2>'.$blockTitle.'</h2>
        </div>
    </div>
    <div class="content" >
    	<div class="no-overflow" id="systemcontent" >'.$overviewContent.'
    	</div>
    </div>
</div>';

//----------------------------------------------------
// Create content for the academic systems block
//----------------------------------------------------
// Get total academic progress
$totalProgress = 0;
$finalMathData = array();
$finalReadingData = array();
$finalPSData = array();
$finalKnowData = array();

$myType = "Academic";
$allAcademicData = array();
$academicSkills = $SBC_DB->get_records_sql("SELECT * FROM {skill} myskill WHERE myskill.Type = ?", array($myType));
foreach($academicSkills as $singleSkill)  {
    $studentData = findProfileSkillProgress($USER->idnumber, $singleSkill->idskill);
    $totalProgress += $studentData['progress'];    
}
$totalSkills = count($academicSkills);
$totalAcademicProgress = 0;
if($totalSkills > 0) {
    $totalAcademicProgress = (int)($totalProgress / $totalSkills);
}
   
// Get data for each day, in specific academic
$name = 'SKILLTYPE_MATH';
$mathData = json_encode(array(0, 0));
$mathLabels = json_encode(array('', ''));
$mathTitle = "2013";
$graphWidth = 650;
if($mathSkill = $SBC_DB->get_record_sql("SELECT * FROM {skill} skill WHERE skill.Type=? AND skill.Desc=?", array($myType, $name)) ) {
   $finalMathData = createDailySkillData($USER->idnumber, $mathSkill->idskill);
   if(count($finalMathData['data']) > 0) {
       $mathData = json_encode($finalMathData['data']);
       $mathLabels = json_encode($finalMathData['labels']);
   }
   $mathTitle = $finalMathData['title'];  

   $graphWidth = getGraphWidth(count($mathLabels), 575); 
}

$name = 'SKILLTYPE_READING';
$readData = json_encode(array(0, 0));
$readLabels = json_encode(array('', ''));
if($readingSkill = $SBC_DB->get_record_sql("SELECT * FROM {skill} skill WHERE skill.Type=? AND skill.Desc=?", array($myType, $name)) ) {
    $finalReadData = createDailySkillData($USER->idnumber, $readingSkill->idskill);
    if(count($finalReadData['data']) > 0) {
        $readData = json_encode($finalReadData['data']);
        $readLabels = json_encode($finalReadData['labels']);
    }
    $readTitle = $finalReadData['title'];
}

$name = 'SKILLTYPE_PROBLEM_SOLVING';
$probData = json_encode(array(0, 0));
$probLabels = json_encode(array('', ''));
if($probSkill = $SBC_DB->get_record_sql("SELECT * FROM {skill} skill WHERE skill.Type=? AND skill.Desc=?", array($myType, $name)) ) {
    $finalProbData = createDailySkillData($USER->idnumber, $probSkill->idskill);
    if(count($finalProbData['data']) > 0) {
        $probData = json_encode($finalProbData['data']);
        $probLabels = json_encode($finalProbData['labels']);
    }
    $probTitle = $finalProbData['title'];
}

$name = 'SKILLTYPE_KNOWLEDGE';
$knowData = json_encode(array(0, 0));
$knowLabels = json_encode(array('', ''));
if($knowSkill = $SBC_DB->get_record_sql("SELECT * FROM {skill} skill WHERE skill.Type=? AND skill.Desc=?", array($myType, $name)) ){
    $finalKnowData = createDailySkillData($USER->idnumber, $knowSkill->idskill);
    if(count($finalKnowData['data']) > 0 ) {
        $knowData = json_encode($finalKnowData['data']);
        $knowLabels = json_encode($finalKnowData['labels']);
    }
    $knowTitle = $finalKnowData['title'];
}

$overviewContent = '
<div class="toptitle" >
    <img src="/theme/simbuild/pix/charts/academicProgressIcon.png" />
    <span class="numberClass">'.$totalAcademicProgress.'%</span>
    <h3>'.get_string("accomplete", "theme_simbuild").'</h3>
</div>

<div class="leftcolumn" >
    <div class="canvasdiv">
        <canvas id="axes" width="60" height="225" ></canvas>
        <div class="chartdiv" >
            <canvas id="linechart" width="'.$graphWidth.'" height="225" >[No canvas support]</canvas>
        </div>
    </div>

    <div class="bottomtitle">
        <h3>'.get_string("momtimetitle", "theme_simbuild").' <br />'.$mathTitle.'</h3>
    </div>
</div>

<div class="rightcolumn">
    <div class="chartbutton blueborder" onclick="DrawMathChart(this,'.$mathData.','.htmlspecialchars($mathLabels, ENT_COMPAT).')">
        <div class="leftbutton bluehighlight" ></div>
        <h3 class="selected" >'.get_string("SKILLTYPE_MATH", "theme_simbuild").'</h3>
    </div>
    <div class="chartbutton" onclick="DrawReadingChart(this,'.$readData.','.htmlspecialchars($readLabels, ENT_COMPAT).')">
        <div class="leftbutton" ></div>
        <h3>'.get_string("SKILLTYPE_READING", "theme_simbuild").'</h3>
    </div>
    <div class="chartbutton" onclick="DrawKnowledgeChart(this,'.$knowData.','.htmlspecialchars($knowLabels, ENT_COMPAT).')">
        <div class="leftbutton" ></div>
        <h3>'.get_string("SKILLTYPE_KNOWLEDGE", "theme_simbuild").'</h3>
    </div>
    <div class="chartbutton" onclick="DrawSolvingChart(this,'.$probData.','.htmlspecialchars($probLabels, ENT_COMPAT).')">
        <div class="leftbutton" ></div>
        <h3>'.get_string("SKILLTYPE_PROBLEM_SOLVING", "theme_simbuild").'</h3>
    </div>
</div>
<script>
    var mathButton = document.getElementsByClassName("chartbutton")[0];
    DrawMathChart(mathButton,'.$mathData.','.$mathLabels.');
    
    var yaxis = new RGraph.Drawing.YAxis("axes", 57)
    .Set("max", linechart.max)
    .Set("numticks", 2)
    .Set("colors", ["black"])
    .Set("numlabels", 3)
    .Set("labels.specific", ["Excellent","Good","Poor"])
    .Draw();
</script>';

$blockTitle = get_string("acadtitle", "theme_simbuild");
$contentName = htmlspecialchars( json_encode('academiccontent'), ENT_COMPAT);    	
echo 
'<div class="block sbcAcademicProgress" >
    <div class="header">
        <div class="title">
            <div class="block_action" onclick="toggleBlock('.$contentName.')">
            	<img class="block-hider-hide" id="hideblock" tabindex="0" alt="Hide Report" title="Hide Report" 
            		src="/theme/simbuild/pix_core/t/switch_minus.png" />
            	<img class="block-hider-show" id="showblock" tabindex="0" alt="Show Report" title="Show Report" 
            		src="/theme/simbuild/pix_core/t/switch_plus.png" />
            </div>
            <h2>'.$blockTitle.'</h2>
        </div>
    </div>
    <div class="content" >
    	<div class="no-overflow" id="academiccontent" >'.$overviewContent.'
    	</div>
    </div>
</div>';

?>