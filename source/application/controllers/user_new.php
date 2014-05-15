<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_new extends CI_Controller {

	public function index($msg = NULL)
	{
		$data['msg'] = $msg;
		$this->load->view('user_new_view', $data);
	}

	function insert()
	{
		// $uid 	   = $_POST['uid'];
    	$lastname  = $_POST['lastname'];
    	$firstname = $_POST['firstname'];
    	$pawprint  = $_POST['pawprint'];
    	$password  = $_POST['password'];
    	$role 	   = $_POST['role'];
			
        $data = array(
                    // 'uid'      => $uid,
                    'lastname' => $lastname,
                    'firstname'=> $firstname,
                    'pawprint' =>$pawprint,
                    'password' => $password,
                    'role'     => $role
                    );

        $this->load->model('user_model');
        $this->user_model->insert($data);

		$msg = 'Add successully!';
		redirect('user');
	}
}