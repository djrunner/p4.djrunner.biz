<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {
        
    #If user is blank, they're not logged in; redirect them to the Login page
        if (!$this->user) {
            Router::redirect('/users/login');
        }

    }

    public function signup($error = NULL) {

        #Setup view
        $this->template->content = View::instance('v_users_signup');

        #Set page title
        $this->template->title   = "Sign Up";

        # Set up error
        $this->template->content->error = $error;

        #Create array of CSS files
        $client_files_head = Array (
            );

        #Use Load client_files to generate the links from the above array
        $this->template->client_files_head = Utils::load_client_files($client_files_head);

         $client_files_body = Array (
            'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js',
            '../js/signup.js'
            );

         $this->template->client_files_body = Utils::load_client_files($client_files_body);

        #Render template
        echo $this->template;
    }

    public function p_signup() {

        # More data we want stored with the user
        $_POST['created'] = Time::now();
        $_POST['modified'] = Time::now();

        # Encrypt the password
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Create an encrypted token via thier email address and a random string
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        # Insert this user into the database
        $user_id = DB::instance(DB_NAME)->insert('users', $_POST);

        # Sets up user to follow him or herself,
        # The user will not see him or herself in the posts/users page.

        /*
        $data = Array(
            "created"          => Time::now(),
            "user_id"          => $user_id,
            "user_id_followed" => $user_id
            );

        DB::instance(DB_NAME)->insert('users_users', $data);

        */

        # Sends the user to the login page
        Router::redirect('/users/login');

        
    }

    public function login($error = NULL) {

        # Setup View
        $this->template->content = View::instance('v_users_login');
        $this->template->title   = "Login";

        # Set up error
        $this->template->content->error = $error;

        #Create array of CSS files
        $client_files_head = Array (
            "../../css/css.css"
            );

        #Use Load client_files to generate the links from the above array
        $this->template->client_files_head = Utils::load_client_files($client_files_head);

        # Render template
        echo $this->template;
    }

    public function p_login() {

        #Sanitize the user entered date
        $POST = DB::instance(DB_NAME)->sanitize($_POST);

        #Has submitted password
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Search the DB for this email and password
        # Retrieve the token if it's available
        $q = "SELECT token 
        FROM users 
        WHERE email = '".$_POST['email']."' 
        AND password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q); 

        # IF we didn't find a matching toek in database, failed
        if(!$token) {

            Router::redirect("/users/login/error");

        # But if we did
        } else {

            setcookie("token", $token, strtotime('+1 year'), '/');

            # Send them to the main page

            Router::redirect("/races/index");
        }

    }

    public function logout() {
        # Generate and save a new token for the next Login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        # Delete their token cookie by setting it to a date in the past - logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        #Send them back to the main index
        Router::redirect("/");


    }

} # end of the class