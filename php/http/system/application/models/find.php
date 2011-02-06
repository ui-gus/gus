<?php

/******************************************************************************
*Gus - Groups in a University Setting
 University of Idaho CS 384 - Spring 2011
 GusPHP Subteam
 File Authors:
                Colby Blair
		Scott Beddall
******************************************************************************/

class Find extends Model {
	var $css;
	var $searchTerm;
	
	function Find() {
		parent::Model();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->css  = '<link href="' . base_url() . 'templates/template.css.php" type="text/css" rel="stylesheet" />';
		$searchTerm = 'TEST';
		//this will eventually be retrieved from the session custom data. 
	}
	
	function get_id($page_name) {
		$result = $this->db->query("SELECT id FROM page WHERE name='$page_name'")->result();
		return($result[0]->id);
	}
	
	function get_header($page_name) {
		//left links
		$greeting = "";
		if($this->authed()) {
		 $auth = '<a href="' . site_url() . '/auth/logout">Logout</a>';
		 $greeting = "Greetings <u>" . $this->session->userdata('un')  . "</u> <img src=\"" . base_url() . "templates/mail.png\">";
		} else {
		 $auth = '<a href="' . site_url() . '/auth">Login</a>';
		}
		
		$privilege = "admin"; //this is just set for the moment to test the function.	
		//at some point I need to retrieve this info about the user from the DB 
	
		if($privilege == "admin"){
			$content = "<a href=\"" . site_url() . "/admin\">Admin</a> | ";
		}
		$content = $content . "<a href=\"" . site_url() . "/mail\">Messages</a>" . 
										" | <a href=\"" . site_url() . "/forum\">Forum</a>" .
										" | <a href=\"" . site_url() . "/home\">Home</a>" .
										" | <a href=\"" . site_url() . "/grouppages\">Groups</a> " .
										" | <a href=\"" . site_url() . "/Calendar\">Calendar</a>";
				
		return("
<html>
		 <head>
		 " . $this->css . "
         <title>Gus - $page_name</title>
        </head>
<body>

	<!-- Banner and Nav -->
	<div id=\"spreader_top\">
		<div id=\"links\">
		
			<!-- Username that links to profile + new mail icon -->
			<div id=\"links_left\">" 
			 . $auth .
			"</div>
			
			<!-- At some point these need to be finalized -->
			<div id=\"links_right\">"
				. $content .
			"</div>
		
			<!--
			<a href=\"" . site_url() . "/home\">Home</a> 
			| <a href=\"" . site_url() . "/mail\">Messages</a>
			| <a href=\"" . site_url() . "/forum\">Forum</a> 
			| <a href=\"" . site_url() . "/grouppages\">Groups</a> 
			| <a href=\"" . site_url() . "/Calendar\">Calendar</a>
			| <a href=\"" . site_url() . "/admin\">Admin</a> 	
			-->
		
		</div>
	</div>

	<!-- Overarching container for everything under the banner and nav -->
	<div id=\"container\">
		
		<div id=\"group_column\">

		</div>
		<div id=\"content\">
			
			<p>Controller design partially ninjaed from Colby Blair</p>
			
			
		
");
	}

	function get_results($search_term){
		
	}
	
	function get_content($page_name) {
		$result = $this->db->query("SELECT content FROM page WHERE name='$page_name'")->result();
		if(!$result) return("");
		return($result[0]->content);
	}

	function get_footer() {
		return("
		</div>
	</div>		
	
</body>
</html>");
	}

	function authed() {
		return($this->session->userdata('un'));
	}
}

?>
