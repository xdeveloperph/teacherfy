<?php
class Teacher_subject extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private  $table ="teacher_subject";

    function Insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    function InsertSingle($data){

        $this->db->where('userid', $data['userid']);
        $this->db->where('subjectid', $data['subjectid']);
        $this->db->from($this->table);
        $query =$this->db->get();
        $result=  $query->first_row('array');
        if(!empty($result)){
            $this->Enable($result);
        }else{
            $this->Insert($data);
        }

    }
    function DisableAll($data){
        $this->db->set('disable', true);
        $this->db->where('userid', $data);
        $this->db->update($this->table);
    }
    function Enable($data){
        $this->db->set('disable', false);
        $this->db->where('id', $data['id']);
        $this->db->update($this->table);
    }
    function GetSubjectbyId($data){

        $this->db->where('userid', $data);
        $this->db->where('disable', '0');
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->result_array();

    }


}