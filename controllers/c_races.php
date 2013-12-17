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

        $_POST['race_time_int'] = String_to_Int_Converter::get_race_time_int($_POST['race_time_string']);

        $_POST['race_pace_int'] = String_to_Int_Converter::get_race_pace_int($_POST['race_pace_string']);

        # Insert
        DB::instance(DB_NAME)->insert('races', $_POST);

        # Send user to list of posts
        Router::redirect('/races/add');
	
	}

	public function index() {

	

    # Set up the View
    $this->template->content = View::instance('v_races_index');
    $this->template->title   = "Races";

    # Get array for table
    $five_kilometers = Build_List::get_array("5 Kilometers", $this->user->user_id);
    $five_miles = Build_List::get_array("5 Miles", $this->user->user_id);
    $ten_kilometers = Build_List::get_array("10 Kilometers", $this->user->user_id);
    $half_marathons = Build_List::get_array("Half Marathon", $this->user->user_id);
    $full_marathons = Build_List::get_array("Full Marathon", $this->user->user_id);

    # Pass data to the View
    $this->template->content->five_kilometers = $five_kilometers;
    $this->template->content->five_miles = $five_miles;
    $this->template->content->ten_kilometers = $ten_kilometers;
    $this->template->content->half_marathons = $half_marathons;
    $this->template->content->full_marathons = $full_marathons;

    # Get race time and race pace averages per race, pass data to the View
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