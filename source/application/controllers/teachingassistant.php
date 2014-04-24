<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachingassitant extends CI_Controller {

	public function index($msg = NULL)
	{
		$role = $this->session->userdata('role');
		if($role='teachingassistant' || $role='admin'){
			$data['msg'] = $msg;
			$this->load->view('teachingassistant_view', $data);
		}else{
			redirect('login');
		}	
	}
}