<head>
<style>
table,th,td
{
/*border:1px solid black;*/
border-collapse:collapse;
}
th,td
{
padding:5px;
}
th
{
text-align:left;
}
</style>
</head>

  <body>
    <h1> Login </h1>
    <form method="POST" action="<?php echo base_url();?>login/process">
      <table>
        <tr><td>Pawprint: </td><td><input type="text" name="pawprint" placeholder="Pawprint"></td></tr>
        <tr><td>Password: </td><td><input type="password" name="password" placeholder="Password"></td></tr>
        <tr><td><input type="submit" name="login" value="Login"></td></tr>
      </table>
    </form>
    <br /> <?php if(! is_null($msg)) echo $msg;?>
<div>
  <table style="width:1200px">
    <tr>
      <th>uid</th>
      <th>lastname</th>
      <th>firstname</th>    
      <th>pawprint</th>
      <th>password</th>
      <th>role</th>
    </tr>
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
    <tr>
    <?php
    }
    ?>
  </table>
</div>
</body>
</html>