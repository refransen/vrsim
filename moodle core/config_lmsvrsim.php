<?php  // Moodle configuration file

unset($CFG);
global $CFG, $SBC_DB;  // Extra Database for SBC
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'lmsvrsim_lms';
$CFG->dbuser    = 'lmsvrsim_lms';
$CFG->dbpass    = 'vrsim2013';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbsocket' => 0,
);

// Information for the SBC database
$CFG->sbc_dbhost = 'localhost';
$CFG->sbc_dbName = 'sbcvrsim_sbc';
$CFG->sbc_dbUser = 'sbcvrsim_sbc';
$CFG->sbc_dbPass = 'odessa0102;';

$CFG->sbcroot   = 'http://sbc.vrsim.com';
$CFG->wwwroot   = 'http://lms.vrsim.com';
$CFG->dataroot  = '/home/lmsvrsim/public_html/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

$CFG->passwordsaltmain = 'lc[WckCv7ym@6>b7^*&&re:@}G=';

require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
