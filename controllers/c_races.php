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

        print_r($_POST);

		# Associate this post with this user
		$_POST['user_id'] = $this->user->user_id;

        if ($_POST['time_hours'] == 0)  {
            $_POST['time_hours'] == null;
        }

        $race_time_string = "" + $_POST['time_hours'] + ":" + 
                                    $_POST['time_minutes'] + ":" +
                                    $_POST['time_seconds'];

        $_POST['race_time_string'] = race_time_string;


        # Insert
        DB::instance(DB_NAME)->insert('races', $_POST);

        # Send user to list of posts
        Router::redirect('/races/add');

        /*

		# Unix timestamp of when this post was created / modifed
		$_POST['created'] = Time::now();
		$_POST['modified'] = Time::now();

		# Insert
		DB::instance(DB_NAME)->insert('posts', $_POST);

		# Send user to list of posts
        Router::redirect('/posts/index');

        */
	
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