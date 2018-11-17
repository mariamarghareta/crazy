
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jawabpertanyaan extends CI_Controller {
    private $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Gelombang');
        $this->load->model('Pengguna');
        $this->load->model('Pertanyaan');
        $this->load->model('Jwbpertanyaan');
    }

    public function check_role(){
        if(isset($_SESSION['hash'], $_SESSION['hash'])){
            $double_login = $this->Pengguna->check_double_login($_SESSION['id'], $_SESSION['hash']);
            $newdata = array(
                'role_id'  => $_SESSION['role_id'],
                'nama'     => $_SESSION['nama'],
                'id' => $_SESSION['id'],
                'hash' => $_SESSION['hash']
            );
            $this->session->set_tempdata($newdata, NULL, 60 * 60);
            if($double_login){
                session_destroy();
                redirect('Login');
            }
        } else {
            session_destroy();
            redirect('Login');
        }
    }

    public function initialization(){

    }

    public function submit_jawaban()
    {
        $this->check_role();
        $soal_id = $this->input->post('soal_id');
        $jawaban = $this->input->post('jawaban');
        $result = $this->Jwbpertanyaan->insert($soal_id, $jawaban, $_SESSION['id']);
        echo json_encode([$result]);
    }
}
