<?php
class NavLoader{
	$user_name;
	$session_id;
	$content = "";

	function NavLoader($user_name,$session_id){
		$this->load->session;
	
		$this->user_name=user_name;
		$this->user_id=session_id;
			
			
		
	}	
	
	function displayUserControl(){
		
		
		
		echo $content;
	}
}

/*
<!-- Username that links to profile + new mail icon -->
			<div id=\"links_left\">
			Greetings <u>Scott</u>, <img src=\"templates/mail.png\">	
			</div>
			
			<!-- At some point these need to be finalized -->
			<div id=\"links_right\">
			Messages | Forums | Edit Groups | Home | Logout
			</div>

*/

?>