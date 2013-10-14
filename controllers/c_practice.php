<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

class practice_controller extends base_controller {
	
	
	// First Function
	public function test1(){
		require(APP_PATH.'libraries/image.php');
		
		
			$imageObj = new Image('http://placekitten.com/500/500');
			
			$imageObj->resize(400,400);
			
			# Display the resized image
			$imageObj->display();		
	}
	
	// Second Test function
	public function test2(){
		
		#Static intraction with a Time Class
		echo Time::now();
		
	}
	
	
	
} //End of controller;