<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function get_all_users(){
        $query = $this->db->get('users');
        return $query;
    }

    function insert($data)
    {
        $this->db->insert('users',$data);
    }

    function select($uid)
    {
        $query = $this->db->get_where('users', array('uid' =>$uid));
        return $query;
    }
    function update($data,$uid)
    {
        $this->db->where('uid', $uid);
        $this->db->update('users', $data); 
    }
    function delete($uid)
    {
    	$this->db->where('uid',$uid);
        $this->db->delete('users');
    }
}
?>