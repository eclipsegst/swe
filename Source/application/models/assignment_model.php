<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assignment_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function get_all_Assignments(){
        $query = $this->db->get('Assignments');
        return $query;
    }

    function insert($data)
    {
        $this->db->insert('Assignments',$data);
    }

    function select($aid)
    {
        $query = $this->db->get_where('Assignments', array('aid' =>$aid));
        return $query;
    }
    function update($data,$aid)
    {
        $this->db->where('aid', $aid);
        $this->db->update('Assignments', $data); 
    }
    // function delete($aid)
    // {
    // 	$this->db->where('aid',$aid);
    //     $this->db->delete('Assignments');
    // }
}
?>