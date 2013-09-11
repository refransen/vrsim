<?php


defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
	
// Fullscreen Toggle
$name = 'theme_aardvark/width';
$title = get_string('width','theme_aardvark');
$description = get_string('widthdesc', 'theme_aardvark');
$default = 960;
$choices = array(960=>get_string('fixedwidth','theme_aardvark'), 97=>get_string('variablewidth','theme_aardvark'));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Gap Toggle
$name = 'theme_aardvark/gap';
$title = get_string('gap','theme_aardvark');
$description = get_string('gapdesc', 'theme_aardvark');
$default = 70;
$choices = array(70=>get_string('yes',''), 45=>get_string('no',''));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Hide Menu
$name = 'theme_aardvark/hidemenu';
$title = get_string('hidemenu','theme_aardvark');
$description = get_string('hidemenudesc', 'theme_aardvark');
$default = 1;
$choices = array(1=>get_string('yes',''), 0=>get_string('no',''));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Graphic Wrap (Background Image)
$name = 'theme_aardvark/backimage';
$title=get_string('backimage','theme_aardvark');
$description = get_string('backimagedesc', 'theme_aardvark');
$default = 'aardvark/pix/graphics/default.jpg';
$setting = new admin_setting_configtext($name, $title, $description, 'aardvark/pix/graphics/default.jpg', PARAM_URL);
$settings->add($setting);

// Graphic Wrap (Background Position)
$name = 'theme_aardvark/backposition';
$title = get_string('backposition','theme_aardvark');
$description = get_string('backpositiondesc', 'theme_aardvark');
$default = 'no-repeat';
$choices = array('no-repeat'=>get_string('backpositioncentred','theme_aardvark'), 'no-repeat fixed'=>get_string('backpositionfixed','theme_aardvark'), 'repeat'=>get_string('backpositiontiled','theme_aardvark'), 'repeat-x'=>get_string('backpositionrepeat','theme_aardvark'));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Menu background colour setting
$name = 'theme_aardvark/backcolor';
$title = get_string('backcolor','theme_aardvark');
$description = get_string('backcolordesc', 'theme_aardvark');
$default = '#ffffff';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// Logo file setting
$name = 'theme_aardvark/logo';
$title = get_string('logo','theme_aardvark');
$description = get_string('logodesc', 'theme_aardvark');
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$settings->add($setting);

// Menu background colour setting
$name = 'theme_aardvark/menubackcolor';
$title = get_string('menubackcolor','theme_aardvark');
$description = get_string('menubackcolordesc', 'theme_aardvark');
$default = '#333333';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// Menu hover background colour setting
$name = 'theme_aardvark/menuhovercolor';
$title = get_string('menuhovercolor','theme_aardvark');
$description = get_string('menuhovercolordesc', 'theme_aardvark');
$default = '#f42941';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// Profilebar custom block title setting

$name = 'theme_aardvark/profilebarcustomtitle';
$title = get_string('profilebarcustomtitle','theme_aardvark');
$description = get_string('profilebarcustomtitledesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Profilebar custom block setting

$name = 'theme_aardvark/profilebarcustom';
$title = get_string('profilebarcustom','theme_aardvark');
$description = get_string('profilebarcustomdesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$settings->add($setting);
	
// Email url setting

$name = 'theme_aardvark/emailurl';
$title = get_string('emailurl','theme_aardvark');
$description = get_string('emailurldesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Title Date setting

$name = 'theme_aardvark/titledate';
$title = get_string('titledate','theme_aardvark');
$description = get_string('titledatedesc', 'theme_aardvark');
$default = 1;
$choices = array(1=>get_string('yes',''), 0=>get_string('no',''));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Copyright setting

$name = 'theme_aardvark/copyright';
$title = get_string('copyright','theme_aardvark');
$description = get_string('copyrightdesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// CEOP
$name = 'theme_aardvark/ceop';
$title = get_string('ceop','theme_aardvark');
$description = get_string('ceopdesc', 'theme_aardvark');
$default = '';
$choices = array(''=>get_string('ceopnone','theme_aardvark'), 'http://www.thinkuknow.org.au/site/report.asp'=>get_string('ceopaus','theme_aardvark'), 'http://www.ceop.police.uk/report-abuse/'=>get_string('ceopuk','theme_aardvark'));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Disclaimer setting
$name = 'theme_aardvark/disclaimer';
$title = get_string('disclaimer','theme_aardvark');
$description = get_string('disclaimerdesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$settings->add($setting);

// Facebook url setting

$name = 'theme_aardvark/facebook';
$title = get_string('facebook','theme_aardvark');
$description = get_string('facebookdesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Twitter url setting

$name = 'theme_aardvark/twitter';
$title = get_string('twitter','theme_aardvark');
$description = get_string('twitterdesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Google+ url setting

$name = 'theme_aardvark/googleplus';
$title = get_string('googleplus','theme_aardvark');
$description = get_string('googleplusdesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Flickr url setting

$name = 'theme_aardvark/flickr';
$title = get_string('flickr','theme_aardvark');
$description = get_string('flickrdesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Picasa url setting

$name = 'theme_aardvark/picasa';
$title = get_string('picasa','theme_aardvark');
$description = get_string('picasadesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Tumblr url setting

$name = 'theme_aardvark/tumblr';
$title = get_string('tumblr','theme_aardvark');
$description = get_string('tumblrdesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Instagram url setting

$name = 'theme_aardvark/instagram';
$title = get_string('instagram','theme_aardvark');
$description = get_string('instagramdesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Blogger url setting

$name = 'theme_aardvark/blogger';
$title = get_string('blogger','theme_aardvark');
$description = get_string('bloggerdesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// LinkedIn url setting

$name = 'theme_aardvark/linkedin';
$title = get_string('linkedin','theme_aardvark');
$description = get_string('linkedindesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// YouTube url setting

$name = 'theme_aardvark/youtube';
$title = get_string('youtube','theme_aardvark');
$description = get_string('youtubedesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Vimeo url setting

$name = 'theme_aardvark/vimeo';
$title = get_string('vimeo','theme_aardvark');
$description = get_string('vimeodesc', 'theme_aardvark');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);


}