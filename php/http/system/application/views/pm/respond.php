<?php
/*
needs: form validation, upload of photo
*/

echo $this->pdata['header'];
echo $this->pdata['content'];

echo "<font size =6 color = '#474747'>Respond!</font>";

echo form_open('pm/send_message');

echo "<br />";


echo form_label('To: ', 'to_id');
echo $usernames[$message->from_id];
echo form_hidden('to_id',$message->from_id);

echo "<br /><br />";



echo form_label('Subject: ', 'subject');

$input = array('name' => 'subject', 'id' => 'subject', 'size'=> 40, 'value' => "RE: ". $message->subject);
echo form_input($input);

echo "<br /><br />";


echo form_label('Original message: ','original');
echo $message->message;

echo "<br /><br />";


echo form_label('Response: ', 'message');
echo "<br />";

$input = array('name' => 'message', 'id' => 'message', 'rows'=> 10, 'cols' => 40);
echo form_textarea($input);

echo form_hidden('respond_id',$respondid);

echo "<br /><br />";


echo form_submit('send','send');

echo form_close();

echo $this->pdata['footer'];


?>