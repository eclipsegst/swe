<?php
//Filename/path = Course/section/assn/pawprint/filename-hash_timestamp.extension
//$path='./uploads/' . $course . '/' . $section . '/' . $assn . '/'; + filename goes here
class Accept extends CI_Controller {

	function __construct() {
		parent::__construct();
	
	
	}
	
	function index($errorMessage=NULL) {
	//TODO: get the file from: ['upload_path'] = './uploads/';	
	//Initialize error message to empty string
	
	if!(empty($errorMessage)){
	$this->load->view('upload_view',$data);
	}
	
	//$isSizeOkay = check_file_size($File);
	$isValidParams = check_params($course, $section, $assignment);
	$isSameHash = check_hash($recieved_hash), $file_path);
	
	//no need to check the file size since we do this on both front end interfaces
		/* if($isSizeOkay == FALSE) {
		
		$errorMessage = $errorMessage . "The file must be less than 5MB\n";
		} */
		
		if($isSameHash != TRUE) {
		$errorMessage .= "There was an error sending the file.\nExpected:" . $recieved_hash . "\nRecieved:" . $isSameHash . "\n\n";
		}
		
		if($isValidParams != 000) {
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
		$this->store_file();
		
		//An error occured
		} else {
		$errorMessage = "\n========  ERROR ========\n\n" . $errorMessage;
		//handle errors ->log and send message to user
		$this->index($errorMessage);
		}
	
	
	}
	
	
	//Return true if the file is within the bounds
	//otherwise retiurn false
	//@deprecated
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
	

	// Return a 3 bit binary digit to tell which parameters were invalid
	function check_params($course, $section, $assignment) {
	$validity = 000;
	
	//Check course
	$isValidCourse = !empty($this->db->get_where('courses', array('cid' =>$course)));
		if ($isValidCourse != TRUE) {
		$validity += 100;
		}
		
	//Check section
	$isValidSection = !empty($this->db->get_where('section', array('sectionid' =>$section), 'courseid' => $course));
		if($isValidSection != TRUE) {
		$validity += 10;
		}
		
	//Check Assignment
	$isValidAssn = !empty($this->db->get_where('section', array('aname' =>$assignment), 'courseid' => $course));
		if($isValidAssn != TRUE) {
		$validity += 1;
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
	function check_hash($recieved_hash, $file_path) {
	$hash = hash_file( "sha256", $file_path);
	if(!empty($recieved_hash){
		if($hash == $received_hash) {
			return  TRUE;
			} else {
				return $hash;
			}
		} return TRUE;
	
	}
	
	function store_file($file_name, $course, $section, $assignment) {
		$timestamp = time();
		
		// IF /course/assignment/section/$pawprint !exists, create the directory
		$courseid = $_GET['courseid'];
		$aname = $_GET['aname'];
		$pawprint = $this->session->userdata('pawprint');
		
		$file_path = '/p/'. $_GET['courseid']  . '/' . $_GET['aname'] . '/' . $_GET['sectionid']  . $pawprint; 
		if (!is_dir($file_path)){
			mkdir($file_path, 0755, TRUE);	
		}
		
		$this->load->library('upload', $config);

		$config['file_name'] = $_FILES['userfile'] . '-' . $timestamp;
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = '*';
		$config['max_size']	= '5242880';
		
		if($this->upload->do_upload()){
			$data = array('upload_data' => $this->upload->data());
			// $this->load->view('upload_success', $data);
			redirect('upload_success');
		}else{
			$msg = "Upload failed.";
			$this->index($msg);
		}
		// if(move_uploaded_file ($_FILES[file_up][tmp_name], $file_name.$timestamp)){
			// echo "Congratulations, file succesfully uploaded";
		// } else {
			// echo "Failed to upload file";
			// }
	}


}
<?>