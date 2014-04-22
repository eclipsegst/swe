<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_update extends CI_Controller {

	public function index($msg = NULL)
	{
		// $vid = $_GET["vid"];
		$cid = $this->input->get('cid',true);

		$data['msg'] = $msg;
        $this->load->model('course_model');
		$query = $this->course_model->select($cid);
		$data['query'] = $query->result();
		$this->load->view('course_update_view', $data);
	}

	function update()
	{

		$uid = $this->input->get('cid',true);
        $cid 	   = $_POST['cid'];
    	$coursename  = $_POST['coursename'];
    	$description = $_POST['description'];
    
        $data = array(
                    'cid'       => $cid,
                    'coursename'  => $coursename,
                    'description' => $description
                    );

        $this->load->model('course_model');
        $this->course_model->update($data,$cid);

		$msg = 'Update successully!';
		redirect('course');
	}
}