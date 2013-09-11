<?php

////////////////////////////////////////////////////////////////////////////////////////////
// Rachel Fransen - March 21, 2013
// Added this class to read custom CSV files from VERTEX
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
 * @package   mod-vrlesson
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

require_once($CFG->dirroot . '/mod/vrlesson/lib.php');


////////////////////////////////////////////////////////////////////////////////////////////
class vrlesson_csv
{
	private $fields = array('Project Name', 'Process', 'Environment', 'Polarity', 'Volts', 'Score', 'Time Modified','Type','Project Number');
	private $final_project = array();
	private $session = array();
	private $project = array();
	private $pass = array();
        private $passDefects = array();
        private $passScores = array();
        private $passCues = array();
        private $passConstants = array();
	private $curr_project;
        private $highestEntryID = 0;
        private $newUploadDID = 0;
        private $newUploadRID = 0;


        private $bendConstants = array();
        private $amountOfBends = 0;

        private $defectAchieve = false;
        private $angleAchieve = false;
        private $speedAchieve = false;

        // If user never uploaded, get first database ID
        function get_newupload_did()  {
            return $this->newUploadDID;
        }
        // If user never uploaded, get first record ID
        function get_newupload_rid()  {
            return $this->newUploadRID;
        }
        // get the project with the highest score
        function get_highest_entryid()  {
            return $this->highestEntryID ;
        }
        // Return the passes array for this lesson
        function get_all_passes()  {
            return $this->pass;
        }
        // Return the projects array for this lesson
        function get_final_project()  {
           return $this->final_project;
        }
        function get_all_pass_defects()  {
            return $this->passDefects;
        }
        function get_pass_defects($projectNum, $passNum)  {
            return $this->passDefects[$projectNum][$passNum];
        }
        function get_all_pass_scores()  {
            return $this->passScores;
        }
        function get_pass_scores($projectNum, $passNum)  {
            return $this->passScores[$projectNum][$passNum];
        }
        function get_all_pass_cues()  {
            return $this->passCues;
        }
        function get_pass_cues($projectNum, $passNum)  {
            return $this->passCues[$projectNum][$passNum];
        }
        function get_original_RID($dataid, $csvName)
        {
            global $DB;
            
            //  Get the original fields
            $oldNameField = $DB->get_record('vrlesson_fields', array('dataid'=>$dataid, 'name'=>'Project Name'), '*', MUST_EXIST);
            $oldEntries = $DB->get_records('vrlesson_content', array('fieldid'=>$oldNameField->id), 'id ASC');
            $oldRID = 0;
            foreach($oldEntries as $oldEntry)
            {
                if($oldEntry->content == $csvName)
                {    $oldRID = $oldEntry->recordid;   }
            }
            
            return $oldRID;
        }

       //////////////////////////////////////////////////////
       // Calculate best and worst techniques per pass
       //////////////////////////////////////////////////////
        function get_pass_bestWorstTechniques($projectNum, $passNum)
        {
            $projPassScores = $this->get_pass_scores($projectNum, $passNum);
            $intPassScores = array_map('intval', $projPassScores);

            $bestValue = max($intPassScores);
            $bestTech = array_search($bestValue, $projPassScores);

            $worstValue = min($intPassScores);
            $worstTech = array_search($worstValue, $projPassScores);
            
            // if the best technique is also the worst, (or that technique wasn't recorded),
            // then there is no "best"
            if($bestValue == $worstValue || $bestValue == (int)-1)
            {
                $bestTech = "None";
                $bestValue  = (int)0;
            }
            
            // If the worst value was still high, or not recorded,
            // its actualy not a "worst"technique
            if($worstValue >  70 || $worstValue == -1)
            {
                $worstTech = "None";
            }

            $techArray = array(
                 "Best"=>array($bestTech,$bestValue),
                 "Worst"=>array($worstTech, $worstValue)
            );

            return $techArray;
       }

       //////////////////////////////////////////////////////
       // Calculate the average technique score
       //////////////////////////////////////////////////////
        function get_pass_total_techniqueScores($projectNum)
        {
            $projPassScores = $this->get_all_pass_scores()[$projectNum];
            $passPositions = 0;
            $passCTWD = 0;
            $passTA = 0;
            $passWA = 0;
            $passSpeed = 0;
            foreach($projPassScores as $technique)
            { 
                $passPositions += (int)$technique['Position'];
                $passCTWD += (int)$technique['CTWD'];
                $passTA += (int)$technique['Travel Angle'];
                $passWA += (int)$technique['Work Angle'];
                $passSpeed += (int)$technique['Speed'];
            }
            $totalPosition = (int)($passPositions / count($projPassScores) );
            $totalCTWD = (int)($passCTWD / count($projPassScores) );
            $totalTA = (int)($passTA / count($projPassScores) );
            $totalWA = (int)($passWA / count($projPassScores) );
            $totalSpeed = (int)($passSpeed / count($projPassScores) );

            $totalsarray = array(
                "Position"=>$totalPosition, 
                "CTWD"=>$totalCTWD, 
                "Travel Angle"=>$totalTA, 
                "Work Angle"=>$totalWA, 
                "Speed"=>$totalSpeed
            );

            return $totalsarray;
       }
       
