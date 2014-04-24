<?php include './assets/template/header.php'; ?>
<a href="<?php echo base_url();?>login/do_logout/">Logout</a>| Welcome <?php echo $this->session->userdata('firstname');?></a>
<h1> Welcome to TA page </h1>

<form action="<?php echo base_url();?>course_new"><input type="submit" value="Added a new course"></form>

<div>
	<table style="width:300px">
		<tr>
		 	
		 	<th>courseid</th>
		 	<th>TA Pawprint</th>
		 	<th>Action</th>
  
		    
		</tr>
		<?php 
		foreach ($query as $course)
		{
		?>
		<tr>
			<td><?php echo $course->courseid; ?></td>
			<td><?php echo $pawprint; ?></td>
			<td>
			<a href="<?php echo base_url(); ?>course_single?courseid=<?php echo $course->courseid; ?>">Select this course</a>
			</td>
		<tr>
		<?php
		}
		?>
	</table>
</div>