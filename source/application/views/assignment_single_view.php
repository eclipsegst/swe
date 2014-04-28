<?php 
	if($role == 'admin'){
		include './assets/template/header_admin.php';
	}elseif($role == 'professor'){
		include './assets/template/header_professor.php';
	}elseif($role == 'ta'){
		include './assets/template/header_ta.php';
	}else{
		include './assets/template/header.php';
	}
 ?>
<?php echo $msg;?>

<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 id="tables">Download Submitted Files</h2>
            </div>

            <div>
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>Course ID</th>
				 	<th>Assingment ID</th>
				 	<th>Assignment Name</th>
				    <th>Due date</th>
				    <th>Description</th>
				    <th></th> 
                  </tr>
                </thead>
                <tbody>
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
                </tbody>
              </table> 
            </div><!-- /example -->
          </div>
        </div>
</div>

<<<<<<< HEAD
<hr>
<h3>This is a list of all submission of this assignment</h3>
	
	<table>
		<tr>
			<th>Pawprint</th>
			<th>File name</th>
			<th>Action</th>
		</tr>

		<?php 
	foreach ($stack as $items)
	{
		$pieces = explode("/", $items);
		$pawprint = $pieces[3];
		$filename = $pieces[4];
	?> 
		<tr>
			<td><?php echo $pawprint;?></td>
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
	
		
=======
<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 id="tables">This is a list of all submission of this assignment</h2>
            </div>
>>>>>>> dc86e7766f5c029cf6f747de1ceb3c6f451587d7

            <div>
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>Pawprint</th>
					<th>File name</th>
					<th>Action</th> 
                  </tr>
                </thead>
                <tbody>
                <?php 
				foreach ($stack as $items)
				{
					$pieces = explode("/", $items);
					$pawprint = $pieces[3];
					$filename = $pieces[4];
				?> 
				<tr>
					<td><?php echo $pawprint;?></td>
					<td><?php echo $filename;?></td>
					<td>
						<a href="<?php echo base_url(); ?>collect/download_single?filepath=<?php echo $items; ?>&filename=<?php echo $filename; ?>">Download</a>
						<a href="<?php echo base_url(); ?><?php echo $items; ?>">Open</a>
					</td>
				</tr>
				<?php 
				}
				?>
                </tbody>
              </table> 
            </div><!-- /example -->
          </div>
        </div>
</div>

	
<?php 
	if($role == 'admin'){
		include './assets/template/footer_admin.php';
	}elseif($role == 'professor'){
		include './assets/template/footer_professor.php';
	}elseif($role == 'ta'){
		include './assets/template/footer_ta.php';
	}else{
		include './assets/template/footer.php';
	}
 ?>
