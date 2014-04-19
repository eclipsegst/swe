<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_single extends CI_Controller {

	public function index($msg = NULL)
	{

		

		$courseid = $this->input->get('courseid',true);
	    $data['courseid'] = $courseid;
	    $this->load->model('assignment_model');
	    $query = $this->assignment_model->get_all_assignments();
	    $data['assignments'] = $query->result();

        $this->load->model('course_model');
		$courses = $this->course_model->selectByCourseID($courseid);
		$data['courses'] = $courses->result();
		$data['msg'] = $msg;
		$this->load->view('course_single_view', $data);
	}

	// function update()
	// {

	// 	$uid = $this->input->get('cid',true);
 //        $cid 	   = $_POST['cid'];
 //    	$coursename  = $_POST['coursename'];
 //    	$description = $_POST['description'];
    
 //        $data = array(
 //                    'cid'       => $cid,
 //                    'coursename'  => $coursename,
 //                    'description' => $description
 //                    );

 //        $this->load->model('course_model');
 //        $this->course_model->update($data,$cid);

	// 	$msg = 'Update successully!';
	// 	redirect('course');
	// }
}