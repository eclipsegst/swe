<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($msg = NULL)
	{
		// $this->load->view('login');
		$data['msg'] = $msg;
		$this->load->view('login_view', $data);
	}

	function process()
	{
		$this->load->database();
		$this->load->helper('url');// base_url is usded in view file
		// $this->load->library('session');
		$this->load->model('login_model');
		$result = $this->login_model->validate();
		if(!$result){
			$msg = '<font color=red>Invalid username and/or password.</font><br />';
			$this->index($msg);
		}else{
			redirect('student');
		}
		// $query = $this->db->query('SELECT name FROM Puppy');

		
		// $name='Daisy';//id = 11
		// $id = '12';
		// if(isset($_POST['submit'])) {
		
		// 	$username = $_POST['username'];
		// 	// $password = sha1($_POST['password']);// encryption
		// 	$password = $_POST['password'];
		// 	$name = $username;
		// 	$id = $password;
		// }

		
		
		// $query = $this->db->query('SELECT * FROM Puppy WHERE name='.'"'.$name.'"');

		// if ($query->num_rows() > 0)
		// {
		//    	$row = $query->row();
		   	
		// 	if ($id == $row->id){
		// 		$message = array(
		// 			'message' => 'successful');
		// 		$this->load->view('student', $message);
		// 	}
		// 	else{
		// 		$error = array(
		// 			'error' => 'Login Failed. Incorrect Password!'.$id);
		// 		$this->load->view('login', $error);
		// 	}
		// }
		// else{

		// 	// $data = array(
		// 	// 	'query' => $query);
		// 	$error = array(
		// 			'error' => $name);
		// 	$this->load->view('login', $error);

		// 	// $this->load->view('student',$query);
		// 	// header("Location: ../student");
		// }

	}

	public function do_logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
