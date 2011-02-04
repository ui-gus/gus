<?php
class NavLoader{
	$user_name;
	$session_id;
	$privilege = "admin";
	$content = "";

	//function NavLoader($user_name,$session_id){ will eventually use this
	function NavLoader(){
	//	$this->load->session;
		//$this->user_name=user_name;
		//$this->user_id=session_id;
		//$privilege = getPrivFromDB();
	}	
	
	function displayUserControl(){
		$content = "<div id=\"links_right\">";
		if($privilege == "admin"){
			$content = $content . "<a href=\"" . site_url() . "/admin\">Admin</a> | ";
		}
		if($privilege == "user"){
			$content = $content . "<a href=\"" . site_url() . "/mail\">Messages</a>" . 
											"| <a href=\"" . site_url() . "/forum\">Forum</a>" .
											"| <a href=\"" . site_url() . "/home\">Home</a>" .
											"| <a href=\"" . site_url() . "/grouppages\">Groups</a> ";
		}
		$content = $content . "</div>";
		return $content;
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
			
			<a href=\"" . site_url() . "/home\">Home</a> 
			<a href=\"" . site_url() . "/mail\">Messages</a>
			<a href=\"" . site_url() . "/forum\">Forum</a> 
			<a href=\"" . site_url() . "/grouppages\">Groups</a> 
			<a href=\"" . site_url() . "/admin\">Admin</a> 

*/

?>