<?php include './assets/template/header_student.php'; ?>

<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 id="tables">Submitted Files</h2>
            </div>

            <div>
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>Pawprint</th>
					<th>Course</th>
					<th>Assignment</th>
					<th>File name</th>
					<th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
				foreach ($stack as $items)
				{	
					$pieces = explode("/", $items);
					if(count($pieces)>=3){
					$courseid = $pieces[2];
					$aname = $pieces[3];
					$pawprint = $pieces[count($pieces)-2];
					$filename = $pieces[count($pieces)-1];
					if($thispawprint == $pawprint){
				?> 
				<tr>
					<td><?php echo $pawprint;?></td>
					<td><?php echo $courseid;?></td>
					<td><?php echo $aname;?></td>
					<td><?php echo $filename;?></td>
					<td>
						<a href="<?php echo base_url(); ?>collect/download_single?filepath=<?php echo $items; ?>&filename=<?php echo $filename; ?>">Download</a>
						<a href="<?php echo base_url(); ?><?php echo $items; ?>">Open</a>
					</td>
				</tr>
					<?php } }
				}
				?>
                </tbody>
              </table> 
            </div><!-- /example -->
          </div>
        </div>
</div>
<?php include './assets/template/footer_student.php'; ?>