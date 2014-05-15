<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plagcheck extends CI_Controller {

	public function index($msg = NULL)
	{

		
	}
	
	public function checkPlag($courseid="",$aname="",$section="")
	{
		// if($courseid != "") 
		// {
			
			$this->load->model("course_model");
			$courseid = $this->input->get('courseid',true);
			$aname = $this->input->get('aname',true);
			$pawprint = $this->session->userdata('pawprint');
			$this->load->model('course_model');
			// $sections = $this->course_model->get_section_by_ta($pawprint);
			// $result = $sections->result();
			// foreach ($result as $row) {
			// 	$section = $row->section;
			// }
			// $section = '1';


			$path = '/students/groups/cs4320s14grp14/public_html/source/p/'. $courseid .'/'. $aname .'/'. '1';
			$results = scandir($path);
			$moss = "/students/groups/cs4320s14grp14/moss -d ";
			$listOfDir = "";
			foreach ($results as $result) {
				if ($result === '.' or $result === '..') continue;

				if (is_dir($path . '/' . $result)) {
					//code to use if directory
					$listOfDir = $listOfDir . $path . '/' . $result . '/* ' ;
				}
			}
			$moss = $moss . $listOfDir;
			$data['moss'] = $moss;
			$return = exec($moss);
			$data['return'] = $return;
			if(strpos($return, 'http') !== false)
			{
				//header("Location: ".$return);
				$data['url'] = $return;
				$this->load->view('plagview',$data);
			}
			$this->load->view('plagview',$data);
			
		// }
	}
}