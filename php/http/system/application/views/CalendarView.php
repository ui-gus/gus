<html>
<body>
<!--- written by Zeke Long --->

<!--- display the calendar in month view --->
<!--- STILL NEED TO IMPLEMENT WEEK VIEW --->
<?php

//Get today's date
$date =time(); 

//Put the day, month, and year in seperate variables 
$day = date('d', $date); 
$month = date('n', $date); 
$year = date('Y', $date); 

//Get first day of the month 
$first_day = mktime(0, 0, 0, $month, 1, $year);

//Get the month name 
$title = date("F", $first_day); 

//Get the actual weekday that the first of the month is on 
$day_of_week = date("l", $first_day); 

/*Once we know what day of the week it falls on, we know how many blank days occur before it (zero if Sunday).
*/
switch($day_of_week)
{ 
	case "Sunday": $blank = 0; break; 
	case "Monday": $blank = 1; break; 
	case "Tuesday": $blank = 2; break; 
	case "Wednesday": $blank = 3; break; 
	case "Thursday": $blank = 4; break; 
	case "Friday": $blank = 5; break; 
	case "Saturday": $blank = 6; break; 
} 
//Determine how many days are in the current month 
$days_in_month = cal_days_in_month(0, $month, $year);

//Start building the table headers

 echo "<table border=1 width=294>";
 echo "<tr><th colspan=7> $title $year </th></tr>";
 echo "<tr><td width=42>Sun</td><td width=42>Mon</td><td
 width=42>Tue</td><td width=42>Wed</td><td width=42>Thu</td><td
 width=42>Fri</td><td width=42>Sat</td></tr>";

 $day_count = 1;      //goes up to 7
 echo "<tr>";

 //take care of blank days
 while ( $blank > 0 )
 {
 	echo "<td></td>";
 	$blank = $blank - 1;
	$day_count++;
 } 
$day_num = 1;            //set first day of month to 1 
//display all days in the month 
while ($day_num <= $days_in_month) 
{
	echo "<td> $day_num </td>"; 
	$day_num++; $day_count++; 
	if ($day_count > 7)              //Start a new row every week 
	{ 
		echo "</tr><tr>"; 
		$day_count = 1; 
	} 
}

//Finish the table with blank details if needed 
while ( $day_count >1 && $day_count <=7 ) 
{
	echo "<td> </td>"; 
	$day_count++; 
} 
echo "</tr></table>";
?>


<!--- form to add an event to calendar --->
<form action="calendar.php" method="add_event">
	Event Description: <input type="text" name="event"/> <br>

	Date: <select name="month">          //month dropdown
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>
	</select>

	<select name="day">                    //day dropdown
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
	</select>

	Year (mm/dd/yyyy): <input type="integer" name="year"/>
	<br>

	Time: <select name="hour">
		<option value="12">12</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
	</select>
	<select name="minute">
		<option value="0">00</option>
		<option value="1">01</option>
		<option value="2">02</option>
		<option value="3">03</option>
		<option value="4">04</option>
		<option value="5">05</option>
		<option value="6">06</option>
		<option value="7">07</option>
		<option value="8">08</option>
		<option value="9">09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
		<option value="32">32</option>
		<option value="33">33</option>
		<option value="34">34</option>
		<option value="35">35</option>
		<option value="36">36</option>
		<option value="37">37</option>
		<option value="38">38</option>
		<option value="39">39</option>
		<option value="40">40</option>
		<option value="41">41</option>
		<option value="42">42</option>
		<option value="43">43</option>
		<option value="44">44</option>
		<option value="45">45</option>
		<option value="46">46</option>
		<option value="47">47</option>
		<option value="48">48</option>
		<option value="49">49</option>
		<option value="50">50</option>
		<option value="51">51</option>
		<option value="52">52</option>
		<option value="53">53</option>
		<option value="54">54</option>
		<option value="55">55</option>
		<option value="56">56</option>
		<option value="57">57</option>
		<option value="58">58</option>
		<option value="59">59</option>
	</select>
	<select name="amOrPm">
		<option value="am">am</option>
		<option value="pm">pm</option>
	</select> <br>
	<input type="submit" value="Add Event"/>
</form>


</body>
</html>
