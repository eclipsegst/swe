
<form action="<?php echo base_url();?>course_new"><input type="submit" value="Added a new course"></form>

<div>
	<table style="width:1200px">
		<tr>
		 	<th>cid</th>
		 	<th>courseid</th>
		    <th>coursename</th>
		    <th>description</th>    
		    
		</tr>
		<?php 
		foreach ($query as $course)
		{
		?>
		<tr>
			<td><?php echo $course->cid; ?></td>
			<td><?php echo $course->courseid; ?></td>
      		<td><?php echo $course->coursename; ?></td>
      		<td><?php echo $course->description; ?></td>
			<td>
			<a href="<?php echo base_url(); ?>course_update?cid=<?php echo $course->cid; ?>">Edit</a>
			<a href="<?php echo base_url(); ?>assignment_new?courseid=<?php echo $course->courseid; ?>">Add an assignment</a>
			</td>
		<tr>
		<?php
		}
		?>
	</table>
</div>
