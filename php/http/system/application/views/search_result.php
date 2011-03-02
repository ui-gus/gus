<?php echo $this->pdata['header'] ?>

<?php echo $this->pdata['content'] ?>

Search Results:
<br><br>
<table>
	<tr>
		<th><b>By Username</b></th>
	</tr>
<?php 
foreach($this->pdata['results'] as $key ):{
  echo "<tr><td><p>"
    .anchor("userpage/view/".$key['id'] , "".$key['un'])
    ."</p></td></tr>";
  }
endforeach;
?>
</table>

<?php echo $this->pdata['footer'] ?>