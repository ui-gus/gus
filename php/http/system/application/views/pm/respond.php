<?php
/*
needs: form validation, upload of photo
*/

//print_r($message);

echo heading("Respond!", 2);
echo form_open('pm/send_message');

echo form_label('To', 'to_id');
echo "<b>".$usernames[$message->from_id] ."</b>";
echo form_hidden('to_id',$message->from_id);

echo form_label('Subject', 'subject');
$input = array('name' => 'subject', 'id' => 'subject', 'size'=> 40, 'value' => "RE: ". $message->subject);
echo form_input($input);


echo form_label('Original message','original');
echo $message->message;

echo form_label('Response', 'message');
$input = array('name' => 'message', 'id' => 'message', 'rows'=> 10, 'cols' => 40);
echo form_textarea($input);

echo form_hidden('respond_id',$respondid);

echo br(2);
echo form_submit('send','send');

echo form_close();

?>