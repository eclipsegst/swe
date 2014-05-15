<?php include './assets/template/header_student.php'; ?>



<div >

<?php echo $msg;?>
</div>

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
                    <th>Description</th> 
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach ($query as $course)
                  {
                  ?>
                  <tr>
                    <td><?php echo $course->courseid; ?></td>
                    <td><?php echo $course->coursename; ?></td>
                    <td><?php echo $course->description; ?></td>
                    <td></td>
                    <td>
                    <a href="<?php echo base_url(); ?>register/register?courseid=<?php echo $course->courseid; ?>">Register</a>
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


<?php include './assets/template/footer_student.php'; ?>