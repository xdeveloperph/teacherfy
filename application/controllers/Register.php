<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
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
        if(isset($_POST['data'])){
            $post_user=$_POST['data'];

            $email_val= $this->User->CheckEmailAvailable($_POST['data']);
            if($email_val){

                $this->form_validation->set_rules('data[fname]', 'Username', 'required');
                $this->form_validation->set_rules('data[lname]', 'Username', 'required');
                $this->form_validation->set_rules('data[email]', 'Username', 'required');
                $this->form_validation->set_rules('ret-pass', 'Username', 'required');
                $this->form_validation->set_rules('data[password]', 'Password', 'required',
                    array('required' => 'You must provide a %s.')
                );
                $this->form_validation->set_rules('ret-pass', 'Password Confirmation', 'required');
                if ($this->form_validation->run() == true)
                {
                    $post_user['password']=md5($post_user['password']);
                    $post_user['privilege']=2;
                    $userId=$this->User->Insert($post_user);

                    //get user data
                    $result=$this->User->GetDatabyId($userId);

                    //set sesson
                    $this->session->user = $result;

                    $this->load->model('Teacher_subject');

                    // check teacher subject if there is

                    $temp_subject = $this->Teacher_subject->GetSubjectbyId($this->session->user->ID);

                    if(empty($temp_subject)){
                        redirect(base_url().'setup/subject', false);
                    }

                }
            }else{
                $this->content_data['error']="Email already used.";
            }


        }
        $this->load->view('header',$this->content_data);
        $this->load->view('register-teacher');
        $this->load->view('footer');
    }
}
