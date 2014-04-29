<?php include './assets/template/header.php'; ?>
<title>Create</title>
<script>
	function validateForm()
	{
		var n=document.forms["newpageform"]["name"].value;
		var d=document.forms["newpageform"]["duedate"].value;
		if (n==null || n=="")
	  	{
	  		alert("Name must be filled out!");
	  		return false;
	  	}
	  	if (d==null || d=="")
	  	{
	  		alert("duedate must be filled out!");
	  		return false;
	  	}
	}
</script>


	<h1>Create An Assignment</h2>
<div>
<form method="POST" action="create/create_assignment" id="newpageform" onsubmit="return validateForm()">
	<div>
		<h3>1. Assignment Information
		
		<table>	
			<tr><td>Name:</td><td><input type="text" name="name" size="26"></td></tr>
			<tr><td>Instruction:</td><td><input type="file" name="instruction" size="26"></td></tr>
			<tr><td>Due Date:</td><td><input type="text" name="duedate" size="26"></td></tr>
			<tr><td>Points Possible:</td><td><input type="text" name="point" size="26"></td></tr>
		</table>
	</div>
	<div>
		<h3>2. Description</h3>
		<textarea rows="10" cols="70" name="description" form="newpageform" placeholder="Enter content here..."></textarea>
	</div>
<input type="submit" name = "submit" value="Create Assignment" size = "20"/> | <a href="">Cancel</a>

</form>
<br /><?php echo $error; ?>
</div>

<?php include './assets/template/footer.php'; ?>
