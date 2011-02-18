<?php
/**
 * @package GusPackage
 * subpackage Admin
 * @author Zeke Long <long3841@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

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
	
		//get header and footer
		$this->pdata['header'] = $this->Page->get_header('calendar');		
		$this->pdata['footer'] = $this->Page->get_footer();
		
		//check to see if there is a new add event post
		if($event_data = $this->input->post('event_data'))
		{
			$event_year = $this->input->post('event_year');
			//adjust day and month since they are both off by 1 for some reason
			$event_month = $this->input->post('event_month') + 1;
			$event_day = $this->input->post('event_day') + 1;
			$this->CalendarModel->add_event($event_year."-".$event_month."-".$event_day, $event_data);
		}
		
		//check to see if there is a new post requesting to view the day
		if($this->input->post('view_day_request'))
		{
			$event_day = $this->input->post('event_day') + 1;
			//if it's the php post
			if($this->input->post('event_month'))
			{
				$event_year = $this->input->post('event_year');
				$event_month = $this->input->post('event_month') + 1;
				//put a leading zero in if month is only one digit
				$event_month = sprintf("%02u",$event_month);
			}
			else 		//if it's the jQuery post
			{
				$event_year = $year;
				$event_month = $month;				
			}
			//generate calendar content to pass to the view
			$this->pdata['content'] = 
					$this->CalendarModel->view_day($event_year."-".$event_month."-".$event_day);
			$this->pdata['year'] = $year;
			$this->pdata['month'] = $month;
			$this->pdata['day'] = $event_day;
			//display the day view
			$this->load->view('calendar_day_view', $this->pdata);
		}
		else		//if not, then show the month view
		{
			if($this->Page->authed())       //get calendar content if user is logged in	
			{		
				//generate calendar content to pass to the view
				$this->pdata['content'] = $this->CalendarModel->myGenerate($year, $month);
				//save year and month to pass to the view
				$this->pdata['year'] = $year;
				$this->pdata['month'] = $month;
				//display the month view
				$this->load->view('calendar', $this->pdata);
			}
			else
			{
				$this->pdata['content'] = 'NOT LOGGED IN
					<p><a href="' . site_url() . '/auth">LOGIN</a> to view your calendar';
			}
		}
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

