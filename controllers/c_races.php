<?php

class races_controller extends base_controller {
	
	public function __construct() {
		parent::__construct();

		# Make sure user is logged in if they want to use anything in this controller

		if(!$this->user) {
			Router::redirect('/users');
		}

	}

	public function add() {

		# Set up view
		$this->template->content = View::instance('v_races_add');
		$this->template->title   = "New Race";


        #Create array of CSS files
        $client_files_head = Array (
            
            );

        #Use Load client_files to generate the links from the above array
        $this->template->client_files_head = Utils::load_client_files($client_files_head);

         $client_files_body = Array (
            'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js',
            '../js/races_add.js'
            );

         #Use Load client_files to generate the links from the above array
        $this->template->client_files_body = Utils::load_client_files($client_files_body);

		# Render template
		echo $this->template;

	}

	public function p_add() {


		# Associate this post with this user
		$_POST['user_id'] = $this->user->user_id;

        $string = $_POST['race_time_string'];

        $seconds = (int) $string{7}; 
        $ten_seconds = 10 * ( (int) $string{6});
        $seconds = $seconds + $ten_seconds;

        $minutes = (int) $string{4};
        $ten_minutes = 10 * ( (int) $string{3});
        $minutes = 60 * ($minutes + $ten_minutes);

        $hours = (int) $string{1};
        $ten_hours = 10 * ( (int) $string{0});
        $hours = 60 * 60 * ($hours + $ten_hours);

        $time_in_seconds = $seconds + $minutes + $hours;

        $_POST['race_time_int'] = $time_in_seconds;

        $string = $_POST['race_pace_string'];

        $seconds = (int) $string{4}; 
        $ten_seconds = 10 * ( (int) $string{3});
        $seconds = $seconds + $ten_seconds;

         $minutes = (int) $string{1};
        $ten_minutes = 10 * ( (int) $string{0});
        $minutes = 60 * ($minutes + $ten_minutes);

        $time_in_seconds = $seconds + $minutes;

        $_POST['race_pace_int'] = $time_in_seconds;

        # Insert
        DB::instance(DB_NAME)->insert('races', $_POST);

        # Send user to list of posts
        Router::redirect('/races/add');
	
	}

	public function index() {

	

    # Set up the View
    $this->template->content = View::instance('v_races_index');
    $this->template->title   = "Races";

    

    # Build the query for 5 Kilometer races
    # Order posts by created date in Descending order
    $q = 'SELECT
        races.user_id,
        races.race_id,
        races.race_name,
        races.race_date,
        races.race_length,
        races.race_time_string,
        races.race_pace_string
        FROM races
        WHERE races.race_length = "5 Kilometers" and races.user_id = '.$this->user->user_id.'
        ORDER BY races.race_date';

    # Sanatize data
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);

    # Run the query
    $five_kilometers = DB::instance(DB_NAME)->select_rows($q);

    # Pass data to the View
    $this->template->content->five_kilometers = $five_kilometers;

    # Build the query for 5 Mile races
    # Order posts by created date in Descending order
    $q = 'SELECT
        races.user_id,
        races.race_id,
        races.race_name,
        races.race_date,
        races.race_length,
        races.race_time_string,
        races.race_time_int,
        races.race_pace_string
        FROM races
        WHERE races.race_length = "5 Miles" and races.user_id = '.$this->user->user_id.'
        ORDER BY races.race_date';

