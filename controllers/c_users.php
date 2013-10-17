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
	public function p_signup($error = NULL){
	
		//Sanitize _POST
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		//Query the DB for a email / password and set it as a variable.
		$q = "SELECT * FROM users WHERE email = '".$_POST['email']."'"; 
	
		//Execute query against DB
		$exsitingUsers = DB::instance(DB_NAME)->select_rows($q);
	
	
		//Check to determine if the user exsits.
		if(!empty($exsitingUsers)){
		
			//Redirect to the login page
			Router::redirect('/users/login/error/exists');
		
				//If is doesn't exsit, continue with processing signup.
				}else{
				
					// Specify created and modified time that will be posted to the DB.
					$_POST['created']  = Time::now();
					$_POST['modified'] = Time::now();
					
					//Create a hashed password
					$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
					
					// Process from _POST parameters and insert them into the DB. 
					$user_id = DB::instance(DB_NAME)->insert('users', $_POST);
										
					//Redirect to user login page after user has been created in the DB
					Router::redirect('/users/login/success');
		
			}// End if 
		
	}//End of function
	
	
	########### //Login function ###########
	public function login($error = NULL, $exists = NULL, $success = NULL){
			
		//Check to see if the user is logged in, if they are, redirect them to the profile page
		if($this->user) {
			Router::redirect('/users/profile');
			
			//If not logged in, display the login box
			}else{
			
			//Define view parameters
			$this->template->content = View::instance('v_users_login');
			$this->template->title   = "Login";
						
			//Pass error variable to the view
			$this->template->content->error = $error;
			$this->template->content->exists = $exists;
			$this->template->content->success = $success;
			
			//Display view
			echo $this->template;		
			
			}//End else
		
	}// End function
	
	
	########### //Process login function ###########
	public function p_login(){
	
		//Sanitize _POST
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		//Set HASH from the form _POST
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		//Query the DB for a email / password and set it as a variable.
		$q = 	"SELECT token 
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
		
		
	
		########### //Profile function ###########
		public function profile(){
				
			//Check to see if a user is logged in, if not - redirect to login page.
			if(!$this->user) {
				Router::redirect('/users/login');
				
				}else{
		
				//Define view parameters
				$this->template->content = View::instance('v_users_profile');
				$this->template->title = $this->user->first_name .' ' . $this->user->last_name. " | Profile";

				//Display template
				echo $this->template;
				
				} // End of else
			
		}//End of function
		
		
		
		########### //Logout function ###########
		public function logout(){
			
			// Generate a new token for the next login
			$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
			
			//Specify what we are updating = the token
			$data = Array("token" => $new_token);
			
			//Update the with then new token
			DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
			
			//Delete exsiting cookie by setting a negative year
			setcookie("token", "", strtotime('-1 year'), '/');
			
			//Redirect to index
			Router::redirect("/");
			
		}//End of function

		

	
	
} # end of class
