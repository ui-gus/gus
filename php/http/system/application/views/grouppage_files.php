<?php echo $header ?>

<?php echo "<img src=\"" . base_url() . "/templates/group_label.png\" class=\"side\">"; ?>

<?php 
echo "<div class=\"update\">";
if( $authed ){
  echo "<u> Group Files </u><br><br>";
  
  echo "<table id=\"user\"><tr>";
  $i = 1;
  $file = '';
  $img = '';
 foreach( $filelist as $key ):{
    if( $i == 1 ){
      echo "<tr>";
    }
    else {
      echo "<td>";
      
      if( strlen( $key['filename'] ) > 8 ){
	$file = substr( $key['filename'], 0, 8 );
	$file .= "...";
      } 
      
    }
    
    echo $key['filename'] . " " . $key['image'] . "<br>";
  }
  endforeach;
  
 }
 else {
   echo "You must be logged in to view this page.";
 }
echo "</div>";
?>

<?php
echo "<img src=\"".base_url()."/uploads/khaaan.png\" width=\"50\" height=\"50\" style=\"border:0px none\" onerror=\"this.src='".base_url()."/uploads/soon.png'\" title=\"a\" />\n";
?>

<!-- <img src="/uploads/khaaan.png" width="50" height="50" style="border:0px none" onerror="this.src='/uploads/soon.png'" title="a" /> -->

<?php echo $footer ?>