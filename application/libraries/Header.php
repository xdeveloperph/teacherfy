<?php
class Header extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function GetHeader(){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

}