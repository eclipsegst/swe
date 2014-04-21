<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	public function index($msg = NULL)
	{
		
		$role = $this->session->userdata('role');
		if($role=='student' || $role=='admin'){
			$data['msg'] = $msg;
			$this->load->model('course_model');
    		$query = $this->course_model->get_all_courses();
    		$data['query'] = $query->result();
			$this->load->view('student_view',$data);
		}else{
			redirect('login');
		}
	}
}

