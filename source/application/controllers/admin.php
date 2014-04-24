<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index($msg = NULL)
	{
		$role = $this->session->userdata('role');
		if($role='admin' ){
			$data['msg'] = $msg;
			$this->load->view('admin_view', $data);
		}else{
			redirect('login');
		}
	}
}