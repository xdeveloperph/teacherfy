<?php
class CustomJoin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function GetLessonSubjectList(){
        $this->load->model('lessons');
        $this->load->model('subject');

        $tempresult =$this->lessons->GetList();
        $result=array();
        foreach($tempresult as $item){
            $item['sub'] =$this->subject->GetDataByLessonId($item['id']);
            $result[]=$item;
        }
        return $result;
    }
    function GetTeacherSubject($data){
        $this->load->model('Teacher_subject');
        $this->load->model('Subject');

        $tempresult =$this->Teacher_subject->GetSubjectbyId($data);
        $result=array();
        foreach($tempresult as $item){
            $result[]=$this->Subject->GetDataById($item['subjectid']);
        }
        return $result;
    }
    function GetTeacherLessonSchedule($data){
        $this->load->model('user');
        $this->load->model('Subject');
        $this->load->model('Lesson_schedule');
        $tempresult =$this->Lesson_schedule->GetDatabyTeaherId($data);
        $result=array();
        foreach($tempresult as $item){
            $result[]= array(
                'info'=>$item,
                'user' => $this->user->GetDatabyId($item['teacherid']),
                'subject' => $this->Subject->GetDataById($item['subjectid']),
            );
        }
        return $result;
    }
    function GetStudentLessonSchedule($data){
        $this->load->model('user');
        $this->load->model('Subject');
        $this->load->model('Lesson_schedule');
        $tempresult =$this->Lesson_schedule->GetDatabyUserId($data);
        $result=array();
        foreach($tempresult as $item){
            $result[]= array(
                'info'=>$item,
                'user' => $this->user->GetDatabyId($item['teacherid']),
                'subject' => $this->Subject->GetDataById($item['subjectid']),
            );
        }
        return $result;
    }
}