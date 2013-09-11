<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $options = array('all'=>get_string('allcourses', 'block_groups'), 'own'=>get_string('owncourses', 'block_groups'));

    $settings->add(new admin_setting_configselect('block_groups_adminview', get_string('adminview', 'block_groups'),
                       get_string('configadminview', 'block_groups'), 'all', $options));

    $settings->add(new admin_setting_configcheckbox('block_groups_hideallcourseslink', get_string('hideallcourseslink', 'block_groups'),
                       get_string('confighideallcourseslink', 'block_groups'), 0));
}

