<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ta_new extends CI_Controller {

	public function index($msg = NULL)
	{
		$role = $this->session->userdata('role');
		$data['role'] = $role;
		$data['msg'] = $msg;
		$courseid = $this->input->get('courseid',true);
		$data['courseid'] = $courseid;
		$this->load->model('course_model');
	    $query = $this->course_model->selectByCourseId($courseid);
	    $data['query'] = $query->result();
	    $user = $this->course_model->get_ta_by_courseid($courseid);
	    $data['user'] = $user->result();

		$this->load->view('ta_new_view', $data);
	}

	function insert()
	{
		
		$role = $this->session->userdata('role');
		$data['role'] = $role;
		$courseid = $_POST['courseid'];
    	$pawprint = $_POST['pawprint'];
    	$password = $_POST['password'];
    	$uid	  = $_POST['uid'];
			
        $data1 = array(
                    'courseid'  => $courseid,
                    'pawprint'  => $pawprint
                    );
        $data2 = array(
        			'uid'      => $uid,    
                    'pawprint' => $pawprint,
                    'password' => $password,
                    'role'     => '1'	
                    );

        $this->load->model('course_model');
        $this->course_model->insertTa($data1);

        $this->load->model('user_model');
        $this->user_model->insert($data2);

		$msg = 'Add successully!';
		redirect('professor');
	}
}