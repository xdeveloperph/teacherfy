<?php
class Subject extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private  $table ="subjects";

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
    function GetAllList(){

        $query = $this->db->query("
                    SELECT subjects.id, subjects.lesson_id, lessons.name as ln, subjects.name, subjects.description, subjects.photo, subjects.disable
                    FROM subjects
                    JOIN lessons
                    ON subjects.lesson_id=lessons.id
                    ");
        return $query->result_array();
    }
    function GetList(){

        $query = $this->db->query("
                    SELECT subjects.id, subjects.lesson_id, lessons.name as ln, subjects.name, subjects.description, subjects.photo, subjects.disable
                    FROM subjects
                    JOIN lessons
                    ON subjects.lesson_id=lessons.id
                    where subjects.disable = FALSE
                    ");
        return $query->result_array();


    }
    function GetDataById($id){

        $this->db->where('id', $id);
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->first_row('array');
    }
    function GetDataByLessonId($id){

        $this->db->where('lesson_id', $id);
        $this->db->where('disable', '0');
        $this->db->from($this->table);
        $query =$this->db->get();
        return $query->result_array();
    }

}