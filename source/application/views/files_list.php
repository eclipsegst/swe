<?php include './assets/template/header.php'; ?>

<title>Upload Form</title>

<h3>Files List</h3>

<ul>
<?php foreach ($names -> result() as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>


<?php include './assets/template/footer.php'; ?>
