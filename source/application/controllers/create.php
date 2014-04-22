<?php

class Create extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('create_view', array('error' => ' ' ));
	}

	// this will create a folder under ./p/CS4320/
	// send assignment title description and path to assignment table
	function create_assignment()
	{
		if(isset($_POST['submit'])) {
			$labName = $_POST['title'];
			$description = $_POST['description'];
			$course_id = "CS4320";
			$this->load->helper('file');
			// $header = read_file('./p/header.php');
			// $body   = read_file('./p/body.php');
			// $footer = read_file('./p/footer.php');
			 $content = "\n"."<?php echo ". $labName . ";?>"."\n";
			// $newPageContent = $header . "\n" . $body . "\n" . $content . "\n" . $footer;
			$newPageContent = $labName . "<br/>" . $description;
			$newPageName = $labName . "." ."php"; 
			// $path = "./uploads/" . $newPageName;
			
			$course_path = "./p/" . $course_id . "/";
			
			if (is_dir($course_path)){
				$lab_path = $course_path . $labName;
				if(!is_dir($lab_path . "/")){
					mkdir($lab_path, 0777, TRUE);
				}
			}


			// header('Location: ./.'. $new_page_path);
			
		}
		else
		{

		}
	}
}
?>