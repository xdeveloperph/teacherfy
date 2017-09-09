<?php
class User_address extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private  $table ="user_address";

    function Insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    function InsertSingle($data){

        $this->db->where('userid', $data['userid']);
        $this->db->from($this->table);
        $query =$this->db->get();
        $result=  $query->first_row('array');
        if(!empty($result)){
            $data['id'] = $result["id"];
            $this->update($data);
        }else{
            $this->Insert($data);
        }

    }
    function Update($data){
        $this->db->where('id', $data['id']);
        $this->db->update($this->table, $data);
    }
    function GetUserAddress($data){

        $this->db->where('userid',$data);
        $this->db->from($this->table);
        $query =$this->db->get();
        $result=  $query->first_row('array');
        return $result;

    }
}