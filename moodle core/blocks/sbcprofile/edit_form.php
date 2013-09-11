<?php
// This file is part of Moodle - http://moodle.org/
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

defined('MOODLE_INTERNAL') || die();

/**
 * Form for editing profile block settings
 *
 * @package    block
 * @subpackage sbcprofile
 * @copyright  2010 Remote-Learner.net
 * @author     Olav Jordan <olav.jordan@remote-learner.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_sbcprofile_edit_form extends block_edit_form {
    protected function specific_definition($mform) {
        global $CFG;
        $mform->addElement('header', 'configheader', get_string('sbcprofile_settings', 'block_sbcprofile'));

        $mform->addElement('selectyesno', 'config_display_picture', get_string('display_picture', 'block_sbcprofile'));
        if (isset($this->block->config->display_picture)) {
            $mform->setDefault('config_display_picture', $this->block->config->display_picture);
        } else {
            $mform->setDefault('config_display_picture', '1');
        }

        $mform->addElement('selectyesno', 'config_display_country', get_string('display_country', 'block_sbcprofile'));
        if (isset($this->block->config->display_country)) {
            $mform->setDefault('config_display_country', $this->block->config->display_country);
        } else {
            $mform->setDefault('config_display_country', '1');
        }

        $mform->addElement('selectyesno', 'config_display_city', get_string('display_city', 'block_sbcprofile'));
        if (isset($this->block->config->display_city)) {
            $mform->setDefault('config_display_city', $this->block->config->display_city);
        } else {
            $mform->setDefault('config_display_city', '1');
        }

        $mform->addElement('selectyesno', 'config_display_description', get_string('display_description', 'block_sbcprofile'));
        if (isset($this->block->config->display_description)) {
            $mform->setDefault('config_display_description', $this->block->config->display_description);
        } else {
            $mform->setDefault('config_display_description', '1');
        }

        $mform->addElement('selectyesno', 'config_display_email', get_string('display_email', 'block_sbcprofile'));
        if (isset($this->block->config->display_email)) {
            $mform->setDefault('config_display_email', $this->block->config->display_email);
        } else {
            $mform->setDefault('config_display_email', '1');
        }

        $mform->addElement('selectyesno', 'config_display_un', get_string('display_un', 'block_sbcprofile'));
        if (isset($this->block->config->display_un)) {
            $mform->setDefault('config_display_un', $this->block->config->display_un);
        } else {
            $mform->setDefault('config_display_un', '0');
        }

        $mform->addElement('selectyesno', 'config_display_skype', get_string('display_skype', 'block_sbcprofile'));
        if (isset($this->block->config->display_skype)) {
            $mform->setDefault('config_display_skype', $this->block->config->display_skype);
        } else {
            $mform->setDefault('config_display_skype', '0');
        }

        $mform->addElement('selectyesno', 'config_display_phone1', get_string('display_phone1', 'block_sbcprofile'));
        if (isset($this->block->config->display_phone1)) {
            $mform->setDefault('config_display_phone1', $this->block->config->display_phone1);
        } else {
            $mform->setDefault('config_display_phone1', '0');
        }

        $mform->addElement('selectyesno', 'config_display_phone2', get_string('display_phone2', 'block_sbcprofile'));
        if (isset($this->block->config->display_phone2)) {
            $mform->setDefault('config_display_phone2', $this->block->config->display_phone2);
        } else {
            $mform->setDefault('config_display_phone2', '0');
        }

        $mform->addElement('selectyesno', 'config_display_institution', get_string('display_institution', 'block_sbcprofile'));
        if (isset($this->block->config->display_institution)) {
            $mform->setDefault('config_display_institution', $this->block->config->display_institution);
        } else {
            $mform->setDefault('config_display_institution', '0');
        }

        $mform->addElement('selectyesno', 'config_display_firstaccess', get_string('display_firstaccess', 'block_sbcprofile'));
        if (isset($this->block->config->display_firstaccess)) {
            $mform->setDefault('config_display_firstaccess', $this->block->config->display_firstaccess);
        } else {
            $mform->setDefault('config_display_firstaccess', '0');
        }

        $mform->addElement('selectyesno', 'config_display_lastaccess', get_string('display_lastaccess', 'block_sbcprofile'));
        if (isset($this->block->config->display_lastaccess)) {
            $mform->setDefault('config_display_lastaccess', $this->block->config->display_lastaccess);
        } else {
            $mform->setDefault('config_display_lastaccess', '0');
        }

        $mform->addElement('selectyesno', 'config_display_currentlogin', get_string('display_currentlogin', 'block_sbcprofile'));
        if (isset($this->block->config->display_currentlogin)) {
            $mform->setDefault('config_display_currentlogin', $this->block->config->display_currentlogin);
        } else {
            $mform->setDefault('config_display_currentlogin', '0');
        }

    }
}