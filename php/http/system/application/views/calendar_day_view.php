<!DOCTYPE HTML>
<!--- written by Zeke Long --->
<html lang="en-US">
<head>
	<title>GUS Calendar</title>
	
	<!-- css styling -->
	<style type="text/css">	
	h3
	{
		font-family: Arial Rounded MT Bold;
		font-size: 20px;
		text-align: center;
	}
	.groupname
	{
		font-family: Arial Rounded MT Bold;
		font-size: 12px;
		text-align: left;
	}
	.background{ background-color: #F2F2F2; }
	.edit{ text-align: right; }
	.delete{ text-align: right; }
	.invite{ text-align: center; }
	.attending{ text-align: right; }
	.joinEvent{ text-align: left; }
	.dropEvent{ text-align: left; }

	</style>
	
	<!-- make src point to jquery library from google so jquery and ajax can be used -->
	<script type="text/javascript"
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js">
	</script>
	
</head>
<body>
	<?php 
		$form_path = site_url() . "/calendar/index/"
					. $this->pdata['year'] . "/" . $this->pdata['month'];
		$userName = $this->session->userdata('un');
		echo $this->pdata['header'];
		echo "<div class='groupname'>Group Name: " . $this->Calendarmodel->getCurrentGroup() . "</div>";
		echo "<h3>Events for " . $this->pdata['month'] . "/" . 
			  $this->pdata['day'] . "/" . $this->pdata['year'] . "</h3>";
		echo "<center><a href=\"" . site_url() . "/calendar\">&lt;&lt;Back to Month View</a>";
		echo "</center>";

		if($this->Page->authed())
		{
			$event_day = sprintf("%02s", $this->pdata['day']-1);
			$event_month = sprintf("%02s", $this->pdata['month']-1);
			$event_year = $this->pdata['year'];
			// background class covers both if-statements
			echo "<div class='background'>";
			$val = 0;	
			
			//display each event and supply options
			if($this->pdata['content'])
			{			
				$description = null;		//used by Ajax
				foreach($this->pdata['content'] as $item)   
				{
					//if it's an even numbered index, then it is some event data
					if(($val % 2) == 0)
					{
						//display the event
						echo "<hr />" . $item;
					}	
					else	//if $val is not an even number, then it is an event ID
					{
						//if it's a group event and the user isn't an admin
						if( strcmp($item, "notAdm") == 0 )
							echo "<div class='edit'>(Group Event)</div><br><br>";
						//if the user is the owner of the event
						else
						{						
							$hidden = array('eventID' => $item,
											'event_month' => $event_month, 
											'event_day' => $event_day, 
											'event_year' => $event_year,
											'view_day_request' => 1);
											
							//get the actual event data so it can be used by ajax for editing the event
							$tmp = $this->db->query("SELECT data FROM calendar WHERE eventID='$item'")->result();
							//$tmp is an array, so get the string value (it is a one item array)
							foreach($tmp as $row)
							{
								//save the value so ajax can use it
								$description = $row->data;	
							}
								
							//button to edit an event (handled by Ajax script)
							echo "<div class='edit'>" . form_button('submitEdit', 'Edit') . "</div>";
							
							//button to delete an event
							echo "<div class='delete'>" . form_open($form_path, '', $hidden);	
								echo form_submit('submitDelete', 'Delete') . "</div>";
							echo form_close();
							
							//create an array of confirmed attendees
							$names = array();	
							$attendees = $this->db->query("SELECT name FROM calendar_rsvp WHERE 
															eventID='$item' AND yes='1'")->result();
							foreach($attendees as $row)
							{
								array_push($names, $row->name);
							}
							//implode the array so it can be displayed
							$names = implode("\\n", $names);
	
							//button to see who is attending the event (handled by Ajax script)
							echo "<div class='attending'>" . form_button('attending', 'See who\'s Attending') . "</div>";
							?>
							
							<!-- jQuery Ajax script for viewing expected attendance of event -->
							<script type="text/javascript">
							$(document).ready(function()
							{
								$('.attending').click(function()
								{		
									people = '<?php echo $names; ?>';
									eventID = '<?php echo $item; ?>';
									if(people)			
										alert("eventID (for debugging): " + eventID + "\n\n" + people);
									else
										alert("eventID (for debugging): " + eventID + "\n\nNo confirmed attendees yet");
								});
							});
							</script>
							
							<?php			
							//get group name
							$groupName = $this->Calendarmodel->getCurrentGroup();
							$options = null;
							//get array of members in the group
							$members = $this->User->get_userlist($groupName);
							foreach($members as $member)
							{
								$options[$member] = $member;
							}
							$hidden = array('view_day_request' => 1,
											'eventID' => $item,
											'event_day' => $event_day,
											'event_month' => $event_month,
											'event_year' => $event_year,
											'submitInvite' => 1);
											
							//dropdown list for inviting group members to event
							echo form_open($form_path, '', $hidden);
								echo "<div class='invite'>Invite Members: " . 
									form_multiselect('userArray[]', $options) . 
									form_submit('submitInvite', 'Invite') . "</div>";
							echo form_close();							
						}
					}
					$val += 1;		//increment the even-odd counter
				}
			}
			
			//display the events the user is invited to on the specified day
			if($this->pdata['invite'])
			{
				$val = 0;
				foreach($this->pdata['invite'] as $item2)
				{
					//if it's an even numbered index, then it is some event data
					if(($val % 2) == 0)
					{
						//display the event
						echo "<hr />" . $item2;
					}	
					else		//else it's an event ID
					{					
						$statusTmp = $this->db->query("SELECT yes FROM calendar_rsvp WHERE
														eventID='$item2' AND name='$userName'")->result();
						$status = null;
						foreach($statusTmp as $row)
						{
							$status = $row->yes;
						}
						//button to drop an event    (handled by Ajax)
						if($status == 1)
						{
							echo "<div class='dropEvent'>" . form_button('submitDrop', 'Drop') . "</div>";
						}
						//button to join an event (handled by Ajax)
						else		
						{
							echo "<div class='joinEvent'>" . form_button('submitJoin', 'Join') . "</div>";
						}
					}
					$val += 1;		//increment the even-odd counter
				}
			}
			echo "<hr /></div>";			//end of background class
			
			$hidden = array('event_month' => $event_month, 
							'event_day' => $event_day, 
							'event_year' => $event_year,
							'view_day_request' => 1);
							
			//form to add an event on the current day
			echo form_open($form_path, '', $hidden);	
				//check if user is admin
				if($this->Page->is_user_admin())
				{
					echo "<center>Add New Event: " . form_input('event_data') .
						form_submit('AddForSelf', 'Add For You') . form_submit('AddForGroup', 
						'Add For Group') . "</center>";
				}
				else
				{
					echo "<center>" . form_input('event_data') . form_submit('AddForSelf', 'Add Event') 
						. "</center>";
				}
			echo form_close();
			echo"<br><hr />";
			
			//form to view a different day
			$form_years = array_combine(range(date('Y'), date('Y')+10), range(date('Y'), date('Y')+10));
			$hidden = array('view_day_request' => '1');
			echo form_open($form_path, '', $hidden);
				echo "<center>View a different day:  ";
				echo "M:" . form_dropdown('event_month', range(1, 12), $event_month);			
				echo "D:" . form_dropdown('event_day', range(1, cal_days_in_month(CAL_GREGORIAN, 
														$event_month, $event_year)), date('j')-1);
				echo "Y:" . form_dropdown('event_year', $form_years);
				echo "  " . form_submit('submit', 'View Day') . "</center>";
			echo form_close();	
		}

		echo $this->pdata['footer']; 
	?>
	

	<!-- jQuery Ajax script for joining an event -->
	<script type="text/javascript">
	$(document).ready(function()
	{
		$('.joinEvent').click(function()
		{		
			submitJoin = 1;
			eventID = <?php echo $item2; ?>;		
			event_day = <?php echo $event_day;?>;
			view_day_request = 1;
			path = '<?php  echo site_url() . "/calendar/index/" . $event_year . "/" . $event_month; ?>';													
			$.ajax(
			{
				url: path,
				type: "POST",
				data: 
				{
					submitJoin: submitJoin, 
					eventID: eventID,
					event_day: event_day,
					view_day_request: view_day_request
				},
				success: function(msg)
				{
					location.reload();
				}
			});	
		});
	});
	</script>
	
	<!-- jQuery Ajax script for dropping event -->
	<script type="text/javascript">
	$(document).ready(function()
	{
		$('.dropEvent').click(function()
		{		
			submitDrop = 1;
			eventID = <?php echo $item2; ?>;		
			event_day = <?php echo $event_day;?>;
			view_day_request = 1;
			path = '<?php  echo site_url() . "/calendar/index/" . $event_year . "/" . $event_month; ?>';			

			$.ajax(
			{
				url: path,
				type: "POST",
				data: 
				{
					submitDrop: submitDrop, 
					eventID: eventID,
					event_day: event_day,
					view_day_request: view_day_request
				},
				success: function(msg)
				{
					location.reload();
				}
			});		
		});
	});
	</script>	
		
	<!-- jQuery Ajax script for editing events -->
	<script type="text/javascript">
	$(document).ready(function()
	{
		$('.edit').click(function()
		{		
			submitEdit = 1;
			eventID = <?php echo $item; ?>;		
			event_data = prompt("Edit Event: ", '<?php echo $description;?>');
			event_day = <?php echo $event_day;?>;
			view_day_request = 1;
			path = '<?php  echo site_url() . "/calendar/index/" . $event_year . "/" . $event_month; ?>';
			if(event_data != null)
			{ 	
				$.ajax(
				{
					url: path,
					type: "POST",
					data: 
					{
						submitEdit: submitEdit, 
						eventID: eventID,
						event_data: event_data,
						event_day: event_day,
						view_day_request: view_day_request
					},
					success: function(msg)
					{
						location.reload();
					}
				});
			}		
		});
	});
	</script>	
	
</body>
</html>