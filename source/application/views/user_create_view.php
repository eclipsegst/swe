<h1>Add a new user</h1>

<table>
<form method="POST" action="<?php echo base_url();?>user_create/insert">
<tr><td>
UID: </td><td><input type="text" name="uid" size="25">
</td></tr>
<tr><td>
Last Name: </td><td><input type="text" name="lastname" size="25">
</td></tr>
<tr><td>
First Name: </td><td><input type="text" name="firstname" size="25">
</td></tr>
<tr><td>
Pawprint: </td><td><input type="text" name="pawprint" size="25">
</td></tr>
<tr><td>
Password: </td><td><input type="text" name="password" size="25">
</td></tr>
<tr><td>
Role: </td><td><input type="text" name="role" size="25">
</td></tr>
<tr><td>
<input type="submit" value="submit">
</tr></td>
</table>
</form>

<?php echo $msg;?>
<form action="<?php echo base_url();?>user"><input type="submit" value="Go to user page"></form>