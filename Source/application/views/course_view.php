
<form action="<?php echo base_url();?>course_new"><input type="submit" value="Added a new course"></form>

<div>
	<table style="width:1200px">
		<tr>
		 	<th>cid</th>
		    <th>coursename</th>
		    <th>description</th>    
		    <th>section</th>
		</tr>
		<?php 
		foreach ($query as $course)
		{
		?>
		<tr>
			<td><?php echo $course->cid; ?></td>
      		<td><?php echo $course->coursename; ?></td>
      		<td><?php echo $course->description; ?></td>
      		<td><?php echo $course->section; ?></td>
			<td>
			<a href="<?php echo base_url(); ?>course_update?cid=<?php echo $course->cid; ?>">Edit</a>
			<a href="<?php echo base_url(); ?>course/delete?cid=<?php echo $course->cid; ?>">Delete</a>
			</td>
		<tr>
		<?php
		}
		?>
	</table>
</div>