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

	/*

    # Set up the View
    $this->template->content = View::instance('v_races_index');
    $this->template->title   = "Races";

    # Build the query
    # Order posts by created date in Descending order
    $q = 'SELECT 
            posts.content,
            posts.created,
            posts.user_id AS post_user_id,
            users_users.user_id AS follower_id,
            users.first_name,
            users.last_name,
            users.image_location,
            posts.post_id AS post_id
        FROM posts
        INNER JOIN users_users 
            ON posts.user_id = users_users.user_id_followed
        INNER JOIN users 
            ON posts.user_id = users.user_id
        WHERE users_users.user_id = '.$this->user->user_id .'
        ORDER BY posts.created DESC' ;

    # Sanatize data
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);

    # Run the query
    $posts = DB::instance(DB_NAME)->select_rows($q);

    # Pass data to the View
    $this->template->content->posts = $posts;

    #Create array of CSS files
        $client_files_head = Array (
            '../css/css.css'
            );

        #Use Load client_files to generate the links from the above array
        $this->template->client_files_head = Utils::load_client_files($client_files_head);

    # Render the View
    echo $this->template;

    */

    }
}