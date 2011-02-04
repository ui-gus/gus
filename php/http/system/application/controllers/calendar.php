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
	
	function index($year = null, $month = null)      //displays calendar
	{
		//call CalendarModel's generate() function
		$data['calendar'] = $this->CalendarModel->generate($year, $month);
		//pass $data to CalendarView
		$this->load->view('CalendarView', $data);
	}
	
	function test($year = null, $month = null, $day = null)    //tests calendar stuff
	{
		$this->load->library('unit_test');
		
		//test get_cal_data() function
		$test = $this->CalendarModel->get_cal_data($year, $month);
		$expected_result = 'is_array';
		$test_name = 'test to see if month data array is retrieved from database';
		$this->unit->run($test, $expected_result, $test_name);
		
		//test generate() function
		$test = $this->CalendarModel->generate($year, $month);
		$expected_result = 'is_string';
		$test_name = 'test to see if calendar is properly generated';
		$this->unit->run($test, $expected_result, $test_name);

		//test add_event() function
		$test = $this->CalendarModel->add_event($year, $month, $day, 'something');
		$expected_result = 'is_true';
		$test_name = 'test to see if event is added to calendar table in database';
		$this->unit->run($test, $expected_result, $test_name);

		//test remove_event() function
		$test = $this->CalendarModel->remove_event($year, $month, $day, 0);
		$expected_result = 'is_true';
		$test_name = 'test to see if event is removed from calendar table in database';
		$this->unit->run($test, $expected_result, $test_name);
		
		echo $this->unit->report();     //run full report of tests
	}
}
?>