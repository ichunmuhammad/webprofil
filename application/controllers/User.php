<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Base.php';

class User extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('Userlogin', 'userlogin');
        $this->load->library('Nativesession','nativesession');
    }

    public function login() {
        $data = array();

        if ($this->islogin()) {
            redirect(base_url('main/'));
        } else {
            if (isset($_POST['btn-login'])) {
                $Username = $this->input->post('Username');
                $Password = $this->input->post('Password');

                $datauser = $this->userlogin->getUserlogin($Username, $Password);
				
                if ($datauser['IsAktif'] === '1') {
                    //set session
                    $datauser['LOGGEDIN'] = LOGGEDIN;
                    $lvl = md5(base64_encode($datauser['JenisUser']));
                    $datauser['USR'] = $lvl;
                    $this->nativesession->set('status', 'loggedin');
                    $this->session->set_userdata($datauser);
                    //set session

                    $this->db->update('userlogin', ['LastLogin'=>date('Y-m-d H:i:s')], ['KodePerson'=>$datauser['KodePerson']]);

                    $this->session->set_flashdata('success', 'proses login berhasil');
                    redirect(base_url('home/'));
                } else {
                    $this->session->set_flashdata('error', 'proses login gagal, akun sedang tidak aktif, silahkan hubungi admin');
                    redirect(base_url('user/login'));
                }
            } else {
                $this->load->view('login_admin', $data);
            }
        }
    }

    public function logout() {
        if ($this->islogin()) {
            $usr = $this->getusr();
            $this->session->sess_destroy();
            $this->nativesession->delete('status');
            redirect(base_url('user/login'));
        } else {
            redirect(base_url('user/login'));
        }
    }
}