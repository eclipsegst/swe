<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assignment_new extends CI_Controller {

	public function index($msg = NULL)
	{
		$role = $this->session->userdata('role');
		$data['role'] = $role;
		$data['msg'] = $msg;
		$data['courseid'] = $this->input->get('courseid',true);

		$this->load->view('assignment_new_view', $data);
	}

	function insert()
	{
		
		$courseid 	 = $_POST['courseid'];
    	$aname  = $_POST['aname'];
    	$duedate  = $_POST['duedate'];
    	$description = $_POST['description'];
	
        $data = array(
                    'courseid'     => $courseid,
                    'aname'  => $aname,
                    'duedate'  => $duedate,
                    'description' => $description,
                    );

        $this->load->model('assignment_model');
        $this->assignment_model->insert($data);
        $role = $this->session->userdata('role');
		if($role == 'professor'){
			redirect('professor');
		}elseif($role == 'ta'){
			redirect('ta');
		}elseif($role == 'admin'){
			redirect('admin');
		}
	}
}