<a href="<?php echo base_url();?>login/do_logout/">Logout</a>| Welcome <?php echo $this->session->userdata('firstname');?></a>
<h1> Welcome to TA page </h1>

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
			<a href="<?php echo base_url(); ?>assignment_new?courseid=<?php echo $course->courseid; ?>">Add an assignment</a>
			<a href="<?php echo base_url(); ?>course_single?courseid=<?php echo $course->courseid; ?>">Select</a>
			</td>
		<tr>
		<?php
		}
		?>
	</table>
</div>