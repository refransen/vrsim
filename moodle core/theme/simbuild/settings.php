<?php
global $CFG;

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

// Background image setting
// logo image setting
$name = 'theme_simbuild/logo';
$title = $CFG->wwwroot."/".get_string('logo','theme_simbuild');
$description = get_string('logodesc', 'theme_simbuild');
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$settings->add($setting);

// link color setting
$name = 'theme_simbuild/linkcolor';
$title = get_string('linkcolor','theme_simbuild');
$description = get_string('linkcolordesc', 'theme_simbuild');
$default = '#06365b';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// link hover color setting
$name = 'theme_simbuild/linkhover';
$title = get_string('linkhover','theme_simbuild');
$description = get_string('linkhoverdesc', 'theme_simbuild');
$default = '#5487ad';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// main color setting
$name = 'theme_simbuild/maincolor';
$title = get_string('maincolor','theme_simbuild');
$description = get_string('maincolordesc', 'theme_simbuild');
$default = '#8e2800';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// main color accent setting
$name = 'theme_simbuild/maincolorlink';
$title = get_string('maincolorlink','theme_simbuild');
$description = get_string('maincolorlinkdesc', 'theme_simbuild');
$default = '#fff0a5';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// heading color setting
$name = 'theme_simbuild/headingcolor';
$title = get_string('headingcolor','theme_simbuild');
$description = get_string('headingcolordesc', 'theme_simbuild');
$default = '#5c3500';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

}