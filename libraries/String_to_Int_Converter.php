<?php

class String_to_Int_Converter {

        #These functions are used in the race_add function
        #Given a string in time format (i.e. "00:00:00"), 
        #this function converts the string into seconds as an interger

	public static function get_race_time_int($string)	{

		$seconds = (int) $string{7}; 
        $ten_seconds = 10 * ( (int) $string{6});
        $total_seconds = $seconds + $ten_seconds;

        $minutes = (int) $string{4};
        $ten_minutes = 10 * ( (int) $string{3});
        $total_minutes = 60 * ($minutes + $ten_minutes);

        $hours = (int) $string{1};
        $ten_hours = 10 * ( (int) $string{0});
        $total_hours = 60 * 60 * ($hours + $ten_hours);

        $time_in_seconds = $total_seconds + $total_minutes + $total_hours;

        return $time_in_seconds;
	}
	
	public static function get_race_pace_int($string)	{

		$seconds = (int) $string{4}; 
        $ten_seconds = 10 * ( (int) $string{3});
        $total_seconds = $seconds + $ten_seconds;

        $minutes = (int) $string{1};
        $ten_minutes = 10 * ( (int) $string{0});
        $total_minutes = 60 * ($minutes + $ten_minutes);

        $pace_in_seconds = $total_seconds + $total_minutes;

        return $pace_in_seconds;
	}
}