    # Sanatize data
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);

    # Run the query
    $five_miles = DB::instance(DB_NAME)->select_rows($q);

    # Pass data to the View
    $this->template->content->five_miles = $five_miles;

    # Build the query for 10 kilometer races
    # Order posts by created date in Descending order
    $q = 'SELECT
        races.user_id,
        races.race_id,
        races.race_name,
        races.race_date,
        races.race_length,
        races.race_time_string,
        races.race_time_int,
        races.race_pace_string
        FROM races
        WHERE races.race_length = "10 Kilometers" and races.user_id = '.$this->user->user_id.'
        ORDER BY races.race_date';

    # Sanatize data
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);

    # Run the query
    $ten_kilometers = DB::instance(DB_NAME)->select_rows($q);

    # Pass data to the View
    $this->template->content->ten_kilometers = $ten_kilometers;

    # Build the query for Half Marathon races
    # Order posts by created date in Descending order
    $q = 'SELECT
        races.user_id,
        races.race_id,
        races.race_name,
        races.race_date,
        races.race_length,
        races.race_time_string,
        races.race_time_int,
        races.race_pace_string
        FROM races
        WHERE races.race_length = "Half Marathon" and races.user_id = '.$this->user->user_id.'
        ORDER BY races.race_date';

    # Sanatize data
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);

    # Run the query
    $half_marathons = DB::instance(DB_NAME)->select_rows($q);

    # Pass data to the View
    $this->template->content->half_marathons = $half_marathons;

    # Build the query for Full Marathon races
    # Order posts by created date in Descending order
    $q = 'SELECT
        races.user_id,
        races.race_id,
        races.race_name,
        races.race_date,
        races.race_length,
        races.race_time_string,
        races.race_time_int,
        races.race_pace_string
        FROM races
        WHERE races.race_length = "Full Marathon" and races.user_id = '.$this->user->user_id.'
        ORDER BY races.race_date';

    # Sanatize data
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);

    # Run the query
    $full_marathons = DB::instance(DB_NAME)->select_rows($q);

    # Pass data to the View
    $this->template->content->full_marathons = $full_marathons;

   
        $race_time_5kilometers_average = Average_Calculator::time_average("5 Kilometers", $this->user->user_id);
        $this->template->content->race_time_5kilometers_average = $race_time_5kilometers_average;

        $race_pace_5kilometers_average = Average_Calculator::pace_average("5 Kilometers", $this->user->user_id);
        $this->template->content->race_pace_5kilometers_average = $race_pace_5kilometers_average;

        $race_time_5mile_average = Average_Calculator::time_average("5 Miles", $this->user->user_id);
        $this->template->content->race_time_5mile_average = $race_time_5mile_average;

        $race_pace_5mile_average = Average_Calculator::pace_average("5 Miles", $this->user->user_id);
        $this->template->content->race_pace_5mile_average = $race_pace_5mile_average;

        $race_time_10kilometers_average = Average_Calculator::time_average("10 Kilometers", $this->user->user_id);
        $this->template->content->race_time_10kilometers_average = $race_time_10kilometers_average;

        $race_pace_10kilometers_average = Average_Calculator::pace_average("10 Kilometers", $this->user->user_id);
        $this->template->content->race_pace_10kilometers_average = $race_pace_10kilometers_average;

        $race_time_halfMarathon_average = Average_Calculator::time_average("Half Marathon", $this->user->user_id);
        $this->template->content->race_time_halfMarathon_average = $race_time_halfMarathon_average;

        $race_pace_halfMarathon_average = Average_Calculator::pace_average("Half Marathon", $this->user->user_id);
        $this->template->content->race_pace_halfMarathon_average = $race_pace_halfMarathon_average;

        $race_time_fullMarathon_average = Average_Calculator::time_average("Full Marathon", $this->user->user_id);
        $this->template->content->race_time_fullMarathon_average = $race_time_fullMarathon_average;

        $race_pace_fullMarathon_average = Average_Calculator::pace_average("Full Marathon", $this->user->user_id);
        $this->template->content->race_pace_fullMarathon_average = $race_pace_fullMarathon_average;
        


    #Create array of CSS files
        $client_files_head = Array (
            'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css',
            'http://code.jquery.com/ui/1.10.3/jquery-ui.js',
            '../js/jquery.tablesorter.min.js',
            '../js/races_index.js',
            '../css/table_style.css'
            );

    #Use Load client_files to generate the links from the above array
    $this->template->client_files_head = Utils::load_client_files($client_files_head);

    # Render the View
    echo $this->template;

    }
}