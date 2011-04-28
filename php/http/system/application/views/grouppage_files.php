<?php echo $header ?>

<?php echo "<img src=\"" . base_url() . "/templates/group_label.png\" class=\"side\">"; ?>

<?php 
echo "<div class=\"update\">";
if( $authed ){
  echo "<h3><u> Group Files </u></h3>"
    . anchor( 'upload', "Upload a File" ) . "<br>"
    . anchor( 'grouppage/view/'.$gid , "Back" ) . "<br>"
    ;
  
  echo "<table id=\"user\"><tr>";
  $i = 1;
  $file = '';
  $img = '';

  //echo base_url() . "uploads/" . $key['filename'] . "<br>";
  
 foreach( $filelist as $key ):{
    if( $i == 1 ){
      echo "<tr>";
    }
    echo "<td>";
      
    $img = "<img src=\"".base_url()."uploads/".$key['filename']."\" width=\"100\" height=\"100\" "
      ."style=\"border:0px none\" onerror=\"this.src='".base_url()
      ."/templates/null_profile.png'\">";
    
    if( strlen( $key['filename'] ) > 12 ){
      $file = substr( $key['filename'], 0, 12 );
      $file .= "...";
    } 
    else {
      $file = $key['filename'];
    }
    echo anchor('docs/view/'.$key['filename'] , $img ) . "<br>" 
      . $file . "<br>";  
    echo "</td>";
    
    if( $i == 6 ){ 
      echo "</tr><tr>";
      $i = 1;
    }
    $i++;
  }
endforeach;
 } 
 else {
   echo "You must be logged in to view this page.";
 }
 
echo "</div>";
?>

<!-- <?php
echo "<img src=\"".base_url()."/uploads/khaaan.png\" width=\"50\" height=\"50\" style=\"border:0px none\" onerror=\"this.src='".base_url()."/uploads/soon.png'\" title=\"a\" />\n";
?> -->

<!-- <img src="/uploads/khaaan.png" width="50" height="50" style="border:0px none" onerror="this.src='/uploads/soon.png'" title="a" /> -->

<?php echo $footer ?>