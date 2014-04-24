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

    function selectByCourseID($courseid)
    {
        $query = $this->db->get_where('Courses', array('courseid' =>$courseid));
        return $query;
    }
    
    function update($data,$cid)
    {
        $this->db->where('cid', $cid);
        $this->db->update('Courses', $data); 
    }
    function delete($courseid)
    {
    	$this->db->where('courseid',$courseid);
        $this->db->delete('Courses');
    }
    function insertPro($data){
        $this->db->insert('pro_course',$data);
    }
    function get_pro(){
        $query = $this->db->get('pro_course');
        return $query;
    }
    function selectByProPawprint($pawprint)
    {
        $query = $this->db->get_where('pro_course', array('pawprint' =>$pawprint));
        return $query;
    }
    function insertTa($data){
        $this->db->insert('ta_course',$data);
    }
    function get_ta(){
        $query = $this->db->get('ta_course');
        return $query;
    }

    function get_ta_by_courseid($courseid){
        $query = $this->db->get_where('ta_course', array('courseid' =>$courseid));
        return $query;
    }
    function get_course_by_ta_pawprint($pawprint)
    {
        $query = $this->db->get_where('ta_course', array('pawprint' =>$pawprint));
        return $query;
    }
}
    