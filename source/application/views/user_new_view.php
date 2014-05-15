<?php include './assets/template/header_admin.php'; ?>
<div class="row">
          <div class="col-lg-6">
            <div class="well">
              <form class="form-horizontal" method="POST" action="<?php echo base_url();?>user_new/insert">
                <fieldset>
                  <legend>Add a new user</legend>
                 
                  <div class="form-group">
                    <label for="inputFirstname" class="col-lg-3 control-label">First Name</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="inputFirstname" name="firstname" placeholder="First Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputLastname" class="col-lg-3 control-label">Last Name</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="inputLastname" name="lastname" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputRole" class="col-lg-3 control-label">Role</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="inputRole" name="role" placeholder="Role">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">Pawprint</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="inputEmail" name="pawprint" placeholder="Pawprint">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-3 control-label" >Password</label>
                    <div class="col-lg-8">
                      <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-3">
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
