<?php
class User_accounts extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private  $table ="user_accounts";

    function Insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    function InsertSingle($data){

        $this->db->where('userid', $data['userid']);
        $this->db->where('accounts', $data['accounts']);
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
    function GetUserAccounts($data){

        $this->db->where('userid',$data);
        $this->db->from($this->table);
        $query =$this->db->get();
        $result=  $query->result_array();
        $return_val=array();
        foreach($result as $items){
            $return_val[$items['accounts']]=$items['username'];
        }
        return $return_val;

    }
    function GetUserAccountsOthers($data){

        $this->db->where('userid',$data);
        $this->db->where('accounts','others');
        $this->db->from($this->table);
        $query =$this->db->get();
        $result=  $query->result_array();

        return $result;

    }
}