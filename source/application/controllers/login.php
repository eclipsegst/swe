<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index($msg = NULL)
	{
		$data['msg'] = $msg;
		// $this->load->model('login_model');
		$this->load->model('auth');
		// $query = $this->login_model->get_all_users();
		// $data['query'] = $query->result();
		$this->load->view('login_view');
		// $this->process();
	}

	function process()
	{
		//$this->load->model('login_model');
		//$result = $this->login_model->validate();
		$this->load->model('auth');
		$result = $this->auth->login();
		if(!$result){
			$msg = '<font color=red>Invalid username and/or password.</font><br />';
			$this->index($msg);
		}else{
			// $role = $this->session->userdata('role');
			// if($role == 'student')
			// {
			// 	redirect('student');
			// }elseif($role == 'ta')
			// {
			// 	redirect('ta');
			// }elseif($role == 'professor'){
			// 	redirect('professor');
			// }else{
			// 	redirect('admin');
			// }
			redirect('admin');
		}
	}

	public function do_logout(){
        $this->session->sess_destroy();
        redirect('welcome');
    }
}