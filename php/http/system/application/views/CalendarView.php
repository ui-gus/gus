<!DOCTYPE HTML>
<!--- written by Zeke Long --->
<html lang="en-US">
<head>
	<title>GUS Calendar</title>
	<style type="text/css">
		.calendar .days td
		{
			width: 100px; height: 80px; padding: 4px;
			border: 1px solid #999;
			vertical-align: top;
			background-color: #CCFF99;
		}
		.calendar .days td:hover       
		{
			background-color: #FFF;
		}
		.calendar .weeks td
		{
			font-size: 18px;
			font-weight: bold;
			background-color: #4C8033;
		}
		table.calendar			
		{
			margin: auto;
		}
		.calendar .highlight
		{
			font-size: 22px;
			font-weight: bold; color: #00F
			
		}
	</style>
</head>
<body>
	<?php echo $calendar; ?>
</body>
</html>
