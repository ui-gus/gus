<?php
//needs threading for responses/etc

echo $this->pdata['header'];
echo $this->pdata['content'];

echo "<font size =6 color = '#474747'>Your Sent Messages</font>";

echo "<br /><br />";

echo anchor("pm/compose", "new   |");
echo anchor("pm/index", "inbox   |");
echo "sent   |";
echo anchor("pm/archive", "archives");

echo "<br /><br />";

$TABLE = array();

//time format!
$format = "%m/%d/%Y %h:%i %a";
if (count($messages)){
	
	foreach ($messages as $key => $msg){
		$stamp = mysql_to_unix($msg->created);
		$TABLE[] = $this->User->get_name($msg->from_id);	
		$TABLE[] = $this->User->get_name($msg->to_id);
		$TABLE[] = anchor("pm/view_message1/" .$msg->id, $msg->subject);
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
echo $this->pdata['footer'];

?>