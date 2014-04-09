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

	function create_assignment()
	{
		// $error = array('error' =>"error");
			
		// 	$this->load->view('create',$error);

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
					mkdir($lab_path . "/" ."Downloads", 0777, TRUE);
				}

				$new_page_path = $lab_path ."/" . $newPageName;
				// if (!write_file("./uploads/file.php", $newPageContent))
				if (!write_file($new_page_path, $newPageContent))
				{
				//      // echo 'Unable to write the file';
				}
				// else
				// {
				//      // echo 'File written!';
				// }
				// $error = array('error' =>$newPageName);
				
			}

			// header('Location: ../.'.'./p/CS4320/lab_26/lab_26.php');
			header('Location: ./.'. $new_page_path);
			
			// $this->load->view('create',$error);
		}
		else
		{

		}
	}
}
?>