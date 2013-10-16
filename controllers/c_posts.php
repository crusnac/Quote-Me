<?php
class posts_controller extends base_controller {


	public function __construct() {
        parent::__construct();
    } 


	########### //View Posts ###########
	public function view($view_posts = NULL){
		
		//Define view paramters
		$this->template->content = View::instance('v_posts_view_all');
		$this->template->title   = "View All Posts";
		
		//Query the DB for all posts and put into array	        		
        $view_posts = DB::instance(DB_NAME)->select_rows('SELECT * FROM posts');
        
		$this->template->content->view_posts = $view_posts;
                                		
		//Display view
		echo $this->template;		
	}
	
	########### //Create Posts ###########
	public function create(){
	
		//Check to make sure user is logged in.
		if(!$this->user) {
			Router::redirect('/users/login');
			
		}else{
		
			//Define view parameters
			$this->template->content = View::instance('v_posts_create');
			$this->template->title   = "Create a New Post";
			
			//Display the template
			echo $this->template;
		}//End of else
		
	}//End of function
	

	
	########### //Process Create Posts ###########
	public function p_create(){
		
		//Sanitize all inputs
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		// Specify created and modified time that will be posted to the DB.
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		
		$_POST['created_by'] = $this->user->user_id;
		
		//echo '<pre>';
        //print_r($_POST);
        //echo '</pre>';
				
		// Process from _POST parameters and insert them into the DB. 
		$user_id = DB::instance(DB_NAME)->insert('posts', $_POST);
       
		Router::redirect('/posts/view/success');
		
	}// End of Function
	
	
	
	########### //Edit Posts ###########
	public function edit(){
		
		
	}



	########### //Delete Posts ###########
	public function delete(){
		
		
	}
	
	
	
	
	
		

	
	
} # end of class
