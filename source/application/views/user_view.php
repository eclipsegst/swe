<div>
role 0 is student <br />
role 1 is TA <br/>
role 2 is professor <br />
role 3 is admin<br />
</div>

<form action="<?php echo base_url();?>user_new"><input type="submit" value="Added a new user"></form>

<div>
	<table style="width:1200px">
		<tr>
		 	<th>uid</th>
		    <th>lastname</th>
		    <th>firstname</th>    
		    <th>pawprint</th>
		    <th>password</th>
		    <th>role</th>
		</tr>
		<?php 
		foreach ($query as $user)
		{
		?>
		<tr>
			<td><?php echo $user->uid; ?></td>
      		<td><?php echo $user->lastname; ?></td>
      		<td><?php echo $user->firstname; ?></td>
      		<td><?php echo $user->pawprint; ?></td>
      		<td><?php echo $user->password; ?></td>
      		<td><?php echo $user->role; ?></td>
			<td>
			<a href="<?php echo base_url(); ?>user_update?uid=<?php echo $user->uid; ?>">Edit</a>
			<a href="<?php echo base_url(); ?>user/delete?uid=<?php echo $user->uid; ?>">Delete</a>
			</td>
		<tr>
		<?php
		}
		?>
	</table>
</div>