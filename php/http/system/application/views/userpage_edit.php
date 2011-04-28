<?php echo $header ?>
<?php echo $content ?>
<?php echo "<img src=\"" 
. base_url() 
  . "/templates/personal_label.png\" class=\"side\">" ?>

<?php
  echo "<div class=\"update\">"
  . "Editing personal profile. <br><br>"
  . form_open('userpage/edit')
  . "Full name: &nbsp&nbsp" . form_input( array('name'=>'fullname','value'=>$personal['fullname'],
				  'maxlength'=>'25','size'=>'20') )
  . "<br>"
  . "Description: " . form_input( array('name'=>'description','value'=>$personal['description'],
				  'maxlength'=>'256','size'=>'20') )
  . "<br>"
  . "Picture: &nbsp &nbsp &nbsp&nbsp" . form_input( array('name'=>'profile','value'=>$personal['profile'],
				    'maxlength'=>'20','size'=>'20') ) 
  . " " . anchor( 'upload' , "Upload") . " | " 
  . anchor( 'docs' , "Select") . "<br>"
  . "Email: &nbsp &nbsp &nbsp &nbsp " . form_input( array('name'=>'email','value'=>$personal['email'],
				  'maxlength'=>'20','size'=>'20') ) 
  . "<br>"
  . "Phone: &nbsp &nbsp &nbsp &nbsp " . form_input( array('name'=>'contact','value'=>$personal['contact'],
				  'maxlength'=>'20','size'=>'20') )
  . "<br>"
  . "Major: &nbsp &nbsp &nbsp &nbsp " . form_input( array('name'=>'major','value'=>$personal['major'],
				  'maxlength'=>'20','size'=>'20') )
  . "<br>"
  . form_submit('submit', 'Modify')
  . form_close()
  
  . anchor( 'userpage/personal', "Back" )
  . "</div>"
  ;
  
?>

<?php echo $footer ?>