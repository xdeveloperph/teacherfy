<?php
class Students extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private  $table ="students";

    function Insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function Update($data){
        $this->db->where('id', $data['id']);
        $this->db->update($this->table, $data);
    }
    function RemoveAllPrimary($data){
        $this->db->set('primary', false);
        $this->db->where('userid', $data);
        $this->db->update($this->table);
    }
    function GetListofStudents($data){
        $this->db->where('disable', false);
        $this->db->where('teacherid', $data);
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->result_array();
    }
}