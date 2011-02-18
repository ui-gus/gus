<!DOCTYPE HTML>
<!--- written by Zeke Long --->
<html lang="en-US">
<head>
	<title>GUS Calendar</title>
	
	<!-- css styling inside calendar -->
	<style type="text/css">
		.calendar .month
		{
			font-family: textile, cursive; 
		}
		.calendar .days td
		{
			width: 150px; height: 80px; padding: 4px;
			border: 1px solid #999;
			vertical-align: top;
			background-color: #F0F0F0;
		}
		.calendar .days td:hover       
		{
			background-color: #FFF;
		}
		.calendar .weeks td
		{
			font-size: 16px;
			font-family: textile, cursive;
			font-weight: normal;
			background-color: #909090;
		}
		table.calendar			
		{
			margin-top: 0px;
			margin-bottom: 0px;
			margin-left: 0px;
			margin-right: 0px;
		}
		.calendar .highlight
		{
			font-size: 22px;
			font-weight: bold; color: #00F
			
		}
	</style>
	
	<!-- make src point to jquery library from google so jquery and ajax can be used in the body -->
	<script type="text/javascript"
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js">
	</script>
</head>
<body>
	<?php 	
		$this->load->helper('form');
		//display the calendar page
		echo $this->pdata['header']; 
		echo $this->pdata['content'];	
		
		//if user is logged in, display a form to add an event
		if($this->Page->authed())
		{
			//set the path that the following form is going to route to (this covers for overlooked variations)
			$form_path = site_url() . "/calendar/index/" . $this->pdata['year'] . "/" . $this->pdata['month'];
			//an indexed array of years
			$form_years = array_combine(range($this->pdata['year'], date('Y')+10), 
										range($this->pdata['year'], date('Y')+10));
			
			echo "<p><i>To ADD/EDIT/VIEW an event, either click on the calendar day or use the menu below</i></p>";

			//form to add an event to the calendar using CI's form helper
			//the dropdowns change dynamically depending on what date you are currently viewing
			//events can be planned a maximum of ten years in advance from the current date
			echo form_open($form_path);
				echo "<b>Event Description:</b>" . form_input('event_data') . "<br>";
				echo "Month:" . form_dropdown('event_month', range(1, 12), $this->pdata['month']-1);			
				echo "Day:" . form_dropdown('event_day', range(1, cal_days_in_month(CAL_GREGORIAN, 
											$this->pdata['month'], $this->pdata['year'])), date('j')-1);
				echo "Year:" . form_dropdown('event_year', $form_years);
				echo "  " . form_submit('submit', 'Add Event');
			echo form_close();	
			
			//form to view a specific day
			$hidden = array('view_day_request' => '1');
			echo form_open($form_path, '', $hidden);
				echo "<p><b>View a day to Add/Edit/Delete events:</b>" . 
									form_dropdown('event_month', range(1, 12), $this->pdata['month']-1);			
				echo "Day:" . form_dropdown('event_day', range(1, cal_days_in_month(CAL_GREGORIAN, 
											$this->pdata['month'], $this->pdata['year'])), date('j')-1);
				echo "Year:" . form_dropdown('event_year', $form_years);
				echo "  " . form_submit('submit', 'View Day');
			echo form_close();				

		}
		echo '<p>Page rendered in {elapsed_time} seconds</p>';
		echo $this->pdata['footer'];  
	?>
	
	
	<!-- jquery script as a second option events to the calendar -->
	<script type="text/javascript">
	$(document).ready(function()
	{
		<!-- make each calendar cell clickable (uses same class as css)-->
		$('.calendar .day').click(function()
		{		
			event_day = $(this).find('.day_num').html();		
			view_day_request = confirm("Add, Edit or View events on this day?");
<!-- DON'T NEED AJAX, A JQUERY POST WILL WORK JUST FINE -->
			if(view_day_request != null)
			{ 	
				$.ajax(
				{
					url: window.location,
					type: "POST",
					data: 
					{
						view_day_request: view_day_request,
						event_day: event_day
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
