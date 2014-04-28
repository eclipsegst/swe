<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assignment_single extends CI_Controller {

	public function index($msg = NULL)
	{

		$role = $this->session->userdata('role');
		$data['role'] = $role;
		
		$courseid = $this->input->get('courseid',true);
		$aname = $this->input->get('aname',true);

	    $this->load->model('assignment_model');
	    $query = $this->assignment_model->selectByName($courseid,$aname);
	    $data['assignments'] = $query->result();


	    $this->load->helper('directory');
	    $stack = array();
	    $rootpath = 'p/'.$courseid.'/'.$aname.'/';
		////if there is no submitted file, there might be an error because the line below.
		$fileinfos = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($rootpath));
		foreach($fileinfos as $pathname => $fileinfo) {
	    	if (!$fileinfo->isFile()) continue;
	    	array_push($stack, $pathname);
		}
		
		$data['stack'] = $stack;
		$data['msg'] = $msg;
		$this->load->view('assignment_single_view', $data);
	}
}