<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Professor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="./assets/css/bootswatch.min.css">
    <!-- <script type="text/javascript" src="http://static.zephyrcharts.com/bs_caro/jquery-1.9.1.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    -->
         <?php      if(!isset($_SERVER['HTTPS'])) {
                  $redir = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                  header("Location: $redir");
                }
        ?>
  </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
           <a href="<?php echo base_url();?>professor" class="navbar-brand">Home</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
            </li>
            <li>
              <!-- <a href="">Blog</a> -->
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="login/do_logout/">Logout</a></li>
          </ul>

        </div>
      </div>
    </div>


    <div class="container">
