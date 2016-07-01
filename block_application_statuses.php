<?php

/**
 * A block which displays current Application Statuses
 *
 * @package block_application_statuses
 * @author James Byrne
 */

class block_application_statuses extends block_list 
{
    public function init() 
    {
        $this->title = get_string('pluginname', 'block_application_statuses');
    }

    public function specialization() 
    {
        if (isset($this->config)) {
            if (!empty($this->config->title)) {
                $this->title = $this->config->title;
            }  
        }
    }

    public function get_content() 
    {
        if ($this->content !== null) {
        	return $this->content;
        }

        $this->content = new stdClass;
        $this->getApplications();

    	return $this->content;
    }

    /**
     * Gets applciations from db for user. Sets public $content to null if no applications found.
     *
     * @return null 
     */
    private function getApplications()
    { 
    	global $DB, $USER;

    	if ($applications = $DB->get_records('block_application_statuses', ['userid' => $USER->id])) {
    		if (empty($applications)) {
    			$this->content = null;
    			return;
    		}

    		$this->content->items = array();
    		foreach ($applications as $application) {
    			$this->content->items[] = html_writer::tag('a', $application->prospect_title, ['href' => $application->link, 'target' => '_blank', 'class' => 'application-prospect']);
    			$this->content->items[] = html_writer::div($application->status);
    		}
    	}
    }
}