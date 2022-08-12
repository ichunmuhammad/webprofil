<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Base.php';

class Setting extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sistemsetting', 'sistemsetting');
	}
	
	public function index()
	{
        $data = array();
        $data['title'] = 'Pengaturan Web Profil';
        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-submit'])){
                $post = $this->input->post();
                if($post['Tipe'] === "img"){
                    $settingOld = $this->db->get_where('sistemsetting', ['KodeSetting'=>$post['KodeSetting']])->row_array();
                    if($settingOld){
                        $val = $settingOld['Value'];
                        $main_dir = explode('/', $val);
                        $dir = $main_dir[0];
                        $target_dir = 'assets/upload/'.$dir.'/';
                        $upload = $this->uploadimage('ValueImg', $target_dir);
                        if($upload){
                            //hapus file lama dari penyimpanan server
                            if(file_exists($target_dir.$main_dir[1])){
                                unlink($target_dir.$main_dir[1]);
                            }
                            $update = $this->sistemsetting->update($post['KodeSetting'], $dir.'/'.$upload, $this->session->userdata('KodePerson'));
                            if($update){
                                $this->session->set_flashdata('success', 'perubahan data setting berhasil disimpan');
                            }else{
                                $this->session->set_flashdata('error', 'perubahan data setting gagal disimpan');
                            }
                        }else{
                            $this->session->set_flashdata('error', 'perubahan data setting gagal disimpan, upload file error');
                        }
                    }else{
                        $this->session->set_flashdata('error', 'perubahan data setting gagal disimpan');
                    }
                }else{
                    $update = $this->sistemsetting->update($post['KodeSetting'], $post['Value'], $this->session->userdata('KodePerson'));
                    if($update){
                        $this->session->set_flashdata('success', 'perubahan data setting berhasil disimpan');
                    }else{
                        $this->session->set_flashdata('error', 'perubahan data setting gagal disimpan');
                    }
                }
                redirect(base_url('setting'));
            }
            $datasetting = $this->sistemsetting->getallsetting();
            $data['datasetting'] = $datasetting;
            $this->template->load('admin', 'admin/setting', $data); 
        }else{
            $this->template->load('admin', 'err/akses_blok', $data);
        }
	}
}
