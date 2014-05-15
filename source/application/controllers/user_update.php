<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_update extends CI_Controller {

	public function index($msg = NULL)
	{
		$uid = $this->input->get('uid',true);

		$data['msg'] = $msg;
        $this->load->model('user_model');
		$query = $this->user_model->select($uid);
		$data['query'] = $query->result();
		$this->load->view('user_update_view', $data);
	}

	function update()
	{

		// $uid_old = $this->input->get('uid',true);
        // $uid_old = 261;
        $uid 	   = $_POST['uid'];
    	$lastname  = $_POST['lastname'];
    	$firstname = $_POST['firstname'];
    	$pawprint  = $_POST['pawprint'];
        $password  = $_POST['password'];
    	$role      = $_POST['role'];
    
        $data = array(
                    'uid'       => $uid,
                    'lastname'  => $lastname,
                    'firstname' => $firstname,
                    'pawprint'  => $pawprint,
                    'password'  => $password,
                    'role'      => $role
                    );

        $this->load->model('user_model');
        $this->user_model->update($data,$uid);

		$msg = 'Update successully!';
		redirect('user');
	}
}
