<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

  public function index($msg = NULL)
  {
    $data['msg'] = $msg;
    $this->load->model('user_model');
    $query = $this->user_model->get_all_users();
    
    $data['query'] = $query->result();

    $this->load->view('user_view', $data);
  }

  function delete()
  {
    $uid = $this->input->get('uid',true);
    $this->load->model('user_model');
    $this->user_model->delete($uid);
    $this->index();
  }
  
  public function do_logout(){
        $this->session->sess_destroy();
        redirect('login');
  }
}