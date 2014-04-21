<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Professor extends CI_Controller {

	public function index($msg = NULL)
	{
		$role = $this->session->userdata('role');
		$pawprint = $this->session->userdata('pawprint');
		if($role=='professor' || $role=='admin'){
			$data['msg'] = $msg;
			$this->load->model('course_model');
			$user = $this->course_model->selectByProPawprint($pawprint);
	    	$data['user'] = $user->result();
	    	foreach ($user->result() as $row)
			{
			    $courseid = $row->courseid;
			}
	    	$ta = $this->course_model->get_ta_by_courseid($courseid);
	    	$data['ta'] = $ta->result();
			$this->load->view('professor_view', $data);
		}else{
			redirect('login');
		}
	}
}