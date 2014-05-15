<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assignment_list extends CI_Controller {

	public function index($msg = NULL)
	{

		$this->load->helper('directory');
		$this->load->model('assignment_model');
	    $query = $this->assignment_model->get_all_Assignments();
	    $pawprint = $this->session->userdata('pawprint');
	    $stack = array();
	    foreach ($query->result() as $row)
		{
		    $courseid = $row->courseid;
		    $aname = $row->aname;
			// $path = "./p/" . $courseid . '/'. $aname . '/' . $pawprint;
			$path = "./p/";
		    if (is_dir($path))
		    {
		    	$fileinfos = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
				foreach($fileinfos as $pathname => $fileinfo) 
				{
			    	if (!$fileinfo->isFile()) continue;
			    	array_push($stack, $pathname);
				}
		    }
		}
		$data['thispawprint'] = $pawprint;
		$data['stack'] = $stack;
		$data['msg'] = $msg;
		$this->load->view('assignment_list_view', $data);
	}
}