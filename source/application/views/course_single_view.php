<?php 

		include './assets/template/header_ta.php';

 ?>
<h1>Welcome to <?php echo $courseid; ?></h1>

<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables">Course</h1>
            </div>

            <div>
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>Course ID</th>
				 	<th>Course Name</th>
				 	<th>Course Description</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
				foreach ($courses as $course)
				{	if($course->courseid = $courseid){
				?>
				<tr>
					<td><?php echo $course->courseid; ?></td>
					<td><?php echo $course->coursename; ?></td>
					<td><?php echo $course->description; ?></td>
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




<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables">Assignments</h1>
            </div>
			<a href="<?php echo base_url(); ?>assignment_new?courseid=<?php echo $course->courseid; ?>">Add an assignment</a><br/>

            <div>
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th></th>
					<th>Course ID</th>
				 	<th>Assingment ID</th>
				 	<th>Assignment Name</th>
				    <th>Due date</th>
				    <th>Description</th> 
				    <th>Point</th> 
				    <th>Action</th> 
                  </tr>
                </thead>
                <tbody>
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
		      		<td><?php echo $assignment->point; ?></td>

					<td><a href="<?php echo base_url(); ?>course_single/delete?courseid=<?php echo $assignment->courseid; ?>&aname=<?php echo $assignment->aname; ?>">Delete</a>
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