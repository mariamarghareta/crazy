
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlsoal extends CI_Controller {
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

    public function initialization()
    {
        $this->data["gelombang"] = ($this->Gelombang->show_all());
        $this->data["arr_soal"] = ($this->Pertanyaan->get_gelombang_active());
    }

    public function index()
    {
        $this->check_role();
        $this->initialization();
        $this->load->view('Controlsoal/index', $this->data);
    }

    public function logout(){
        session_destroy();
        redirect('Login');
    }
}
