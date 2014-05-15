<h1>Lottery School Applications</h1>
<table>
	<tr>
		<th>Id</th>
		<th>Student Name</th>
		<th>Home School</th>
		<th>Created</th>
	</tr>
	<?php foreach ($lottery_apps as $app): ?>
	<tr>
		<td><?php echo $app['LotteryApp']['id']; ?></td>
		<td><?php echo $app['LotteryApp']['student_name']; ?></td>
		<td><?php echo $app['LotteryApp']['home_school']; ?></td>
		<td><?php echo $app['LotteryApp']['created']; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($app); ?>
</table>