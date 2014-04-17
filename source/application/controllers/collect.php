<?php

class Collect extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('collect_view', array('error' => ' ' ));
	}

	function download()
	{
		$this->load->helper('download');
		$data = file_get_contents("./uploads/Inside_Llewyn_Davis_Poster.jpg"); // Read the file's contents
		$name = 'myphoto.jpg';
		force_download($name, $data);
		// header("Content-Type: application/force-download");
		// header("Content-Disposition: attachment; filename=\"./uploads/Inside_Llewyn_Davis_Poster.jpg\"");
	}
}

?>
