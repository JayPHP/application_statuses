<?php

/**
 * Additional configuration for 'application_statuses' component
 *
 * @package block_application_statuses
 * @author James Byrne
 */

class block_application_statuses_edit_form extends block_edit_form
{
    protected function specific_definition($mform)
    {
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));
 
        $mform->addElement('text', 'config_title', get_string('blocktitle', 'block_application_statuses'));
        $mform->setDefault('config_title', 'Your custom title here!');
        $mform->setType('config_title', PARAM_TEXT);
    }
}
