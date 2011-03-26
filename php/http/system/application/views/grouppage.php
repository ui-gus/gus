<?php echo $header ?>

<?php 
echo "<img src=\"".base_url()."/templates/group_label.png\" class=\"side\">" 
  . "<div class=\"update\">"
  ;
?>

<?php 
if( $authed ){
  echo "<u>All Groups</u><br>"
    ;
 foreach( $groups as $group ):{
    //Display all groups and link to their group/view.
    echo anchor('grouppage/view/'.$this->Group->get_id($group) , $group)
      ."<br>"
      ;
  }
  endforeach;
 }
 else{
   echo "You must be logged in to view this page.";
 }
?>

<?php 
echo "</div>";
?>
 
<?php echo $footer ?>
