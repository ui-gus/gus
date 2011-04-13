<?php
/***** written by Zeke Long *****/

class Calendarmodel extends Model 
{
	function Calendarmodel()		//constructor
	{
		parent::Model();
	
		$this->load->helper('url');  	//need for base_url() function
		$this->load->model('User');
		$this->load->model('Group');
		$this->load->model('Page');
		$this->db = $this->load->database('admin', TRUE);	
	
		//preference variable for when the calendar library is loaded
		$this->pref = array(
			'day_type' => 'long',
			'show_next_prev' => true,
			'next_prev_url' => site_url() . '/calendar/index'	
		);

		//template from CI's calendar class
		$this->pref['template'] = '
		   {table_open}<table border="0" cellpadding="4" cellspacing="0" class="calendar">
		   {/table_open}

		   {heading_row_start}<tr class="month">{/heading_row_start}
		   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;prev</a></th>
		   {/heading_previous_cell}
		   {heading_title_cell}<th colspan="{colspan}"><h2>{heading}</h2></th>{/heading_title_cell}
		   {heading_next_cell}<th><a href="{next_url}">next&gt;&gt;</a></th>{/heading_next_cell}
		   {heading_row_end}</tr>{/heading_row_end}

		   {week_row_start}<tr class="weeks">{/week_row_start}
		   {week_day_cell}<td><center>{week_day}</center></td>{/week_day_cell}
		   {week_row_end}</tr>{/week_row_end}

		   {cal_row_start}<tr class="days">{/cal_row_start}
		   {cal_cell_start}<td class="day">{/cal_cell_start}
				{cal_cell_content}
					<div class="day_num">{day}</div>
					<div class="content">{content}</div>
				{/cal_cell_content}
				{cal_cell_content_today}
					<div class="day_num highlight">{day}</div>
					<div class="content">{content}</div>
				{/cal_cell_content_today}
				{cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
				{cal_cell_no_content_today}<div class="day_num highlight">{day}</div>
				{/cal_cell_no_content_today}
				{cal_cell_blank}&nbsp;{/cal_cell_blank}
		   {cal_cell_end}</td>{/cal_cell_end}
		   {cal_row_end}</tr>{/cal_row_end}

		   {table_close}</table>{/table_close}
		';
	}

	
	function view_day($date)  		//function to get data for the day
	{
		$groupName = $groupName = $this->getCurrentGroup();
		$userName = $this->session->userdata('un');
		$day_data = array();
		
		//get all the user's events for the day along with their corresponding eventID
		$primaryEvents = $this->db->query("SELECT data, eventID, user FROM calendar WHERE 
					date='$date' AND (user='$userName' OR user='$groupName')")->result();	
		if($primaryEvents)
		{		
			//save each event into $day_data array
			foreach($primaryEvents as $row)   
			{
				//if it's a personal event
				if(strcmp($row->user, $userName) == 0)
				{
					array_push($day_data, "<big>&#8226</big>" . $row->data);
					array_push($day_data, $row->eventID);
				}
				else		//if it's a group event
				{
					//make it blue if it's a group event
					array_push($day_data, "<small><font color='blue' size='1'>&#9830</small></font> " . 
									"<font color='blue'>" . $row->data . "</font>\t(Group event 
									for " . $this->getCurrentGroup() . ")");
					//if user is admin
					if($this->Page->is_user_admin())
						array_push($day_data, $row->eventID);
					else
						array_push($day_data , "notAdm");
				}
			}
		}	
		return $day_data;
	}
	

	function view_day_invites($date)   //function to get events user is invited to
	{
		$userName = $this->session->userdata('un');
		$invite_data = array();
		
		//get all the events that the user is invited to (by querying calendar_rsvp table)
		$invitedEvents = $this->db->query("SELECT eventID FROM calendar_rsvp WHERE name='$userName'")->result();
		if($invitedEvents)
		{
			foreach($invitedEvents as $row)
			{
				$eventID = $row->eventID;
				
				//get the date, event data and owner of the event
				$eventOwner = null;
				$eventDate = null;
				$eventData = null;
				$result = $this->db->query("SELECT user, date, data FROM calendar WHERE eventID='$eventID'")->result();
				foreach($result as $xyz)
				{
					$eventOwner = $xyz->user;
					$eventDate = $xyz->date;
					$eventData = $xyz->data;
				}
				//add the event to the array of events
				if($eventDate == $date)
				{
					array_push($invite_data, "<big>&#8226</big>" . $eventData . "\t(invited by " . $eventOwner . ")");
					array_push($invite_data, ($eventID));
				}
			}
		}		
		return $invite_data;
	}

	
	function add_event($date, $event, $eventID = null)   	
	{
		//allow for any variation of quotes in input
		$event = str_replace("'", "''", $event);
		//update the event for the user if it exists already, otherwise add it
		if($this->db->query("SELECT data FROM calendar WHERE eventID='$eventID'")->result())
		{
			//STILL NEED TO SANITIZE TO PREVENT SCRIPTS
			return $this->db->query("UPDATE calendar SET data='$event', 
									date='$date' WHERE eventID='$eventID'");
		}
		else
		{
			$userName = $this->session->userdata('un');
			//add the event for the user in the calendar table 
			//STILL NEED TO SANITIZE TO PREVENT SCRIPTS
			return $this->db->query("INSERT INTO calendar (user, date, data) 
									VALUES ('$userName', '$date', '$event')");
		}
	}

	
	function edit_event($event, $eventID)
	{
		//allow for any variation of quotes in input
		$event = str_replace("'", "''", $event);
		if($this->Page->is_user_admin())
		{
			//if the user is an admin and the eventID matches, whether or not it is a group event
			if($this->db->query("SELECT data FROM calendar WHERE eventID='$eventID'")->result())
			{
				//update the event
				return $this->db->query("UPDATE calendar SET data='$event' WHERE eventID='$eventID'");
			}			
		}	
		else		
		{
			//if not an admin, make sure it is not a group event before updating
			$userName = $this->session->userdata('un');
			if($this->db->query("SELECT data FROM calendar WHERE 
				eventID='$eventID' AND user='$userName'")->result())
			{
				//update the event for the user
				return $this->db->query("UPDATE calendar SET data='$event' WHERE eventID='$eventID'");
			}	
			else
			{
				echo "<script type='text/javascript'>alert('You don''t have permission to edit 
						group events');</script>";
				return 1; 
			}
		}
	}
	
	
	function remove_event($eventID)
	{
		//only let an admin remove a group event
		if($this->Page->is_user_admin())
		{
			return $this->db->query("DELETE FROM calendar WHERE eventID='$eventID'");
		}
		else
		{
			$userName = $this->session->userdata('un');
			return $this->db->query("DELETE FROM calendar WHERE 
									eventID='$eventID' AND user='$userName'");
		}
	}
	
	
	function invite_to_event($eventID, $groupID, $userArray)
	{
		foreach($userArray as $name)
		{
			$this->db->query("INSERT INTO calendar_rsvp (eventID, groupID, name, unanswered)
							VALUES ('$eventID', '$groupID', '$name', 1)");
		}
		return 1;
	}
	
	
	function join_event($eventID, $userName)
	{
		return $this->db->query("UPDATE calendar_rsvp SET yes=1, no=0 WHERE eventID='$eventID' AND name='$userName'");
	}
	
	
	function drop_event($eventID, $userName)
	{
		return $this->db->query("UPDATE calendar_rsvp SET yes=0, no=1 WHERE eventID='$eventID' AND name='$userName'");
	}
	
	
	function add_group_event($date, $event, $eventID = null)  
	{
		//allow for any variation of quotes in input
		$event = str_replace("'", "''", $event);

		if($this->Page->is_user_admin())
		{
			//update the group event if it exists already, otherwise add it
			if($this->db->query("SELECT data FROM calendar WHERE eventID='$eventID'")->result())
			{
				//STILL NEED TO SANITIZE TO PREVENT SCRIPTS
				return $this->db->query("UPDATE calendar SET data='$event', date='$date' 
																WHERE eventID='$eventID'");									
			}
			else
			{
				$groupName = $this->getCurrentGroup();
				//STILL NEED TO SANITIZE TO PREVENT SCRIPTS
				return $this->db->query("INSERT INTO calendar (user, date, data) 
										VALUES ('$groupName', '$date', '$event')");
			}
		}
	}
	
	
	function getCurrentGroup()
	{
		$groupName = null;
		//get the userID
		$userID = $this->User->get_id($this->session->userdata('un'));
		//get the groupID
		$gid = $this->db->query("SELECT gid FROM usergroup WHERE uid='$userID'")->result();
		foreach($gid as $row)
		{
			$groupID = $row->gid;
			//get the groupName
			$gName = $this->db->query("SELECT name FROM ggroup WHERE id='$groupID'")->result();
			foreach($gName as $xyz)
			{
				$groupName = $xyz->name;
			}
		}
		return $groupName;
	}
	
	
	function myGenerate($year, $month)
	{	
		//load calendar library with preferences that were specified in the constructor
		$this->load->library('calendar', $this->pref);
		
		//get data for the month
		$cal_data = $this->get_cal_data($year, $month);
		
		//return generated calendar to controller
		//(codeigniter's generate() function, different than myGenerate())
		if($result = $this->calendar->generate($year, $month, $cal_data))
			return $result;
		else
			return 0;
	}
	
	
	function get_cal_data($year, $month)
	{
		$userName = $this->session->userdata('un');		
		$groupName = $groupName = $this->getCurrentGroup();
	
		//select the entire month's data for the logged in user from the calendar table 
		if($result = $this->db->query("SELECT date, data, user FROM calendar WHERE date LIKE
					'$year-$month%' AND (user='$userName' OR user='$groupName')")->result())
		{
			//2D array since each day can have multiple events
			$cal_data = array(array());
		
			//for each event that was a match
			foreach($result as $row)   
			{
				//allows for 100 events in a day, maybe excessive
				for($i=0; $i<100; $i++)
				{
					//substr($row->date, 8, 2) is the day part of the date
					if(!isset($cal_data[substr($row->date, 8, 2)][$i]))
					{
						//if it is a personal event
						if(strcmp($row->user, $userName) == 0)	
						{
							//adjust the length
							$tmpData = "<big>&#8226</big>" . substr($row->data, 0, 8);	
							if(strlen($row->data) > 8)
							{
								$cal_data[substr($row->date, 8, 2)][$i] = $tmpData . " ...";
								break;
							}
							else
							{
								$cal_data[substr($row->date, 8, 2)][$i] = $tmpData;
								break;
							}							
						}
						else		//if it's a group event
						{
							//adjust the length and font to show that it's a group event
							$tmpData = "<font color='blue' size='1'>&#9830</font> " . 
										"<font color='blue'>" . substr($row->data, 0, 8) . 
										"</font>";
							if(strlen($row->data) > 8)
							{
								$cal_data[substr($row->date, 8, 2)][$i] = 
											$tmpData . "<font color='blue'> ... </font>";
								break;
							}
							else
							{
								$cal_data[substr($row->date, 8, 2)][$i] = $tmpData;
								break;
							}
						}	
					}	
				}
			}
			return $cal_data;
		}
		else 
			return 0;
	}
}
?>

