<?php


defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
	
// Fullscreen Toggle
$name = 'theme_vrsim/width';
$title = get_string('width','theme_vrsim');
$description = get_string('widthdesc', 'theme_vrsim');
$default = 960;
$choices = array(960=>get_string('fixedwidth','theme_vrsim'), 97=>get_string('variablewidth','theme_vrsim'));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Gap Toggle
$name = 'theme_vrsim/gap';
$title = get_string('gap','theme_vrsim');
$description = get_string('gapdesc', 'theme_vrsim');
$default = 70;
$choices = array(70=>get_string('yes',''), 40=>get_string('no',''));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Hide Menu
$name = 'theme_vrsim/hidemenu';
$title = get_string('hidemenu','theme_vrsim');
$description = get_string('hidemenudesc', 'theme_vrsim');
$default = 1;
$choices = array(1=>get_string('yes',''), 0=>get_string('no',''));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Graphic Wrap (Background Image)
$name = 'theme_vrsim/backimage';
$title=get_string('backimage','theme_vrsim');
$description = get_string('backimagedesc', 'theme_vrsim');
$default = 'vrsim/pix/graphics/default.jpg';
$setting = new admin_setting_configtext($name, $title, $description, 'vrsim/pix/graphics/default.jpg', PARAM_URL);
$settings->add($setting);

// Graphic Wrap (Background Position)
$name = 'theme_vrsim/backposition';
$title = get_string('backposition','theme_vrsim');
$description = get_string('backpositiondesc', 'theme_vrsim');
$default = 'no-repeat';
$choices = array('no-repeat'=>get_string('backpositioncentred','theme_vrsim'), 'no-repeat fixed'=>get_string('backpositionfixed','theme_vrsim'), 'repeat'=>get_string('backpositiontiled','theme_vrsim'), 'repeat-x'=>get_string('backpositionrepeat','theme_vrsim'));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Menu background colour setting
$name = 'theme_vrsim/backcolor';
$title = get_string('backcolor','theme_vrsim');
$description = get_string('backcolordesc', 'theme_vrsim');
$default = '#ffffff';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// Logo file setting
$name = 'theme_vrsim/logo';
$title = get_string('logo','theme_vrsim');
$description = get_string('logodesc', 'theme_vrsim');
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$settings->add($setting);

// Menu background colour setting
$name = 'theme_vrsim/menubackcolor';
$title = get_string('menubackcolor','theme_vrsim');
$description = get_string('menubackcolordesc', 'theme_vrsim');
$default = '#333333';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// Menu background colour setting
$name = 'theme_vrsim/endcolor';
$title = get_string('endcolor','theme_vrsim');
$description = get_string('endcolordesc', 'theme_vrsim');
$default = '#ffffff';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// Menu hover background colour setting
$name = 'theme_vrsim/menuhovercolor';
$title = get_string('menuhovercolor','theme_vrsim');
$description = get_string('menuhovercolordesc', 'theme_vrsim');
$default = '#f42941';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// Profilebar custom block title setting

$name = 'theme_vrsim/profilebarcustomtitle';
$title = get_string('profilebarcustomtitle','theme_vrsim');
$description = get_string('profilebarcustomtitledesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Profilebar custom block setting

$name = 'theme_vrsim/profilebarcustom';
$title = get_string('profilebarcustom','theme_vrsim');
$description = get_string('profilebarcustomdesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$settings->add($setting);
	
// Email url setting

$name = 'theme_vrsim/emailurl';
$title = get_string('emailurl','theme_vrsim');
$description = get_string('emailurldesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Title Date setting

$name = 'theme_vrsim/titledate';
$title = get_string('titledate','theme_vrsim');
$description = get_string('titledatedesc', 'theme_vrsim');
$default = 1;
$choices = array(1=>get_string('yes',''), 0=>get_string('no',''));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Copyright setting

$name = 'theme_vrsim/copyright';
$title = get_string('copyright','theme_vrsim');
$description = get_string('copyrightdesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// CEOP
$name = 'theme_vrsim/ceop';
$title = get_string('ceop','theme_vrsim');
$description = get_string('ceopdesc', 'theme_vrsim');
$default = '';
$choices = array(''=>get_string('ceopnone','theme_vrsim'), 'http://www.thinkuknow.org.au/site/report.asp'=>get_string('ceopaus','theme_vrsim'), 'http://www.ceop.police.uk/report-abuse/'=>get_string('ceopuk','theme_vrsim'));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Disclaimer setting
$name = 'theme_vrsim/disclaimer';
$title = get_string('disclaimer','theme_vrsim');
$description = get_string('disclaimerdesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$settings->add($setting);

// Facebook url setting

$name = 'theme_vrsim/facebook';
$title = get_string('facebook','theme_vrsim');
$description = get_string('facebookdesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Twitter url setting

$name = 'theme_vrsim/twitter';
$title = get_string('twitter','theme_vrsim');
$description = get_string('twitterdesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Google+ url setting

$name = 'theme_vrsim/googleplus';
$title = get_string('googleplus','theme_vrsim');
$description = get_string('googleplusdesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Flickr url setting

$name = 'theme_vrsim/flickr';
$title = get_string('flickr','theme_vrsim');
$description = get_string('flickrdesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Picasa url setting

$name = 'theme_vrsim/picasa';
$title = get_string('picasa','theme_vrsim');
$description = get_string('picasadesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Tumblr url setting

$name = 'theme_vrsim/tumblr';
$title = get_string('tumblr','theme_vrsim');
$description = get_string('tumblrdesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Instagram url setting

$name = 'theme_vrsim/instagram';
$title = get_string('instagram','theme_vrsim');
$description = get_string('instagramdesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Blogger url setting

$name = 'theme_vrsim/blogger';
$title = get_string('blogger','theme_vrsim');
$description = get_string('bloggerdesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// LinkedIn url setting

$name = 'theme_vrsim/linkedin';
$title = get_string('linkedin','theme_vrsim');
$description = get_string('linkedindesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// YouTube url setting

$name = 'theme_vrsim/youtube';
$title = get_string('youtube','theme_vrsim');
$description = get_string('youtubedesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Vimeo url setting

$name = 'theme_vrsim/vimeo';
$title = get_string('vimeo','theme_vrsim');
$description = get_string('vimeodesc', 'theme_vrsim');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);


}