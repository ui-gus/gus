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
			border: 3px groove #F4A460;
			vertical-align: top;
			background-image: url("<?php echo base_url();?>/templates/calendar_day.PNG");
		}
		.calendar .weeks td
		{
			font-size: 16px;
			font-family: textile, cursive;
			font-weight: normal;
			border: none;
			background-image: url("<?php echo base_url();?>/templates/calendar_week.PNG");
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
			font-size: 18px;
			font-weight: bold; 
			color: #00F;
		}
	</style>
	
	<!-- make src point to jquery library from google -->
	<script type="text/javascript"
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js">
	</script>
	
</head>
<body>
	<?php 	
		//display the calendar
		echo $this->pdata['header']; 
		echo $this->pdata['content'];	
		
		//if user is logged in, display a form to add an event
		if($this->Page->authed())
		{
			//set the path that the following form is going to route to 
			$form_path = site_url() . "/calendar/index/" . $this->pdata['year']
													. "/" . $this->pdata['month'];
			//an indexed array of years
			$form_years = array_combine(range(date('Y'),date('Y')+10), 
										range(date('Y'),date('Y')+10));
			
			echo "<center><i>&#8226 To ADD/EDIT/VIEW events, either go to day view or";
			echo " use the options below";
			echo "<br>&#8226 To INVITE/JOIN/DROP/DELETE events, go to day view";
			echo "<br>&#8226<font color='blue'>Group events are in blue</font><p></p></i></center>";

			//form to add an event to the calendar
			echo form_open($form_path);
				echo "<b>Event Description:</b>" . form_input('event_data') . "<br>";
				echo "Month:" . form_dropdown('event_month', range(1, 12), $this->pdata['month']-1);			
				echo "Day:" . form_dropdown('event_day', range(1, cal_days_in_month(CAL_GREGORIAN, 
										$this->pdata['month'], $this->pdata['year'])), date('j')-1);
				echo "Year:" . form_dropdown('event_year', $form_years);				
				//if user has admin priviledges, he or she can add events for the group
//				if($this->Page->is_user_admin())
if(1)
				{
					echo "  " . form_submit('AddForSelf', 'Add For You') 
								. form_submit('AddForGroup', 'Add For Group');
				}
				else
					echo " " . form_submit('AddForSelf', 'Add Event');
			echo form_close();	
			
			//form to view a specific day
			$hidden = array('view_day_request' => '1');
			echo form_open($form_path, '', $hidden);
				echo "<p><b>View a day to Add/Edit/Delete events: </b>";
				echo "<br> Month:" . form_dropdown('event_month', range(1, 12), $this->pdata['month']-1);			
				echo "Day:" . form_dropdown('event_day', range(1, cal_days_in_month(CAL_GREGORIAN, 
										$this->pdata['month'], $this->pdata['year'])), date('j')-1);
				echo "Year:" . form_dropdown('event_year', $form_years);
				echo "  " . form_submit('submit', 'View Day');
			echo form_close();				

		}
		echo '<p>Page rendered in {elapsed_time} seconds</p>';
		echo $this->pdata['footer'];  
	?>
	
	
	<!-- jquery script as a second option to view a day -->
	<script type="text/javascript">
	$(document).ready(function()
	{
		<!-- make each calendar cell clickable (uses same class as css)-->
		$('.calendar .day').click(function()
		{		
			view_day_request = confirm("Add, Edit or View events on this day?");
			event_day = $(this).find('.day_num').html();	
			path = '<?php  echo site_url() . "/calendar/index/" . $this->pdata['year']
													. "/" . $this->pdata['month']; ?>';
			if(view_day_request != null)
			{ 	
				method = "post";

				form = document.createElement("form");
				form.setAttribute("action", path);

				hiddenField = document.createElement("input");
				hiddenField.setAttribute("type", "hidden");
				hiddenField.setAttribute("name", "event_day");
				hiddenField.setAttribute("value", event_day);
				form.appendChild(hiddenField);
			
				hiddenField = document.createElement("input");
				hiddenField.setAttribute("type", "hidden");
				hiddenField.setAttribute("name", "load_day");
				hiddenField.setAttribute("value", "TRUE");
				form.appendChild(hiddenField);			
				
				document.body.appendChild(form);
				form.submit();
			}		
		});
	});
	</script>
	
</body>
</html>
