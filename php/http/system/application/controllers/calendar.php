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
		$this->load->model('Calendarmodel');
		$this->load->model('Page');
		$this->load->model('User');
		$this->load->model('Group');
		$this->load->helper('url');
		$this->load->helper('form');
		
		//get header and footer
		$this->pdata['header'] = $this->Page->get_header('calendar');		
		$this->pdata['footer'] = $this->Page->get_footer();
	}
	
	function index($year = null, $month = null)      
	{
		//if user is logged in
		if($this->Page->authed())
		{
			//set year and month if they weren't passed 
			if(!$year){ $year = date('Y'); }
			if(!$month){ $month = date('m'); }
			
			//check to see if there is a new post requesting to edit an event
			if($this->input->post('submitEdit'))
			{
				$eventID = $this->input->post('eventID');
				$event = $this->input->post('event_data');			
				if($event != null)
					$this->Calendarmodel->edit_event($event, $eventID);
				else
					$this->Calendarmodel->remove_event($eventID);
			}			
			//check to see if there is a new post requesting to add an event
			else if($event_data = $this->input->post('event_data'))
			{
				$event_year = $this->input->post('event_year');
				//adjust day and month since they are both off by 1 for some reason
				$event_month = $this->input->post('event_month') + 1;
				$event_day = $this->input->post('event_day') + 1;
				$event_date = $event_year."-".$event_month."-".$event_day;
				
				//check if it is an admin adding a group event
				if($addForGroup = $this->input->post('AddForGroup'))
				{
					$groupName = $this->input->post('groupName');
					$this->Calendarmodel->add_group_event($event_date, $event_data, $groupName);
				}
				else
				{
					//if it's a regular user
					$this->Calendarmodel->add_event($event_date, $event_data);
				}
			}
			
			//check to see if there is a new post requesting to delete an event
			if($this->input->post('submitDelete'))
			{	
				$eventToDelete = $this->input->post('eventID');
				$this->Calendarmodel->remove_event($eventToDelete);
			}
			
			//check to see if there is a new post requesting to invite people to an event
			if($this->input->post('submitInvite'))
			{
				$eventID = $this->input->post('eventID');
				$eventDate = $this->input->post('event_date');
				if($groupName = $this->input->post('groupName'))
				{
					$userArray = $this->Calendarmodel->get_group_members($groupName);
				}
				else
				{
					$userArray = $this->input->post('userArray');
				}
				$eventOwner = $this->User->get_id($this->session->userdata('un'));
				$groupID = null;
				//get the groupID
				$gid = $this->db->query("SELECT gid FROM usergroup WHERE uid='$eventOwner'")->result();
				foreach($gid as $row)
				{
					$groupID = $row->gid;
				}
				$this->Calendarmodel->invite_to_event($eventID, $groupID, $userArray, $eventDate);
				?>
				<script type="text/javascript">alert("Selected members were invited!");</script>
				<?php
			}
			
			//check to see if there is a new post requesting to join an event
			if($this->input->post('submitJoin'))
			{
				$eventID = $this->input->post('eventID');
				$userName = $this->session->userdata('un');
				$this->Calendarmodel->join_event($eventID, $userName);
			}			
			
			//check to see if there is a new post requesting to drop an event
			if($this->input->post('submitDrop'))
			{
				$eventID = $this->input->post('eventID');
				$userName = $this->session->userdata('un');
				$this->Calendarmodel->drop_event($eventID, $userName);
			}
			
			//check to see if there is a new post requesting to view the day
			if( $this->input->post('view_day_request') || isset($_SERVER['QUERY_STRING']['load_day']) )
			{
				//if it's the php post
				if($this->input->post('event_month'))
				{
					$event_day = $this->input->post('event_day') + 1;
					$event_year = $this->input->post('event_year');
					$event_month = $this->input->post('event_month') + 1;
					//add a leading zero if month or day are only one digit
					$event_month = sprintf("%02s",$event_month);
				}
				else 		//if it's the Ajax post
				{
					parse_str($_SERVER['QUERY_STRING'], $_GET);		//enable $_GET
					$event_day = $_GET['event_day'];
					$event_year = $year;
					$event_month = $month;	
				}
				$event_date = $event_year."-".$event_month."-".$event_day;

				//generate calendar content to pass to the view
				$this->pdata['content'] = $this->Calendarmodel->view_day($event_date);
				$this->pdata['invite'] = $this->Calendarmodel->view_day_invites($event_date);
				$this->pdata['year'] = $event_year;
				$this->pdata['month'] = $event_month;
				$this->pdata['day'] = $event_day;

				//display the day view
				if($event_day)
				{
					$this->load->view('calendar_day_view', $this->pdata);
				}
				else
				{
					$this->pdata['content'] = $this->Calendarmodel->myGenerate($year, $month);
					$this->load->view('calendar', $this->pdata);
				}
			}
			//if not, then show the month view
			else		
			{
				//generate calendar content to pass to the view
				$this->pdata['content'] = $this->Calendarmodel->myGenerate($year, $month);
				$this->pdata['year'] = $year;
				$this->pdata['month'] = $month;
				//display the month view
				$this->load->view('calendar', $this->pdata);
			}
			return 1;
		}
		else
		{
			$this->pdata['content'] = 'NOT LOGGED IN
				<p><a href="' . site_url() . '/auth">LOGIN</a> to view your calendar';
			//display the error message instead of month view
			$this->load->view('calendar', $this->pdata);
			return 0;
		}
	}
	
	
	//tests all of the calendar functions
	function test()    
	{	
		$year = date('Y');
		$month = date('m');
		$day = date('j');
		$date = $year . "-" . $month . "-" . $day;
		$userName = $this->session->userdata('un');
		$this->load->library('unit_test');

		for($i=0; $i<7; $i++)
			echo "<br>";
			
		//test index
		$this->Page->login("test","test123");
		$this->unit->run($this->index(), true, "testing index function");
		
		//test get_cal_data() function
		$test = $this->Calendarmodel->get_cal_data($year, $month);
		$expected_result = 'is_array';
		$test_name = 'test to see if month data array is retrieved from database';
		$this->unit->run($test, $expected_result, $test_name);
		
		//test myGenerate() function
		$test = $this->Calendarmodel->myGenerate($year, $month);
		$expected_result = 'is_string';
		$test_name = 'test to see if calendar string is generated';
		$this->unit->run($test, $expected_result, $test_name);

		//test add_event() function
		//uses eventID 1, which is reserved for testing purposes
		$test = $this->Calendarmodel->add_event($date, 'something', 1);
		$expected_result = 'is_true';
		$test_name = 'test to see if event is added to calendar table in database';
		$this->unit->run($test, $expected_result, $test_name);
		//$this->Calendarmodel->remove_event(1);   
		
		//test join_event() function
		$test = $this->Calendarmodel->join_event(1, $userName);
		$expected_result = 'is_true';
		$test_name = "test to see if user is added as 'attending' in calendar_rsvp table";
		$this->unit->run($test, $expected_result, $test_name);
		
		//test drop_event() function
		$test = $this->Calendarmodel->drop_event(1, $userName);
		$expected_result = 'is_true';
		$test_name = "test to see if user is updated as 'not attending' in calendar_rsvp table";
		$this->unit->run($test, $expected_result, $test_name);
		
		//test add_group_event() function (uses eventID 1 also)
		$test = $this->Calendarmodel->add_group_event($date, 'something', 'testgroup', 1);
		$expected_result = 'is_true';
		$test_name = 'test to see if group event is added to calendar table';
		$this->unit->run($test, $expected_result, $test_name);
		
		//test remove_event() function by removing the group event added above
		$test = $this->Calendarmodel->remove_event(1);
		$expected_result = 'is_true';
		$test_name = 'test to see if event is removed from calendar table';
		$this->unit->run($test, $expected_result, $test_name);
		
		//test view_day() function
		$test = $this->Calendarmodel->view_day($date);
		$expected_result = 'is_array';
		$test_name = 'test to see if event data for the requested day is returned';
		$this->unit->run($test, $expected_result, $test_name);
		
		//test generate_invite_array() function
		$test = $this->Calendarmodel->generate_invite_array();
		$expected_result = 'is_array';
		$test_name = 'test to see if an array of group members is retrieved from database';
		$this->unit->run($test, $expected_result, $test_name);
		
		//test view_day_invites() function
		$test = $this->Calendarmodel->view_day_invites($date);
		$expected_result = 'is_array';
		$test_name = 'test to see if an array of invites is retrieved from database';
		$this->unit->run($test, $expected_result, $test_name);
				
		//run full report of tests
		echo $this->unit->report();     
	}
}
?>		

