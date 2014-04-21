<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ta extends CI_Controller {

	public function index($msg = NULL)
	{
		$role = $this->session->userdata('role');
		$pawprint = $this->session->userdata('pawprint');
		if($role=='ta' || $role=='admin'){
			$data['msg'] = $msg;
		    $this->load->model('course_model');
		    $query = $this->course_model->get_course_by_ta_pawprint($pawprint);
		    $data['query'] = $query->result();
		    $data['pawprint'] = $pawprint;
			$this->load->view('ta_view', $data);
		}else{
			redirect('login');
		}
	}
}