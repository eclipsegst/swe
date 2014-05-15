<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index($msg=NULL)
	{
		$data =$msg;
		$courseid = $_GET['courseid'];
		$data['aname'] = $_GET['aname'];

		$this->load->model('assignment_model');
        $query = $this->assignment_model->select_section($courseid);
        $data['query'] = $query->result();$data['courseid'] = $courseid;


		$this->load->view('upload_view',$data);
	}

	function do_upload()
	{
		$courseid = $_GET['courseid'];
		$aname = $_GET['aname'];
		if (isset($_POST["sectionid"]) && !empty($_POST["sectionid"])) {
		    $sectionid = $_POST["sectionid"];    
		}
		$pawprint = $this->session->userdata('pawprint');
		
		if(!empty($sectionid)){
			$assignment_path = './p/'.$courseid.'/'.$aname.'/'. $sectionid.'/'.$pawprint;
		}else{
			$assignment_path = './p/'.$courseid.'/'.$aname.'/'.$pawprint;
		}

		if (!is_dir($assignment_path)){
			mkdir($assignment_path, 0777, TRUE);	
		}
		$config['upload_path'] = $assignment_path;
		$config['allowed_types'] = '*';
		$config['max_size']	= '5242880';
		$config['min_size']	= '1';
		// $config['max_width']  = '1024';
		// $config['max_height']  = '768';

		$this->load->library('upload', $config);

		if($this->upload->do_upload()){
			$data = array('upload_data' => $this->upload->data());
			// $this->load->view('upload_success', $data);
			$filedetails = $this->upload->data();
			$file_name = $filedetails['file_name'];
			
			$query = 'insert into log (pawprint,courseid,aname,sectionid,action,filename) 
						values (\'' .$pawprint .'\',\'' .$courseid. '\',\'' .$aname. '\',\'' .$sectionid.'\',\'File Upload\',\'' .$file_name.'\')' ;

			$this->db->query($query);	
			redirect('upload_success');
		}else{
			$msg = "Upload failed.";
			$this->index($msg);
		}
	}
}
?>