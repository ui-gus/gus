<!DOCTYPE HTML>
<!--- written by Zeke Long --->
<html lang="en-US">
<head>
	<title>GUS Calendar</title>
<body>
	<?php 	
		$this->load->helper('form');
		echo $this->pdata['header']; 
		echo $this->pdata['content'];
		echo $this->pdata['footer'];
	?>
</body>
</html>