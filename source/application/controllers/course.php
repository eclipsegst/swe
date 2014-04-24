<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Controller {

  public function index($msg = NULL)
  {
    $data['msg'] = $msg;
    $this->load->model('course_model');
    $query = $this->course_model->get_all_courses();
    
    $data['query'] = $query->result();

    $this->load->view('course_view', $data);
  }

  function delete()
  {
    $courseid = $this->input->get('courseid',true);
    $dir = './p/'.$courseid;
    system('/bin/rm -rf ' . escapeshellarg($dir));

    $this->load->model('course_model');
    $this->course_model->delete($courseid);
    $this->index();
  }

  public function do_logout(){
        $this->session->sess_destroy();
        redirect('login');
  }
}