<?php
//Filename/path = Course/section/assn/pawprint/filename-hash_timestamp.extension
//$path='./uploads/' . $course . '/' . $section . '/' . $assn . '/'; + filename goes here
class Accept extends CI_Controller {

	//Return true if the file is within the bounds
	//otherwise retiurn false
	function check_file_size($File) 
	{
	$size = filesize(File);
	
		if($size > 5242880) {
		//error file too large
		//break/ call error
		return FALSE;
		} else if($size == FALSE) {
		//Could not calculate filesize
		return FALSE;
		}
	return TRUE;
	
	}
	
	// Return TRUE if successful
	// Return FALSE if an error occured
	function check_params($course, $section, $assignment) {
	
	//Check each argument against the data in the DB
	//Throw any necessary errors
	
	
	}

	// Compare the recieved_hash to the has that we
	// generate on the file. 
	// Case 1: If they do not match, the file was
	// damaged, send error message back to user
	// return new_hash
	// Case 2: match, everything's good, 
	// return TRUE
	function check_hash($recieved_hash, $file_path) {
	$hash = hash_file( "sha512", $file_path);
		if($hash == $received_hash) {
			return  TRUE;
			} else {
				return FALSE;
			}
	
	}
	
	function store_file($file_name, $course, $section, $assignment) {
		$timestamp = time();
		
		// IF /course/assignment/section/$pawprint !exists, create the directory
		
		if(move_uploaded_file ($_FILES[file_up][tmp_name], $file_name.$timestamp)){
			echo "Congratulations, file succesfully uploaded";
		} else {
			echo "Failed to upload file";
			}
	}


}
<?>
