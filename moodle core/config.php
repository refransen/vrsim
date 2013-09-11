<?php  // Moodle configuration file

unset($CFG);
global $CFG, $SBC_DB;  // Extra Database for SBC
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'vrsimlms_moodle';
$CFG->dbuser    = 'vrsimlms_lmsuser';
$CFG->dbpass    = 'lmst3st3r';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbsocket' => 0,
);

// Information for the SBC database
$CFG->sbc_dbhost = 'localhost';
$CFG->sbc_dbName = "vrsimlms_sbc";
$CFG->sbc_dbUser = "vrsimlms_sbc";
$CFG->sbc_dbPass = "vrsimsbc2013";

$CFG->wwwroot   = 'http://vrsimlms.com';
$CFG->dataroot  = '/home/vrsimlms/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

$CFG->passwordsaltmain = 'lc[WckCv7ym@6>b7^*&&re:@}G=';

require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!