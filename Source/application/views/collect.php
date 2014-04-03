<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('collect/download');?>

<br /><br />

<input type="submit" value="download" />

</form>

</body>
</html>
