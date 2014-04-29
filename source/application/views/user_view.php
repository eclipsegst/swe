<?php include './assets/template/header.php'; ?>
<?php include './assets/template/header_admin.php'; ?>
<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables">Users</h1>
            </div>

            <div>
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>uid</th>
				    <th>lastname</th>
				    <th>firstname</th>    
				    <th>pawprint</th>
				    <th>password</th>
				    <th>role</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php 
					foreach ($query as $user)
					{
					?>
					<tr>
						<td><?php echo $user->uid; ?></td>
			      		<td><?php echo $user->lastname; ?></td>
			      		<td><?php echo $user->firstname; ?></td>
			      		<td><?php echo $user->pawprint; ?></td>
			      		<td><?php echo $user->password; ?></td>
			      		<td><?php echo $user->role; ?></td>
						<td>
						<a href="<?php echo base_url(); ?>user_update?uid=<?php echo $user->uid; ?>">Edit</a>
						<a href="<?php echo base_url(); ?>user/delete?uid=<?php echo $user->uid; ?>">Delete</a>
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


		<div class="row">
          <div class="col-lg-12">
			<form action="<?php echo base_url();?>user_new"><input type="submit" value="Added a new user"></form>
		   </div>
		</div>

		<div class="row">
          <div class="col-lg-12">
			Role 0 is student <br />
			Role 1 is TA <br/>
			Role 2 is professor <br />
			Role 3 is admin<br />
		   </div>
		</div>
</div>

<?php include './assets/template/footer_admin.php'; ?>
<?php include './assets/template/footer.php'; ?>
