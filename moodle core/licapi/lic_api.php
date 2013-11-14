<?php 
require_once("config.php");

// Test to make sure our tool is the genuine one and not a fake one
function validate_tools()
{
	global $licAPIConfig;
	
	$md5 = $licAPIConfig["md5"]; 
	$data = file_get_contents($licAPIConfig["tools"]);
	
	if(md5($data) != $md5) return false;
	return true;
}
if(validate_tools() == false) die("License API configuration invalid");

function exec_cmd($cmd)
{
	$proc = popen($cmd, "r");
	if(!$proc) {
		die("Cannot execute ".$cmd);
	}
	$output = "";
	while(!feof($proc)) {
		$output .= fgets($proc,256);
	}
	pclose($proc);
	//var_dump($output);
	return $output;
}

function lic_IsValid($file)
{
	global $licAPIConfig;
	
	$file = $licAPIConfig["licfolder"].$file;
	$ret = exec_cmd($licAPIConfig["tools"]." ".$file);
	if(strcmp($ret,"0x01")) return false;
	return true;
}

function lic_UserID($file)
{
	global $licAPIConfig;
	
	$file = $licAPIConfig["licfolder"].$file;
	$ret = exec_cmd($licAPIConfig["tools"]." ".$file." p UserId");
	return $ret;
}

function lic_ApplicationID($file)
{
	global $licAPIConfig;
	
	$file = $licAPIConfig["licfolder"].$file;
	$ret = exec_cmd($licAPIConfig["tools"]." ".$file." g");
	return $ret;
}

function lic_LicenseID($file)
{
	global $licAPIConfig;
	
	$file = $licAPIConfig["licfolder"].$file;
	$ret = exec_cmd($licAPIConfig["tools"]." ".$file." k");
	return $ret;
}

function lic_NbMaxClient($file)
{
	global $licAPIConfig;
	
	$file = $licAPIConfig["licfolder"].$file;
	$ret = exec_cmd($licAPIConfig["tools"]." ".$file." f NbMaxClient");
	return $ret;
}

function lic_NbMaxClass($file)
{
	global $licAPIConfig;
	
	$file = $licAPIConfig["licfolder"].$file;
	$ret = exec_cmd($licAPIConfig["tools"]." ".$file." f NbMaxClass");
	return $ret;
}

function lic_SBCFeature($file)
{
	global $licAPIConfig;
	
	$file = $licAPIConfig["licfolder"].$file;
	$ret = exec_cmd($licAPIConfig["tools"]." ".$file." x");
	return $ret;
}

function lic_LimitDate($file)
{
	global $licAPIConfig;
	
	$file = $licAPIConfig["licfolder"].$file;
	$ret = exec_cmd($licAPIConfig["tools"]." ".$file." l");
	return $ret;
}

function lic_LicenseDate($file)
{
	global $licAPIConfig;
	
	$file = $licAPIConfig["licfolder"].$file;
	$ret = exec_cmd($licAPIConfig["tools"]." ".$file." d");
	return $ret;
}

// Added by Rachel Fransen
// Nov.8, 2013
// Helper function that checks if a license has reached the limit date
function lic_hasExpired($file) {
    // Get the current date
    $timeZone = date_default_timezone_get();
    date_default_timezone_set($timeZone);
    $today = date('Y/m/d');
    
    $sampleExpir = strtotime(lic_LimitDate($file));
    $expirDate = date('Y/m/d', $sampleExpir);
    
    // Compare dates between now and license expiration
    if($today >= $expirDate) {
        return true;
    }
    return false;
}

function lic_getFile($usrID)
{

	global $licAPIConfig;

	$dir = opendir($licAPIConfig["licfolder"]);
	if($dir == false) return null;
	
	while(false !== ($entry = readdir($dir))) {
		if($entry != "." && $entry != ".." && strstr($entry, ".lic")) {
			if(!strcmp($usrID, lic_UserID($entry))) {
				closedir($dir);
				return $entry;
			}	
		}
	}
	
	closedir($dir);
}

function lic_getHWID()
{
	global $licAPIConfig;
	
	$ret = exec_cmd($licAPIConfig["tools"]);
	return $ret;
}

function exec_enabled() {
	$disabled = explode(', ', ini_get('disable_functions'));
	return !in_array('popen', $disabled);
}

?>