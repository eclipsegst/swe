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

    function selectByName($courseid,$aname)
    {
        $query = $this->db->get_where('assignments', 
            array('aname' =>$aname,
                'courseid'=>$courseid
            ));
        return $query;
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
