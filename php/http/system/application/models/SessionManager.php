<?php
	#my mySQL still needs work. Once I learn a bit more, I will be using that to flesh this out a bit more.

	#SessionManager should be used in conjunction with the embedded php in a given web page.
	#basic timeline
	#page loads -> getContext() -> getPrivileges -> using this data, populate navigation bars
	
	#should this be extended to handle log-in?
	
	/*Here is the basic MySQL necessary to get the session data into our database 
	
	CREATE TABLE IF NOT EXISTS  `ci_sessions` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(16) DEFAULT '0' NOT NULL,
	user_agent varchar(50) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id)
	);

	*/
	
	class SessionManager{
		$this->load->library('session');
	
		#use $this->session to access the session class
	
		#this basically describes the content of the cookie that SHOULD be on user's computer
		#[array]
		#(
		# 'session_id'    => random hash,
		# 'ip_address'    => 'string - user IP address',
		# 'user_agent'    => 'string - user agent data',
		# 'last_activity' => timestamp
		#)
		
		#we need a little bit of custom information
		$customdata = array(
			'username' => ''
			'logged_in' => ''
		);
		
		#initialize data to ensure the base case will always work.
		$privilege = "user";
		$context = "home";
		$session_id = $this->session->userdata('session_id');	
		
		#this is what will end up ridirecting the 
		function checkSessionIsValid(){
			if($session_id == FALSE){
				/*
				bad news, redirect to login and set $this->customdata -> logged_in to FALSE
				push the timestamp of the attempted login to the database along with the ip_address
				*/
			}
			else{
				/*
					use getContext() to understand what page we are on. 
					push that context in string form to the database. Along with the
					$this->customdata->username.
				*/
			}
		}
			
		function LogIn($username, $password){
			#Basic Algorithm that I can suss out later.
			/*
				The password should be encrypted right here using a one-way algorithm, the encrypted info
				will then be compared to the encrypted password stored on our server.
				
				Query the database and check to make sure that the username/password can be found. If so
				set $this->customdata->logged_in to TRUE
				
				set $this->customdata->username to $username
				
				$this->session->set_userdata($this->customdata);			
			*/
		}
		
		function LogOut($username){
			$this->session->sess_destroy();
		}
	
		#establish a context for the web page. IE: "home" "group page"
		function getContext(){
			#I'm thinking this will be scrapped, not sure though.
		}
		
		#get user info that pertains to what they can see. Make sure we show the right options.
		function getPrivileges(){
			#use the session_agent data to find the user's privileges information.
			#$privilege = MySQL database Query
			
		}
	
	}
		
?>