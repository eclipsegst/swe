<?php

class Collect extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index($msg = NULL)
	{
		$this->load->view('collect_view', array('error' => ' ' ));
	}

	function download_all()
	{
		$this->load->library('zip');
	    $courseid = $this->input->get('courseid',true);
		$aname = $this->input->get('aname',true); 
	    $path = 'p/'. $courseid .'/'. $aname .'/';
	    $this->zip->read_dir($path);  
	    $result = $this->zip->download($courseid.'_'.$aname.'.zip'); 

		// Download the file to your desktop. Name it "my_backup.zip"
		// $this->zip->download('my_backup.zip');
		// $this->zip->read_dir('./assets/', FALSE);

		// $courseid = $this->input->get('courseid',true);
		// $aname = $this->input->get('aname',true);
		// $path = './p/'. $courseid . $aname .'/';
		// // $this->zip->read_dir('assets/');
		// $this->load->library('zip');
		// $this->zip->read_dir('./p/CS 8001/Homework 1/');
		// $this->index();

		// $this->load->helper('download');
		// $data = file_get_contents("./uploads/Inside_Llewyn_Davis_Poster.jpg"); // Read the file's contents
		// $name = 'myphoto.jpg';
		// force_download($name, $data);
		// header("Content-Type: application/force-download");
		// header("Content-Disposition: attachment; filename=\"./uploads/Inside_Llewyn_Davis_Poster.jpg\"");
	}
}

?>
