<?php
/*
needs: form validation, upload of photo
*/


echo $this->pdata['header'];
echo $this->pdata['content'];
echo $this->pdata['tinyMCE'];

echo "<font size =6 color = '#474747'>Compose a Message!</font>";

echo "<br /><br />";

echo form_open('pm/send_message');

echo form_label('To', 'to_id');
unset($usernames[$this->Page->get_uid()]);
echo "<br />";
echo form_dropdown('group_id', $groupnames);
//echo form_dropdown('to_id', $this->pm_model->get_groupuserlist(5));
echo form_dropdown('to_id', $this->User->get_userlist());

echo "<br /><br />";

echo form_label('Subject', 'subject');
echo "<br /";
$input = array('name' => 'subject', 'id' => 'subject', 'size'=> 40);
echo form_input($input);
echo "<br /><br />";

echo form_label('Message', 'message');
echo "<br />";

$input = array('name' => 'message', 'id' => 'message', 'rows'=> 10, 'cols' => 40);
echo form_textarea($input);
echo "<br />";

echo form_submit('send','send');
echo form_close();

echo "<br />";
echo anchor("pm/inbox" , "go back");

echo $this->pdata['footer'];

?>
