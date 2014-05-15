<?php include './assets/template/header_student.php'; ?>

<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 id="tables">List of Assignment</h2>
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
				    <th>Point</th>    
                  </tr>
                </thead>
                <tbody>
                <?php 
				foreach ($query as $assignment)
				{
					if( $assignment->courseid== $courseid){
				?>
				<tr><td><?php echo $assignment->courseid; ?></td>
					<td><?php echo $assignment->aid; ?></td>
					<td><?php echo $assignment->aname; ?></td>
		      		<td><?php echo $assignment->duedate; ?></td>
		      		<td><?php echo $assignment->description; ?></td>
		      		<td><?php echo $assignment->point; ?></td>
					<td>
					<a href="<?php echo base_url(); ?>upload?courseid=<?php echo $assignment->courseid; ?>&aname=<?php echo $assignment->aname; ?>">Submit an assignment</a>
					</td>
				<tr>
				<?php }
				}
				?>
                </tbody>
              </table> 
            </div><!-- /example -->
          </div>
        </div>
</div>

<?php include './assets/template/footer_student.php'; ?>
