<?php echo $header ?>

<?php echo "<img src=\"" . base_url() . "/templates/group_label.png\" class=\"side\">"; ?>

<?php 
if( $authed ){
  echo "<div class=\"update\">"
    . "<img src=\"" . base_url() . "/uploads/images_(3).jpg\" class=\"profile_pic\">"
    . "<h1>Group Title: " . $group->name . "</h1>"
    . "Group id" . $group->id 
    . "<br><img src=\"" . base_url() ."templates/quote_left.png\">"
    . $group->description
    . "<img src=\"" . base_url() ."templates/quote_right.png\">"
    . "<br>"
    . "You have the current permissions with this group: " 
    . $permissions['read'] . " "
    . $permissions['write'] . " "
    . $permissions['execute'] . " "
    . "<br>" 
    ;
  if( $permissions['read'] && $permissions['write'] && $permissions['execute'] ){
    echo "You are an admin of this group.<br>";
  }
  echo ""
    . anchor('grouppage/join/'.$gid , "Join this group<br>") 
    . anchor('grouppage/leave/'.$gid , "Leave this group<br>")
    . "</div>"
    ;
  if( $permissions['read'] ){
    // Display all users in the group.
    echo "<div class=\"update\">"
      . "<h3><u>__List of Users__</u></h3>"
      ;
  foreach( $members as $member ):{
      echo "<h4>"
	. anchor('userpage/view/'.$member['uid'] , 
		 $this->User->get_name($member['uid']) 
		 )
	. "</h4>"
	;
    }
    endforeach;
    echo "<u>__________________</u>"
      . " "
      . "</div>"
      ;
  }
  else {
    echo "<div class=\"update\">"
      . "You do not yet have permission to view this group."
      . "</div>"
      ;
  }
 }
 else{
   echo "You must be logged in to view this page.";
 }
?>

<?php echo $footer ?>