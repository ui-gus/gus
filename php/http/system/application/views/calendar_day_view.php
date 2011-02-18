<!DOCTYPE HTML>
<!--- written by Zeke Long --->
<html lang="en-US">
<head>
	<title>GUS Calendar</title>
	
	<!-- css styling -->
	<style type="text/css">	
	h3
	{
		font-family: Arial Rounded MT Bold;
		font-size: 20px;
		text-align: center;
	}
	</style>
	
</head>
<body>
	<?php 	
		$this->load->helper('form');		
		$form_path = site_url() . "/calendar/index/" . $this->pdata['year'] . "/" . $this->pdata['month'];

		echo $this->pdata['header'];
		echo "<h3>Events for " . $this->pdata['month'] . "/" . 
			  $this->pdata['day'] . "/" . $this->pdata['year'] . "</h3>";
			  
		//display each event and supply options
		foreach($this->pdata['content'] as $item)   
		{
//NEED TO MAKE THESE BUTTONS FUNCTIONAL (AND USE THE eventID FOR EDITING AND DELETING)
			echo form_open($form_path);	
				echo "<hr />" . $item . " " . form_button('Edit','Edit') . 
									form_button('Delete','Delete') . "<br>";
			echo form_close();	
		}
		echo "<hr />";
		
		$hidden = array('event_month' => $this->pdata['month'], 
						'event_day' => $this->pdata['day'], 
						'event_year' => $this->pdata['year']);
		//form to add an event on the current day
		echo form_open($form_path, '', $hidden);	
			echo "<center>" . form_input('event_data') .
								form_submit('submit', 'Add Event') . "</center>";
		echo form_close();

		echo $this->pdata['footer']; 
	?>
</body>
</html>