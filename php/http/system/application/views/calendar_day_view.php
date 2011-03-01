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
	.background
	{
		background-color: #F2F2F2;
	}
	.edit{ text-align: right; }
	.delete{ text-align: right; }
	</style>
	
	<!-- make src point to jquery library from google so jquery and ajax can be used -->
	<script type="text/javascript"
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js">
	</script>
	
</head>
<body>
	<?php 
		$form_path = site_url() . "/calendar/index/" 
					. $this->pdata['year'] . "/" . $this->pdata['month'];
		echo $this->pdata['header'];
		echo "<h3>Events for " . $this->pdata['month'] . "/" . 
			  $this->pdata['day'] . "/" . $this->pdata['year'] . "</h3>";
		echo "<center><a href=\"" . site_url() . "/calendar\">&lt;&lt;Back to Month View</a>";
		echo "</center>";

		if($this->Page->authed())
		{
			$val = 0;	
			//display each event and supply options
			if($this->pdata['content'])
			{	
				// background class covers entire foreach loop
				echo "<div class='background'>";		
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
						//check to see if "edit" and "delete" options should be displayed
						if($item != 0)
						{						
							//form to edit an event (handled by Ajax script)
							echo "<div class='edit'>" . form_button('misc', 'Edit') . "</div>";
							
							$hidden = array('eventID' => $item,
											'event_month' => $this->pdata['month']-1, 
											'event_day' => $this->pdata['day']-1, 
											'event_year' => $this->pdata['year'],
											'load_day' => 1);	
											
							//form to delete an event
							echo "<div class='delete'>" . form_open($form_path, '', $hidden);	
								echo form_submit('submitDelete', 'Delete');
							echo form_close() . "</div>";	
						}
						else
							echo "<div class='edit'>(Group Event)</div><br><br>";
					}
					$val += 1;
				}
			}
			echo "<hr /></div>";		//end of background class
			
			$hidden = array('event_month' => $this->pdata['month']-1, 
							'event_day' => $this->pdata['day']-1, 
							'event_year' => $this->pdata['year'],
							'load_day' => 1);
			//form to add an event on the current day
			echo form_open($form_path, '', $hidden);	
				//check if user is admin
//is_admin() IS NOT IMPLEMENTED YET, SO SET AS 1 FOR NOW
//				if($this->User->is_admin() == TRUE)
if(1)
				{
					echo "<center>Add Event: " . form_input('event_data') .
						form_submit('AddForSelf', 'Add For You') . form_submit('AddForGroup', 
						'Add For Group') . "</center>";
				}
				else
				{
					echo "<center>" . form_input('event_data') . form_submit('AddForSelf', 'Add Event') 
						. "</center>";
				}
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
		
	<!-- jQuery Ajax script for editing events -->
	<script type="text/javascript">
	$(document).ready(function()
	{
		$('.edit').click(function()
		{		
			submitEdit = 1;
			eventID = <?php echo $item; ?>;		
			event_data = prompt("Edit Event: ", <?php echo $item;?>);
			event_day = <?php echo $this->pdata['day'];?> - 1;
			load_day = "TRUE";

			if(event_data != null)
			{ 	
				$.ajax(
				{
					url: window.location,
					type: "POST",
					data: 
					{
						submitEdit: submitEdit, 
						eventID: eventID,
						event_data: event_data,
						event_day: event_day,
						load_day: load_day
					},
					success: function(msg)
					{
						location.reload();
					}
				});
			}		
		});
	});
	</script>
	
</body>
</html>