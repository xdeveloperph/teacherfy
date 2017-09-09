<?php
class User_award extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private  $table ="user_award";

    function Insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    function InsertSingle($data){
        if(!empty($data['id'])){
            $this->update($data);
        }else{
            $this->Insert($data);
        }
    }
    function Update($data){
        $this->db->where('id', $data['id']);
        $this->db->update($this->table, $data);
    }
    function disable($data){
        $this->db->where('id', $data);
        $this->db->set('disable', true);
        $this->db->update($this->table);
    }
    function GetDatabyId($data){

        $this->db->where('id',$data['id']);
        $this->db->where('userid',$data['userid']);
        $this->db->from($this->table);
        $query =$this->db->get();
        $result=  $query->first_row('array');
        return $result;

    }
    function GetAllList($data){

        $this->db->where('userid',$data);
        $this->db->where('disable',false);
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->result_array();

    }
}