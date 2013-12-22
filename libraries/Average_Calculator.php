 <?php

class Average_Calculator {

        public static function time_average ($race_length, $user)  {

        /* 
        Create a mySQL query string, getting the value (in seconds)
        for each race of a defined user and race length. These
        values are passed from the races controller
        */
        $q = 'SELECT
        races.race_time_int
        FROM races
        WHERE races.race_length = "'.$race_length.'" and races.user_id = '.$user;

        #selects array from database
        $race_time_int_array = DB::instance(DB_NAME)->select_array($q, 'race_time_int');

        #If user has not entered any data for specifed race length.
        if(count($race_time_int_array) == 0) return "00:00:00"; 

        $total_race_time = 0;

        #add up total seconds
        foreach($race_time_int_array as $time) {
            $total_race_time = $total_race_time + (int) $time['race_time_int'];
        }   

        $total_race_events = 0;

        #add up total number of races
        foreach($race_time_int_array as $time) {
            $total_race_events = $total_race_events + (int) $time;
        } 

        #average to nearest integer
        $average_race_time_int = round ($total_race_time / $total_race_events);

        #get average hours in "00" form
        $average_race_time_int_hours = floor ($average_race_time_int / 3600);

        if ($average_race_time_int_hours < 1)   {
            $average_race_time_string_hours = "00";

        } else if ($average_race_time_int_hours < 10) {
            $average_race_time_string_hours = "0" . (string) $average_race_time_int_hours;

        } else {
            $average_race_time_string_hours = (string) $average_race_time_int_hours;
        }

        $average_race_time_int_remain = $average_race_time_int - ($average_race_time_int_hours * 3600);

        #get average minutes in "00" form
        $average_race_time_int_minutes = floor ($average_race_time_int_remain / 60);

        if ($average_race_time_int_minutes < 1)   {
            $average_race_time_string_minutes = "00";

        } else if ($average_race_time_int_minutes < 10) {
            $average_race_time_string_minutes = "0" . (string) $average_race_time_int_minutes;

        } else {
            $average_race_time_string_minutes = (string) $average_race_time_int_minutes;
        }

        #get average seconds in "00" form
        $average_race_time_int_seconds = $average_race_time_int_remain - ($average_race_time_int_minutes * 60);

        if ($average_race_time_int_seconds < 1)   {
            $average_race_time_string_seconds = (string) "00";

        } else if ($average_race_time_int_seconds < 10) {
            $average_race_time_string_seconds = "0" . (string) $average_race_time_int_seconds;

        } else {
            $average_race_time_string_seconds = (string) $average_race_time_int_seconds;
        }

        #build string by combining hours, minutes, and seconds string
        $average_race_time_string = $average_race_time_string_hours.":".$average_race_time_string_minutes.":".$average_race_time_string_seconds;

        return $average_race_time_string;
    }

    public static function pace_average ($race_length, $user)  {

    /*
    pace_average is very similar to time_average except
    the hour string is not needed
    */

        $q = 'SELECT
        races.race_pace_int
        FROM races
        WHERE races.race_length = "'.$race_length.'" and races.user_id = '.$user;


        $race_pace_int_array = DB::instance(DB_NAME)->select_array($q, 'race_pace_int');

        if(count($race_pace_int_array) == 0) return "00:00"; 

        $total_race_pace = 0;

        foreach($race_pace_int_array as $pace) {
            $total_race_pace = $total_race_pace + (int) $pace['race_pace_int'];
        }   

        $total_race_events = 0;

        foreach($race_pace_int_array as $pace) {
            $total_race_events = $total_race_events + (int) $pace;
        } 

        $average_race_pace_int = round ($total_race_pace / $total_race_events);

        $average_race_pace_int_minutes = floor ($average_race_pace_int / 60);

        if ($average_race_pace_int_minutes < 1)   {
            $average_race_pace_string_minutes = "00";

        } else if ($average_race_pace_int_minutes < 10) {
            $average_race_pace_string_minutes = "0" . (string) $average_race_pace_int_minutes;

        } else {
            $average_race_pace_string_minutes = (string) $average_race_pace_int_minutes;
        }

        $average_race_pace_int_seconds = $average_race_pace_int - ($average_race_pace_int_minutes * 60);

        if ($average_race_pace_int_seconds < 1)   {
            $average_race_pace_string_seconds = (string) "00";

        } else if ($average_race_pace_int_seconds < 10) {
            $average_race_pace_string_seconds = "0" . (string) $average_race_pace_int_seconds;

        } else {
            $average_race_pace_string_seconds = (string) $average_race_pace_int_seconds;
        }

        $average_race_pace_string = $average_race_pace_string_minutes.":".$average_race_pace_string_seconds;

        return $average_race_pace_string;

    }
}