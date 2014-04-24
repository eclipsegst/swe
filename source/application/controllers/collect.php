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

	function download_single()
	{
		$filepath = $this->input->get('filepath',true);
		$filename = $this->input->get('filename',true);
		$this->load->helper('download');
		$data = file_get_contents($filepath);
		$name = $filename;
		force_download($name, $data);
	}

	function download_all()
	{
		$this->load->library('zip');
	    $courseid = $this->input->get('courseid',true);
		$aname = $this->input->get('aname',true); 
	    $path = 'p/'. $courseid .'/'. $aname .'/';
	    $this->zip->read_dir($path);  
	    $result = $this->zip->download($courseid.'_'.$aname.'.zip'); 
	}
}

?>
