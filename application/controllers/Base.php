<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

    private $IsLoggedIn = false;
    private $MyLogin;

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('LOGGEDIN') === LOGGEDIN) {
            $this->IsLoggedIn = TRUE;
            $this->MyLogin = $this->session->userdata('USR');
        } else {
            $this->IsLoggedIn = FALSE;
        }
    }

    public function cek_login($req, $redirect = FALSE, $required = TRUE) {
        if ($this->islogin()) {
            $usr = $this->getusr();
            if ($usr === $req) {
                return TRUE;
            } else {
                if ($redirect) {
                    return redirect(base_url('main/'));
                }
                return FALSE;
            }
        } else {
            if($required){
                return redirect(base_url('user/login'));
            }
            return FALSE;
        }
    }

    public function islogin() {
        return $this->IsLoggedIn;
    }

    public function getusr() {
        return $this->MyLogin;
    }

    public function load_page($url, $jmldata, $limit = 10) {
        //pagination
        $config['base_url'] = $url;
        $config['total_rows'] = $jmldata;
        $config['per_page'] = $limit;
        if (count($_GET) > 0) {
            $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        }
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        $this->pagination->initialize($config);
        //pagination
    }

    public function uploadimage($param, $targetdir, $width = 0, $height = 0) {
        $this->load->library('upload');
        $config['upload_path'] = $targetdir; //path folder
        $config['allowed_types'] = 'png|jpeg|jpg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $this->upload->initialize($config);

        $gambar1 = "";
        if (!empty($_FILES[$param]['name'])) {
            if ($this->upload->do_upload($param)) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $targetdir . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                if ($width > 0) {
                    $config['width'] = $width;
                }
                if ($height > 0) {
                    $config['height'] = $height;
                }
                $config['new_image'] = $targetdir . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar1 = $gbr['file_name'];
                return $gambar1;
            } else {
                $this->session->set_flashdata('error', "proses upload file gambar gagal" . $this->upload->display_errors());
                return FALSE;
            }
        } else {
            return 404;
        }
    }

    public function uploaddok($param, $targetdir) {
        $this->load->library('upload');
        $config['upload_path'] = $targetdir; //path folder
        $config['allowed_types'] = 'docx|doc|pdf|xlsx'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $this->upload->initialize($config);

        $file1 = "";
        if (!empty($_FILES[$param]['name'])) {
            if ($this->upload->do_upload($param)) {
                $gbr = $this->upload->data();
                $file1 = $gbr['file_name'];
                return $file1;
            } else {
                $this->session->set_flashdata('error', "proses upload file dokumen gagal, " . $this->upload->display_errors());
                return FALSE;
            }
        } else {
            return 404;
        }
    }

    public function get_form_validation_error_message() {
        $data = array(
            'required' => 'field %s. masih kosong',
        );

        return $data;
    }
}