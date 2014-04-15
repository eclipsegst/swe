<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate()
    {
        $pawprint = $_POST['pawprint'];
        $password = $_POST['password'];

        $this->db->where('pawprint', $pawprint);
        $this->db->where('password', $password);
        
        $query = $this->db->get('users');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            if($row->role == 0){
                $data=array(
                    'role' => "student",
                    'firstname' => $row->firstname,
                    'validate' => true);
            }elseif ($row->role == 1) {
                $data=array(
                    'role' => "ta",
                    'firstname' => $row->firstname,
                    'validate' => true);
            }elseif ($row->role == 2) {
                $data=array(
                    'role' => "professor",
                    'firstname' => $row->firstname,
                    'validate' => true);
            }elseif ($row->role == 3) {
                $data=array(
                    'role' => "tester",
                    'firstname' => $row->firstname,
                    'validate' => true);
            }else{
                $data=array(
                    'role' => "admin",
                    'firstname' => $row->firstname,
                    'validate' => true);
            }

            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }

    function get_all_users()
    {
        $query = $this->db->get('users');
        return $query;
    }


}
?>