
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mastergelombang extends CI_Controller {
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
        $this->data['id'] = "";
        $this->data['active'] = "";
        $this->data['nama'] = "";
        $this->data['msg'] = "";
        $this->data["arr"] = json_encode($this->Gelombang->show_all());
    }

    public function index()
    {
        $this->check_role();
        $this->initialization();
        $this->load->view('Gelombang/index', $this->data);
    }

    public function create()
    {
        $this->check_role();
        $this->initialization();
        $this->data["state"] = "create";
        $this->load->view('Gelombang/form', $this->data);
    }

    public function show(){
        $this->check_role();
        $this->initialization();
        $this->data['id'] = $this->uri->segment(3);

        $this->data["state"] = "show";
        $this->load_data();
        $this->load->view('Gelombang/form', $this->data);
    }


    public function update(){
        $this->check_role();
        $this->initialization();
        $this->data['id'] = $this->uri->segment(3);

        $this->data["state"] = "update";
        $this->load_data();
        $this->load->view('Gelombang/form', $this->data);
    }

    public function delete(){
        $this->check_role();
        $this->initialization();
        $this->data['id'] = $this->uri->segment(3);

        $this->data["state"] = "delete";
        $this->load_data();
        $this->load->view('Gelombang/form', $this->data);
    }

    public function load_data(){
        $datum = $this->Gelombang->get($this->data['id'])[0];
        $this->data["id"] = $datum->id;
        $this->data["nama"] = $datum->nama;
        $this->data["active"] = $datum->active;
        $this->data["create_user"] = $datum->create_user;
        $this->data["create_time"] = $datum->create_time;
        $this->data["write_user"] = $datum->write_user;
        $this->data["write_time"] = $datum->write_time;
    }

    public function load_form_data(){
        $this->data['id'] = $this->input->post('tid');
        $this->data['nama'] = $this->input->post('tname');
        $this->data['active'] = $this->input->post('active');
    }

    public function add_new_data(){
        $this->check_role();
        $this->initialization();
        $this->form_validation->set_rules('tname', 'Nama Gelombang', 'required', array('required' => '%s harus diisi'));
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->load_form_data();
        if ($this->form_validation->run() != FALSE)
        {
            $result = $this->Gelombang->insert($this->data['nama'], $this->data['active'], $_SESSION['id']);
            if($result == 1){
                redirect('Mastergelombang');
            }else{
                $this->data['msg'] = "<div id='err_msg' class='alert alert-danger sldown' style='display:none;'>Insert Gagal</div>";
            }
        }
        $this->data["state"] = "create";
        $this->load->view('Gelombang/form', $this->data);
    }

    public function update_data(){
        $this->check_role();
        $this->initialization();
        $this->form_validation->set_rules('tname', 'Nama Gelombang', 'required', array('required' => '%s harus diisi'));
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->load_form_data();
        if($this->input->post('write') == "write") {
            if ($this->form_validation->run() != FALSE) {
                $result = $this->Gelombang->update($this->data['nama'], $this->data['active'], $this->data['id'], $_SESSION['id']);
                if($result == 1){
                    redirect('Mastergelombang');
                }else{
                    $this->data['msg'] = "<div id='err_msg' class='alert alert-danger sldown' style='display:none;'>Update Gagal</div>";
                }
            }else{
                $this->data['msg'] = "<div id='err_msg' class='alert alert-danger sldown' style='display:none;'>Update Gagal</div>";
            }
            $this->data["state"] = "update";
            $this->load->view('Gelombang/form', $this->data);
        }else {
            redirect('Mastergelombang');
        }
    }

    public function delete_data(){
        $this->check_role();
        $this->initialization();
        $this->data['id'] = $this->input->post('tid');
        if($this->input->post('delete') == "delete") {
            $result = $this->Gelombang->delete($this->data['id'], $_SESSION['id']);
            if($result == 1){
                redirect('Mastergelombang');
            }else{
                $this->data['msg'] = "<div id='err_msg' class='alert alert-danger sldown' style='display:none;'>Hapus Data Gagal</div>";
            }
            $this->data["state"] = "delete";
            $this->load->view('Gelombang/form', $this->data);
        } else {
            redirect('Mastergelombang');
        }
    }

    public function logout(){
        session_destroy();
        redirect('Login');
    }

    public function activate_gelombang(){
        $this->check_role();
        $gelombang_id = $this->input->post('gelombang_id');
        $result = $this->Gelombang->just_active($gelombang_id, $_SESSION['id']);
        $list_soal = [];
        if($result){
            $list_soal = ($this->Pertanyaan->get_gelombang_active());
        }
        echo json_encode([$result, $list_soal]);
    }
}
