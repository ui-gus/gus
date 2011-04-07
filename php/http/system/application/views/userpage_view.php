<?php echo $header ?>

<?php echo "<img src=\"" 
             . base_url() 
             . "/templates/profile_label.png\" class=\"side\">" ?>

<?php
if( $authed ){
  echo "<div class=\"update\">"
    . "<img src=\"" . base_url() . "/uploads/colby.png\" class=\"profile_pic\">"
    . "<h1> User Profile:" . $name . "</h1>"
    . "User #" . $id . "<br>"
    . "Full name: " . $personal['fullname']
    . "<img src=\"" . base_url() ."templates/quote_left.png\"> "
    . $personal['description']
    . "<img src=\"" . base_url() ."templates/quote_right.png\">" . "<br>"
    . "email : " . $personal['email'] . "<br>"
    . "phone : " . $personal['contact'] . "<br>"
    . "major : " . $personal['major'] . "<br>"
    . "</div>"
    
    // Display all groups the user is in.
    . "<div class=\"update\">"
    . "<h3><u>__List of Groups__</u></h3>"
    ;
    
 foreach( $grouplist as $key ):{
    echo "<h4>"
      . anchor('grouppage/view/'.$key['gid'] ,
	       $this->Group->get_name($key['gid'])
	       )
      . "</h4>"
      ;
  }
  endforeach;

  echo "<u>___________________</u>"
    . "</div>"
    ;
  
 }
 else {
   echo "You must be logged in to view this page.";
 }
?>

<?php echo $footer ?>