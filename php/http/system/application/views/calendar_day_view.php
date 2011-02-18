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
	div.button
	{
		text-align: right;
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
			
		$val = 0;	
		//display each event and supply options
		foreach($this->pdata['content'] as $item)   
		{
			//if it's an even numbered index, then it is some event data
			if(($val % 2) == 0)
			{
				//display the event
				echo "<hr />" . $item;
			}
			else	//if odd numbered index, then is is an event ID, so use it for a delete option
			{
				$hidden = array('eventToDelete' => $item,
								'event_month' => $this->pdata['month']-1, 
								'event_day' => $this->pdata['day']-1, 
								'event_year' => $this->pdata['year'],
								'load_day' => 1);
				echo form_open($form_path, '', $hidden);	
				echo "<div class='button'>" . form_submit('submit', 'Delete') . "</div>";
				echo form_close();	
			}
			$val += 1;
		}
		echo "<hr />";
		
		$hidden = array('event_month' => $this->pdata['month']-1, 
						'event_day' => $this->pdata['day']-1, 
						'event_year' => $this->pdata['year'],
						'load_day' => 1);
		//form to add an event on the current day
		echo form_open($form_path, '', $hidden);	
			echo "<center>" . form_input('event_data') .form_submit('submit', 'Add Event') . "</center>";
		echo form_close();

		echo $this->pdata['footer']; 
	?>
</body>
</html>