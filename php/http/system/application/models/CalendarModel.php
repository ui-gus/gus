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

	function view_day($date)  	
	{
		$userName = $this->session->userdata('un');
		//get all the events of the day along with their corresponding eventID
		$result = $this->db->query("SELECT data, eventID FROM calendar 
					WHERE date='$date' AND user='$userName'")->result();
		$day_data = array();

		$value = 0;
		//save each event into an array
		foreach($result as $row)   
		{
//ALSO NEED TO USE THE eventID FOR EDITING AND DELETING  
			$day_data[$value] = $row->data;
			$value += 1;
		}
		return $day_data;
	}

	function remove_event($eventID)
	{
		$this->db->query("DELETE FROM calendar WHERE eventID='$eventID'");
		return 1;
	}
	
	function add_event($date, $event, $eventID = null)   	//function to add an event to the calendar
	{
		$userName = $this->session->userdata('un');
		//if the event is being edited
		if($this->db->query("SELECT data FROM calendar WHERE eventID='$eventID'")->result())
		{
			//update the event for the user in the calendar table
			$this->db->query("UPDATE calendar SET data='$event' WHERE user='$userName' AND date='$date'");
		}
		else		//if this is a new event
		{	//add the event for the user in the calendar table 
			$this->db->query("INSERT INTO calendar (user, date, data) 
								VALUES ('$userName', '$date', '$event')");
		}
		return 1;
	}
	
	function myGenerate($year, $month)
	{	
		//load calendar library with preferences that were specified in the constructor
		$this->load->library('calendar', $this->pref);
		
		//get data for the month
		$cal_data = $this->get_cal_data($year, $month);
		
		//return generated calendar to controller
		//(codeigniter's generate() function from the calendar class, different than myGenerate())
		return $this->calendar->generate($year, $month, $cal_data);
	}
	
	function get_cal_data($year, $month)
	{
		$userName = $this->session->userdata('un');
		//SELECT the entire month's data for the logged in user from the calendar table 
		$result = $this->db->query("SELECT date, data FROM calendar WHERE date LIKE '$year-$month%' 
														AND user='$userName'")->result();
		$cal_data = array();
		
		//assign calendar data to appropriate days
		foreach($result as $row)   
		{
			//substr($row->date, 8, 2) is the day part of the date
			$cal_data[substr($row->date, 8, 2)] = $row->data;
		}
		return $cal_data;
	}
}
?>

