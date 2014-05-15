<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Approved2 extends CI_Controller {

	public function index($msg = NULL)
	{
		$data['msg'] = $msg;
		$this->load->view('approved2_view', $data);
	}
}