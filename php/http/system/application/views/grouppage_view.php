<?php echo $header ?>



<?php $query = $this->db->query("SELECT * FROM user WHERE id = 1")->result(); 

echo $content;

echo "Displaying user information for groupid: " . $query[0]->id;
echo "\n";
echo $query[0]->un ." ". $query[0]->pw;

?>

<?php echo $footer ?>