<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_new extends CI_Controller {

	public function index($msg = NULL)
	{
		$data['msg'] = $msg;
		$this->load->view('course_new_view', $data);
	}

	function insert()
	{
		$cid 	     = $_POST['cid'];
    	$coursename  = $_POST['coursename'];
    	$description = $_POST['coursedescription'];
    	$section     = $_POST['section'];
			
        $data = array(
                    'cid'         => $cid,
                    'coursename'  => $coursename,
                    'description' => $description,
                    'section'     => $section
                    );

        $this->load->model('course_model');
        $this->course_model->insert($data);

		$msg = 'Add successully!';
		$this->index($msg);
	}
}