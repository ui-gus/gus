<?php echo $header ?>
<?php echo $content ?>
<!-- <?php echo "<img src=\"" . base_url() . "/templates/personal_label.png\" class=\"side\">" ?> -->

<?php
  echo "<div class=\"update\">"
  . $error
  . "<br>"
  . "Registration Form <br>" 
  . form_open('registration')
  . "<br>"
  . "Enter a valid University of Idaho email address.<br>"
  . " Ex: user1234@vandals.uidaho.edu<br>"
  . form_input( array('name'=>'email','value'=>$_POST['email'],
				  'maxlength'=>'50','size'=>'25') )
  . "<br>"
  . "Re-enter email address.<br>"
  . form_input( array('name'=>'email2','value'=>$_POST['email2'],
				  'maxlength'=>'50','size'=>'25') )
  . "<br><br>"
  . "Select a password.<br>"
  . form_password( array('name'=>'pw','value'=>"",
				  'maxlength'=>'25','size'=>'25') )
  . "<br>"
  . "Re-enter password.<br>"
  . form_password( array('name'=>'pw2','value'=>"",
				  'maxlength'=>'25','size'=>'25') )
  . "<br><br>"
  . form_submit('submit', 'Register')
  
  . "<br>"
  . "</div>"
  ;
  
?>

<?php echo $footer ?>