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

<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 id="tables">Sections</h2>
            </div>

            <div>
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>Section ID</th>
                    <th>Section Description</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
        foreach ($query as $section)
        {
        ?> 
        <tr>
          <td><?php echo $section->sectionid;?></td>
          <td><?php echo $section->description;?></td>
          <td>
            <a href="<?php echo base_url(); ?>section?courseid=<?php echo $courseid;?>&sectionid=<?php echo $section->sectionid;?>">Open</a>
          </td>
        </tr>
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
          <div class="col-lg-5" >
            <div class="well" >
              <form class="form-horizontal" method="POST" action="<?php echo base_url();?>section_list/insert?courseid=<?php echo $courseid;?>">
                <fieldset>
                  <legend>Add a new section</legend>
                  <div class="form-group">
                    <label for="sectionid" class="col-lg-3 control-label" >Section ID:</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" id="sectionid" name="sectionid">
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