<?php
class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private  $table ="user";

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
    function GetDatabyAcount($data){

        $this->db->select('id, fname, mname, lname, email, photo ,privilege, verified');
        $this->db->where('email', $data['email']);
        $this->db->where('password', md5($data['password']));
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->first_row('array');
    }
    function GetDatabyId($data){

        $this->db->select('id, fname, mname, lname, email, photo ,privilege, verified');
        $this->db->where('id', $data);
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->first_row('array');
    }
    function CheckEmailAvailable($data){

        $this->db->where('email', $data['email']);
        $this->db->where('password', md5($data['password']));
        $this->db->from($this->table);
        if($this->db->count_all_results() > 1 ){
            return false;
        }else{
            return true;
        }
    }
    function GetAministratorList(){
        $this->db->where('verified', 1);
        $this->db->where('privilege', 1);
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->result_array();
    }
    function GetTeacherList(){
        $this->db->where('verified', 1);
        $this->db->where('privilege', 2);
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->result_array();
    }
    function GetStudentList(){
        $this->db->where('verified', 1);
        $this->db->where('privilege', 3);
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->result_array();
    }
    function ValidatRegistration($data){
        $this->db->where('email', $data['email']);
        $this->db->from($this->table);
        $query =$this->db->get();


        $count = $query->count_all_results();

        if($count > 0 ){
            return false;
        }else{
            return true;
        }

    }

}