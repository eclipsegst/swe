<?php include './assets/template/header.php'; ?>
<?php include './assets/template/header_ta.php'; ?>
Welcome <?php echo $this->session->userdata('firstname');?></a>
<h1> Welcome to TA page </h1>


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
				 	<th>TA Pawprint</th>
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
					<td><?php echo $pawprint; ?></td>
					<td>
					<a href="<?php echo base_url(); ?>course_single?courseid=<?php echo $course->courseid; ?>">List of Assignments</a>
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

<?php include './assets/template/footer_ta.php'; ?>
<?php include './assets/template/footer.php'; ?>
