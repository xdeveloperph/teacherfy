<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher extends CI_Controller {

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
        $this->load->view('teacher/header',$this->content_data);
        $this->load->view('teacher/dashboard');
        $this->load->view('teacher/footer');
    }

    public function Dashboard()
    {
        $this->content_data['hdashboard'] ='active';
        $this->load->view('teacher/header',$this->content_data);
        $this->load->view('teacher/dashboard');
        $this->load->view('teacher/footer');
    }
    public function Calendar()
    {
        $this->load->model('CustomJoin');
        $this->load->model('students');
        $this->load->model('Lesson_schedule');

        if(isset($_POST['data'])){

            $ins_post=$_POST['data'];
            $ins_post['teacherid']=$this->content_data['user']['id'];
            $this->Lesson_schedule->Insert($ins_post);
        }

        $this->content_data['calendar'] = $this->CustomJoin->GetTeacherLessonSchedule($this->content_data['user']['id']);
        $this->content_data['subject'] = $this->CustomJoin->GetTeacherSubject($this->content_data['user']['id']);
        $this->content_data['student'] = $this->students->GetListofStudents($this->content_data['user']['id']);

        $this->load->view('teacher/header',$this->content_data);
        $this->load->view('teacher/calendar');
        $this->load->view('teacher/footer');
    }
    public function Availability()
    {
        $this->content_data['havailability'] ='active';
        $this->load->view('teacher/header',$this->content_data);
        $this->load->view('teacher/calendar');
        $this->load->view('teacher/footer');
    }
    public function Roster()
    {
        $this->load->model('students');
        if(isset($_POST['data'])){
            $ins_post=$_POST['data'];
            $ins_post['teacherid']=$this->content_data['user']['id'];
            $this->students->Insert($ins_post);
        }
        $this->content_data['result'] = $this->students->GetListofStudents($this->content_data['user']['id']);

        $this->content_data['hroster'] ='active';
        $this->load->view('teacher/header',$this->content_data);
        $this->load->view('teacher/roster');
        $this->load->view('teacher/footer');
    }
    public function profile()
    {
        $this->load->library('Notification');
        $action =$this->uri->segment(3);
        $set_id =$this->uri->segment(4);

        $this->content_data['hprofile'] ='active';

        $this->load->model('Teacher_information');
        $this->load->model('User_experience');
        $this->load->model('User_language');
        $this->load->model('User_education');
        $this->load->model('User_certification');
        $this->load->model('User_award');
        $this->load->model('User_affiliation');
        if(isset($_POST['about'])){

            $ins_post=$_POST['about'];
            $ins_post['userid']=$this->content_data['user']['id'];
            $ins_post['male']=isset($_POST['about']['male'])? true : False;
            $ins_post['female']=isset($_POST['about']['female'])? true : False;
            $ins_post['special']=isset($_POST['about']['special'])? true : False;
            $ins_post['gender']=(int)$_POST['about']['gender'];
            $this->Teacher_information->InsertSingle($ins_post);
        }

        // exp
        if(isset($_POST['exp'])){
            $ins_post=$_POST['exp'];
            $ins_post['userid']=$this->content_data['user']['id'];
            $ins_post['workhere']=isset($_POST['exp']['workhere'])? true : False;
            $this->User_experience->InsertSingle($ins_post);
        }

        // languange
        if(isset($_POST['lang'])){
            $ins_post=$_POST['lang'];
            $ins_post['userid']=$this->content_data['user']['id'];
            $this->User_language->InsertSingle($ins_post);
        }

        // education
        if(isset($_POST['edu'])){
            $ins_post=$_POST['edu'];
            $ins_post['userid']=$this->content_data['user']['id'];
            $this->User_education->InsertSingle($ins_post);
        }
        // certification
        if(isset($_POST['cert'])){
            $ins_post=$_POST['cert'];
            $ins_post['userid']=$this->content_data['user']['id'];
            $this->User_certification->InsertSingle($ins_post);
        }
        // award
        if(isset($_POST['award'])){
            $ins_post=$_POST['award'];
            $ins_post['userid']=$this->content_data['user']['id'];
            $this->User_award->InsertSingle($ins_post);
        }
        // award
        if(isset($_POST['aff'])){

            $ins_post=$_POST['aff'];
            $ins_post['userid']=$this->content_data['user']['id'];
            $this->User_affiliation->InsertSingle($ins_post);
        }
        switch($action){
            case "exp":
            $this->content_data['exp'] =$this->User_experience->GetDatabyId(array("userid"=>$this->content_data['user']['id'],"id"=>$set_id));
            break;
            case "exp-del":
                $this->User_experience->disable($set_id);
                break;
            case "lang":
                $this->content_data['lang'] =$this->User_language->GetDatabyId(array("userid"=>$this->content_data['user']['id'],"id"=>$set_id));
                break;
            case "lang-del":
                $this->User_language->disable($set_id);
                break;
            case "edu":
                $this->content_data['edu'] =$this->User_education->GetDatabyId(array("userid"=>$this->content_data['user']['id'],"id"=>$set_id));
            break;
            case "edu-del":
                $this->User_education->disable($set_id);
                break;
            case "cert":
                $this->content_data['cert'] =$this->User_certification->GetDatabyId(array("userid"=>$this->content_data['user']['id'],"id"=>$set_id));
                break;
            case "cert-del":
                $this->User_certification->disable($set_id);
                break;
            case "award":
                $this->content_data['award'] =$this->User_award->GetDatabyId(array("userid"=>$this->content_data['user']['id'],"id"=>$set_id));
                break;
            case "award-del":
                $this->User_award->disable($set_id);
                break;
            case "aff":
                $this->content_data['aff'] =$this->User_affiliation->GetDatabyId(array("userid"=>$this->content_data['user']['id'],"id"=>$set_id));
                break;
            case "aff-del":
                $this->User_affiliation->disable($set_id);
                break;
        }

        $this->content_data['about'] = $this->Teacher_information->GetDatabyId($this->content_data['user']['id']);
        $this->content_data['explist'] = $this->User_experience->GetAllList($this->content_data['user']['id']);
        $this->content_data['langlist'] = $this->User_language->GetAllList($this->content_data['user']['id']);
        $this->content_data['edulist'] = $this->User_education->GetAllList($this->content_data['user']['id']);
        $this->content_data['certlist'] = $this->User_certification->GetAllList($this->content_data['user']['id']);
        $this->content_data['awardlist'] = $this->User_award->GetAllList($this->content_data['user']['id']);
        $this->content_data['afflist'] = $this->User_affiliation->GetAllList($this->content_data['user']['id']);

        $this->load->view('teacher/header',$this->content_data);
        $this->load->view('teacher/sidebar');
        $this->load->view('teacher/profile');
        $this->load->view('teacher/footer');
    }
    public function Reviews()
    {
        $this->content_data['hprofile'] ='active';
        $this->load->view('teacher/header',$this->content_data);
        $this->load->view('teacher/sidebar');
        $this->load->view('teacher/reviews');
        $this->load->view('teacher/footer');
    }
    public function Subject()
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
        }

        $this->content_data['result'] = $this->CustomJoin->GetLessonSubjectList();
        $this->content_data['tsubject'] = $this->Teacher_subject->GetSubjectbyId($this->content_data['user']['id']);


        $this->content_data['hprofile'] ='active';
        $this->load->view('teacher/header',$this->content_data);
        $this->load->view('teacher/sidebar');
        $this->load->view('teacher/subjects');
        $this->load->view('teacher/footer');
    }
    public function Location()
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

        $this->load->model('user_address');
        if(isset($_POST['address'])){
            $post_data= $_POST['address'];
            $post_data['userid']=$this->content_data['user']['id'];
            $this->user_address->InsertSingle($post_data);
            redirect(base_url().'setup/Account', false);
        }

        $this->content_data['address'] = $this->user_address->GetUserAddress($this->content_data['user']['id']);

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

        $this->content_data['account'] = $this->User_accounts->GetUserAccounts($this->content_data['user']['id']);
        $this->content_data['others'] = $this->User_accounts->GetUserAccountsOthers($this->content_data['user']['id']);



        $this->content_data['hprofile'] ='active';
        $this->load->view('teacher/header',$this->content_data);
        $this->load->view('teacher/sidebar');
        $this->load->view('teacher/location');
        $this->load->view('teacher/footer');
    }
    public function Questionnaire()
    {
        $action =$this->uri->segment(3);
        $set_id =$this->uri->segment(4);

        $this->load->model('Student_questionnaire');
        if(isset($_POST['sq'])){
            $ins_post=$_POST['sq'];
            $ins_post['userid']=$this->content_data['user']['id'];
            $this->Student_questionnaire->InsertSingle($ins_post);
        }
        $this->content_data['sqlist'] = $this->Student_questionnaire->GetAllList($this->content_data['user']['id']);

        switch($action){
            case "sq":
                $this->content_data['sq'] =$this->Student_questionnaire->GetDatabyId(array("userid"=>$this->content_data['user']['id'],"id"=>$set_id));
                break;
            case "sq-del":
                $this->Student_questionnaire->disable($set_id);
                break;
        }

        $this->content_data['hprofile'] ='active';
        $this->load->view('teacher/header',$this->content_data);
        $this->load->view('teacher/sidebar');
        $this->load->view('teacher/question');
        $this->load->view('teacher/footer');

    }
    public function logout()
    {
        session_destroy();
        redirect(base_url(), false);
    }
}