       //////////////////////////////////////////////////////
       // Create text content for summary section of passes
       //////////////////////////////////////////////////////
       function get_pass_summary($csvTime, $csvProjNum)
       {
            $summarySection = 'Summary;';

            // Set default time to today
            $finalDate = date('F j, Y');
            $finalTime = date('H:i');

            // If the time is read correctly, set it to CSV time
            if($date = DateTime::createFromFormat("n:j:Y H:i:s", $csvTime))
            {
                $finalDate = $date->format('F j, Y');
                $finalTime = $date->format('H:i');
            }
           
            $summarySection .= 'Date: '.$finalDate.';Time: '.$finalTime.';';

            // First, lets go through scored techniques to find averages, best, and worst
            $techniqueTotals = $this->get_pass_total_techniqueScores($csvProjNum);
            $summarySection .= 'Position: '.$techniqueTotals['Position'].';';
            $summarySection .= 'CTWD: '.$techniqueTotals['CTWD'].';';
            $summarySection .= 'Travel Angle: '.$techniqueTotals['Travel Angle'].';';
            $summarySection .= 'Work Angle: '.$techniqueTotals['Work Angle'].';';
            $summarySection .= 'Speed: '.$techniqueTotals['Speed'];

            return $summarySection;
       }
       
       function isValidTimeStamp($timestamp)
	{
    		return ((string) (int) $timestamp === $timestamp) 
        	&& ($timestamp <= PHP_INT_MAX)
       		 && ($timestamp >= ~PHP_INT_MAX);
	}

       //////////////////////////////////////////////////////
       // Create text content for a single pass 
       //////////////////////////////////////////////////////
       function get_pass_content($csvProjNum, $passNum)
       {
           $pass = $this->passConstants[$csvProjNum][$passNum];
           $passSection = 'Pass: '.$pass['Pass Number'].';';
           $passSection .= 'Amperage: '.$pass['Amperage'].';';
           $passSection .= 'Gas Mixture: '.$pass['Gas Mixture'].';';
           $passSection .= 'Pass Score: '.$pass['Pass Score'].';';

           // now the techniques
           $projPassScores = $this->get_all_pass_scores()[$csvProjNum][$passNum];
           $passSection .= 'Position: '.(int)$projPassScores['Position'].';';
           $passSection .= 'CTWD: '.(int)$projPassScores['CTWD'].';';
           $passSection .= 'Travel Angle: '.(int)$projPassScores['Travel Angle'].';';
           $passSection .= 'Work Angle: '.(int)$projPassScores['Work Angle'].';';
           $passSection .= 'Speed: '.(int)$projPassScores['Speed'].';';
           
           // now the defects
           $defects = $this->get_pass_defects($csvProjNum, $passNum);
           $passSection .= 'Incomplete fusion: '.$defects['incomplete fusion'].';';
           $passSection .= 'Porosity: '.$defects['Porosity'].';';
           $passSection .= 'Undercut: '.$defects['Undercut'].';';
           $passSection .= 'Placement: '.$defects['Placement'].';';
           $passSection .= 'Wrong size: '.$defects['wrong size'].';';
           $passSection .= 'Convex bead: '.$defects['convex bead'].';';
           $passSection .= 'Concave bead: '.$defects['concave bead'].';';
           $passSection .= 'Excess splatter: '.$defects['excessive spatter'].';';

           // now the cues
           $cues = $this->get_pass_cues($csvProjNum, $passNum);
           $cues_separated = implode(",", $cues);
           $passSection .= 'Cues used: '.$cues_separated.';';
        
           // Weaves and whips
           $weavesCalc = 'yes';
           $whipsCalc = 'yes';
           $passSection .= 'Weaves Passed: '.$weavesCalc.';';
           $passSection .= 'Whips Passed: '.$whipsCalc.';';
 
           $bestWorstTechs = $this->get_pass_bestWorstTechniques($csvProjNum, $passNum);
           $passSection .= 'Best Technique: '.$bestWorstTechs['Best'][0].','.$bestWorstTechs['Best'][1].';';
           $passSection .= 'Needs Improvement: '.$bestWorstTechs['Worst'][0].','.$bestWorstTechs['Worst'][1];

           // Calculate variables for achievements
           if((int)$projPassScores['Speed'] >= 70)  {
               $this->speedAchieve= true;
           }
           if((int)$projPassScores['Work Angle'] >= 70)  {
               $this->angleAchieve= true;
           }
           $defectCount = (int)$defects['Porosity'] + (int)$defects['Undercut'] + (int)$defects['Placement'] + (int)$defects['wrong size'] + (int)$defects['convex bead'] + (int)$defects['concave bead'] + (int)$defects['excessive spatter'];
           if($defectCount < 1)  {
               $this->defectAchieve= true;
           }

           return $passSection;
       }

       //////////////////////////////////////////////////////
       // Create text content for a single bend
       //////////////////////////////////////////////////////
       function get_bend_content($bendNum)
       {
           $bend= $this->bendConstants[$bendNum];
           $bendSection = 'Bend Number: '.$bend['bend number'].';';
           $bendSection .= 'Bend Letter: '.$bend['bend letter'].';';
           $bendSection .= 'Bend Type: '.$bend['bend type'].';';

           // now the defects
           $bendSection .= 'Fusion: '.$bend['fusion'].';';
           $bendSection .= 'Porosity: '.$bend['porosity'].';';
           $bendSection .= 'Slag: '.$bend['slag'].';';
           
           if(empty($bend['reason']))
           { $bend['reason'] = 'None'; }
           $bendSection .= 'Reason: '.$bend['reason'];

           return $bendSection;
       }

