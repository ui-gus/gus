<?php

/******************************************************************************
*Gus - Groups in a University Setting
 University of Idaho CS 384 - Spring 2011
 GusPHP Subteam
 File Authors:
                Colby Blair
		Scott Beddall
******************************************************************************/

class Page extends Model {
	var $css;
	
	function Page() {
		parent::Model();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->css  = '<link href="' . base_url() . 'templates/template.css.php" type="text/css" rel="stylesheet" />';
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
										" | <a href=\"" . site_url() . "/search\">Search</a>" . 
										" | <a href=\"" . site_url() . "/forum\">Forum</a>" .
										" | <a href=\"" . site_url() . "/home\">Home</a>" .
										" | <a href=\"" . site_url() . "/grouppages\">Groups</a> " .
										" | <a href=\"" . site_url() . "/calendar\">Calendar</a> ";
										
				
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
			| <a href=\"" . site_url() . "/calendar\">Calendar</a> 
			| <a href=\"" . site_url() . "/admin\">Admin</a> 			
			-->
		
		</div>
	</div>

	<!-- Overarching container for everything under the banner and nav -->
	<div id=\"container\">
		
		<div id=\"group_column\">
		<!-- Autogenerated List of Groups 
			<ul>
				<li>Autogenerated</li>
				<li>U of I 1</li>
				<li>U of I 2 </li>
				<li>U of I 3</li>
				<li>U of I 4</li>
				<li>U of I 5</li>			
				<li>U of I 6</li>
				<li>U of I 7</li>
				<li id=\"group_column_current\">Current Page</li>
				<li>U of I 9</li>
				<li>U of I 10</li>
				<li>A longer name!!</li>		
			</ul>
			<div id=\"group_controls\">
				<img src=\"" . base_url() . "add_group2.png\"><img src=\"" . base_url() . "remove_group2.png\">
			</div> 
			-->
		</div>
		<!-- This will hold all the updates and other stuff-->
		<div id=\"content\">
			
			
			
			
		
");
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

	function get_pagelist() {
		$this->db->select('name');
		$data = array();
		foreach($this->db->get('page')->result() as $key) {
			array_push($data,$key->name);
		}
		return($data);
	}

	function login($un,$pw) {
		$result = $this->db->query("SELECT un FROM user WHERE un='$un' AND pw='$pw'")->result();
		if(empty($result)) return(false);
		//else
		$this->session->set_userdata('un', $un);
		return(true);
	}

	function logout() {
		 return($this->session->sess_destroy());
	}

	function authed() {
		return($this->session->userdata('un'));
	}

	function save($data) {
		if($this->db->get_where('page',array('name' => $data['name']))->num_rows < 1) {
			return($this->db->insert('page',$data));
		}
		$this->db->where('name',$data['name']);
		return($this->db->update('page',$data));
	}
}

?>
