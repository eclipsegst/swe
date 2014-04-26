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
<div class="row">
          <div class="col-lg-6" >
            <div class="well" >
              <form class="form-horizontal" method="POST" action="<?php echo base_url();?>assignment_new/insert">
                <fieldset>
                  <legend>Add a new assignment</legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">Course ID:</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" id="courseid" name="courseid" value = "<?php echo $courseid;?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-3 control-label" >Assignment Name:</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" id="aname" name="aname">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-3 control-label" >Due Date:</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" id="duedate" name="duedate">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-3 control-label" >Description: </label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" id="description" name="description">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                      <button class="btn btn-default">Cancel</button>
                      <button type="submit" class="btn btn-primary"  value="submit">Submit</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
          </div>
        </div>

<?php echo $msg;?>

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