<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller {

    public $content_data =array(
        'user' => '',
        'hdashboard' => '',
        'hcalendar' => '',
        'hprofile' => '',
        'hmanage' => '',
        'hroster' => '',
        'havailability' => '',
        'hearnings' => '',
        'sadmin' => '',
        'sstudent' => '',
        'sstudent' => '',
        'slesson' => '',
        'ssubject' => '',
        'error' => '',
        'success' => '',

    );
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['user'])){
            redirect(base_url(), false);
            die();
        }

        $this->content_data['user'] = $_SESSION['user'];

    }
    public function index()
    {
        $this->content_data['hdashboard'] ='active';
        $this->load->view('student/header',$this->content_data);
        $this->load->view('student/dashboard');
        $this->load->view('student/footer');
    }

    public function Dashboard()
    {
        $this->content_data['hdashboard'] ='active';
        $this->load->view('student/header',$this->content_data);
        $this->load->view('student/dashboard');
        $this->load->view('student/footer');
    }
    public function Calendar()
    {
        $this->load->model('CustomJoin');
        $this->content_data['calendar'] = $this->CustomJoin->GetStudentLessonSchedule($this->content_data['user']['id']);

        $this->content_data['hcalendar'] ='active';
        $this->load->view('student/header',$this->content_data);
        $this->load->view('student/calendar');
        $this->load->view('student/footer');
    }
    public function Availability()
    {
        $this->content_data['havailability'] ='active';
        $this->load->view('student/header',$this->content_data);
        $this->load->view('student/calendar');
        $this->load->view('student/footer');
    }
    public function Roster()
    {
        $this->load->model('students');
        if(isset($_POST['data'])){
            $ins_post=$_POST['data'];
            $ins_post['studentid']=$this->content_data['user']['id'];
            $this->students->Insert($ins_post);
        }
        $this->content_data['result'] = $this->students->GetListofStudents($this->content_data['user']['id']);

        $this->content_data['hroster'] ='active';
        $this->load->view('student/header',$this->content_data);
        $this->load->view('student/roster');
        $this->load->view('student/footer');
    }
    public function logout()
    {
        session_destroy();
        redirect(base_url(), false);
    }
}
