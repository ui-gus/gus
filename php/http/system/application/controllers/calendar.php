<?php
/***** written by Zeke Long *****/

class Calendar extends Controller 
{
	function Calendar()           //constructor
	{
		parent::Controller();
	}
	
	function index($year = null, $month = null)      
        {	//load CalendarModel
		$this->load->model('CalendarModel');
		//call CalendarModel's generate() function
		$data['calendar'] = $this->CalendarModel->generate($year, $month);
		//pass $data to CalendarView
		$this->load->view('CalendarView', $data);
	}
	
	function test()			//tests calendar stuff
	{
	}
	
	

}
?>