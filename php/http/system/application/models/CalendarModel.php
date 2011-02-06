<?php
/***** written by Zeke Long *****/

class CalendarModel extends Model 
{
	function CalendarModel()		//constructor
	{
		parent::Model();
	
		$this->load->library('session');  //need this to get username to select calendar info
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
			<div class="days">{day}</div>
			<div class="content">{content}</div>
			{/cal_cell_content}
		   {cal_cell_content_today}
			//day_num and highlight are two separate classes
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
	
	function myGenerate($year, $month)
	{	
		//load calendar library with preferences that were specified in the constructor
		$this->load->library('calendar', $this->pref);
		
		//get data for the month
		$cal_data = $this->get_cal_data($year, $month);
		
		//return generated calendar to controller
		//codeigniter's generate() function in the calendar class
		return $this->calendar->generate($year, $month, $cal_data);
	}
	
	function get_cal_data($year, $month)
	{
		//SELECT the entire month's data from the calendar table 
//echo $this->session->userdata('un');       //just a test to make sure this is set
//need to use the following line instead of the one used for now
//$result = $this->db->query("SELECT date, data FROM calendar WHERE un = '$this->session->userdata('un')' AND date LIKE '$year-$month%'")->result();
		$result = $this->db->query("SELECT date, data FROM calendar WHERE date LIKE '$year-$month%'")->result();

		$cal_data = array();
		
		//assign calendar data to appropriate days
		foreach($result as $row)   
		{
			//substr($row->date, 8, 2) is the day part of the date
			$cal_data[substr($row->date, 8, 2)] = $row->data;
		}
		return $cal_data;
	}
	
	function add_event($date, $event)   	//function to add an event to the calendar
	{
//still need to make it for a specific user
		if($this->db->select('date')->from('calendar')->where('date', $date)->count_all_results())
		{
			$this->db->where('date', $date)->update('calendar', array('date' => $date, 'data' => $data));
		}
		else
		{
			$this->db->insert('calendar', array('date' => $date, 'data' => $event));
		}
		
		return 1;
	}
	
	function remove_event($date = null, $eventID)
	{
		//event_ID 0 is reserved for testing purposes
		return 'not yet implemented';
		//will return a 1 or a 0
	}
}
?>

