<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>

<div class="update">
	
	<?php echo "
	<img src = \"" . base_url() ."/templates/profile_label.png\">
					User Info
				<br><br>
				Stuff we need to know. 
				<br><br>
				<b>Viewable with Login</b>
				<ul>
					<li>NAME
					<l 	i>Profile Picture
					<li>Group Subscriptions
					<li>Age/Gender/DOB
					<li>Summary
					<li>Email -> IM 
					<li>Photos
					<li>Files unless these are attached to a group
					<li>Backend Last Logged In (Database Team)
					<li>Joined: MM/DD/YYYY
				</ul>
				<br><br>
				<b>Viewable without Login</b>
				<ul>
					<li>NAME
					<li>Age
					<li>Profile Picture
					<li>Summary
				</ul>	

				Stretching the View to make sure the CSS isn't broken again
								<b>Viewable with Login</b>
				<ul>
					<li>NAME
					<li>Profile Picture
					<li>Group Subscriptions
					<li>Age/Gender/DOB
					<li>Summary
					<li>Email -> IM 
					<li>Photos
					<li>Files unless these are attached to a group
					<li>Backend Last Logged In (Database Team)
					<li>Joined: MM/DD/YYYY
				</ul>
				<br><br>
				<b>Viewable without Login</b>
				<ul>
					<li>NAME
					<li>Age
					<li>Profile Picture
					<li>Summary
				</ul>						
</div>
"?>

<?php echo $this->pdata['footer'] ?>
