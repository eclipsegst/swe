<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_list extends CI_Controller {

	public function index($msg = NULL)
	{
		$this->load->model('course_model');
		$query = $this->course_model->get_all_courses();
		$data['query'] = $query->result();
		
		$courseid = $this->input->get('courseid',true);
	    $data['courseid'] = $courseid;
	    $this->load->model('assignment_model');
	    $query = $this->assignment_model->get_all_assignments();
	    $data['assignments'] = $query->result();

        $this->load->model('course_model');
		$courses = $this->course_model->selectByCourseID($courseid);
		$data['courses'] = $courses->result();
		$data['msg'] = $msg;
		$this->load->view('course_list_view', $data);
	}
}