<!DOCTYPE HTML>
<!--- written by Zeke Long --->
<html lang="en-US">
<head>
	<title>GUS Calendar</title>
	
	<!-- styling inside calendar -->
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
			background-color: #1E90FF;
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
</head>
<body>
	<?php 	
		echo $this->pdata['header']; 
		echo $this->pdata['content']; 
		echo $this->pdata['footer']; 
	?>
</body>
</html>
