<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assignment extends CI_Controller {

  public function index($msg = NULL)
  {
    $data['msg'] = $msg;
    $this->load->model('assignment_model');
    $query = $this->assignment_model->get_all_assignments();
    
    $data['query'] = $query->result();

    $this->load->view('assignment_view', $data);
  }

  function delete()
  {
    $cid = $this->input->get('aid',true);
    $this->load->model('assignment_model');
    $this->assignment_model->delete($cid);
    $this->index();
  }
  
  public function do_logout(){
        $this->session->sess_destroy();
        redirect('login');
  }
}