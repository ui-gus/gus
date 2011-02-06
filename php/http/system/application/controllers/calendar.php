<?php
/***** written by Zeke Long *****/

class Calendar extends Controller 
{
	var $pdata;
	
	function Calendar()           //constructor
	{
		parent::Controller();
		
		//load models so their methods can be used in index function
		$this->load->model('CalendarModel');
		$this->load->model('Page');	
		$this->load->helper('url');
	}
	
	function index($year = null, $month = null)      
	{
		//set year and month if they weren't passed 
		if($year == null)
		{
			$year = date('Y');
		}
		if($month == null)
		{
			$month = date('m');
		}
		//check if a new calendar event was added
		if($day = $this->input->post('day'))
		{
echo 'made it';
			$this->CalendarModel->add_event('$year-$month-$day', $this->input->post('data'));
		}
	
		//get header
		$this->pdata['header'] = $this->Page->get_header('calendar');		
//echo $this->session->userdata('un');
		//get calendar content if user is logged in
//		if($this->Page->authed())
//		{		
			//generate calendar content
			$this->pdata['content'] = $this->CalendarModel->myGenerate($year, $month);
//		}
//		else
//		{
//			$this->pdata['content'] = 'NOT LOGGED IN
//				<p><a href="' . site_url() . '/auth">LOGIN</a> to view your calendar';
//		}
		//get footer
		$this->pdata['footer'] = $this->Page->get_footer();
		
		//pass data to CalendarView to display it
		$this->load->view('CalendarView', $this->pdata);
	}
	
	//tests all of the calendar functions
	function test($date = null, $year = null, $month = null)    
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
		$data['calendar'] = $this->CalendarModel->generate($year, $month);
		$this->load->view('CalendarView', $data);
		
		//run full report of tests
		echo $this->unit->report();     
	}
}
?>