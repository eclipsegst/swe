<?php

class Create extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('create', array('error' => ' ' ));
	}

	function do_create()
	{
		$this->load->helper('file');
		// $path = './uploads/filename.php';
		$string = read_file('./uploads/template.php');
		// $start = 'Start creating...';

		if (!write_file('./uploads/file.php', $string))
		{
		//      // echo 'Unable to write the file';
		}
		// else
		// {
		//      // echo 'File written!';
		// }
		// $end = 'end';
		$error = array('error' =>"end");
		$this->load->view('create',$error);
	}
}
?>
Second string.