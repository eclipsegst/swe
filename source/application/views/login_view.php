<?php include './assets/template/header.php'; ?>


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
You can use pawprint and cellphone number to login.<br />

<?php include './assets/template/footer.php'; ?>