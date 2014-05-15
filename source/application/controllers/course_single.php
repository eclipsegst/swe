<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_single extends CI_Controller {

	public function index($msg = NULL)
	{
		$role = $this->session->userdata('role');
		$data['role'] = $role;
		
		$courseid = $this->input->get('courseid',true);
	    $data['courseid'] = $courseid;
	    $this->load->model('assignment_model');
	    $query = $this->assignment_model->get_all_assignments();
	    $data['assignments'] = $query->result();

        $this->load->model('course_model');
		$courses = $this->course_model->selectByCourseID($courseid);
		$data['courses'] = $courses->result();
		$data['msg'] = $msg;
		$this->load->view('course_single_view', $data);
	}

	function delete()
	{
		$aname     = $this->input->get('aname',true);	
		$courseid  = $this->input->get('courseid',true);	
        $data = array(
                    'aname' => $aname
                    );

        $this->load->model('assignment_model');
        $this->assignment_model->delete_assignment($data);

        $dir = 'p/'. $courseid.'/'.$aname;
	    foreach(glob($dir . '/*') as $file) {
	        if(is_dir($file))
	            rrmdir($file);
	        else
	            unlink($file);
	    }
	    rmdir($dir);

		redirect('course_single?courseid='.$courseid);
	}
	// function update()
	// {

	// 	$uid = $this->input->get('cid',true);
 //        $cid 	   = $_POST['cid'];
 //    	$coursename  = $_POST['coursename'];
 //    	$description = $_POST['description'];
    
 //        $data = array(
 //                    'cid'       => $cid,
 //                    'coursename'  => $coursename,
 //                    'description' => $description
 //                    );

 //        $this->load->model('course_model');
 //        $this->course_model->update($data,$cid);

	// 	$msg = 'Update successully!';
	// 	redirect('course');
	// }
}