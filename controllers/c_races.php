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


        # Insert
        DB::instance(DB_NAME)->insert('races', $_POST);

        # Send user to list of posts
        Router::redirect('/races/add');
	
	}

	public function index() {

	

    # Set up the View
    $this->template->content = View::instance('v_races_index');
    $this->template->title   = "Races";

    # Build the query
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
        WHERE races.user_id = ".$this->user->user_id ." and races.race_length = "5 Kilometers"
        ORDER BY races.race_date' ;

    # Sanatize data
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);

    # Run the query
    $five_kilometers = DB::instance(DB_NAME)->select_rows($q);

    # Pass data to the View
    $this->template->content->five_kilometers = $five_kilometers;

    #Create array of CSS files
        $client_files_head = Array (
            'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css',
            'http://code.jquery.com/ui/1.10.3/jquery-ui.js',
            '../js/races_index.js'
            );

    #Use Load client_files to generate the links from the above array
    $this->template->client_files_head = Utils::load_client_files($client_files_head);

    # Render the View
    echo $this->template;

    }
}