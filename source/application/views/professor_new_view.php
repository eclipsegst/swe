
<div>
	<table style="width:1200px">
		<tr>
		 	<th>cid</th>
		 	<th>courseid</th>
		    <th>coursename</th>
		    <th>professor</th>    
		    
		</tr>
		<?php 
		foreach ($query as $course)
		{
			
		?>
		<tr>
			<td><?php echo $course->cid; ?></td>
			<td><?php echo $course->courseid; ?></td>
      		<td><?php echo $course->coursename; ?></td>
      		<?php
      		foreach($user as $professor){
				if($course->courseid == $professor->courseid){
					?>
      		<td><?php echo $professor->pawprint; ?></td>
			<td>
			<a href="<?php echo base_url(); ?>course_update?cid=<?php echo $course->cid; ?>">Edit</a>
			</td>
		<tr>
		<?php }
			}
		}
		?>
	</table>
</div>

<h3>Add a professor to a course</h3>
<table>
<form method="POST" action="<?php echo base_url();?>professor_new/insert">
<tr><td>
Course ID: </td><td><input type="text" name="courseid" size="25">
</td></tr>
<tr><td>
Professor ID: </td><td><input type="text" name="uid" size="25">
</td></tr>
<tr><td>
Professor Pawprint: </td><td><input type="text" name="pawprint" size="25">
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