       //////////////////////////////////////////////////////
       // Get the highest score for a single project within a lesson
       //////////////////////////////////////////////////////
       function get_highest_score($projectName, $userid, $dataid=0)
       {
       	   global $DB;
       	   
           // Get all records with that project name
           $projects = $DB->get_records('vrlesson_content');
           $recordArray = array();
           foreach($projects as $singleProj)
           {
                if($singleProj->content === $projectName)  
                {
                     $newRecord = $DB->get_record('vrlesson_records', array('id'=>$singleProj->recordid));
                     if($dataid > 0 && $newRecord->dataid !== $dataid)
                     { continue;  }

                     if($newRecord->userid === $userid)  
                     {
                          $recordArray[] = $newRecord;
                     }
                }
           }


           $scoreArray = array();
           foreach($recordArray as $recordId)
           {
               $scoreField = $DB->get_record('vrlesson_fields', array('dataid'=>$recordId->dataid, 'name'=>'Score'));
               $tempScore = $DB->get_record('vrlesson_content', array('recordid'=>$recordId->id, 'fieldid'=>$scoreField->id));
               $scoreArray[$recordId->id] = (int)$tempScore->content;
           }

           arsort($scoreArray);
           $this->highestEntryID = key($scoreArray);
           $finalScore = 0;

           if(!empty($scoreArray[$this->highestEntryID]))
           {  $finalScore = $scoreArray[$this->highestEntryID];   }

           if(empty($this->highestEntryID))  {
               $this->highestEntryID = 0;
           }

           return $finalScore;
       }
       
       //////////////////////////////////////////
       // If user hasn't uploaded for this lesson,
       // return all the static default records
       //////////////////////////////////////////
       function get_all_default_projects($dataid)
       {
           global $DB;

           $allrecords = $DB->get_records('vrlesson_records', array('dataid'=>$dataid));
           $passesField = $DB->get_record('vrlesson_fields', array('dataid'=>$dataid, 'name'=>'Passes'));
           $recordArray = array();
           foreach($allrecords as $singleRecord)
           {
               $myContent = $DB->get_record('vrlesson_content', array('recordid'=>$singleRecord->id, 'fieldid'=>$passesField->id));
               if($myContent->content === "Project not uploaded")
               {  $recordArray[] = $singleRecord; }
           }
           return $recordArray;
       }

       //////////////////////////////////////////
       // If user hasn't uploaded for this project,
       // return a single default record
       //////////////////////////////////////////
       function get_default_project($projectName, $dataid)
       {
           global $DB;

           $allrecords = $DB->get_records('vrlesson_records', array('dataid'=>$dataid));
           $passesField = $DB->get_record('vrlesson_fields', array('dataid'=>$dataid, 'name'=>'Passes'));
           $nameField = $DB->get_record('vrlesson_fields', array('dataid'=>$dataid, 'name'=>'Project Name'));

           foreach($allrecords as $singleRecord)
           {
               $myNameContent = $DB->get_record('vrlesson_content', 
                                 array('recordid'=>$singleRecord->id, 'fieldid'=>$nameField->id));
               $myPassContent = $DB->get_record('vrlesson_content', 
                                 array('recordid'=>$singleRecord->id, 'fieldid'=>$passesField->id));
               if($myNameContent->content === $projectName)
               {
                   if($myPassContent->content === "Project not uploaded")
                   {  return $singleRecord; }
               }
           }
           return false;
       }
       
       //////////////////////////////////////////
       // If user hasn't uploaded for this project,
       // and we don't know the lesson, make an educated guess
       // return: the lesson object 
       //////////////////////////////////////////
       function get_default_lesson_new($projectName, $projectProcess, $course, $userid)
       {
           global $DB;
           
           $name = $projectName;
           $processName = $projectProcess;
           //$typeField = $DB->get_record('vrlesson_fields', array('name'=>'Lesson Group Name', 'dataid'=>$singleLess->id));

           $modinfo = get_fast_modinfo($course);
           $mySections = $modinfo->get_section_info_all(); 
           foreach($mySections as $singleSec)
           {    
               $pos = strpos($singleSec->name, $processName);
               if($pos !== false) 
               {
                    $courseMods = $DB->get_records('course_modules', array('course'=>$course->id, 
                                          'module'=>24, 'section'=>$singleSec->id));
                    foreach($courseMods as $singleMod)
                    {
                        $currLesson = $DB->get_record('vrlesson', array('id'=>$singleMod->instance));
                        if($currLessonRecs = $DB->get_records('vrlesson_records', array('dataid'=>$currLesson->id)) )
                        {
                            foreach($currLessonRecs as $singleRec)
                            {
                                $nameField = $DB->get_record('vrlesson_fields', array('dataid'=>$singleRec->dataid, 
                                                'name'=>'Project Name'));
                                $currLessContent = $DB->get_record('vrlesson_content', array('recordid'=>$singleRec->id, 
                                                 'fieldid'=>$nameField->id));
                                if($currLessContent->content == $name) 
                                {
                                    // If this lesson is already marked complete, use the next lesson
                                    // that would contain this project name
                                    if($DB->get_record('course_modules_completion', array('userid'=>$userid, 
                                          'coursemoduleid'=>$singleMod->id)))
                                    {  echo 'Passed '.$currLesson->name.'<br />'; break;  }
                                    
                                    return $currLesson;
                                }
                            }
                        }
                    }//end foreach coursemod

               }
           }
           return false;
       }
       //////////////////////////////////////////
       // If user hasn't uploaded for this project,
       // and we don't know the lesson, make an educated guess
       // return: the lesson object 
       //////////////////////////////////////////
       function get_default_lesson($projectName, $userid)
       {
           global $DB;

           // Get all records with that project name
           $projects = $DB->get_records('vrlesson_content');
           $recordArray = array();
           foreach($projects as $singleProj)
           {
                if($singleProj->content === $projectName)  
                {
                     $newRecord = $DB->get_record('vrlesson_records', array('id'=>$singleProj->recordid));
                     $myLesson = $DB->get_record('vrlesson', array('id'=>$newRecord->dataid));

                     $courseMod = $DB->get_record('course_modules', 
                           array('course'=>$myLesson->course, 'module'=>24, 'instance'=>$myLesson->id));

                     // If this lesson is already marked complete, use the next lesson
                     // that would contain this project name
                     if($DB->get_record('course_modules_completion', array('userid'=>$userid, 
                     'coursemoduleid'=>$courseMod->id)))
                     { 
                         continue;  
                     }

                     return $myLesson;
                }
           }
           return false;
       }

