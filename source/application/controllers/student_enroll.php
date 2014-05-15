<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_enroll extends CI_Controller {

	public function index($msg = NULL)
	{
		
		$role = $this->session->userdata('role');
		if($role=='student' || $role=='admin'){
			$data['msg'] = $msg;
			$this->load->model('course_model');
    		$query = $this->course_model->get_all_courses();
    		$data['query'] = $query->result();
			$this->load->view('student_enroll_view',$data);
		}else{
			redirect('login');
		}
	}

	function enroll()
	{
		$this->load->library('session');
		$pawprint = $this->session->userdata('pawprint');
		$courseid = $this->input->get('courseid',true);

        $data = array(
                    'courseid'  => $courseid,
                    'pawprint'  => $pawprint
                    );

        $this->load->model('course_model');
        $this->course_model->enroll($data);
        $msg = "You have enrolled a course sucessfully!";
		$this->index($msg);
	}
}

