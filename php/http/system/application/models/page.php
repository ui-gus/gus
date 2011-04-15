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
	        $content = "";
		$greeting = "";
		if($this->authed()) {
		  $un = $this->session->userdata('un');
		  if( strlen( $un ) > 8 ){
		    $un = substr( $un, 0, 8 );
		    $un .= "...";
		  }
		  $auth = '<a href="' . site_url() . '/auth/logout">Logout</a>';
		  $greeting = "Greetings, <u>" . anchor("userpage/personal",$un )  . "</u>";
		  //sorry, this messes up layout, had to kill for demo. -CJB
		  //$content = $content . anchor("userpage/personal", "!!!");
		  
		  
		if($this->is_user_admin()){
			$content = $content . "<a href=\"" . site_url() . "/admin\">Admin</a> | ";
		}
		
		 $content = $content . "<a href=\"" . site_url() . "/pm\">Messages</a>" . 	
							" | <a href=\"" . site_url() . "/forum\">Forum</a>" .
							" | <a href=\"" . site_url() . "/calendar\">Calendar</a> " .
		                    " | <a href=\"" . site_url() . "/docs\">Docs</a> " .
							" | <a href=\"" . site_url() . "/auth/logout\">Logout</a> ";
		} else {
			$content = $content . '<a href="' . site_url() . '/registration">Register</a> or ';
			$content = $content . '<a href="' . site_url() . '/auth">Login</a>';
		}
		
		
				
		return("
		<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
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
			  . $greeting . 
			"</div>
			
			<!-- At some point these need to be finalized -->
			<div id=\"links_right\">"
				. $content .
			"</div>
		</div>
	</div>

	<!-- Overarching container for everything under the banner and nav -->
	<div id=\"container\">
		
		<div id=\"group_column\">
			<ul>
				<li><a href=\"" . site_url() . "/home\">Home</a></li>
				<li><a href=\"" . site_url() . "/pm/compose\">Compose</a></li>
				<li><a href=\"" . site_url() . "/search\">Search</a></li>
				<li><a href=\"" . site_url() . "/grouppage	\">Groups</a> 
				<li><a href=\"#\">Help</a></li>
				<li><a href=\"#\">FAQ</a></li>			
			</ul>
			
			
		</div>
		<!-- This will hold all the updates and other stuff-->
		<div id=\"content\">"	);
	}

	function get_content($page_name) {
		$result = $this->db->query("SELECT content FROM page WHERE name='$page_name'")->result();
		if(!$result) return("");
		return($result[0]->content);
	}

	function get_footer() {
		return("
			<div id=\"footer\">
				<br>
				University of Idaho  GUS was implemented by a software engineering team from CS38-384.
			</div>
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

	function get_un() {
		return($this->session->userdata('un'));
	}

	function get_uid() {
		$ci =& get_instance();
		$ci->load->model('User');
		return($ci->User->get_id($this->session->userdata('un')));
	}

	function login($un,$pw) {
		//not sure why I only have to do this here... model load model
		// reported bug to standardize / fix
		$ci =& get_instance();
		$ci->load->model('Group');
		$result = $this->db->query("SELECT un FROM user WHERE un='$un' AND pw='$pw'")->result();
		if(empty($result)) return(false);
		//else
		$this->session->set_userdata('un', $un);
		$this->session->set_userdata('perm', $ci->Group->get_perm($un,"main"));
		return(true);
	}

	function logout() {
		 return($this->session->sess_destroy());
	}

	function authed() {
		return($this->session->userdata('un'));
	}

	function is_user_admin() {	
		if(!$this->authed()) return(false);
		if($this->session->userdata('perm') == 0) return(false); 
		if($this->session->userdata('perm') % 7 == 0) return(true);
		return(false);
	}

	function is_pw_secure($pw) {
		return(
			strlen($pw) > 6
		);
	}

	function save($data) {
		$this->db = $this->load->database('admin', TRUE);
		if($this->db->get_where('page',array('name' => $data['name']))->num_rows < 1) {
			return($this->db->insert('page',$data));
		}
		$this->db->where('name',$data['name']);
		return($this->db->update('page',$data));
	}
}

?>
