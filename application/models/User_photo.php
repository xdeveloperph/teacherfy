<?php
class User_photo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private  $table ="user_photo";

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
    function GetUserAddress($data){

        $this->db->where('userid',$data);
        $this->db->from($this->table);
        $query =$this->db->get();
        $result=  $query->first_row('array');
        return $result;

    }
}