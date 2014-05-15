<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assignment_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function get_all_Assignments(){
        $query = $this->db->get('assignments');
        return $query;
    }

    function insert($data)
    {
        $this->db->insert('assignments',$data);
    }

    function select($aid)
    {
        $query = $this->db->get_where('assignments', array('aid' =>$aid));
        return $query;
    }
    function select_course_by_courseid_from_enroll($courseid)
    {
        $query = $this->db->get_where('enroll', array('courseid' =>$courseid));
        return $query;
    }

    function selectByName($courseid,$aname)
    {
        $query = $this->db->get_where('assignments', 
            array('aname' =>$aname,
                'courseid'=>$courseid
            ));
        return $query;
    }
    function insert_section($data){
        $this->db->insert('section',$data);
    }
    function select_section($courseid){;
        $query = $this->db->get_where('section', array('courseid' =>$courseid));
        return $query;
    }
    function add_ta_to_section($data){
        $this->db->insert('ta_course',$data);
    }
    function get_ta_by_courseid($courseid)
    {
        $query = $this->db->get_where('ta_course', array('courseid' =>$courseid));
        return $query;
    }
    function delete_ta_from_section($data)
    {
        $this->db->delete('ta_course', $data); 
    }
    function delete_ta_from_course($data)
    {
        $this->db->delete('ta_course', $data); 
    }
    function delete_section($data)
    {
        $this->db->delete('section', $data); 
    }
    function delete_assignment($data)
    {
        $this->db->delete('assignments', $data); 
    }

    function update($data,$aid)
    {
        $this->db->where('aid', $aid);
        $this->db->update('assignments', $data); 
    }
    // function delete($aid)
    // {
    // 	$this->db->where('aid',$aid);
    //     $this->db->delete('Assignments');
    // }
}
?>
