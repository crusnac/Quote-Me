<?php
class users_controller extends base_controller {



	public function profile($user_name = NULL) {	
	
		//Setup the template view
		$this->template->content = View::instance('v_users_profile');
		
		//Set Page title
		$this->template->title = $user_name . " | Profile";
		
		//Set the Username Variable
		$this->template->content->user_name = $user_name;
		
		//Set client files in an array for the Head
		$client_files_head = Array(
			"/css/profile.css", 
			"js/profile.js"
			);
			
		// Display jas files for the head. 
		$this->template->client_files_head = Utils::load_client_files($client_files_head);  
		
		
		//For the Body
		$client_files_body = Array(
			"/css/profile.css", 
			"js/profile.js"
			);
		
		// Display jas files for the body.
		$this->template->client_files_body = Utils::load_client_files($client_files_body);  
		



		
		//Display the View
		echo $this->template;
	
		//$view = View::instance('v_users_profile');
		
		//$view->user_name = $user_name;
		//echo $view;

	}



    public function index() {
        echo "This is the index page";
    }

    public function signup() {
        echo "This is the signup page";
    }

    public function login() {
        echo "This is the login page";
    }

    public function logout() {
        echo "This is the logout page";
    }


} # end of the class
