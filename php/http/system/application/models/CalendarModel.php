<?php

/***** written by Zeke Long *****/

class CalendarModel extends Model 
{
	function CalendarModel()
	{
		parent::Model();     //constructor
	}


	function add_event($_POST)
	{
		$event = $_POST["event"];
		$month = $_POST["month"];
		$day = $_POST["day"];
		$hour = $_POST["hour"];
		$minute = $_POST["minute"];
		$amOrPm = $_POST["amOrpm"];

		/***  Not done, still have to store event
				to a database table
		***/
	}


	function remove_event($_POST)
	{
		echo 'Not Yet Implemented';
	}
}
?>

