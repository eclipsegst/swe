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
		// $this->load->view('login');
		$error = array(
				'error' => '');
		$this->load->view('login', $error);
	}

	function roleCheck()
	{
		$this->load->database();
		$this->load->helper('url');// base_url is usded in view file

		// $query = $this->db->query('SELECT name FROM Puppy');

		
		// $data = array(
  //              'title' => 'My Title',
  //              'heading' => 'My Heading',
  //              'message' => 'My Message'
  //         );
		// $data['title'] = "My Real Title";
		// $data['heading'] = "My Real Heading";
		$name='Daisy';//id = 11
		$id = '12';
		if(isset($_POST['submit'])) {
		
			$username = $_POST['username'];
			// $password = sha1($_POST['password']);// encryption
			$password = $_POST['password'];
			$name = $username;
			$id = $password;
		}

		
		
		$query = $this->db->query('SELECT * FROM Puppy WHERE name='.'"'.$name.'"');

		if ($query->num_rows() > 0)
		{
		   	$row = $query->row();
		   	
			if ($id == $row->id){
				$message = array(
					'message' => 'successful');
				$this->load->view('student', $message);
			}
			else{
				$error = array(
					'error' => 'Login Failed. Incorrect Password!'.$id);
				$this->load->view('login', $error);
			}
		}
		else{

			// $data = array(
			// 	'query' => $query);
			$error = array(
					'error' => $name);
			$this->load->view('login', $error);

			// $this->load->view('student',$query);
			// header("Location: ../student");
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
