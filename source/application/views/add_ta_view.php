<?php include './assets/template/header.php'; ?>
<form action="<?php echo base_url();?>add_ta"><input type="submit" value="Home"></form>
<h1>Add a TA to a course</h1>
<hr>
<h3>Please fill out TA's information</h3>

<table>
<form method="POST" action="<?php echo base_url();?>add_ta">
<tr><td>
Pawprint: </td><td><input type="text" name="pawprint" size="25"  required><font color="red">*</font>
</td></tr>
<tr><td>
Student ID: </td><td><input type="text" name="studentid" size="25" required><font color="red">*</font>
</td></tr>
<tr><td>
Course ID: </td><td><input type="text" name="courseid" size="25"  required><font color="red">*</font>
</td></tr>
<tr><td>
First Name: </td><td><input type="text" name="firstname" size="25">
</td></tr>
<tr><td>
Last Name: </td><td><input type="text" name="lastname" size="25">
</td></tr>
<tr><td></td>
	<td><font color="red">*</font> is required filed</td>
</tr>

<tr><td></td>
<td>
<input type="submit" value="Add a TA">
</td></tr>
</table>
</form>

<?php echo $msg;?>
<?php include './assets/template/footer.php'; ?>
