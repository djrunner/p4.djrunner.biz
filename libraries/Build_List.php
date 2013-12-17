<?php

class Build_List {
	

	public static function get_array ($race_length, $user)	{

	$q = 'SELECT
        races.user_id,
        races.race_id,
        races.race_name,
        races.race_date,
        races.race_length,
        races.race_time_string,
        races.race_pace_string
        FROM races
        WHERE races.race_length = "'.$race_length.'" and races.user_id = '.$user;

    # Sanatize data
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);

    # Run the query
    $race_array = DB::instance(DB_NAME)->select_rows($q);

    return $race_array;

	}
}