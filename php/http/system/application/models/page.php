<?php

class Page extends Model {
	var $css;

	function Page() {
		parent::Model();
	
		$this->load->database();
		
		$this->css = '
		<style type="text/css">

			body {
				background-color: #fff;
				margin: 40px;
				font-family: Lucida Grande, Verdana, Sans-serif;
 				font-size: 14px;
				color: #4F5155;
			}

			a {
				color: #003399;
				background-color: transparent;
				font-weight: normal;
			}

			h1 {
				color: #444;
				background-color: transparent;
 				border-bottom: 1px solid #D0D0D0; font-size: 16px;
 				font-weight: bold;
 				margin: 24px 0 2px 0;
 				padding: 5px 0 6px 0;
			}

			code {
 				font-family: Monaco, Verdana, Sans-serif;
 				font-size: 12px;
 				background-color: #f9f9f9;
 				border: 1px solid #D0D0D0;
 				color: #002166;
 				display: block;
 				margin: 14px 0 14px 0;
 				padding: 12px 10px 12px 10px;
			}

		</style>';
	}

	function get_id($page_name) {
		$result = $this->db->query("SELECT id FROM page WHERE name='$page_name'")->result();
		return($result[0]->id);
	}

	function get_header($page_name) {
		return("
<html>
        <head>
         <title>Gus - $page_name</title>
" . $this->css . "
        </head>
<body>
<div id=\"nav\">
	<ul>
	 <li><a href=\"home\">Home</a></li>
	 <li><a href=\"admin\">Admin</a></li>
	 <li><a href=\"auth/logout\">Logout</a></li>
	</ul>
</div>
");
	}

	function get_content($page_name) {
		$result = $this->db->query("SELECT content FROM page WHERE name='$page_name'")->result();
		return($result[0]->content);
	}

	function get_footer() {
		return("
</body>
</html>");
	}

	function login($un,$pw) {
		$result = $this->db->query("SELECT un FROM user WHERE un='$un' AND pw='$pw'")->result();
		if(empty($result)) return(false);
		return(true);
	}
}

?>
