<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_ta extends CI_Controller {

	public function index($msg = NULL)
	{
		
		$data['msg'] = $msg;
		$this->load->view('add_ta_view', $data);
	}


}

