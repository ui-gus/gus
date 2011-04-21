<?php echo $header ?>

<?php 
echo "<img src=\"".base_url()."/templates/profile_label.png\" class=\"side\">"
  . "<div class=\"update\">"
  ;
?>



<?php
echo "<div class=\"update\">";
if( $authed ){
  echo anchor( 'userpage/personal', "Personal Page" );
 }
 else {
   echo "You must be logged in to view this page."; 
 }
?>

<?php 
echo "</div>";
?>

<?php echo $footer ?>
