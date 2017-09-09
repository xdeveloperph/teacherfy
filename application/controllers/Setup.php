<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Setup extends CI_Controller {

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
        $this->load->view('setup/header',$this->content_data);
        $this->load->view('setup/subject');
        $this->load->view('setup/footer');
    }

    public function subject()
    {
        $this->load->model('Teacher_subject');
        $this->load->model('CustomJoin');
        if(isset($_POST['data'])){
            $this->Teacher_subject->DisableAll($this->content_data['user']['id']);
            foreach($_POST['data'] as $items){
                $ins_item=array(
                    'userid'=> $this->content_data['user']['id'],
                    'subjectid'=> $items,
                );
                $this->Teacher_subject->InsertSingle($ins_item);
            }
            redirect(base_url().'setup/location', false);
        }

        $this->content_data['result'] = $this->CustomJoin->GetLessonSubjectList();
        $this->content_data['tsubject'] = $this->Teacher_subject->GetSubjectbyId($this->content_data['user']['id']);
        $this->load->view('setup/header',$this->content_data);
        $this->load->view('setup/subject');
        $this->load->view('setup/footer');
    }
    public function location()
    {
        $this->load->model('teacher_settings');
        if(isset($_POST['data'])){
            $post_data= $_POST['data'];

            $ins_item=array(
                'userid'=> $this->content_data['user']['id'],
                'home'=> (isset($post_data['home']))? (bool)$post_data['home'] : false,
                'studenthome'=> (isset($post_data['studenthome']))? (bool)$post_data['studenthome'] : false,
                'online'=> (isset($post_data['online']))? (bool)$post_data['online'] : false,
            );

            $this->teacher_settings->InsertSingle($ins_item);
            redirect(base_url().'setup/address', false);
        }

        $this->content_data['setup'] = $this->teacher_settings->GetSettingsbyUserId($this->content_data['user']['id']);
        $this->load->view('setup/header',$this->content_data);
        $this->load->view('setup/location');
        $this->load->view('setup/footer');
    }
    public function Address()
    {
        $this->load->model('user_address');
        if(isset($_POST['data'])){
            $post_data= $_POST['data'];
            $post_data['userid']=$this->content_data['user']['id'];
            $this->user_address->InsertSingle($post_data);
            redirect(base_url().'setup/Account', false);
        }

        $this->content_data['result'] = $this->user_address->GetUserAddress($this->content_data['user']['id']);
        $this->load->view('setup/header',$this->content_data);
        $this->load->view('setup/address');
        $this->load->view('setup/footer');
    }
    public function Account()
    {
        $this->load->model('User_accounts');
        if(isset($_POST['sub'])) {
            $ins_data=array(
                'userid'=> $this->content_data['user']['id'],
                'app'=> $_POST['sub']['othersapp'],
                'accounts'=> 'others',
                'username'=> $_POST['sub']['othersacc'],
            );
            $this->User_accounts->InsertSingle($ins_data);
        }
        if(isset($_POST['data'])){
            foreach($_POST['data'] as $key=>$value){
                $ins_data=array(
                    'userid'=> $this->content_data['user']['id'],
                    'accounts'=> $key,
                    'username'=> $value,
                );
                $this->User_accounts->InsertSingle($ins_data);
            }
            redirect(base_url().'setup/about', false);
        }

        $this->content_data['result'] = $this->User_accounts->GetUserAccounts($this->content_data['user']['id']);
        $this->content_data['others'] = $this->User_accounts->GetUserAccountsOthers($this->content_data['user']['id']);
        $this->load->view('setup/header',$this->content_data);
        $this->load->view('setup/account');
        $this->load->view('setup/footer');
    }
    public function schedule()
    {
        $this->load->model('User_available');
        if(isset($_POST['data'])){
            $post_day= $_POST['data']['day'];
            $post_start= $_POST['data']['start'];
            $post_end= $_POST['data']['end'];
            for ($x=0; $x<count($post_day); $x++) {
                if(!empty($post_start[$x]) && !empty($post_end[$x])){
                    $ins_data=array(
                        'userid'=> $this->content_data['user']['id'],
                        'day'=>$post_day[$x],
                        'start'=> $post_start[$x],
                        'end'=> $post_end[$x],
                    );
                    $this->User_available->Insert($ins_data);
                }
            }
            redirect(base_url().'setup/about', false);
        }

        $this->load->view('setup/header',$this->content_data);
        $this->load->view('setup/schedule');
        $this->load->view('setup/footer');
    }
    public function about()
    {
        $this->load->model('Teacher_information');
        if(isset($_POST['data'])){

            $ins_post=$_POST['data'];
            $ins_post['userid']=$this->content_data['user']['id'];
            $ins_post['male']=isset($_POST['data']['male'])? true : False;
            $ins_post['female']=isset($_POST['data']['female'])? true : False;
            $ins_post['special']=isset($_POST['data']['special'])? true : False;

            $this->Teacher_information->InsertSingle($ins_post);
            redirect(base_url().'setup/photo', false);
        }
        $this->content_data['result'] = $this->Teacher_information->GetDatabyId($this->content_data['user']['id']);
        $this->load->view('setup/header',$this->content_data);
        $this->load->view('setup/about');
        $this->load->view('setup/footer');
    }
    public function photo()
    {

        $config['upload_path']          = './images/profile/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']        = $this->guid();


        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image'))
        {
            $data = array('upload_data' => $this->upload->data());
            $image = $data['upload_data'];
            $ins_item=array(
                'userid'=> $this->content_data['user']['id'],
                'file_name'=> $image['file_name'],
                'primary'=>true,
                'file_type'=> $image['file_type'],
                'file_path'=> $image['file_path'],
                'full_path'=> $image['full_path'],
            );
            $this->load->model('User_photo');
            $this->User_photo->RemoveAllPrimary($this->content_data['user']['id']);
            $this->User_photo->Insert($ins_item);
            redirect(base_url().'teacher/dashboard', false);
        }
        $this->load->view('setup/header',$this->content_data);
        $this->load->view('setup/photo');
        $this->load->view('setup/footer');
    }
    function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
    public function logout()
    {
        session_destroy();
        redirect(base_url(), false);
    }
}
