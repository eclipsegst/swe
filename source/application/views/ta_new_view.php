<h3>Add a TA to a course</h3>
<table>
<form method="POST" action="<?php echo base_url();?>ta_new/insert">
<tr><td>
Course ID: </td><td><input type="text" name="courseid" size="25" value ="<?php echo $courseid;?>">
</td></tr>
<tr><td>
TA ID: </td><td><input type="text" name="uid" size="25">
</td></tr>
<tr><td>
TA Pawprint: </td><td><input type="text" name="pawprint" size="25">
</td></tr>
<tr><td>
Temporary Password: </td><td><input type="text" name="password" size="25">
</td></tr>
<tr><td>
<input type="submit" value="submit">
</tr></td>
</table>
</form>

<?php echo $msg;?>
