<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Section extends CI_Controller {

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
        $tas = $this->assignment_model->get_ta_by_courseid($courseid);
        $data['tas'] = $tas->result();

		$this->load->view('section_view', $data);
	}

	function insert()
	{
		
		$courseid 	 = $this->input->get('courseid',true);
    	$sectionid   = $_POST['sectionid'];
    	$pawprint = $_POST['pawprint'];
	
        $data = array(
                    'courseid' => $courseid,
                    'sectionid'=> $sectionid,
                    'pawprint' => $pawprint
                    );

        $this->load->model('assignment_model');
        $this->assignment_model->add_ta_to_section($data);

		redirect('section?courseid='.$courseid);
	}

	function delete()
	{
		$courseid  = $this->input->get('courseid',true);
    	$sectionid = $this->input->get('sectionid',true);
	
        $data = array(
                    'courseid' => $courseid,
                    'sectionid'=> $sectionid
                    );

        $this->load->model('assignment_model');
        $this->assignment_model->delete_section($data);

		redirect('section?courseid='.$courseid);
	}

	function delete_ta()
	{
		$courseid  = $this->input->get('courseid',true);
    	$sectionid = $this->input->get('sectionid',true);
    	$pawprint  = $this->input->get('pawprint',true);
	
        $data = array(
                    'courseid' => $courseid,
                    'sectionid'=> $sectionid,
                    'pawprint' => $pawprint
                    );

        $this->load->model('assignment_model');
        $this->assignment_model->delete_ta_from_section($data);

		redirect('section?courseid='.$courseid);
	}

}