        ///////////////////////////////////////////////////////////////////////////////
        //             Class Functions
        ///////////////////////////////////////////////////////////////////////////////
	function get_line_data($line, $params)
	{
	  $all_props = explode(',', $line);
	  $ret = array();
	  for ($i=0; $i<count($all_props); $i++)
	  {
		if (in_array($all_props[$i], $params))
		{
			$ret[$all_props[$i]] = $all_props[$i+1];
		}
	  }
	  
	  return $ret;
	}

        ///////////////////////////////////////////////////////
        // This function gets all data on a line until it 
        // reaches the stop parameter.
        // Used specifically for bend information
        ///////////////////////////////////////////////////////
	function get_bend_line_data($line, $stopParam)
	{
	  $all_props = explode(",", $line);
	  $ret = array();
          $benNumArray = array();
	  for ($i=0; $i < count($all_props); $i++)
	  {
                if($all_props[$i] == $stopParam)
                {  break; }
             
                $benNumArray[] =  (int)substr($all_props[$i], 0, 1);

                $ret[$all_props[$i]] = $all_props[$i + 1];
                $i++;
	  }

          if(count($benNumArray) > 0)
          {
              $this->amountOfBends = max($benNumArray);	
          }  
	  return $ret;
	}

        ///////////////////////////////////////////////////////
        // Translate the project names into readable strings
        ///////////////////////////////////////////////////////
	function _translte_project_name($val)
	{
		switch ($val)
		{
		case 'FlatPOF':
                    return "Practice Plate";
		    break;
		case 'HorzTOE':
		case 'HorzTOF':
		case 'HorzTTE':
   		case 'SSTLHorzTOE':
   		case 'SSTLHorzTTE':
   		case 'ALUMHorzTOE':
   		case 'ALUMHorzTTE':
                    return "Horizontal Tee";
		    break;
   		case 'VertTOE':
   		case 'VertTOF':
    	        case 'VertTTE':
                    return "Vertical Tee";
		    break;
   		case 'OverheadTOE':
   		case 'OverheadTTE':
		case 'OverheadTOF':
                    return "Overhead Tee";
		    break;
   		case 'FlatBTE':
   		case 'SSTLFlatBTE':
   		case 'ALUMFlatBTE':
                    return "Flat Groove";
		    break;
   		case 'HorzBTE':
   		case 'ALUMHorzBTE':
                    return "Horizontal Groove";
		    break;
   		case 'VertBTE':
   		case 'SSTLVertBTE':
   		case 'ALUMVertBTE':
                    return "Vertical Groove";
		    break;
   		case 'OverheadBTE':
                    return "Overhead Groove";
		    break;
   		case 'Pipe2G6':
   		case 'Pipe5G6':
   		case 'Pipe6G6':
                    return "6 Schedule 40";
		    break;
   		case 'Pipe2G2':
   		case 'Pipe5G2':
   		case 'Pipe6G2':
                    return "2 XXS";
		    break;

		// RF - New codes for lap joint
                case 'HorzLAPOE':
                case 'ALUMHorzLAPOE':
                case 'SSTLHorzLAPOE':
                    return "Horizontal Lap";
		    break;
                case 'VertLAPOE':
                case 'SSTLVertLAPOE':
                    return "Vertical Lap";
		    break;
                case 'OverheadLAPOE':
                    return "Overhead Lap";
		    break;
    
		default:
		return "";
		}
	}
	
	function _translte_project_thickness($val)
	{
		switch ($val)
		{
		case 'HorzTOE':
		case 'SSTLHorzTOE':
		case 'ALUMHorzTOE':
		case 'VertTOE':
		case 'OverheadTOE':
                case 'HorzLAPOE':
                case 'ALUMHorzLAPOE':
                case 'SSTLHorzLAPOE':
                case 'VertLAPOE':
                case 'SSTLVertLAPOE':
                case 'OverheadLAPOE':
		    return "10ga";
                    break;
		case 'FlatPOF':
		case 'HorzTOF':
		case 'VertTOF':
                case 'OverheadTOF':
		     return '1/4"';
                     break;
		case 'HorzTTE':
		case 'SSTLHorzTTE':
		case 'ALUMHorzTTE':
		case 'VertTTE':
		case 'OverheadTTE':
		case 'FlatBTE':
		case 'SSTLFlatBTE':
		case 'ALUMFlatBTE':
		case 'OverheadBTE':
		    return '3/8"';
                    break;
			
		default:
		return '';
		}
	}

        function _translte_project_positions($val)
	{
		switch ($val)
		{
		case 'HorzTOE':
		//case 'HorzTOF':
		case 'HorzTTE':
                case 'HorzLAPOE':
		    return "2F";
                    break;
		case 'VertTOE':
		//case 'VertTOF':
		case 'VertTTE':
                case 'VertLAPOE':
		     return '3F';
                     break;
		case 'OverheadTOE':
		case 'OverheadTTE':
                case 'OverheadLAPOE':
		     return '4F';
                     break;
		case 'FlatBTE':
		     return '1G';
                     break;
		case 'HorzBTE':
		case 'Pipe2G6':
		case 'Pipe2G2':
		     return '2G';
                     break;
		case 'VertBTE':
		     return '3G';
                     break;
		case 'OverheadBTE':
		     return '4G';
                     break;
		case 'Pipe5G6':
		case 'Pipe5G2':
		    return '5G';
                    break;
		case 'Pipe6G6':
		case 'Pipe6G2':
		    return '6G';
                    break;			
		default:
		return '';
		}
	}

