<?php
//Filename/path = Course/section/assn/pawprint/filename-hash_timestamp.extension
//$path='./uploads/' . $course . '/' . $section . '/' . $assn . '/'; + filename goes here
class Getassignment extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
	
	}
	
	public function index() 
	{
	
		//TODO: get the file from: ['upload_path'] = './uploads/';	
		//Initialize error message to empty string
		//echo 'here we are';
		$errorMessage = "";
		$course = $this->input->post('course');
		$user = $this->input->post('user');
		
		/************************
		//make a log entry for the addi req
		*******************************/
		$query = 'select * from log where courseid = \''. $course. '\' and pawprint = \''.$user .'\'';
		$res = $this->db->query($query);
		if($res->num_rows >0 )
		{
			echo PHP_EOL .'Request by User : '.$user. PHP_EOL;
			echo 'Course : '. $course . PHP_EOL;;
			$secPrinted = 0;
			$section = "";
			foreach($res->result() as $row)
			{				

				echo "\tSection : ".$row->sectionid. PHP_EOL ;
				echo "\tAssignment : ".$row->aname. PHP_EOL;
				echo "\tFile submitted : ". $row->filename . PHP_EOL ;
				echo "\tTime stamp: ". $row->log_date . PHP_EOL . PHP_EOL;
			}
		}
		else
		{
			echo 'Invalid course selection or no files submitted'  . PHP_EOL;
		}	
		//$isSizeOkay = check_file_size($File);
		//$isValidParams = check_params($course, $section, $assignment);
		//$isSameHash = check_hash($recieved_hash), $file_path);
		
		//no need to check the file size since we do this on both front end interfaces
			/* if($isSizeOkay == FALSE) {
			
			$errorMessage = $errorMessage . "The file must be less than 5MB\n";
			} */
			
			
			
			/*if($isValidParams != 000) {
			//Somehow figure out how to distinguish between the good vs bad params. Maybe use chmod protocol, eg 0-7
			//Then use a switch to determine the error message
			
			//100 = course
			//010 = section
			//001 = assn
				switch($isValidParams) {

				case 001:	$errorMessage .= "Invalid assignment\n";
					break;
					
				case 010:	$errorMessage .= "Invalid section\n";
					break;
					
				case 011:	$errorMessage .= "Invalid section & assignment\n";
					break;
					
				case 100:	$errorMessage .= "Invalid course\n";
					break;
					
				case 101:	$errorMessage .= "Invalid course & assignment\n";
					break;
					
				case 110:	$errorMessage .= "Invalid course & section\n";
					break;
					
				case 111:	$errorMessage .= "Invalid course, section, & assignment\n";
					break;
				
				
				}
			}
			
			//If everything looks good
			if(empty($errorMessage)) {
			
			
			//An error occured
			} else {
			$errorMessage = "\n========  ERROR ========\n\n" . $errorMessage;
			//handle errors ->log and send message to user
			}*/
	
	
	}
	
	
	//Return true if the file is within the bounds
	//otherwise retiurn false
	//@deprecated
	
/* 	function check_file_size($File) 
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
	
	 }*/
	
	////////////////////////////// Return TRUE if successful
	///////////////////////////// Return FALSE if an error occured
	// Return a 3 bit binary digit to tell which parameters were invalid
	function check_params($course, $section, $assignment) {
	$validity = 000;
	
	//Check course
		if ($isValidCourse != TRUE) {
		$validity = $validity + 100;
		}
		
	//Check section
		if($isValidSection != TRUE) {
		$validity = $validity + 10;
		}
		
	//Check Assignment
		if($isValidAssn != TRUE) {
		$validity = $validity + 1;
		}
	
	//Check each argument against the data in the DB
	//Throw any necessary errors
	
	return $validity;
	}

	// Compare the recieved_hash to the has that we
	// generate on the file. 
	// Case 1: If they do not match, the file was
	// damaged, send error message back to user
	// return new_hash
	// Case 2: match, everything is good, 
	// return TRUE
	public function check_hash($received_hash, $file_path)
	{
		$hash = hash_file( "sha256", $file_path);
		if($hash == $received_hash) 
		{
			return  TRUE;
		} 
		else 
		{
			return $hash;
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
?>
