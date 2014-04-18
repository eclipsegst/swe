

<a href="<?php echo base_url();?>login/do_logout/">Logout</a> | Welcome <?php echo $this->session->userdata('firstname');?>

<div >
<h1 >New Anouncement</h1>
<?php echo $msg;?>
</div>


<div>
  <table style="width:1200px">
    <tr>
      <th>cid</th>
      <th>courseid</th>
        <th>coursename</th>
        <th>description</th>    
        
    </tr>
    <?php 
    foreach ($query as $course)
    {
    ?>
    <tr>
      <td><?php echo $course->cid; ?></td>
      <td><?php echo $course->courseid; ?></td>
          <td><?php echo $course->coursename; ?></td>
          <td><?php echo $course->description; ?></td>
      <td>
      <a href="<?php echo base_url(); ?>assignment?courseid=<?php echo $course->courseid; ?>">Check out assignment</a>
      </td>
    <tr>
    <?php
    }
    ?>
  </table>
</div>