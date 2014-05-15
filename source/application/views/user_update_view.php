<?php include './assets/template/header_admin.php'; ?>

<div class="row">
          <div class="col-lg-6">
            <div class="well">
              <form class="form-horizontal" method="POST" action="<?php echo base_url();?>user_update/update">
                <fieldset>
                  <legend>Update a User</legend>
                  <?php 
		foreach ($query as $user)
		{
		?>
                  <div class="hidden">
                    <label for="inputUid" class="col-lg-3 control-label">User ID</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="inputUid" name="uid" placeholder="user id" value="<?php echo $user->uid;?>" visible=>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputFirstname" class="col-lg-3 control-label">First Name</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="inputFirstname" name="firstname" placeholder="First Name" value="<?php echo $user->firstname; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputLastname" class="col-lg-3 control-label">Last Name</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="inputLastname" name="lastname" placeholder="Last Name" value="<?php echo $user->lastname; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputRole" class="col-lg-3 control-label">Role</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="inputRole" name="role" placeholder="Role" value="<?php echo $user->role; ?>" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPawprint" class="col-lg-3 control-label">Pawprint</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="inputPawprint" name="pawprint" placeholder="Pawprint" value="<?php echo $user->pawprint; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-3 control-label" >Password</label>
                    <div class="col-lg-8">
                      <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" value="<?php echo $user->password; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-3">
                      <button type="submit" class="btn btn-primary"  value="Login">Submit</button>
                    </div>
                  </div>

                  		<?php
		}
		?>
                </fieldset>
              </form>
            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
          </div>
        </div>
<table>

<?php echo $msg;?>

<?php include './assets/template/footer_admin.php'; ?>
