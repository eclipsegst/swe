<?php include './assets/template/header.php'; ?>
<?php include './assets/template/header_student.php'; ?>

Welcome <?php echo $this->session->userdata('firstname');?>

<div >
<h1 >New Anouncement</h1>
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
                    <td>
                    <a href="<?php echo base_url(); ?>assignment?courseid=<?php echo $course->courseid; ?>">Check out assignment</a>
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

<div class="bs-docs-section">
  <div class="row">
    <div class="col-lg-12">
    <a href="<?php echo base_url(); ?>assignment_list">Check out all the submitted file</a>
  </div>
  </div>
</div>
<?php include './assets/template/footer_student.php'; ?>
<?php include './assets/template/footer.php'; ?>
