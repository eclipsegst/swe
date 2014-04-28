<?php

class Upload_success extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index($msg=NULL)
	{
		$data =$msg;
		$this->load->view('upload_success',$data);
	}
}