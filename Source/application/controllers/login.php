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
	public function index()
	{
		$this->load->view('login');
	}

	function roleCheck()
	{
		$this->load->library('session');
<<<<<<< HEAD
		$this->session->keep_flashdata('feedback');
		$this->session->set_flashdata('feedback', 'Success message for client to see');
		
		header("Location: ../student");

		// $this->load->view('student');
=======
		// $this->session->keep_flashdata('feedback');
		$this->session->set_flashdata('feedback', 'You are successfully login!');
		
		header("Location: ../student");

		//$this->load->view('student');
>>>>>>> zztg2
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */