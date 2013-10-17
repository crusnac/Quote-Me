<?php
class posts_controller extends base_controller {


	public function __construct() {
        parent::__construct();
    } 


	########### //View Posts ###########
	public function view($view_posts = NULL){
		
		//Define view parameters
		$this->template->content = View::instance('v_posts_view_all');
		$this->template->title   = "View All Posts";
		
		//Query the DB for all posts and put into array	        		
        $view_posts = DB::instance(DB_NAME)->select_rows('SELECT * FROM posts');
        
		$this->template->content->view_posts = $view_posts;
                                		
		//Display view
		echo $this->template;		
	}//End of fuction
	
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
		
				
		// Process from _POST parameters and insert them into the DB. 
		$user_id = DB::instance(DB_NAME)->insert('posts', $_POST);
		
		//Set success message for the view 
		
       
		Router::redirect('/posts/view/success');
		
	}// End of Function
	
		
	########### //Edit Posts ###########
	public function edit(){
		
		
	}



	########### //Delete Post ###########
	public function delete($post = NULL){
	
		//Determine if the user is logged in
		if(!$this->user) {
			Router::redirect('/users/login?no-permission');
		}
			
		//Specify the current logged in users ID.  Required to compare if the user created the post.	
		$user = $this->user->user_id;
		
		//Query to determine which user the post and it belongs to the logged in user.
		$q = "select * from posts where id = $post and created_by = $user";	
		$posts = DB::instance(DB_NAME)->select_rows($q);
									
		//Determin if the post belongs to the user who created it
		if(!empty($posts)){
									
			//Delete the post.
			DB::instance(DB_NAME)->delete('posts', "WHERE id = '$post'");
			
			//Redirect to view posts with a success message.
			Router::redirect('/posts/view?delete-success');
			
			
			//The query will be empty if the user did not create the post, return error.		
			}else{
			
				//Redirect to view posts with an error
				Router::redirect('/posts/view?delete-error');
			
				}//end of else			
		
		}//End of function
	
	
	
	
	
		

	
	
} # end of class
