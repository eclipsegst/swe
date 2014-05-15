<?php include './assets/template/header_student.php'; ?>
<?php 
foreach ($courses as $course)
{
	if(true){
?>

<h1>Welcome to <?php echo $course->courseid; ?></h1>
<form method="POST" action="">
<table>

<tr><td>
CID: 
</td><td><?php echo $course->cid;?>
</td></tr>
<tr><td>
Course ID: 
</td><td><?php echo $course->courseid; ?>
</td></tr>
<tr><td>
Course Name: 
</td><td><?php echo $course->coursename; ?>
</td></tr>
<tr><td>

Description: 
</td><td><?php echo $course->description; ?>
</td></tr>


</table>
</form>


		<?php }
		} 
		?>
		<?php echo $msg;?>
<div>
	<table style="width:1200px">
		<tr>
			<th></th>
			<th>Course ID</th>
		 	<th>Assingment ID</th>
		 	<th>Assignment Name</th>
		    <th>Due date</th>
		    <th>Description</th>    
		    
		</tr>
		<?php 
		foreach ($assignments as $assignment)
		{
			if( $assignment->courseid== $courseid){
		?>
		<tr><td><a href="<?php echo base_url(); ?>assignment_single?courseid=<?php echo $assignment->courseid; ?>&aname=<?php echo $assignment->aname; ?>">Select</a>
			</td>
			<td><?php echo $assignment->courseid; ?></td>
			<td><?php echo $assignment->aid; ?></td>
			<td><?php echo $assignment->aname; ?></td>
      		<td><?php echo $assignment->duedate; ?></td>
      		<td><?php echo $assignment->description; ?></td>
			<td>
			</td>
		<tr>
		<?php }
		}
		?>
	</table>
</div>

<?php include './assets/template/footer_student.php'; ?>