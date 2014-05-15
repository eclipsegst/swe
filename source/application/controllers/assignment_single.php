<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assignment_single extends CI_Controller {

	public function index($msg = NULL)
	{

		$role = $this->session->userdata('role');
		$data['role'] = $role;
		$tapawprint = $this->session->userdata('pawprint');
		$data['tapawprint'] = $tapawprint;
		
		$courseid = $this->input->get('courseid',true);
		$aname = $this->input->get('aname',true);





	    $this->load->model('assignment_model');
	    $query = $this->assignment_model->selectByName($courseid,$aname);
	    $data['assignments'] = $query->result();

	    $tas = $this->assignment_model->get_ta_by_courseid($courseid);
        $data['tas'] = $tas->result();

	    $this->load->helper('directory');
	    $stack = array();
	    $rootpath = 'p/'.$courseid.'/'.$aname.'/';
		////if there is no submitted file, there might be an error because the line below.
		$fileinfos = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($rootpath));
		foreach($fileinfos as $pathname => $fileinfo) {
	    	if (!$fileinfo->isFile()) continue;
	    	array_push($stack, $pathname);
		}
		
		$this->load->model('assignment_model');
	    $enroll = $this->assignment_model->select_course_by_courseid_from_enroll($courseid);
	    $data['enroll'] = $enroll->result();

	    $total_enroll = 0;
	    $count = 0;
	    foreach($enroll->result() as $row){
	    	foreach ($stack as $items)
			{
				$pieces = explode("/", $items);
				$pawprint = $pieces[count($pieces)-2];
				$filename = $pieces[count($pieces)-1];
				if($row->pawprint == $pawprint){
					$count ++;
				}
			}

	    	$total_enroll++;
	    }

	    if($total_enroll!=0){
	    	$submission_rate = round($count/$total_enroll,4)*100; 
	    }
	    else{
	    	$submission_rate = 0;
	    }

	    $data['count'] = $count;
	    $data['total_enroll'] = $total_enroll;
	    $data['submission_rate'] = $submission_rate;
		$data['stack'] = $stack;
		$data['msg'] = $msg;
		$this->load->view('assignment_single_view', $data);
	}
}
