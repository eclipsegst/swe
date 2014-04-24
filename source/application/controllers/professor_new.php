<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Professor_new extends CI_Controller {

	public function index($msg = NULL)
	{
		$data['msg'] = $msg;
		$this->load->model('course_model');
	    $query = $this->course_model->get_all_courses();
	    $data['query'] = $query->result();
	    $user = $this->course_model->get_pro();
	    $data['user'] = $user->result();

		$this->load->view('professor_new_view', $data);
	}

	function insert()
	{
		
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
                    'role'     => '2'	
                    );

        $this->load->model('course_model');
        $this->course_model->insertPro($data1);

        $this->load->model('user_model');
        $this->user_model->insert($data2);

		$msg = 'Add successully!';
		$this->index($msg);
	}
}