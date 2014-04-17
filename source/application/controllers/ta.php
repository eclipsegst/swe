<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ta extends CI_Controller {

	public function index($msg = NULL)
	{
		$role = $this->session->userdata('role');
		if($role=='ta' || $role=='admin'){
			$data['msg'] = $msg;
			$this->load->view('ta_view', $data);
		}else{
			redirect('login');
		}
	}
}