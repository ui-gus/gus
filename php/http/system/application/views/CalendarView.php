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
			background-color: #E8E8E8;
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
		echo $this->pdata['header']; 
		echo $this->pdata['content'];
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
			event_data = prompt('Enter event');
			if(event_data != null)
			{
				<!-- use ajax to send event to calendar controller -->
				$.ajax(
				{
					url: window.location,
					type: "POST",
					data:
					{
						day: day_num,
						data: event_data
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
