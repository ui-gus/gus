<?php
//needs threading for responses/etc


echo heading("Your Sent Messages",2);
echo anchor("pm/index", "inbox") . nbs(2) . "|" . nbs(2);
echo "sent" . nbs(2) . "|" . nbs(2);
echo anchor("pm/archive", "archives");

$TABLE = array();

//time format!
$format = "%m/%d/%Y %h:%i %a";


echo br(2);
if (count($messages)){
	foreach ($messages as $key => $msg){
		$stamp = mysql_to_unix($msg->created);
		$TABLE[] = $usernames[$msg->from_id];
		$TABLE[] =	$usernames[$msg->to_id];
		$TABLE[] = anchor("pm/view_message/".$msg->id, $msg->subject);
		$TABLE[] =  mdate($format,$stamp);
	}


	$tmpl = array (
		'table_open'  => "<table class='messages'><tr valign='bottom'><th>From</th><th>To</th><th>Subject</th><th>Date/Time</th></tr>",
		'row_start'   => "<tr valign='top'>",
	);
	$this->table->set_template($tmpl);
	$this->table->set_empty("&nbsp;");
	$pretty = $this->table->make_columns($TABLE,4);
	
	echo $this->table->generate($pretty);

}else{
	echo "No messages in sent folder!";

}

?>