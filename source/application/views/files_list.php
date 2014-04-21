<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>Files List</h3>

<ul>
<?php foreach ($names -> result() as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

</body>
</html>
