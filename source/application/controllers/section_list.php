<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Section_list extends CI_Controller {

	public function index($msg = NULL)
	{
		$role = $this->session->userdata('role');
		$data['role'] = $role;
		$data['msg'] = $msg;
		$courseid = $this->input->get('courseid',true);
		$data['courseid'] = $this->input->get('courseid',true);
		$this->load->model('assignment_model');
        $query = $this->assignment_model->select_section($courseid);
        $data['query'] = $query->result();

		$this->load->view('section_list_view', $data);
	}

	function insert()
	{
		
		$courseid 	 = $this->input->get('courseid',true);
    	$sectionid  = $_POST['sectionid'];
    	$description = $_POST['description'];
	
        $data = array(
                    'courseid'     => $courseid,
                    'sectionid'  => $sectionid,
                    'description' => $description
                    );

        $this->load->model('assignment_model');
        $this->assignment_model->insert_section($data);

        $course_folder = "./p/" . $courseid;
        $section_folder = $course_folder . '/'.$sectionid;

        if (!is_dir($course_folder)){
			mkdir($course_folder, 0777, TRUE);	
		}else if (!is_dir($section_folder)){
			mkdir($section_folder, 0777, TRUE);	
		}

		$this->load->model('course_model');
		$query = $this->course_model->get_section_by_courseid($courseid);
		redirect('section_list?courseid='.$courseid);
	}
	function delete()
	{
		
	}

}
