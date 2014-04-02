<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
<p>It will upload to a root folder called "uploads".</p>
<div><a href="./student">Home</a></div>

</body>
</html>