<?php echo $header ?>

<?php 
//"<img src=\"".base_url()."/templates/group_label.png\" class=\"side\">" 
echo "<div class=\"update\">"
  ;
?>

<?php 
if( $authed ){
 
  echo ""
    . "<table><tr>" 
    . "<td><u>My Groups</u><br>"
    ;
 foreach( $grouplist as $key ):{
    echo "<br>"
      . anchor('grouppage/view/'.$key['gid'] , 
	       $this->Group->get_name($key['gid']))
      ;
  }
  endforeach;
  echo "</td>";
  
  echo "<td><u>All Groups</u><br>"
    ;
 foreach( $groups as $group ):{
    //Display all groups and link to their group/view.
    echo "<br>"
      . anchor('grouppage/view/'.$this->Group->get_id($group) , $group)
      ;
  }
  endforeach;
  echo "</td></tr></table>";
 }
 else{
   echo "You must be logged in to view this page.";
 }
?>

<?php 
echo "</div>";
?>
 
<?php echo $footer ?>
