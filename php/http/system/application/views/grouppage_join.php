<?php echo $header ?>

<?php 
echo "<img src=\"".base_url()."/templates/group_label.png\" class=\"side\">"
  . "<div class=\"update\">"
  ;
?>

<?php 
if( $authed ){
  if( $successful ){
    echo "You have joined "
      . $this->Group->get_name( $gid )
      . "<br><br>"
      . anchor( 'grouppage/view/'.$gid , "Return to group page" )
      ;
  }
  else {
    echo "You are already a member of this group.<br><br>"
      . anchor( 'grouppage/view/'.$gid , "Return to group page" )
      ;
  }
 }
 else{
   echo "You must be logged in to view this page.";
 }
?>

<?php 
echo "</div>";
?>

<?php echo $footer ?>