<?php
class Lessons extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private  $table ="lessons";

    function Insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    function Update($data){
        $this->db->where('id', $data['id']);
        $this->db->update($this->table, $data);
    }
    function Delete($data){
        $this->db->where('id', $data);
        $this->db->update($this->table,  array('disable' => true));
    }
    function GetLessonList(){

        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->result_array();
    }
    function GetList(){
        $this->db->where('disable', false);
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->result_array();
    }
    function GetDataById($id){

        $this->db->where('id', $id);
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->first_row('array');
    }

}