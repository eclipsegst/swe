<?php include './assets/template/header_admin.php'; ?>
<h1>Add a new course</h1>

<div class="row">
          <div class="col-lg-6">
            <div class="well">
              <form class="form-horizontal" method="POST" action="<?php echo base_url();?>course_new/insert">
                <fieldset>
                  <legend>Add a new course</legend>
                  <div class="form-group">
                    <label for="courseid" class="col-lg-3 control-label">Course ID</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="courseid" name="courseid" placeholder="Course ID" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="coursename" class="col-lg-3 control-label">Course Name</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Course Name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="coursedescription" class="col-lg-3 control-label">Description</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="coursedescription" name="coursedescription" placeholder="Description">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-3">
                    	<button class="btn btn-default" onClick="window.location='<?php echo base_url();?>course';">Cancel</button>
                      <button type="submit" class="btn btn-primary"  value="Login">Submit</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
          </div>
        </div>
<table>



<?php echo $msg;?>


<?php include './assets/template/footer_admin.php'; ?>
