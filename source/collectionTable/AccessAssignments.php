<html>
<head>
<title>My Page</title>
</head>
<body>
<form name="myform" action="Collection.php" method="POST">
<div align="center">
<select name="Course">
<option value="0">Please Select Course</option>
<option value="1">Course 1</option>
<option value="2">Course 2</option>
</select>

<select name="Assignment">
<option value="Assign0">Please Select Assignment</option>
<option value="Assign1">Assignment 1</option>
<option value="Assign2">Assignment 2</option>
</select>

<select name="Section">
<option value="Section0">Please Select Section</option>
<option value="Section1">Section 1</option>
<option value="Section2">Section 2</option>
</select>
<input type="submit" value="Submit">
</div>
</form>
<?php

?>
</body>
</html>

//php not included, will need to use Ajax or Javascript
