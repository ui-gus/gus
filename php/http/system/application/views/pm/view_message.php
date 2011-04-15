<?php

//needs threading for responses/etc

echo $this->pdata['header'];

echo "<font size =6 color = '#474747'>Your Inbox</font>";

echo "<br /><br />";

echo anchor("pm/index", "inbox   |") ;
echo anchor("pm/sent", "sent   |");
echo anchor("pm/archive", "archives");

echo "<br /><br />";


echo "Subject: <b>". $msg->subject ."</b>";
echo "<br /><br />";

echo "From: ". $this->user->get_name($msg->from_id);
echo "<br /><br />";

echo "To: ". $usernames[$msg->to_id];
echo "<br /><br />";

echo "Sent: ". $msg->created;
echo "<br /><br />";

echo "Message: ". $msg->message;
echo "<br /><br />";

echo anchor("pm/respond/".$msg->id, "respond   |");
echo anchor("pm/inbox_message/".$msg->id, "move to inbox   |"); 
echo anchor("pm/archive_message/".$msg->id, "archive this"); 
echo $this->pdata['footer'];

?>