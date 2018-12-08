
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihatjawaban extends CI_Controller {
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
        $this->data["arr_soal"] = ($this->Pertanyaan->get_gelombang_active());
        $this->data["list_jawaban"] = [];
        for($i=0;$i<sizeof($this->data["arr_soal"]); $i++){
            $jawab = $this->Jwbpertanyaan->get_from_soal($this->data["arr_soal"][$i]->id);
            array_push($this->data["list_jawaban"],$jawab);
        }
        $this->load->view('Lihatjawaban/index', $this->data);
    }

    public function get_list_answer(){

//        echo json_encode([$result, $this->data["jawaban"]]);
    }
}
