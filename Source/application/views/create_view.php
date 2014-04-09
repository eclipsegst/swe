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
<div>
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
<br /><?php echo $error; ?>
</div>

<div>
	<p>This page will create a new page. We do need a new page for each assignment or lab session that TA can create. But we also need to save the assignment or lab information to a table or something. The reason why we do that is we can implement new announcement easily which you might want to think of the newest announcment in blackboard. I don't know whether it's a task that must be done or not. We can talk about it later. -Zhaolong</p>
</div>


</body>
</html>