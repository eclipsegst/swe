<h1>Update a course</h1>
<form method="POST" action="<?php echo base_url();?>course_update/update
	">
<table>
		<?php 
		foreach ($query as $course)
		{
		?>

<tr><td>
CID: 
</td><td><input type="text" value="<?php echo $course->cid; ?>" name="cid" size="25">
</td></tr>
<tr><td>
Course ID: 
</td><td><input type="text" value="<?php echo $course->courseid; ?>" name="courseid" size="25">
</td></tr>
<tr><td>
Course Name: 
</td><td><input type="text" value="<?php echo $course->coursename; ?>" name="coursename" size="25">
</td></tr>
<tr><td>

Description: 
</td><td><input type="text" value="<?php echo $course->description; ?>" name="description" size="25">
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
<form action="<?php echo base_url();?>course"><input type="submit" value="Go to course list page"></form>