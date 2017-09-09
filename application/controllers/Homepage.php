<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

    public function index()
    {
        $this->load->view('header');
        $this->load->view('banner');
        $this->load->view('homepage');
        $this->load->view('footer');
    }
    public function test()
    {
        $this->load->library('notification');
        $this->notification->test();
    }
}
