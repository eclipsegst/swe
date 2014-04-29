<?php include './assets/template/header.php'; ?>
<?php include './assets/template/header_professor.php'; ?>
Welcome <?php echo $this->session->userdata('firstname');?>
<h1> Welcome to Profeesor page </h1>

<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 id="tables">Course Info</h2>
            </div>

            <div>
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>Courseid</th>
		    		<th>Professor</th> 
				    <th>Action</th> 
                  </tr>
                </thead>
                <tbody>
                <?php 
				foreach ($user as $course)
				{
					
				?>
				<tr>
					<td><?php echo $course->courseid; ?></td>
		      		<td><?php echo $course->pawprint; ?></td>
					<td>
					<a href="<?php echo base_url(); ?>assignment_new?courseid=<?php echo $course->courseid; ?>">Add an assignment</a><br/>
					<a href="<?php echo base_url(); ?>course_single?courseid=<?php echo $course->courseid; ?>">List of Assignments</a><br/>
					<a href="<?php echo base_url(); ?>ta_new?courseid=<?php echo $course->courseid; ?>">Add a TA</a><br/>
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
            <div class="page-header">
              <h2 id="tables">List of TAs</h2>
            </div>

            <div>
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>Courseid</th>
		    		<th>TA Pawprint</th> 
		    		<th>Name</th> 
		    		<th>Email</th> 
		    		<th>Phone</th> 
				    <th>Action</th> 
                  </tr>
                </thead>
                <tbody>
                <?php 
				foreach ($ta as $item)
				{
					
				?>
				<tr>
					<td><?php echo $item->courseid; ?></td>
		      		<td><?php echo $item->pawprint; ?></td>
		      		<td></td>
		      		<td></td>
		      		<td></td>
		      		<td><a href="">Delete</a></td>
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

<?php include './assets/template/footer_professor.php'; ?>
<?php include './assets/template/footer.php'; ?>