        function _translte_project_environment($val)
	{
		switch ($val)
		{
		case 'IMAGE_Envir1':
                    return 'Iron Works';
                    break;
		case 'IMAGE_Envir2':
                    return 'Weld Booth';
                    break;
		case 'IMAGE_Envir3':
                    return 'Desert Base';
                    break;
		case 'IMAGE_Envir4':
                    return 'Motorsports';
                    break;
		case 'IMAGE_Envir5':
                    return 'Power Plant';
                    break;
			
		default:
		return '';
		}
	}

	
	////////////////////////////////////////////////////////////
	// Get main data for project constants
	////////////////////////////////////////////////////////////
	function  get_project_data($line)
	{
		$params = array('coupon name', 'end time', 'environment', 'process', 'project runtime', 'start time','type');
		$mapping = array('Project Name', '', 'Environment', 'Process','','Time Modified', 'Type');

		$values = $this->get_line_data($line, $params);
		foreach ($params as $key => $val)
		{
			if (!empty($values[$val]) && strlen($mapping[$key]) > 0)
			{
				$this->project[$this->curr_project][$mapping[$key]] = $values[$val];
			}
			else if (strlen($mapping[$key]) == 0)
			{
				continue;
			}
		
			$pos = array_search($mapping[$key], $this->fields);
			switch ($val)
			{
				case 'coupon name':
                                {
                                   $positionString = $this->_translte_project_name($values[$val]);
                                   if($values[$val] == "FlatBTE")
                                   {
                                       $positionString = $values['process'].' '.$values['type'].' '.$this->_translte_project_name($values[$val]);
                                   }
				   $this->final_project[$this->curr_project][$pos] = $positionString.' '.$this->_translte_project_thickness($values[$val]);
				}
				break;

				case 'start time':
					$this->final_project[$this->curr_project][$pos] = 
                                               $this->session[$mapping[$key]] . ' ' . $values[$val];
					break;
					
				default:
					$this->final_project[$this->curr_project][$pos] = $values[$val];
					break;
			}
		}
                // Add our custom "project number" field
                $lastpos = array_search('Project Number', $this->fields);
                $this->final_project[$this->curr_project][$lastpos] = $this->curr_project;
	} 

        ///////////////////////////////////////////////////////////
        // Get the bend data for this project
        ///////////////////////////////////////////////////////////
        function  get_project_bend_data($line)
	{		
		$values = $this->get_bend_line_data($line, 'coupon name');
                  
                $myBendArray = array();
                for($i=0; $i < $this->amountOfBends + 1; $i++)
                {
                    $tempArray = array();
                    $tempArray["bend number"] = (string)$i;
                    foreach($values as $key => $val)
                    {
                        $firstChar = substr($key, 0, 1);
                        if($firstChar === (string)$i)
                        {  
                            $title = explode("- ", $key);
                            $tempArray[$title[1]] = $values[$key];
                        }
                    }
                    $myBendArray[] = $tempArray;
                }
                $this->bendConstants = $myBendArray;
	} 

        /////////////////////////////////////////////////////////////
        // Get data for each pass
        /////////////////////////////////////////////////////////////
	function get_pass_data($line, $pass)
	{
		$params = array('amperage', 'black soot', 'blow through', 'concave bead', 'convex bead', 'excessive spatter','fillet size','gas mixture', 'incomplete fusion', 'overall', 'pass number', 'pass runtime', 'placement', 'polarity', 'porosity', 'position', 'slag entrapment', 'tip to work', 'travel angle', 'travel speed', 'undercut', 'vc_aim_on', 'vc_ctw_on', 'vc_ta_on', 'vc_ts_on', 'voltage', 'weld angle');

		$mapping = array('','','','','','','','','','Score','','','','Polarity','','','','','','','','','','','','Volts','');

                $constantsMapping = array('Amperage','','','','','','','Gas Mixture','','Pass Score','Pass Number','','','','','','','','','','','','','','','','');

		$scoreMapping = array('','','','','','','','','','','','','','','','Position','','CTWD','Travel Angle','Speed','','','','','','','Work Angle');

                $defectsMapping = array('','','','concave bead','convex bead','excessive spatter','wrong size','','incomplete fusion','','','','Placement','','Porosity','','','','','','Undercut','','','','','','');

                $cueMapping= array('','','','','','','','','','','','','','','','','','','','','','Aim Cue','Arc Length Cue','Work Angle Cue','Travel Speed Cue','','');

		$values = $this->get_line_data($line, $params);
		
		
		foreach ($params as $key => $val)
		{
			if (!empty($values[$val]) && strlen($mapping[$key]) > 0)
			{
			    $this->pass[$this->curr_project][$pass][$mapping[$key]] = $values[$val];

                            // Fill out project headings array
			    $pos = array_search($mapping[$key], $this->fields);
			    switch ($val)
			    {
				case 'overall':
				{           
					$this->final_project[$this->curr_project][$pos] += $values[$val];
				}
				break;
				default:
					$this->final_project[$this->curr_project][$pos] = $values[$val];
					break;
			     }

			}

                        // Get the constants for all passes
			if (!empty($constantsMapping[$key]))
                        {
                        	if(!isset($values[$val]))  { 			       
			           $this->passConstants[$this->curr_project][$pass][$constantsMapping[$key]] = (int)-1;
                               }
                               else {
			           $this->passConstants[$this->curr_project][$pass][$constantsMapping[$key]] = $values[$val];
			       }
                        }

                        // Get the defects for all projects
			if (!empty($defectsMapping[$key]))
                        {
			       if(!isset($values[$val]))  { 			       
			   	   $this->passDefects[$this->curr_project][$pass][$defectsMapping[$key]] = (int)-1;
                               }
                               else {
			    	   $this->passDefects[$this->curr_project][$pass][$defectsMapping[$key]] = $values[$val];
			       }
                        }

                        // Get the scoring techniques for all projects
                        if (!empty($scoreMapping[$key]))
                        {
                               if(!isset($values[$val]))  { 			       
                                   $this->passScores[$this->curr_project][$pass][$scoreMapping[$key]]= (int)-1;
                               }
                               else {
                               	   $this->passScores[$this->curr_project][$pass][$scoreMapping[$key]]= $values[$val];
			       }
                        }

                        // Get the cues for all projects
                        if (!empty($cueMapping[$key]))
                        {
			       if(!isset($values[$val]))  { 			       
			           $this->passCues[$this->curr_project][$pass][$cueMapping[$key]] = (int)-1;
                               }
                               else {
			           $this->passCues[$this->curr_project][$pass][$cueMapping[$key]] = $cueMapping[$key];
			       }
                        }

			//else if (strlen($mapping[$key]) == 0)
			//{
			//	continue;
			//} 
		}

	}
	////////////////////////////////////////////////////////////
	// Get main data for lesson itself
	////////////////////////////////////////////////////////////
	function get_lesson_data($line)
	{
		$params = array('name', 'start date', 'start time');
		$mapping = array('', 'Time Modified', '');
		
		$values = $this->get_line_data($line, $params);
		foreach ($params as $key => $val)
		{
			if (!empty($values[$val]) && strlen($mapping[$key]) > 0)
			{
				$this->session[$mapping[$key]] = $values[$val];
			}
		}
	}
      
