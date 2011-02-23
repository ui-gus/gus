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
	.edit{ text-align: right; }
	.delete{ text-align: right; }
	</style>
	
</head>
<body>
	<?php 	
		$this->load->helper('form');		
		$form_path = site_url() . "/calendar/index/" . $this->pdata['year'] . "/" . $this->pdata['month'];

		echo $this->pdata['header'];
		echo "<h3>Events for " . $this->pdata['month'] . "/" . 
			  $this->pdata['day'] . "/" . $this->pdata['year'] . "</h3>";
		echo "<center><a href=\"" . site_url() . "/calendar\">&lt;&lt;Back to Month View</a></center>";
		if($this->Page->authed())
		{
			$val = 0;	
			//display each event and supply options
			if($this->pdata['content'])
			{
				foreach($this->pdata['content'] as $item)   
				{
					//if it's an even numbered index, then it is some event data
					if(($val % 2) == 0)
					{
						//display the event
						echo "<hr />" . $item;
					}
					else	//if odd numbered index, then is is an eventID
					{
						$hidden = array('eventToEdit' => $item,
										'eventToDelete' => null,
										'event_month' => $this->pdata['month']-1, 
										'event_day' => $this->pdata['day']-1, 
										'event_year' => $this->pdata['year'],
										'load_day' => 1);							
						//form to edit an event
						echo "<div class='edit'>" . form_open($form_path, '', $hidden);	
	//NEED A SCRIPT TO GET UPDATED event_data FROM USER SO I CAN ADD IT TO THE $hidden ARRAY
							echo form_submit('event', 'Edit');
						echo form_close() . "</div>";
						
						//the next two lines must be there so the delete option works
						$hidden['eventToEdit'] = null;
						$hidden['eventToDelete'] = $item;
						
						//form to delete an event
						echo "<div class='delete'>" .form_open($form_path, '', $hidden);	
							echo form_submit('submit', 'Delete');
						echo form_close() . "</div>";	
					}
					$val += 1;
				}
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
			echo"<br><hr />";
			
			$form_years = array_combine(range(date('Y'), date('Y')+10), range(date('Y'), date('Y')+10));
			//form to view a different day
			$hidden = array('view_day_request' => '1');
			echo form_open($form_path, '', $hidden);
				echo "<center>View a different day:  ";
				echo "M:" . form_dropdown('event_month', range(1, 12), $this->pdata['month']-1);			
				echo "D:" . form_dropdown('event_day', range(1, cal_days_in_month(CAL_GREGORIAN, 
											$this->pdata['month'], $this->pdata['year'])), date('j')-1);
				echo "Y:" . form_dropdown('event_year', $form_years);
				echo "  " . form_submit('submit', 'View Day') . "</center>";
			echo form_close();	
		}

		echo $this->pdata['footer']; 
	?>
		
</body>
</html>