<?php echo $header ?>

<?php echo "<img src=\"" 
. base_url() 
  . "/templates/personal_label.png\" class=\"side\">" ?>

<?php
  echo "<div class=\"update\">"
  . "Editing personal profile. <br><br>"
  . "Information <br>" 
  . "Name : " . form_input( $style ) . "<br>"
  . "Age : " . form_input( $style ) . "<br>"
  . "Email : " . form_input( $style ) . "<br>"
  . "Major : " . form_input( $style ) . "<br>"
  . "<br>" . form_submit('search', 'Search')
  . "<br><br>"
  . "Yeah, these don't actually do anything yet.<br>"
  . anchor( 'userpage/personal', "Back" )
  . "</div>"
  ;


  
?>

<?php echo $footer ?>