<?php echo $header ?>



<?php $query = $this->db->query("SELECT * FROM user WHERE id = 4")->result(); 

echo "Displaying user information for userid: " . $query[0]->id;
echo "\n";
echo $query[0]->un ." ". $query[0]->pw ." ". $query[0]->email;

?>

<?php echo $footer ?>
