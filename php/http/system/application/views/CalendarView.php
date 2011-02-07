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
			font-famil: textile, cursive;
			font-weight: normal;
			background-color: #909090;
			#background-color: #1E90FF;
		}
		table.calendar			
		{
			margin-top: 0px;
			margin-bottom: 0px;
			margin-left 0px;
			margin-right 0px;
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
		//display the calendar page
		echo $this->pdata['header']; 
		echo $this->pdata['content'];	
		
		//if user is logged in, display a form to add an event
		if($this->Page->authed())
		{
	?>
			<p><i>To add an event, either click on the calendar day or use the menu below</i></p>
			<!-- form to add an event to the calendar -->
			<!-- the dropdowns change dynamically depending on what date you are currently viewing -->
			<!-- events can be planned a maximum of ten years in advance from the current date -->
			<form action= "calendar" method="post">
				Event Description: <input type="text" name="event_data" /><br>
				Month: <?php echo form_dropdown("month", range(1, 12), $this->pdata['month']-1); ?>
				Day: <?php echo form_dropdown("day_num", range(1, cal_days_in_month(CAL_GREGORIAN, 
							$this->pdata['month'], $this->pdata['year'])), date('j')-1); ?>
				Year: <?php echo form_dropdown("year", range($this->pdata['year'], date('Y')+10)); ?>
				<br><input type="submit" value="Add Event" />
			</form>
	<?php	}
		echo '<p>Page rendered in {elapsed_time} seconds</p>';
		echo $this->pdata['footer'];  
	?>
	
	
	<!-- jquery script to assist in adding events to the calendar -->
	<script type="text/javascript">
	$(document).ready(function()
	{
		<!-- make each calendar cell clickable (uses same class as css)-->
		$('.calendar .day').click(function()
		{
			day_num = $(this).find('.day_num').html();
			event_data = prompt('Event Description:', $(this).find('.content').html());
			if(event_data != null)
			{
				<!-- use ajax to send post to calendar controller -->
				$.ajax(
				{
					url: window.location,
					type: "POST",
					data: 
					{
						day: day_num,
						event: event_data
					},
					success: function(msg)
					{
						location.reload();
						alert('calendar updated');
					}
				});
			}		
		});
	});
	</script>
	
</body>
</html>
