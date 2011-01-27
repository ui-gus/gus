<?php
/***** written by Zeke Long *****/

class Calendar extends Controller 
{
	function Calendar()           //constructor
     {
		parent::Controller();
	}
	
	function index() 
     {
		$this->load->view('CalendarView');
	}

	function viewCalendar()
	{
	}
}
?>