        ////////////////////////////////////////////////////////////
        // Create a brand new entry in the vrlesson activity
        ////////////////////////////////////////////////////////////
        function createNewProject($dataid, $recordID, $myproject)
        {
            global $DB,$USER;

            // Update the project constants
            $csvName = $myproject[0];
            $csvProcess = $myproject[1];
            $csvEnvironment = $myproject[2];
            $csvPolarity = $myproject[3];
            $csvVolts = $myproject[4];
            $csvScore = $myproject[5];
            $csvTime = $myproject[6];  // [6]=> Time Modified ( "9:4:2012 15:35:29" ) 
            $csvProjNum = $myproject[8];
            
            //  Get the original fields
            $oldRID = $this->get_original_RID($dataid, $csvName);

            // Insert new vrlesson_content fields with NULL contents:
            $fields = $DB->get_records('vrlesson_fields', array('dataid'=>$dataid), '', 'name, id, type');
            foreach ($fields as $field) 
            {
                $content = new stdClass();
                $content->recordid = $recordID;
                $content->fieldid = $field->id;

                if(isset($oldRID) && $oldRID > 0)
                {
                     $oldContent = $DB->get_record('vrlesson_content', array('recordid'=>$oldRID, 'fieldid'=>$field->id));

                     // We must update the score here since "updateCurrentProject" doesn't handle that
                     if($field->name === 'Score')
                     { $content->content = $csvScore; }
                     else
                     {   $content->content = $oldContent->content;   }
                } 
              
                $DB->insert_record('vrlesson_content', $content);
            }
                        
            // Update the pass and bend data
            $this->updateCurrentProject($dataid, $recordID, $myproject);

            // Update the score field
            $currLesson = $DB->get_record('vrlesson', array('id'=>$dataid));
            $ratingScore = (int)$csvScore;
            if($ratingScore > $currLesson->scale)
            {  $ratingScore = $currLesson->scale;  }

            // Make a new rating object
            $cm = get_coursemodule_from_instance('vrlesson', $currLesson->id,  $currLesson->course, false, MUST_EXIST);
            $context = $DB->get_record('context', array('instanceid'=>$cm->id));

            $ratingItem = new stdClass;
            $ratingItem->contextid = $context->id;
            $ratingItem->component = 'mod_vrlesson';
            $ratingItem->ratingarea = 'entry';
            $ratingItem->itemid = $recordID;
            $ratingItem->scaleid = $currLesson->scale;
            $ratingItem->rating = $ratingScore;
            $ratingItem->userid = $USER->id;
            $ratingItem->timecreated = time();
            $ratingItem->timemodified =  time();             
	    $DB->insert_record('rating', $ratingItem);             
        }


