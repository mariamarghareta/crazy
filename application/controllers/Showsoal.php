
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Showsoal extends CI_Controller {
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

    public function index()
    {
        $this->check_role();
        $this->initialization();
        $this->data["active_question"] = $this->Pertanyaan->get_active_question();
        $this->data["jawaban"] = "None";
        if(sizeof($this->data["active_question"])>0){
            $this->data["answer_question"] = $this->Jwbpertanyaan->get_answer($this->data["active_question"][0]->id, $_SESSION['id']);
            if(sizeof( $this->data["answer_question"])>0){
                $this->data["jawaban"] =  $this->data["answer_question"][0]->jawaban;
            }
        }
        $this->load->view('Showsoal/index', $this->data);
    }

    public function get_question_now(){
        $this->check_role();
        $result = $this->Pertanyaan->get_active_question();
        echo json_encode([$result]);
    }
}
