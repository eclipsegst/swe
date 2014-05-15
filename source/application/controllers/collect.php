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
		$role = $this->session->userdata('role');
		$pawprint = $this->session->userdata('pawprint');
		
		if($role == 'professor'){
			$path = './p/'. $courseid .'/'. $aname .'/';
	    	$this->zip->read_dir($path,FALSE);  
	    	$result = $this->zip->download($courseid.'_'.$aname.'_'.'.zip'); 
		}elseif($role == 'ta'){
			$this->load->model('course_model');
			$sections = $this->course_model->get_section_by_ta($pawprint);
			foreach ($sections->result() as $row)
			{
			    $section = $row->sectionid;
			}
		    $path = './p/'. $courseid .'/'. $aname .'/'. $section. '/';
		    $this->zip->read_dir($path,FALSE);  
		    $result = $this->zip->download($courseid.'_'.$aname.'_'.$section.'.zip');
		}
 
	}
}

?>
