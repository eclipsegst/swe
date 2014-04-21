<a href="<?php echo base_url();?>login/do_logout/">Logout</a> | Welcome <?php echo $this->session->userdata('firstname');?>
<h1> Welcome to Profeesor page </h1>

<div>
	<table style="width:300px">
		<tr>
		 	<th>Courseid</th>
		    <th>Professor</th>      
		    
		</tr>
		<?php 
		foreach ($user as $course)
		{
			
		?>
		<tr>
			<td><?php echo $course->courseid; ?></td>
      		<td><?php echo $course->pawprint; ?></td>
			<td>
			<a href="<?php echo base_url(); ?>ta_new?courseid=<?php echo $course->courseid; ?>">Add a TA</a>
			</td>
		<tr>
		<?php 
		}
		?>
	</table>
</div>

<h3>List of TAs</h3>
<div>
	<table style="width:200px">
		<tr>
		 	<th>Courseid</th>
		    <th>TA</th>      
		    
		</tr>
		<?php 
		foreach ($ta as $item)
		{
			
		?>
		<tr>
			<td><?php echo $item->courseid; ?></td>
      		<td><?php echo $item->pawprint; ?></td>
		<tr>
		<?php 
		}
		?>
	</table>
</div>