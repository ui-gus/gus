<?php
/***** written by Zeke Long *****/

class Calendar extends Controller 
{
	function Calendar()           //constructor
	{
		parent::Controller();
		
		//load CalendarModel
		$this->load->model('CalendarModel');
	}
	
	//displays blank calendar by default when calendar is addressed
	function index($year = null, $month = null)      
	{
		//call CalendarModel's myGenerate() function
		$data['calendar'] = $this->CalendarModel->myGenerate('', $year, $month);
		//pass $data to CalendarView
		$this->load->view('CalendarView', $data);
	}
	
	//displays calendar of specified user, populated with events
	function display($userID = null, $year = null, $month = null)      
	{
		if($userID)
		{
			//call CalendarModel's generate() function
			$data['calendar'] = $this->CalendarModel->myGenerate($userID, $year, $month);
			//pass $data to CalendarView
			$this->load->view('CalendarView', $data);
		}
	}
	
	//tests all of the calendar functions in CalendarModel.php	
	function test($date = null, $year = null, $month = null)    
	{	
		$userID = null;
		$this->load->library('unit_test');
		
		//test get_cal_data() function
		$test = $this->CalendarModel->get_cal_data($userID, $year, $month);
		$expected_result = 'is_array';
		$test_name = 'test to see if month data array is retrieved from database';
		$this->unit->run($test, $expected_result, $test_name);
		
		//test generate() function
		$test = $this->CalendarModel->myGenerate('', $year, $month);
		$expected_result = 'is_string';
		$test_name = 'test to see if calendar is properly generated';
		$this->unit->run($test, $expected_result, $test_name);

		//test add_event() function
		$test = $this->CalendarModel->add_event($date, 'something');
		$expected_result = 'is_true';
		$test_name = 'test to see if event is added to calendar table in database';
		$this->unit->run($test, $expected_result, $test_name);

		//test remove_event() function
		$test = $this->CalendarModel->remove_event($date, 0);
		$expected_result = 'is_true';
		$test_name = 'test to see if event is removed from calendar table in database';
		$this->unit->run($test, $expected_result, $test_name);
		
		//test calendar display
		$data['calendar'] = $this->CalendarModel->myGenerate($userID, $year, $month);
		$this->load->view('CalendarView', $data);
		
		//run full report of tests
		echo $this->unit->report();     
	}
}
?>