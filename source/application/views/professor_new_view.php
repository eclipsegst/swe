<?php include './assets/template/header_admin.php'; ?>

<div class="row">
  <div class="col-lg-12">
    <div class="page-header">
      <h1 id="tables">Professor</h1>
    </div>

    <div>
      <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>Course ID</th>
		    <th>Course Name</th>
		    <th>Professor</th>   
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
	      		
	      		<td>
	      			<?php
	      			foreach($user as $professor){
						if($course->courseid == $professor->courseid){
					?>
					<?php echo $professor->pawprint; 
					    }
					}
					?>
				</td>
				<td>
				<a href="<?php echo base_url(); ?>course/update?cid=<?php echo $course->cid; ?>">Edit</a>
				<a href="<?php echo base_url(); ?>course/delete?cid=<?php echo $course->cid; ?>">Delete</a>
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


<div class="row">
  <div class="col-lg-5">
    <div class="well">
      <form class="form-horizontal" method="POST" action="<?php echo base_url();?>professor_new/insert">
        <fieldset>
          <legend>Add a professor to a course</legend>
          <div class="form-group">
            <label for="courseid" class="col-lg-3 control-label">Course ID</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="courseid" name="courseid" placeholder="Course ID" required>
            </div>
          </div>
          <div class="form-group">
            <label for="pawprint" class="col-lg-3 control-label">Professor Pawprint</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="pawprint" name="pawprint" placeholder="Pawprint">
            </div>
          </div>	
		  <div class="form-group">
            <label for="password" class="col-lg-3 control-label">Temporary Password</label>
          <div class="col-lg-8">
          <input type="text" class="form-control" id="password" name="password" placeholder="Password">
          </div>
          </div>

          <div class="form-group">
            <div class="col-lg-8 col-lg-offset-3">
            	<button class="btn btn-default" onClick="window.location='<?php echo base_url();?>admin';">Cancel</button>
              <button type="submit" class="btn btn-primary"  value="Login">Submit</button>
            </div>
          </div>
        </fieldset>
      </form>
    <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
  </div>
</div>


<?php echo $msg;?>
<?php include './assets/template/footer_admin.php'; ?>
