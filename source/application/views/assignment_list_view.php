<h3>This is a list of all submission of this assignment</h3>
	
<table>
	<tr>
		<th>Pawprint</th>
		<th>Course</th>
		<th>Assignment</th>
		<th>File name</th>
		<th>Action</th>
	</tr>
	<?php 
	foreach ($stack as $items)
	{
		$pieces = explode("/", $items);
		$courseid = $pieces[2];
		$aname = $pieces[3];
		$pawprint = $pieces[4];
		$filename = $pieces[5];
	?> 
	<tr>
		<td><?php echo $pawprint;?></td>
		<td><?php echo $courseid;?></td>
		<td><?php echo $aname;?></td>
		<td><?php echo $filename;?></td>
		<td>
			<a href="<?php echo base_url(); ?>collect/download_single?filepath=<?php echo $items; ?>&filename=<?php echo $filename; ?>">Download</a>
			<a href="<?php echo base_url(); ?><?php echo $items; ?>">Open</a>
		</td>
	</tr>
	<?php 
	}
	?>
</table>
	