        ////////////////////////////////////////////////////////////
        // Update existing project with CSV constants
        // IE:  masteries, attempts, best techniques, bend tests
        // Parameters:
        // --$dataid: data id for the vrlesson activity
        // --$recordid: record id for the current project in the vrlesson activity
        // --$myproject: array of project constants from CSV file
        ////////////////////////////////////////////////////////////
        function updateCurrentProject($dataid, $recordid, $myproject)
        {
            global $DB,$USER;
            
            $csvName = $myproject[0];
            $csvProcess = $myproject[1];
            $csvEnvironment = $myproject[2];
            $csvPolarity = $myproject[3];
            $csvVolts = $myproject[4];
            $csvScore = $myproject[5];
            $csvTime = $myproject[6];  // [6]=> Time Modified ( "9:4:2012 15:35:29" ) 
            $csvProjNum = $myproject[8];

            $envirofield = $DB->get_record('vrlesson_fields', 
                             array('dataid'=>$dataid, 'name'=>'Environment'), '*', MUST_EXIST);
            $polarityfield = $DB->get_record('vrlesson_fields', 
                             array('dataid'=>$dataid, 'name'=>'Polarity'), '*', MUST_EXIST);
            $voltsfield = $DB->get_record('vrlesson_fields', 
                             array('dataid'=>$dataid, 'name'=>'Volts'), '*', MUST_EXIST);
            $attemptsfield = $DB->get_record('vrlesson_fields', 
                             array('dataid'=>$dataid, 'name'=>'Total Attempts'), '*', MUST_EXIST);
            $passesfield = $DB->get_record('vrlesson_fields', 
                             array('dataid'=>$dataid, 'name'=>'Passes'), '*', MUST_EXIST);
            $bendsfield = $DB->get_record('vrlesson_fields', 
                             array('dataid'=>$dataid, 'name'=>'Bend Tests'), '*', MUST_EXIST);
            $achievefield = $DB->get_record('vrlesson_fields', 
                             array('dataid'=>$dataid, 'name'=>'Project Achievements'), '*', MUST_EXIST);
            $mastery1Field = $DB->get_record('vrlesson_fields', 
                             array('dataid'=>$dataid, 'name'=>'Mastery 1'), '*', MUST_EXIST);
            $mastery2Field = $DB->get_record('vrlesson_fields', 
                             array('dataid'=>$dataid, 'name'=>'Mastery 2'), '*', MUST_EXIST);


            $currProject = $DB->get_records('vrlesson_content', array('recordid'=>$recordid), '', '*');
            $currLesson = $DB->get_record('vrlesson', array('id'=>$dataid));

            foreach($currProject as $myfields)
            {
                switch($myfields->fieldid)
                {
                    // The Environment field
                    case $envirofield->id:  
                    { 
                         $csvEnvironment = $this->_translte_project_environment($csvEnvironment);         
                         $this->createNewContent($recordid, $myfields->fieldid, $envirofield->type, $myfields->id, $csvEnvironment);
                    }
                    break;
                    // The Polarity field
                    case $polarityfield->id:  
                    { 
                         $this->createNewContent($recordid, $myfields->fieldid, $polarityfield->type, $myfields->id, $csvPolarity);
                    }
                    break;
                    // The Volts field
                    case $voltsfield->id:  
                    { 
                         $this->createNewContent($recordid, $myfields->fieldid, $voltsfield->type, $myfields->id, $csvVolts);
                    }
                    break;
                    // The Passes field
                    case $passesfield->id:  
                    { 
                         // Summary Section
                         $summaryContent = $this->get_pass_summary($csvTime, $csvProjNum);

                         // All the Pass info
                         $allPassContent = "";
                         $numOfPasses = count($this->pass[$csvProjNum]);
                         for($i = 0; $i < $numOfPasses; $i++)
                         {
                              $allPassContent .= $this->get_pass_content($csvProjNum, $i);
                              $allPassContent .= "\n";
                         }

                         $finalContent = $summaryContent."\n".$allPassContent;
                         print_r($finalContent); echo '<br /><br />';
                         $this->createNewContent($recordid, $myfields->fieldid, $passesfield->type, $myfields->id, $finalContent);
                    }
                    break;
                    // The Bend Tests field
                    case $bendsfield->id:  
                    { 
                         // Don't erase bend info if this upload doesn't have any
                         $oldRID = $this->get_original_RID($dataid, $csvName);

                         $oldBendsField = $DB->get_record('vrlesson_content', array('fieldid'=>$myfields->fieldid,
                                          'recordid'=>$oldRID));

                         // All the Bend info
                         $allBendContent = "";
                         $countBends = $this->amountOfBends;
                         
                         for($i = 0; $i < $countBends; $i++)
                         {
                              $allBendContent .= $this->get_bend_content($i);
                              $allBendContent .= "\n";
                         }

                         //echo 'Bends content: <br />';
                        // print_r($allBendContent); echo '<br /><br />';

                         // Only overwrite if previous field was empty
                         // TODO: Need to overwrite with new bend info if bends were better
                         if(empty($oldBendsField->content))
                         {
                              $this->createNewContent($recordid, $myfields->fieldid, $bendsfield->type, 
                              $myfields->id, $allBendContent);
                         }
                    }
                    break;
                    // The Attempts field
                    case $attemptsfield->id:  
                    { 
                         // Increase attempts
                         $attempts = (int)$myfields->content;
                         $attempts += 1;
                         $this->createNewContent($recordid, $myfields->fieldid, $attemptsfield->type, $myfields->id, $attempts);
                    }
                    break;
                    // The Achievements field
                    case $achievefield->id:  
                    { 
                         // See if user gained an achievement
                         // Speed, right angle, passing along
                         $achievements = "";
                         if($this->speedAchieve)
                         { $achievements .= 'Speed,'; }
                         if($this->angleAchieve)
                         { $achievements .= 'Angle,'; }
                         if($this->defectAchieve)
                         { $achievements .= 'Defect'; }
                         
                         $this->createNewContent($recordid, $myfields->fieldid, $achievefield->type, $myfields->id, $achievements);
                    }
                    break;
                    // The Mastery1 field - Project mastery
                    case $mastery1Field->id:  
                    { 
                         $maxProjects = 15;       // max number of projects that are alike
                         $currProjPassed = 3;  // number of projects that have a passing grade

                         $numOfAttempts = $DB->get_record('vrlesson_content', 
                                              array('recordid'=>$recordid, 'fieldid'=>$attemptsfield->id));
                         $projAttempts = (int)$numOfAttempts->content;

                         $projeMastery = ((($currProjPassed / $projAttempts) + $currProjPassed ) / $maxProjects) * 100;
                         $projeMastery = (int)ceil($projeMastery);
                         $this->createNewContent($recordid, $myfields->fieldid, $mastery1Field->type, $myfields->id, $projeMastery);
                    }
                    break;
                    // The Mastery2 field - Process mastery
                    case $mastery2Field->id:  
                    { 
                         $maxProjects = 22;       // max number of projects in that process
                         $currProjCompleted = 5;  // number of projects that have a passing grade

                         $numOfAttempts = $DB->get_record('vrlesson_content', 
                                              array('recordid'=>$recordid, 'fieldid'=>$attemptsfield->id));
                         $projAttempts = (int)$numOfAttempts->content;

                         $projeMastery = ((($currProjCompleted / $projAttempts) + $currProjCompleted) / $maxProjects) * 100;
                         $projeMastery = (int)ceil($projeMastery);
                         $this->createNewContent($recordid, $myfields->fieldid, $mastery2Field->type, $myfields->id, $projeMastery);
                    }
                    break;
                }
            }// end of foreach

        }

