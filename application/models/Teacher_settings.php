<?php
class Teacher_settings extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private  $table ="teacher_settings";

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
            $data['id']=$result['id'];
            $this->Update($data);
        }else{
            $this->Insert($data);
        }
    }
    function Update($data){
        $this->db->where('id', $data['id']);
        $this->db->update($this->table, $data);
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
    function GetSettingsbyUserId($data){

        $this->db->where('userid', $data);
        $this->db->where('disable', '0');
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->first_row('array');

    }


}