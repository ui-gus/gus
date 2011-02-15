<?php
/***** written by Zeke Long *****/
class Calendar extends Controller{
	var $pdata;
	
	function Calendar()           //constructor
	{
		parent::Controller();
		
		$this->load->database();
		//load models so their methods can be used in index function
		$this->load->model('CalendarModel');
		$this->load->model('Page');	
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	function index($year = null, $month = null)      
	{
		//set year and month if they weren't passed 
		if(!$year){ $year = date('Y'); }
		if(!$month){ $month = date('m'); }
	
		//get header
		$this->pdata['header'] = $this->Page->get_header('calendar');		

		//check to see if there is a new calendar post
		if($event_day = $this->input->post('event_day'))
		{
			//if it's the php form post (as opposed to the ajax one, which 
			//doesn't pass year or month)
			if($this->input->post('event_month'))
			{
//to make it work for now
$event_year = $year;
//				$event_year = $this->input->post('event_year');
				//adjust day and month since they are both off by 1 for some reason
				$event_month = $this->input->post('event_month') + 1;
				$event_day = $this->input->post('event_day') + 1;
			}
			else  	//if it's the ajax post
			{	
				//the month and year will be from the current calendar shown
				$event_year = $year;
				$event_month = $month;
			}
			$event_data = $this->input->post('event_data');
//for debugging purposes
//echo  $event_year . " " . $event_month . " " . $event_day;      
			$this->CalendarModel->add_event($event_year."-".$event_month."-".$event_day, $event_data);
		}
		
		//get calendar content if user is logged in, otherwise display error message
		if($this->Page->authed())
		{		
			//generate calendar content to pass to the view
			$this->pdata['content'] = $this->CalendarModel->myGenerate($year, $month);
			//save year and month to pass to the view
			$this->pdata['year'] = $year;
			$this->pdata['month'] = $month;
		}
		else
		{
			$this->pdata['content'] = 'NOT LOGGED IN
				<p><a href="' . site_url() . '/auth">LOGIN</a> to view your calendar';
		}
		
		//get footer
		$this->pdata['footer'] = $this->Page->get_footer();
		
		//pass data to view to display it
		$this->load->view('calendar', $this->pdata);
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
		
		//test myGenerate() function
		$test = $this->CalendarModel->myGenerate($year, $month);
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
		$data['calendar'] = $this->CalendarModel->myGenerate($year, $month);
		$this->load->view('calendar', $data);
		
		//run full report of tests
		echo $this->unit->report();     
	}
}
?>

