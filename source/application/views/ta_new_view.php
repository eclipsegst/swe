<?php include './assets/template/header.php'; ?>
<?php include './assets/template/header_professor.php'; ?>

<div class="row">
  <div class="col-lg-6" >
    <div class="well" >
      <form class="form-horizontal" method="POST" action="<?php echo base_url();?>ta_new/insert">
        <fieldset>
          <legend>Add a TA to a course</legend>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-3 control-label">Course ID:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="courseid" name="courseid" value = "<?php echo $courseid;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-lg-3 control-label" >TA ID:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="uid" name="uid">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-lg-3 control-label" >TA Pawprint:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="pawprint" name="pawprint">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-lg-3 control-label" >Temporary Password: </label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="password" name="password">
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


<?php include './assets/template/footer_professor.php'; ?>
<?php include './assets/template/footer.php'; ?>