        ////////////////////////////////////////////////////////////
        // Make a new content object to update our information
        // Parameters:
        // -- all self-explanitory
        // -- $value: actual content we want to use as replacement
        ////////////////////////////////////////////////////////////
        function createNewContent($recordid, $fieldid, $fieldType, $contentid, $value)
        {
             global $DB;
             $content = new stdClass();
             $content->recordid = (int)$recordid;
             $content->fieldid = (int)$fieldid;
             $content->id = (int)$contentid;

             if ($fieldType == 'textarea') 
             {
                  // the only field type where HTML is possible
                  $value = clean_param($value, PARAM_CLEANHTML);
             } else {
                   // remove potential HTML:
                   $patterns[] = '/</';
                   $replacements[] = '&lt;';
                   $patterns[] = '/>/';
                   $replacements[] = '&gt;';
                   $value = preg_replace($patterns, $replacements, $value);
             }

             // for now, only for "latlong" and "url" fields, but that should better be looked up from
             // $CFG->dirroot . '/mod/vrlesson/field/' . $field->type . '/field.class.php'
             // once there is stored how many contents the field can have.
             if (preg_match("/^(latlong|url)$/", $fieldType)) 
             {
                   $values = explode(" ", $value, 2);
                   $content->content  = $values[0];
                   // The url field doesn't always have two values (unforced autolinking).
                   if (count($values) > 1) {
                            $content->content1 = $values[1];
                        }
              } 
              else {
                   $content->content = $value;
              }

              $DB->update_record('vrlesson_content', $content);
        }

        ////////////////////////////////////////////////////////////
        // Main Function: Use this to pull information and populate
        // class variables
        // Parameters:
        // -- $content:  contents of the CSV file
        ////////////////////////////////////////////////////////////
	function format($content)
	{
		$all_lines = explode("\n", $content);

		//$this->final_project[0] = $this->fields;
		
		$this->get_lesson_data($all_lines[0]);
		$this->get_lesson_data($all_lines[1]);
		$this->get_lesson_data($all_lines[2]);

		$i=3;
		while ($i < count($all_lines))
		{
			if (strncmp($all_lines[$i], 'Project', strlen('project')) == 0)
			{
				$all_parts = explode(',', $all_lines[$i]);
				$this->curr_project = substr($all_parts[0], strlen('Project'));
				$i++;
				$this->get_project_data($all_lines[$i]);
                                $this->get_project_bend_data($all_lines[$i]);
			}
			else if (strncmp($all_lines[$i], 'Pass', strlen('pass')) == 0)
			{
				$all_parts = explode(',', $all_lines[$i]);
				$pass = substr($all_parts[0], strlen('Pass'));
				$i++;
				$this->get_pass_data($all_lines[$i], $pass);
			}
			$i++;
		}
		
		$text = implode(',', $this->fields) . "\n";

		foreach($this->final_project as $key => $proj)
		{
			$pass_count = count($this->pass[$key]);
			
			// Calculate the final score
			$this->final_project[$key][5] = (int)round($this->final_project[$key][5] / $pass_count);
			
			ksort($this->final_project[$key]);
			$text .= implode(',', $this->final_project[$key]) . "\n";
		}

		return $text;
	}

    ////////////////////////////////////////////////////////////
    // Get all vrlessons and try to mark them as complete
    //
    ////////////////////////////////////////////////////////////
    function set_completion_status($courseid, $userid)
    {
        global $DB;
        
	// Update the course completion status
	// loop through all the entries within each course module. 
	//-----------------------------------------
     	$vrLessonID = 24;
     	$courseMods = $DB->get_records('course_modules', array('course'=>$courseid, 'module'=>$vrLessonID));
            
        foreach($courseMods as $myMod)
        {
            $completeLessonName = $DB->get_record('vrlesson', array('id'=>$myMod->instance));
        
            // Get all the project names in this lesson
            //----------------------------------------
            $nameField = $DB->get_record('vrlesson_fields', array('dataid'=>$myMod->instance, 'name'=>'Project Name'));
            $projects = $DB->get_records('vrlesson_content', array('fieldid'=>$nameField->id));
            $projNameArray = array();
            foreach($projects as $singleProj)
            {
                 $projNameArray[] = $singleProj->content;
            }
            $projNameArray = array_unique($projNameArray);
    
            // Now find highest scores for each project
            $completeCounter = 0; 
            foreach($projNameArray as $projectName)
            {
                 $projectScore = $this->get_highest_score($projectName, $userid,  $completeLessonName->id);
                 if($projectScore >= $completeLessonName->scale)
                 {  $completeCounter++;  }
            }

            // Compare count of scores to count of records.
            // If equal, then mark this activity as complete for the user
            $recCount = count($projNameArray);
            $totalEntries = $completeLessonName->requiredentries;
     	    if($recCount >= $totalEntries && $completeCounter >= $recCount)
     	    {  
     	        // If course module completion doesn't exist, let's make a new record
                if(!$DB->get_record('course_modules_completion', array('userid'=>$userid, 'coursemoduleid'=>$myMod->id)))
                {
            	    $newCompletion = new stdClass;
            	    $newCompletion->coursemoduleid = $myMod->id;
            	    $newCompletion->userid = $userid;
            	    $newCompletion->completionstate = 1;
            	    $newCompletion->viewed = 0;
            	    $newCompletion->timemodified = time();
            	    $DB->insert_record('course_modules_completion', $newCompletion);
            	  
            	    echo '<p>'.$completeLessonName->name.' has been completed!</p><br />';
                }
           }
        } //end of foreach
    }

}