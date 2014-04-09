<!DOCTYPE html>
<!-- saved from url=(0039)http://getbootstrap.com/examples/cover/ -->
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" href="http://cdn.polkadotbride.com/wp-content/uploads/2008/03/n.jpg">
    <title>Login</title>
  <style id="holderjs-style" type="text/css"></style>
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

</body>
</html>