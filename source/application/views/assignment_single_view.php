<?php include './assets/template/header.php'; ?>
<?php echo $msg;?>
<div>
	<table style="width:1200px">
		<tr>
			<th>Course ID</th>
		 	<th>Assingment ID</th>
		 	<th>Assignment Name</th>
		    <th>Due date</th>
		    <th>Description</th>
		    <th></th>    
		    
		</tr>
		<?php 
		foreach ($assignments as $assignment)
		{
		?>
		<tr>
			<td><?php echo $assignment->courseid; ?></td>
			<td><?php echo $assignment->aid; ?></td>
			<td><?php echo $assignment->aname; ?></td>
      		<td><?php echo $assignment->duedate; ?></td>
      		<td><?php echo $assignment->description; ?></td>
			<td>
			<a href="<?php echo base_url(); ?>collect/download_all?courseid=<?php echo $assignment->courseid; ?>&aname=<?php echo $assignment->aname; ?>">Download all students' submission</a>
			</td>
		<tr>
		<?php 
		}
		?>
	</table>
</div>

<hr>
<h3>This is a list of all submission of this assignment</h3>
	<?php 
	foreach ($stack as $items)
	{
		$pieces = explode("/", $items);
		$pawprint = $pieces[3];
		$filename = $pieces[4];
	?> 
	<table>
		<tr>
			<th>Pawprint</th>
			<th>File name</th>
			<th>Action</th>
		</tr>
		<tr>
			<td><?php echo $pawprint;?></td>
			<td><?php echo $filename;?></td>
			<td>
				<a href="<?php echo base_url(); ?>collect/download_single?filepath=<?php echo $items; ?>&filename=<?php echo $filename; ?>">Download</a>
				<a href="<?php echo base_url(); ?><?php echo $items; ?>">Open</a>
			</td>
		</tr>
	</table>
	<?php 
	}
	?>
		

