<?php

//needs threading for responses/etc

echo heading("Your Inbox",2);
echo anchor("pm/index", "inbox") . nbs(2) . "|" . nbs(2);
echo anchor("pm/sent", "sent") . nbs(2) . "|" . nbs(2);
echo anchor("pm/archive", "archives");

echo br(2);
echo "Subject: <b>". $msg->subject ."</b>";
echo br();
echo "From: ". $usernames[$msg->from_id];
echo br();
echo "To: ". $usernames[$msg->to_id];
echo br();
echo "Sent: ". $msg->created;
echo br(2);
echo auto_typography($msg->message);
echo br();
echo anchor("pm/respond/".$msg->id, "respond");
echo nbs(2) . "|" . nbs(2);
echo anchor("pm/inbox_message/".$msg->id, "move to inbox"); 
echo nbs(2) . "|" . nbs(2);
echo anchor("pm/archive_message/".$msg->id, "archive this"); 
echo "<hr/>";
echo br();

?>