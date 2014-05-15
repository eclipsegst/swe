<?php
//Filename/path = Course/section/assn/pawprint/filename-hash_timestamp.extension
//$path='./uploads/' . $course . '/' . $section . '/' . $assn . '/'; + filename goes here
class Acceptorc extends CI_Controller {

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
		$section = $this->input->post('section');
		$assignment = $this->input->post('assignment');
		$recieved_hash = $this->input->post('hash');
		$user = $this->input->post('user');
		$file_path = './p/' . $course . '/' . $assignment . '/' . $section . '/' .$user;
		if (!is_dir($file_path))
		{
			mkdir($file_path, 0777, TRUE);
		}
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = '*';
		$config['max_size']= '5242880';
		$config['min_size']= '1';
		
		$queryForCourseAndAssign = 'select * from assignments where courseid=\''.$course.'\' and aname = \''.$assignment.'\'';
		
		$resultOfCheck = $this->db->query($queryForCourseAndAssign);	
		if($resultOfCheck->num_rows !== 1)
		{
			echo "Invalid course or assignment name" . PHP_EOL;
			return;
		}
		
		$queryForCourseAndAssign = 'select * from section where courseid=\''.$course.'\' and sectionid = \''.$section.'\'';
		
		$resultOfCheck = $this->db->query($queryForCourseAndAssign);	
		if($resultOfCheck->num_rows !== 1)
		{
			echo "Invalid section name" . PHP_EOL;
			return;
		}
		
		$this->load->library('upload', $config);

		if($this->upload->do_upload())
		{
			//echo "successfull";
			//$data = array('upload_data' => $this->upload->data());
			// $this->load->view('upload_success', $data);
			//redirect('upload_success');
			$filedetails = $this->upload->data();
			$file_name = $filedetails['file_name'];
			$isSameHash = $this->check_hash($recieved_hash, $file_path . '/' . $file_name);
		
			if($isSameHash != TRUE) 
			{
				echo 'hash = ' . $isSameHash;
				$errorMessage .= "There was an error sending the file.\nExpected:" . $recieved_hash . "\nRecieved:" . $isSameHash . "\n\n";
				//delete file as hashes dont match
				unlink($file_path . '/' . $file_name);
				echo "Hash check failed". PHP_EOL;;
				return;
			}
			
			$this->load->model('course_model');
			
			
			$query = 'insert into log (pawprint,courseid,aname,sectionid,action,hash,filename) 
						values (\'' .$user .'\',\'' .$course. '\',\'' .$assignment. '\',\'' .$section.'\',\'File Upload\',\'' .$recieved_hash.'\',\'' .$file_name.'\')' ;
	
			$this->db->query($query);	
			echo "File submission is successful" . PHP_EOL;
			$hash =  hash_file( "sha256", $file_path . '/' . $file_name);
			echo "Hash code receipt is : " . $hash . PHP_EOL;
			echo "Submission Details" . PHP_EOL;
			echo "\tUser : \t\t" . $user . PHP_EOL;
			echo "\tFile name :\t" . $file_name . PHP_EOL;
			echo "\tFile size :\t" . $filedetails['file_size']. ' KB' . PHP_EOL;
			echo "\tCourse : \t" . $course . PHP_EOL;
			echo "\tSection : \t" . $section . PHP_EOL;
			echo "\tAssignment : \t" . $assignment . PHP_EOL;			
		}
		else
		{
			echo "Upload failed." . PHP_EOL;	
			//$this->index($msg);
		}
		
		//to do: check valid params
		
		
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
