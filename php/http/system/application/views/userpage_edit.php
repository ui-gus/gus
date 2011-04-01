<?php echo $header ?>
<?php echo $content ?>
<?php echo "<img src=\"" 
. base_url() 
  . "/templates/personal_label.png\" class=\"side\">" ?>

<?php
  echo "<div class=\"update\">"
  . "Editing personal profile. <br><br>"
  . "Information <br>" 
  . form_open('userpage/edit')
  . "Profile Pic:      " . "<br>"
  . "Email: " . form_input( array('name'=>'email','value'=>'a','maxlength'=>'20','size'=>'20') ) . "<br>"
  . "Phone: " . form_input( array('name'=>'phone','value'=>'b','maxlength'=>'20','size'=>'20') ) . "<br>"
  . "Major: " . form_input( array('name'=>'major','value'=>'c','maxlength'=>'20','size'=>'20') ) . "<br>"
  //. "Email : ". form_input('password', set_value('password'))
  . form_submit('submit', 'Modify')
  . form_close()
  
  . anchor( 'userpage/personal', "Back" )
  . "</div>"
  ;


  
?>

<?php echo $footer ?>