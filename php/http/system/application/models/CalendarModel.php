<?php
/***** written by Zeke Long *****/

class CalendarModel extends Model 
{
	function CalendarModel()		//constructor
	{
		parent::Model();
	
		$this->load->helper('url');  	//need for base_url() function
		
		//preference variable for when the calendar library is loaded
		$this->pref = array(
			'day_type' => 'short',
			'show_next_prev' => true,
			'next_prev_url' => site_url() . '/calendar/index'	
		);

		//template from CI's calendar class
		$this->pref['template'] = '
		   {table_open}<table border="0" cellpadding="4" cellspacing="0" class="calendar">{/table_open}

		   {heading_row_start}<tr class="month">{/heading_row_start}
		   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;prev</a></th>{/heading_previous_cell}
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
				{cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}
				{cal_cell_blank}&nbsp;{/cal_cell_blank}
		   {cal_cell_end}</td>{/cal_cell_end}
		   {cal_row_end}</tr>{/cal_row_end}

		   {table_close}</table>{/table_close}
		';
	}

	
	function view_day($date)  		//function to get data for the day
	{
		$userName = $this->session->userdata('un');
		//get all the events of the day along with their corresponding eventID
		if($result = $this->db->query("SELECT data, eventID FROM calendar 
					WHERE date='$date' AND user='$userName'")->result())
		{
			$day_data = array();
		
			//save each event into an array
			foreach($result as $row)   
			{
				//push each new event and eventID onto the end of the $day_data array
				//every other value will be an eventID (will be fixed in calendar_day_view)
				$day_data[] = $row->data;
				$day_data[] = $row->eventID;
			}
			return $day_data;
		}
		else
			return 0;
	}
	
	
	function remove_event($eventID)
	{
		return $this->db->query("DELETE FROM calendar WHERE eventID='$eventID'");
	}
	

	function edit_event($event, $eventID)
	{
		//allow for any variation of quotes in input
		$event = str_replace("'", "''", $event);
		if($this->db->query("SELECT data FROM calendar WHERE eventID='$eventID'")->result())
		{
			//update the event for the user in the calendar table
			return $this->db->query("UPDATE calendar SET data='$event' WHERE eventID='$eventID'");
		}	
	}
	
	
	function add_event($date, $event)   	//function to add an event to the calendar
	{
		//allow for any variation of quotes in input
		$event = str_replace("'", "''", $event);
		$userName = $this->session->userdata('un');
		//add the event for the user in the calendar table 
		return $this->db->query("INSERT INTO calendar (user, date, data) 
								VALUES ('$userName', '$date', '$event')");
	}
	
	
	function myGenerate($year, $month)
	{	
		//load calendar library with preferences that were specified in the constructor
		$this->load->library('calendar', $this->pref);
		
		//get data for the month
		$cal_data = $this->get_cal_data($year, $month);
		
		//return generated calendar to controller
		//(codeigniter's generate() function from the calendar class, different than myGenerate())
		if($result = $this->calendar->generate($year, $month, $cal_data))
			return $result;
		else
			return 0;
	}
	
	function get_cal_data($year, $month)
	{
		$userName = $this->session->userdata('un');
		//select the entire month's data for the logged in user from the calendar table 
		if($result = $this->db->query("SELECT date, data FROM calendar WHERE date LIKE
										'$year-$month%' AND user='$userName'")->result())
		{
			//2D array since each day can have multiple events
			$cal_data = array(array());
		
			$index = 0;
			//assign calendar data to appropriate days
			foreach($result as $row)   
			{
				//allows for 100 events in a day, maybe excessive
				for($i=0; $i<100; $i++)
				{
					//substr($row->date, 8, 2) is the day part of the date
					if(!isset($cal_data[substr($row->date, 8, 2)][$i]))
					{
						if(strlen($row->data) > 9)
						{
							$cal_data[substr($row->date, 8, 2)][$i] = 
										"&#8226" . substr($row->data, 0, 7) . "...";
							break;
						}
						else
						{
							$cal_data[substr($row->date, 8, 2)][$i] = "&#8226" . $row->data;
							break;
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

