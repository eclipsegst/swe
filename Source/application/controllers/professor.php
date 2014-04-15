<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Professor extends CI_Controller {

	public function index($msg = NULL)
	{
		$role = $this->session->userdata('role');
		if($role=='professor' || $role=='admin'){
			$data['msg'] = $msg;
			$this->load->view('professor_view', $data);
		}else{
			redirect('login');
		}
	}
}