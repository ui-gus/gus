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
	.dropJoin{ text-align: left; }

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
		echo $this->pdata['header'];
		echo "<h3>Events for " . $this->pdata['month'] . "/" . 
			  $this->pdata['day'] . "/" . $this->pdata['year'] . "</h3>";
		echo "<center><a href=\"" . site_url() . "/calendar\">&lt;&lt;Back to Month View</a>";
		echo "</center>";

		if($this->Page->authed())
		{
			$userName = $this->session->userdata('un');
			$event_day = sprintf("%02s", $this->pdata['day']-1);
			$event_month = sprintf("%02s", $this->pdata['month']-1);
			$event_year = $this->pdata['year'];
			// background class covers both if-statements
			echo "<div class='background'>";
			$val = 0;	
			
			//display each event and supply options
			if($this->pdata['content'])
			{			
				$names = array(array());
				$idArray = array();
				$eventInfo = array(array());		
				$countIndex = 0;			//index for $eventInfo, $idArray and $names			
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
						//save the event ID to keep the $idArray and $eventInfo values consistent
						$idArray[$countIndex] = $item;

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
								$eventInfo[$countIndex]['event'] = $row->data;		
							}
								
							//button to edit an event (handled by Ajax script)
							echo "<div class='edit'>" . form_button('submitEdit', 'Edit') . "</div>";
							
							//button to delete an event
							echo "<div class='delete'>" . form_open($form_path, '', $hidden);	
								echo form_submit('submitDelete', 'Delete') . "</div>";
							echo form_close();
																									
								//get info needed to display confirmed attendees (used by Ajax)							
								$attendees = $this->db->query("SELECT name, yes FROM calendar_rsvp 
																WHERE eventID='$item'")->result();
							if($attendees)
							{
								$countIndex2D = 0;
								foreach($attendees as $row)
								{									
									if($row->name)
									{
										//set flag to show that people have been invited
										$eventInfo[$countIndex]['inviteFlag'] = 1;
										if($row->yes)
										{
											//create the array to show who accepted the invite
											$names[$countIndex][$countIndex2D] = $row->name;
											$countIndex2D += 1;
											//set flag to show that at least one person RSVP'd
											$eventInfo[$countIndex]['yesFlag'] = 1;
										}
									}
								}
							}
							
							if(! $this->Calendarmodel->check_if_group_event($item))
							{												
								//button to see who is attending the event (handled by Ajax script)
								echo "<div class='attending'>" . form_button('attending', 'See who\'s Attending') . "</div>";
							
								//get list of members in the same group(s) as the user
								$inviteArray = $this->Calendarmodel->generate_invite_array();
								$event_date = ($event_month+1) . "-" . ($event_day+1) . "-" . $event_year;							
								$hidden = array('view_day_request' => 1,
												'eventID' => $item,
												'event_day' => $event_day,
												'event_month' => $event_month,
												'event_year' => $event_year,
												'event_date' => $event_date,
												'submitInvite' => 1);		
					
								//form for inviting group members to event
								echo form_open($form_path, '', $hidden);
									echo "<div class='invite'>Invite Members: " . 
										form_multiselect('userArray[]', $inviteArray) . 
										form_submit('submitInvite', 'Invite Selected') . "</div>";
								echo form_close();					
								echo "<center>(hold 'CTRL' to select multiple people)</center>";
								
								//get info needed for inviting group members (used by Ajax)
								//$groupMemberSelectList = implode("\\n", $inviteArray);							
								//button to invite group members to the event (handled by Ajax script)
								//echo "<div class='invite'>" . form_button('', 'Invite Group Members') . "</div>";	
							}
							else
							{
								//so jQuery's .each() function works correctly with the 'attending' class
								echo "<div class='attending'></div>";
							}
							
							$countIndex += 1;		//increment the index							
						}
					}
					$val += 1;		//increment the even-odd counter					
				}
				//make the arrays javascript friendly		
				$jsonIdArray = json_encode($idArray);					
				//$jsonNames and $jsonEventInfo are 2D arrays
				$jsonNames = json_encode(json_encode($names));
				$jsonEventInfo = json_encode(json_encode($eventInfo));	
			}
			
			
			//display the events the user is invited to on the specified day
			if($this->pdata['invite'])
			{
				$idArray2 = array(array());		//initialize arrays used by Ajax							
				$val = 0;
				$countIndex = 0;
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
						$idArray2[$countIndex]['id'] = $item2;	//save the event ID		
						
						$statusTmp = $this->db->query("SELECT yes, no, maybe, unanswered FROM calendar_rsvp 
														WHERE (eventID='$item2' AND name='$userName')")->result();
						foreach($statusTmp as $row)
						{		
							if($row->yes)
							{
								//user has accepted the invite
								$idArray2[$countIndex]['answer'] = "1";	
								//show button to drop event (handled by Ajax)
								echo "<div class='dropJoin'>" . form_button('', 'Drop') . "</div>";					
							}	
							else if( ($row->no)||($row->maybe)||($row->unanswered) )	
							{
								$idArray2[$countIndex]['answer'] = "0";
								//show button to join event (handled by Ajax)
								echo "<div class='dropJoin'>" . form_button('', 'Join') . "</div>";
							}												
						}
						$countIndex += 1;		//increment the index
					}
					$val += 1;		//increment the even-odd counter					
				}
				//make the 2D array javascript friendly
				$jsonIdArray2 = json_encode(json_encode($idArray2));
			}
			echo "<hr /></div>";			//end of background class
			
			$hidden = array('event_month' => $event_month, 
							'event_day' => $event_day, 
							'event_year' => $event_year,
							'view_day_request' => 1);		
			//get array of groups that the user owns
			$ownedGroupsArr = $this->Calendarmodel->get_owned_groups();			
			
			//form to add an event on the current day
			echo form_open($form_path, '', $hidden);	
				//check if user is admin of at least one group
				if($ownedGroupsArr)
				{
					foreach($ownedGroupsArr as $owned)
					{
						if(strlen($owned) > 25)
							$ownedGroups[$owned] = substr($owned, 0, 22) . " ...";
						else
							$ownedGroups[$owned] = $owned;
					}	
					echo "<center><b>Add New Event:</b> " . form_input('event_data') .
						form_submit('AddForSelf', 'Add For You') . form_dropdown('groupName', $ownedGroups) . 
						form_submit('AddForGroup', 'Add For Group') . "</center>";
				}
				else
				{
					echo "<center>" . form_input('event_data') . form_submit('AddForSelf', 'Add Event') 
						. "</center>";
				}
			echo form_close(); 
			
			echo "<center><font color='blue'>For events that you are invited to: If they disappear,<br> 
					go back to month view and click on the date to make them re-appear.</font></center>";
			echo"<br><hr />";
			
			//form to view a different day
			$form_years = array_combine(range(date('Y'), date('Y')+10), range(date('Y'), date('Y')+10));
			$hidden = array('view_day_request' => '1');
			echo form_open($form_path, '', $hidden);
				echo "<center><b>View a different day:</b>  ";
				echo "M:" . form_dropdown('event_month', range(1, 12), $event_month);			
				echo "D:" . form_dropdown('event_day', range(1, cal_days_in_month(CAL_GREGORIAN, 
														$event_month, $event_year)), date('j')-1);
				echo "Y:" . form_dropdown('event_year', $form_years);
				echo "  " . form_submit('submit', 'View Day') . "</center>";
			echo form_close();	
		}
		
		echo '<p>Page rendered in {elapsed_time} seconds</p>';
		echo $this->pdata['footer']; 
	?>
	
	
	<!-- jQuery Ajax script for dropping and joining events -->
	<script type="text/javascript">
	$('.dropJoin').each(function(i)
	{	
		event_day = <?php echo $event_day;?>;
		view_day_request = 1;
		path = '<?php  echo site_url() . "/calendar/index/" . $event_year . "/" . $event_month; ?>';	
		//idAndAnswer is a 2D array
		idAndAnswer = $.parseJSON(<?php echo $jsonIdArray2; ?>);	

		$(this).click(function()
		{	
			//note: brackets have to be used for the integer index, and period for the string index
			//(if both indexes were strings, it would be idAndAnswer.i.answer)
			if(idAndAnswer[i].answer == 1)
			{
				$.ajax(
				{
					url: path,
					type: "POST",
					data: 
					{
						submitDrop: 1, 
						eventID: idAndAnswer[i].id,
						event_day: event_day,
						view_day_request: view_day_request
					},
					success: function(msg)
					{
						location.reload();
					}
				});	
			}
			else
			{
				$.ajax(
				{
					url: path,
					type: "POST",
					data: 
					{
						submitJoin: 1, 
						eventID: idAndAnswer[i].id,
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
	
	
	<!-- jQuery Ajax script for editing events -->
	<script type="text/javascript">
	$('.edit').each(function(i)
	{	
		submitEdit = 1;
		event_day = <?php echo $event_day;?>;		
		view_day_request = 1;
		path = '<?php  echo site_url() . "/calendar/index/" . $event_year . "/" . $event_month; ?>';
		//descripArray is a 2D array
		descripArray = $.parseJSON(<?php echo $jsonEventInfo; ?>);
		eventIdArr = <?php echo $jsonIdArray; ?>;	
		eventArray = {};
		
		$(this).click(function()
		{	
			eventArray[i] = prompt("Edit Event: ", descripArray[i].event);
							
			if(eventArray[i] != null)
			{ 	
				$.ajax(
				{
					url: path,
					type: "POST",
					data: 
					{
						submitEdit: submitEdit, 
						eventID: eventIdArr[i],
						event_data: eventArray[i],
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
	
	
	<!-- jQuery script for viewing expected attendance of event -->
	<script type="text/javascript">
	$('.attending').each(function(i)
	{	
		//2D array of attendees
		peopleArr = $.parseJSON(<?php echo $jsonNames; ?>);			
		//2D array of event info
		eventArr = $.parseJSON(<?php echo $jsonEventInfo; ?>);	
		
		$(this).click(function()
		{
			listAttendees = "";
			for(j in peopleArr[i])
			{
				//add newlines
				listAttendees = listAttendees + peopleArr[i][j] + "\n";
			}
			
			if(!eventArr[i].inviteFlag)
				alert("Event:  " + eventArr[i].event + "\n\nYou haven\'t invited anyone to this event");		
			else if(eventArr[i].yesFlag)
				alert("Event:  " + eventArr[i].event + "\n\nConfirmed attendees:\n" + listAttendees);			
			else
				alert("Event:  " + eventArr[i].event + "\n\nNo confirmed attendees yet");					
		});
	});
	</script>

	
	<!-- jQuery Ajax script for inviting group members to an event -->
	<script type="text/javascript">
	$('.invite').each(function(i)
	{	
		submitInvite = 1;
		view_day_request = 1;
		event_day = <?php echo $event_day; ?>;
		event_month = <?php echo $event_month; ?>;
		event_year = <?php echo $event_year; ?>;
		event_date = <?php echo $event_date; ?>;		
		eventIdArr = <?php echo $jsonIdArray; ?>;
		path = '<?php  echo site_url() . "/calendar/index/" . $event_year . "/" . $event_month; ?>';
		selectList = "<?php echo $groupMemberSelectList; ?>";	
		
		$(this).click(function()
		{	
			//selectedArray is the array of people who were invited to the specific event
			selectedArray = alert("Select people to invite:\n" + selectList);
							
			if(selectedArray != null)
			{ 	
				$.ajax(
				{
					url: path,
					type: "POST",
					data: 
					{
						submitInvite: submitInvite, 
						eventID: eventIdArr[i],
						event_day: event_day,
						event_month: event_month,
						event_year: event_year,
						event_date: event_date,
						userArray: selectedArray,
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