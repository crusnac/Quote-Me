<?php
class users_controller extends base_controller {


	public function __construct() {
        parent::__construct();
    } 

	########### //Inital Signup Function ###########
	public function signup(){
		
		//Define view paramters
		$this->template->content = View::instance('v_users_signup');
		$this->template->title   = "Sign Up";
		
		//Display view
		echo $this->template;		
	}
	
	########### //Process Signup Function ###########
	public function p_signup(){
	
		// Specify created and modified time that will be posted to the DB.
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		
		//Create a hashed password
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		
		//Create a hashed token
		 $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
		
        // Process from _POST parameters and insert them into the DB. 
        $user_id = DB::instance(DB_NAME)->insert('users', $_POST);
        
        //Display success message - Add a view for this. Should redirect to the login page probably!
        echo 'You\'re signed up';
	}
	
	########### //Initial login function ###########
	public function login($error = NULL){
		
		//Define view paramters
		$this->template->content = View::instance('v_users_login');
		$this->template->title   = "Login";
		
		// Pass error variable to the view
		$this->template->content->error = $error;
		
		//Display view
		echo $this->template;		
	}
	
	########### //Process login function ###########
	public function p_login(){
	
		//Sanitize _POST
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		//Set HASH from the form _POST
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		//Query the DB for a email / password.
		$q = "SELECT token 
        	FROM users 
			WHERE email = '".$_POST['email']."' 
			AND password = '".$_POST['password']."'"; 
			
		$token = DB::instance(DB_NAME)->select_field($q);   

		if($token == "") {
			// Redirect to allow user to enter in new credentials and specify an error.
			Router::redirect("/users/login/error"); 
        
        	// Successfull Login  
    		} else {
		        /* 
		        Store this token in a cookie using setcookie()
		        Important Note: *Nothing* else can echo to the page before setcookie is called
		        Not even one single white space.
		        param 1 = name of the cookie
		        param 2 = the value of the cookie
		        param 3 = when to expire
		        param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
		        */
	        	setcookie("token", $token, strtotime('+1 year'), '/');

				// Redirect them to the main page - this should be the main login page.
	        	Router::redirect("/");
		
			} // End of else	
		
		} //End of function
	
	
	
} # end of class
