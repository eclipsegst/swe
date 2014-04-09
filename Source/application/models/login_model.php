<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        // grab user input
        $pawprint = $this->security->xss_clean($this->input->post('pawprint'));
        $password = $this->security->xss_clean($this->input->post('password'));
        // $pawprint = $_POST['pawprint'];
        // $password = $_POST['password'];
        // Prep the query
        $this->db->where('pawprint', $pawprint);
        $this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('users');
        // Let's check if there are any results
        
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'userid' => $row->sid,
                    'firstname' => $row->firstname,
                    'lastname' => $row->lastname,
                    'password' => $row->password,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}
?>