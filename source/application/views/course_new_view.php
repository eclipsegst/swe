<h1>Add a new course</h1>

<table>
<form method="POST" action="<?php echo base_url();?>course_new/insert">
<tr><td>
Course ID: </td><td><input type="text" name="courseid" size="25">
</td></tr>
<tr><td>
Course Name: </td><td><input type="text" name="coursename" size="25">
</td></tr>
<tr><td>
Description: </td><td><input type="text" name="coursedescription" size="25">
</td></tr>
<tr><td>
Section: </td><td><input type="text" name="section" size="25">
</td></tr>
<tr><td>

<input type="submit" value="submit">
</tr></td>
</table>
</form>

<?php echo $msg;?>
<form action="<?php echo base_url();?>course"><input type="submit" value="Go to course page"></form>