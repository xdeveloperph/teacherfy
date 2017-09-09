<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification
{
    private $CI;

    function __construct()
    {
        // Assign by reference with "&" so we don't create a copy
        $this->CI = &get_instance();
    }

    public  function Template($data){

        switch($data['template']){
            case 1:
                $data['message']="";


                break;
        }


    }
    public  function send($data){
        $this->CI->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;

        $this->CI->email->initialize($config);

        $this->CI->email->from('some1mailer@gmail.com', 'some1mailer@gmail.com' );
        $this->CI->email->to($data['to']);
        $this->CI->email->subject($data['subject']);
        $this->CI->email->message($data['message']);

        $this->CI->email->send();
    }
    public  function test(){
        $data['to']= "xdeveloperph@gmail.com";
        $data['subject']= "test image";
        $data['message']= "asdas";
        $this->send($data   );
    }
}