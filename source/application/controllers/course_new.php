<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_new extends CI_Controller {

	public function index($msg = NULL)
	{
		$data['msg'] = $msg;
		$this->load->view('course_new_view', $data);
	}

	function insert()
	{
		$courseid 	 = $_POST['courseid'];
    	$coursename  = $_POST['coursename'];
    	$description = $_POST['coursedescription'];
			
        $data = array(
                    'courseid'     => $courseid,
                    'coursename'  => $coursename,
                    'description' => $description,
                    );

        $this->load->model('course_model');
        $this->course_model->insert($data);

        $course_folder = "./p/" . $courseid;
			
		if (!is_dir($course_folder)){
			mkdir($course_folder, 0777, TRUE);	
		}

		$msg = 'Add successully!';
		redirect('course');
	}
}