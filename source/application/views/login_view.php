<?php include './assets/template/header_login.php'; ?>


        <div class="row">
          <div class="col-lg-4">
            <div class="well">
              <form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/login/process">
                <fieldset>
                  <legend>Login</legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">Pawprint</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="inputEmail" name="username" placeholder="Pawprint">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-3 control-label" >Password</label>
                    <div class="col-lg-8">
                      <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> 
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-3">
                      <button class="btn btn-default">Cancel</button>
                      <button type="submit" class="btn btn-primary"  value="Login">Submit</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
          </div>
        </div>
        You can use pawprint and cellphone number to login.<br />
        <br /> <?php if(!empty($msg)) echo $msg;?>
<?php include './assets/template/footer_login.php'; ?>