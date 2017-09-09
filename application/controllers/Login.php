<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
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
    public function index()
    {
        $this->load->model('User');
        if(isset($_POST['user'])){
            $result= $this->User->GetDatabyAcount($_POST['user']);

            if(empty($result)){
                $this->content_data['error']="Invalid Username or Password.";
            }else{
                $this->session->user = $result;
                if($result['privilege']=='1'){
                    redirect(base_url().'cms', false);
                }elseif($result['privilege']=='2'){

                    $this->load->model('Teacher_subject');

                    $temp_subject = $this->Teacher_subject->GetSubjectbyId($this->session->user['id']);

                    // check teacher subject if there is
                    if(empty($temp_subject)){
                        redirect(base_url().'setup/subject', false);
                    }else{
                        redirect(base_url().'teacher', false);
                    }

                }elseif($result['privilege']=='3'){
                    redirect(base_url().'student', false);
                }

            }

        }
        $this->load->view('header',$this->content_data);
        $this->load->view('login');
        $this->load->view('footer');
    }
}
