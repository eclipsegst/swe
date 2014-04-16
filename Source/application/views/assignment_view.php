
<form action="<?php echo base_url();?>assignment_new"><input type="submit" value="Added a new assignment"></form>

<div>
	<table style="width:1200px">
		<tr>
			<th>Course ID</th>
		 	<th>Assingment ID</th>
		 	<th>Assignment Name</th>
		    <th>Due date</th>
		    <th>Description</th>    
		    
		</tr>
		<?php 
		foreach ($query as $assignment)
		{
		?>
		<tr><td><?php echo $assignment->courseid; ?></td>
			<td><?php echo $assignment->aid; ?></td>
			<td><?php echo $assignment->aname; ?></td>
      		<td><?php echo $assignment->duedate; ?></td>
      		<td><?php echo $assignment->description; ?></td>
			<td>
			<a href="<?php echo base_url(); ?>assignment_update?aid=<?php echo $assignment->aid; ?>">Edit</a>
			<a href="<?php echo base_url(); ?>create">Add</a>
			</td>
		<tr>
		<?php
		}
		?>
	</table>
</div>