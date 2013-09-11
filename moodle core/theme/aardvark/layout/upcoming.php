<?php

        global $USER, $CFG, $SESSION;
        $cal_m = optional_param( 'cal_m', 0, PARAM_INT );
        $cal_y = optional_param( 'cal_y', 0, PARAM_INT );

        require_once($CFG->dirroot.'/calendar/lib.php');
		


        $filtercourse    = array();
        if (empty($this->instance)) { // Overrides: use no course at all
            $courseshown = false;

        } else {
            $courseshown = $this->page->course->id;

            }

                // Being displayed at site level. This will cause the filter to fall back to auto-detecting
                // the list of courses it will be grabbing events from.
                $filtercourse = calendar_get_default_courses();
        

        list($courses, $group, $user) = calendar_set_filters($filtercourse);

        $defaultlookahead = CALENDAR_DEFAULT_UPCOMING_LOOKAHEAD;
        if (isset($CFG->calendar_lookahead)) {
            $defaultlookahead = intval($CFG->calendar_lookahead);
        }
        $lookahead = get_user_preferences('calendar_lookahead', $defaultlookahead);

        $defaultmaxevents = CALENDAR_DEFAULT_UPCOMING_MAXEVENTS;
        if (isset($CFG->calendar_maxevents)) {
            $defaultmaxevents = intval($CFG->calendar_maxevents);
        }
        $maxevents = 3;
        $events = calendar_get_upcoming($courses, $group, $user, $lookahead, $maxevents);
		
		      
        $upcomingoutput = calendar_get_block_upcoming($events, 'view.php?view=day&amp;course='.$courseshown.'&amp;');

        echo $upcomingoutput;
		
		

?>

