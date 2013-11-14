<?php
require_once("config.php");
require_once("lic_api.php");
require_once 'phpunit.phar';

class LicenseTest extends PHPUnit_TestCase
{
	var $file = "52527d2971a98.lic";
	
	// constructor of the test suite
	function LicenseTest($name) {
		$this->PHPUnit_TestCase($name);
	}

	// called before the test functions will be executed
	// this function is defined in PHPUnit_TestCase and overwritten
	// here
	function setUp() {
	}

	// called after the test functions are executed
	// this function is defined in PHPUnit_TestCase and overwritten
	// here
	function tearDown() {
		// delete your instance
		
	}
	
	function testToolConfig() {
		$ret = validate_tools();
		$this->assertTrue($ret);
	}

	function testHWID() {
		$ret = lic_getHWID();
		$this->assertTrue(!strcmp($ret, "306A900FFAFC7B295"));
	}
	
	function testLicenseValid() {
		$ret = lic_IsValid($this->file);
		$this->assertTrue($ret);
	}
	
	function testLicenseID() {
		$ret = lic_LicenseID($this->file);
		$this->assertTrue(!strcmp($ret, "52318b9600a5b"));
	}
	
	function testLicenseDate() {
		$ret = lic_LicenseID($this->file);
		$this->assertTrue(!strcmp($ret, "2013-09-12 10:38:30"));
	}

	function testLicenseLimitDate() {
		$ret = lic_LimitDate($this->file);
		$this->assertTrue(!strcmp($ret, "9/9/2015"));
	}

	function testLicenseNbMaxClient() {
		$ret = lic_NbMaxClient($this->file);
		$this->assertTrue(!strcmp($ret, "10"));
	}

	function testLicenseNbMaxClass() {
		$ret = lic_LicenseID($this->file);
		$this->assertTrue(!strcmp($ret, "5"));
	}
	
	function testLicenseSBCFeature() {
		$ret = lic_SBCFeature($this->file);
		$this->assertTrue(!strcmp($ret, "Include GUID2\n"));
	}
}

//$suite  = new PHPUnit_TestSuite("LicenseTest");
//$result = PHPUnit::run($suite);

//echo $result -> toString();


