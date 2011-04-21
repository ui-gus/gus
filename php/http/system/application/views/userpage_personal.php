<?php echo $header ?>

<?php echo "<img src=\"" 
             . base_url() 
             . "/templates/personal_label.png\" class=\"side\">" ?>

<?php
if( $authed ){
  echo "<div class=\"update\">"
    . "<img src=\"" . base_url() . "/uploads/" 
    . $personal['profile'] 
    . "\" class=\"profile_pic\">"
    . "<h1>" . $name . "</h1>"
    . "Full name: " . $personal['fullname'] . "<br>"
    . "<img src=\"" . base_url() ."templates/quote_left.png\"> "
    . $personal['description']
    . "<img src=\"" . base_url() ."templates/quote_right.png\">"
    . "<br>"
    . "email : " . $personal['email'] . "<br>"
    . "phone : " . $personal['contact'] . "<br>"
    . "major : " . $personal['major'] . "<br>"
    . anchor( 'userpage/edit' , "Edit my Profile" )
    . "</div>"
    . "<div class=\"update\">"
    . "<h3><u> &nbsp &nbsp Member of: &nbsp &nbsp </u></h3>"
    ;
    
 foreach( $grouplist as $key ):{
    echo 
       anchor('grouppage/view/'.$key['gid'] ,
	       $this->Group->get_name($key['gid'])
	       )
		. 
		"<br>" 
      ;
  }
  endforeach;

  echo "</div>" 
    ;
  
 }
 else {
   echo "You must be logged in to view this page.";
 }
?>

<?php echo $footer ?>