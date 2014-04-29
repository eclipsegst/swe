<?php

class Zip extends CI_Controller {
    function __construct() {
        parent::__construct();
         
        $this->load->library('zip');
    }
     
    function index()
    {
        $data = array();
         
        $this->load->view('zip', $data);
    }
     
    function add_data()
    {
        $data = '/ta_course/courseid/sectionid';
       	$this->zip->read_file($path); 
     
            $this->zip->download('submissions.zip');
        } else {
            $this->index();
        }
    }
}
