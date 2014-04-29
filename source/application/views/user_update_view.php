<?php include './assets/template/header.php'; ?>
<h1>Update a user</h1>
<form method="POST" action="<?php echo base_url();?>user_update/update
	">
<table>
		<?php 
		foreach ($query as $user)
		{
		?>
<tr><td>
UID: 
</td><td><input type="text" value="<?php echo $user->uid;?>" name="uid" size="25" >
</td></tr>
<tr><td>
Last Name: 
</td><td><input type="text" value="<?php echo $user->lastname; ?>" name="lastname" size="25">
</td></tr>
<tr><td>

First Name: 
</td><td><input type="text" value="<?php echo $user->firstname; ?>" name="firstname" size="25">
</td></tr>

<tr><td>
Pawprint: 
</td><td><input type="text" value="<?php echo $user->pawprint; ?>" name="pawprint" size="25">
</td></tr>
<tr><td>
Password: 
</td><td><input type="text" value="<?php echo $user->password; ?>" name="password" size="25">
</td></tr>
<tr><td>
Role: 
</td><td><input type="text" value="<?php echo $user->role; ?>" name="role" size="25">
</td></tr>

		<?php
		}
		?>
<tr><td>
<input type="submit" value="submit">
</td></tr>

</table>
</form>
<?php echo $msg;?>
<form action="<?php echo base_url();?>user"><input type="submit" value="Go to user list page"></form>
<?php include './assets/template/footer.php'; ?>
