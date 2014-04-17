<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function get_all_Courses(){
        $query = $this->db->get('Courses');
        return $query;
    }

    function insert($data)
    {
        $this->db->insert('Courses',$data);
    }

    function select($cid)
    {
        $query = $this->db->get_where('Courses', array('cid' =>$cid));
        return $query;
    }
    function update($data,$cid)
    {
        $this->db->where('cid', $cid);
        $this->db->update('Courses', $data); 
    }
    function delete($cid)
    {
    	$this->db->where('cid',$cid);
        $this->db->delete('Courses');
    }
}
?>