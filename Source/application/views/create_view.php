<html>
<head>
<title>Create</title>
<script>
	function validateForm()
	{
		var t=document.forms["newpageform"]["title"].value;
		var d=document.forms["newpageform"]["description"].value;
		if (t==null || t=="")
	  	{
	  		alert("Title must be filled out!");
	  		return false;
	  	}
	  	if (d==null || d=="")
	  	{
	  		alert("Description must be filled out!");
	  		return false;
	  	}
	}
</script>
</head>
<body>

<form method="POST" action="create_assignment" id="newpageform" onsubmit="return validateForm()">
<table align="left">
	<tr>
  		<td align="left">Assignment Title:</td>
  		<td><input type="text" name="title" size="70"></td>
	</tr>
	<tr>
  		<td align="left">Description:</td>
  		<td>
		<textarea rows="10" cols="70" name="description" form="newpageform" placeholder="Enter content here..."></textarea>

  		</td>
	</tr>
	<tr><td></td><td><input type="submit" name = "submit" value="Create Page" size = "20"/> | <a href="www.google.com">Cancel</a></td>
	</tr>
</table>
</form>


<?php echo $error; ?>


</body>
</html>