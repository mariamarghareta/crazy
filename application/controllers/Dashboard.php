<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    private $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Pengguna');
        $this->load->model('Gelombang');
    }

    public function index()
    {
        $result = $this->Gelombang->get_active_now();
        $gel = 0;
        if(sizeof($result)>0){
            $gel = $result[0]->id;
        }
        $this->data["score"] = [];
        $this->data["total_score"] = [];
        for($i=0;$i<10;$i++){
            $peserta = $this->Pengguna->get_score_per_wil($i+1, $gel);
            array_push($this->data["score"],$peserta);
            $tot = 0;
            $total_score = $this->Pengguna->get_total_per_wil($i+1, $gel);
            if(sizeof($total_score) > 0){
                $tot = $total_score[0]->score;
            }
            array_push($this->data["total_score"],$tot);
        }
        $this->load->view('dashboard', $this->data);
    }

    public function logout(){
        session_destroy();
        redirect('Login');
    }
}
