<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Cms extends CI_Controller {

    public $content_data =array(
        'user' => '',
        'hdashboard' => '',
        'hmanage' => '',
        'hprofile' => '',
        'sadmin' => '',
        'steacher' => '',
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
        $this->load->view('cms/header',$this->content_data);
        $this->load->view('cms/dashboard');
        $this->load->view('cms/footer');
    }

    public function Dashboard()
    {
        $this->content_data['hdashboard'] ='active';
        $this->load->view('cms/header',$this->content_data);
        $this->load->view('cms/dashboard');
        $this->load->view('cms/footer');
    }
    public function Manage()
    {
        $control=$this->uri->segment(3);
        $set_id=$this->uri->segment(4);

        $this->load->model('User');
        $this->load->model('lessons');
        $this->load->model('subject');
        switch($control){
            case 'administrator':

                $result=$this->User->GetAministratorList();
                $this->content_data['hmanage'] ='active';
                $this->content_data['sadmin'] ='active';
                $this->content_data['result'] =$result;
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/administrator');
                $this->load->view('cms/footer');
                break;
            case 'teacher':
                $this->content_data['hmanage'] ='active';
                $this->content_data['steacher'] ='active';
                $result=$this->User->GetTeacherList();
                $this->content_data['result'] =$result;
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/teacher');
                $this->load->view('cms/footer');
                break;
            case 'student':
                $this->content_data['hmanage'] ='active';
                $this->content_data['sstudent'] ='active';
                $result=$this->User->GetStudentList();
                $this->content_data['result'] =$result;
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/student');
                $this->load->view('cms/footer');
                break;
            case 'lesson':

                /// Get Data
                $result=$this->lessons->GetLessonList();
                $this->content_data['result'] =$result;

                // Set Header
                $this->content_data['hmanage'] ='active';
                $this->content_data['slesson'] ='active';

                // Display Content
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/lesson');
                $this->load->view('cms/footer');
                break;
            case 'subject':
                /// Get Data
                $result=$this->subject->GetAllList();
                $this->content_data['result'] =$result;

                $this->content_data['hmanage'] ='active';
                $this->content_data['ssubject'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/subject');
                $this->load->view('cms/footer');
                break;
            default:
                $this->load->model('User');
                $result=$this->User->GetAministratorList();
                $this->content_data['hmanage'] ='active';
                $this->content_data['sadmin'] ='active';
                $this->content_data['result'] =$result;
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/administrator');
                $this->load->view('cms/footer');
                break;
        }

    }
    public function create()
    {
        $control=$this->uri->segment(3);
        $this->load->model('lessons');
        $this->load->model('subject');
        switch($control){
            case 'administrator':
                $this->content_data['hmanage'] ='active';
                $this->content_data['sadmin'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/manage');
                $this->load->view('cms/footer');
                break;
            case 'teacher':
                $this->content_data['hmanage'] ='active';
                $this->content_data['steacher'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/footer');
                break;
            case 'student':
                $this->content_data['hmanage'] ='active';
                $this->content_data['sstudent'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/footer');
                break;
            case 'lesson':


                $this->form_validation->set_rules('data[name]', 'Lesson', 'required');
                if (!$this->form_validation->run() == false) {

                    $insertID=$this->lessons->Insert($_POST['data']);
                    $up_result=$this->do_upload('lesson/',$insertID);

                    if($up_result){

                        $temp=array('id'=>$insertID , 'photo' =>$this->content_data['img_up']['upload_data']['full_path'] );
                        $this->lessons->update($temp);
                    }
                    $this->content_data['success'] ="Successfully added new data.";
                }
                $this->content_data['hmanage'] ='active';
                $this->content_data['slesson'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/form/lesson');
                $this->load->view('cms/footer');
                break;
            case 'subject':

                $this->form_validation->set_rules('data[name]', 'Subject', 'required');
                if (!$this->form_validation->run() == false) {

                    $insertID=$this->subject->Insert($_POST['data']);
                    $up_result=$this->do_upload('subject/',$insertID);

                    if($up_result){

                        $temp=array('id'=>$insertID , 'photo' =>$this->content_data['img_up']['upload_data']['full_path'] );
                        $this->subject->update($temp);
                    }
                    $this->content_data['success'] ="Successfully added new data.";
                }
                $this->content_data['lessonlist'] =$this->lessons->GetList();

                $this->content_data['hmanage'] ='active';
                $this->content_data['ssubject'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/form/subject');
                $this->load->view('cms/footer');
                break;
            default:
                $this->content_data['hmanage'] ='active';
                $this->content_data['sadmin'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/manage');
                $this->load->view('cms/footer');
                break;
        }

    }
    public function update()
    {
        $control=$this->uri->segment(3);
        $req_id=$this->uri->segment(4);
        $this->load->model('lessons');
        $this->load->model('subject');
        switch($control){
            case 'administrator':
                $this->content_data['hmanage'] ='active';
                $this->content_data['sadmin'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/manage');
                $this->load->view('cms/footer');
                break;
            case 'teacher':
                $this->content_data['hmanage'] ='active';
                $this->content_data['steacher'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/footer');
                break;
            case 'student':
                $this->content_data['hmanage'] ='active';
                $this->content_data['sstudent'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/footer');
                break;
            case 'lesson':

                $this->form_validation->set_rules('data[name]', 'Lesson', 'required');
                if (!$this->form_validation->run() == false) {
                    $this->lessons->update($_POST['data']);
                    $up_result=$this->do_upload('lesson/',$req_id);
                    if($up_result){
                        $temp=array('id'=>$req_id , 'photo' =>$this->content_data['img_up']['upload_data']['full_path'] );
                        $this->lessons->update($temp);
                    }
                    $this->content_data['success'] ="Successfully updated data information.";
                }
                $result=$this->lessons->GetDataById($req_id);
                $this->content_data['result'] =$result;

                $this->content_data['hmanage'] ='active';
                $this->content_data['slesson'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/form/lesson');
                $this->load->view('cms/footer');
                break;
            case 'subject':
                $this->load->model('lessons');
                $this->form_validation->set_rules('data[name]', 'Lesson', 'required');
                if (!$this->form_validation->run() == false) {
                    $this->subject->update($_POST['data']);
                    $up_result=$this->do_upload('lesson/',$req_id);
                    if($up_result){
                        $temp=array('id'=>$req_id , 'photo' =>$this->content_data['img_up']['upload_data']['full_path'] );
                        $this->subject->update($temp);
                    }
                    $this->content_data['success'] ="Successfully updated data information.";
                }
                $result=$this->subject->GetDataById($req_id);

                $this->content_data['result'] =$result;
                $this->content_data['lessonlist'] =$this->lessons->GetList();

                $this->content_data['hmanage'] ='active';
                $this->content_data['ssubject'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/form/subject');
                $this->load->view('cms/footer');
                break;
            default:
                $this->content_data['hmanage'] ='active';
                $this->content_data['sadmin'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/manage');
                $this->load->view('cms/footer');
                break;
        }

    }
    public function status()
    {
        $this->load->model('lessons');
        $this->load->model('subject');
        $control=$this->uri->segment(3);
        $set_id=$this->uri->segment(4);
        $status=$this->uri->segment(5);
        switch($control){
            case 'administrator':
                $this->content_data['hmanage'] ='active';
                $this->content_data['sadmin'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/manage');
                $this->load->view('cms/footer');
                break;
            case 'teacher':
                $this->content_data['hmanage'] ='active';
                $this->content_data['steacher'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/footer');
                break;
            case 'student':
                $this->content_data['hmanage'] ='active';
                $this->content_data['sstudent'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/footer');
                break;
            case 'lesson':


                if($status =="enable"){
                    $temp_update = array('id'=> $set_id, 'disable' => false);
                    $this->lessons->update($temp_update);
                    $this->content_data['success'] ="Data set to enable.";
                }elseif($status =="disable"){
                    $temp_update = array('id'=> $set_id, 'disable' => true);
                    $this->lessons->update($temp_update);
                    $this->content_data['error'] ="Data set to disable.";
                }
                $result=$this->lessons->GetLessonList();
                $this->content_data['result'] =$result;

                $this->content_data['hmanage'] ='active';
                $this->content_data['slesson'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/lesson');
                $this->load->view('cms/footer');
                break;
            case 'subject':


                if($status =="enable"){
                    $temp_update = array('id'=> $set_id, 'disable' => false);
                    $this->subject->update($temp_update);
                    $this->content_data['success'] ="Data set to enable.";
                }elseif($status =="disable"){
                    $temp_update = array('id'=> $set_id, 'disable' => true);
                    $this->subject->update($temp_update);
                    $this->content_data['error'] ="Data set to disable.";
                }
                $result=$this->subject->GetAllList();
                $this->content_data['result'] =$result;

                $this->content_data['hmanage'] ='active';
                $this->content_data['ssubject'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/subject');
                $this->load->view('cms/footer');
                break;
            default:
                $this->content_data['hmanage'] ='active';
                $this->content_data['sadmin'] ='active';
                $this->load->view('cms/header',$this->content_data);
                $this->load->view('cms/sidebar');
                $this->load->view('cms/manage');
                $this->load->view('cms/footer');
                break;
        }

    }
    public function do_upload($url,$file_name)
    {
        $config['upload_path']          = './images/'.$url;
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 3000;
        $config['overwrite']             = true;
        $config['file_name']             = $file_name;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('photo'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->content_data['img_error'] =$error;
            return false;
        }else
        {
            $this->content_data['img_up']  = array('upload_data' => $this->upload->data());
            return true;
        }
    }
    public function logout()
    {
        session_destroy();
        redirect(base_url(), false);
    }
}
