<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Pengguna');
    }

    public function index()
    {
        $this->load->view('dashboard');
    }

    public function logout(){
        session_destroy();
        redirect('Login');
    }
}
