<?php include './assets/template/header_admin.php'; ?>


<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 id="tables">List of Courses</h2>
            </div>

            <div>
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>CID</th>
				 	<th>Course ID</th>
				    <th>Course Name</th>
				    <th>Description</th>  
                  </tr>
                </thead>
                <tbody>
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
			<a href="<?php echo base_url(); ?>course_update?cid=<?php echo $course->cid; ?>">Edit</a>
			<a href="<?php echo base_url(); ?>assignment_new?courseid=<?php echo $course->courseid; ?>">Add an assignment</a>
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


		<div class="row">
          <div class="col-lg-12">
			<form action="<?php echo base_url();?>course_new">
				<button type="button" class="btn btn-default"  onClick="window.location='<?php echo base_url();?>course_new';">Added a new course</button>
			</form>
		   </div>
		</div>

</div>


<?php include './assets/template/footer_admin.php'; ?>
