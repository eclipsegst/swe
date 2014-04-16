<h1>Add a new assignment</h1>

<table>
<form method="POST" action="<?php echo base_url();?>assignment_new/insert">
<tr><td>
Course ID: </td><td><input type="text" name="courseid" size="25" value = "<?php echo $courseid;?>">
</td></tr>
<tr><td>
Assignment Name: </td><td><input type="text" name="aname" size="25">
</td></tr>
<tr><td>
Due Date: </td><td><input type="text" name="duedate" size="25">
</td></tr>
<tr><td>
Description: </td><td><input type="text" name="description" size="25">
</td></tr>
<tr><td>

<input type="submit" value="submit">
</tr></td>
</table>
</form>

<?php echo $msg;?>
<form action="<?php echo base_url();?>assignment"><input type="submit" value="Go to assignment page"></form>