<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Base.php';

class Slider extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sistemsetting', 'sistemsetting');
        $this->load->model('Posting', 'posting');
	}
	
	public function index()
	{
        $data = array();
        $data['title'] = 'Pengaturan Data Slider Web';
        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-delete'])){
                $IdPos = $this->input->post('IdPos');
                $detailpos = $this->posting->getdetailposting($IdPos);
                if($detailpos){
                    $delete = $this->posting->delete($IdPos);
                    if($delete){
                        //hapus file lama dari penyimpanan server
                        $target_dir = 'assets/upload/';
                        if(file_exists($target_dir.$detailpos['IsiPos'])){
                            unlink($target_dir.$detailpos['IsiPos']);
                        }
                        $this->session->set_flashdata('success', $detailpos['JenisPos'].' berhasil dihapus');
                    }else{
                        $this->session->set_flashdata('error', $detailpos['JenisPos'].' gagal dihapus');
                    }
                    redirect(base_url('slider'));
                }else{
                    $this->session->set_flashdata('error', 'proses hapus data gagal, data tidak ditemukan');
                    redirect(base_url('slider'));
                }
            }elseif(isset($_POST['btn-publikasi'])){
                $IdPos = $this->input->post('IdPos');
                $IsPublikasi = $this->input->post('IsPublikasi');
                $update = $this->posting->update($IdPos, [
                    'IsPublikasi'=>$IsPublikasi
                ]);
                if($update){
                    $this->session->set_flashdata('success', 'proses update data berhasil');
                }else{
                    $this->session->set_flashdata('error', 'update data gagal diproses');
                }
                redirect(base_url('slider'));
            }
            //pagination
            $cari = isset($_GET['q']) ? $this->input->get('q') : "";
            $this->posting->setNum_rows(true);
            $this->posting->setLimit(-1);
            $data['jmlpos'] = $this->posting->getposting(SLIDER, $cari);
            $page = $this->uri->segment(3);
            $data['page'] = $page;
            $limit = 12;
            $this->posting->setLimit($limit);
            $this->posting->setPage($page);
            $this->posting->setNum_rows(false);
            $data['datapos'] = $this->posting->getposting(SLIDER, $cari);
            $this->load_page(base_url('slider/index'), $data['jmlpos'], $limit); //Base.php
            //pagination

            $this->template->load('admin', 'admin/slider', $data); 
        }else{
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }
    
    public function tambah()
    {
        $data['title'] = 'Tambah Slider Web';
        $data['JenisPos'] = SLIDER;
        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-submit'])){
                $post = $this->input->post();
                $target_dir = 'assets/upload/slider';
                $upload = $this->uploadimage('Path', $target_dir);
                if($upload){
                    $fileImageName = 'slider/'.$upload;
                    $post['IsiPos'] = $fileImageName;
                    $post['JenisPos'] = SLIDER;
                    $post['IsPublikasi'] = 1;
                    $post['TglPublikasi'] = date('Y-m-d H:i:s');
                    $insert = $this->posting->insert($post);
                    if($insert){
                        $this->session->set_flashdata('success', 'slider berhasil disimpan');
                        redirect(base_url('slider'));
                    }else{
                        $this->session->set_flashdata('error', 'slider gagal disimpan');
                        redirect(base_url('slider/tambah/'));
                    }
                }else{
                    $this->session->set_flashdata('error', $JenisPos.' gagal disimpan');
                    redirect(base_url('slider/tambah/'));
                }
            }
            $this->template->load('admin', 'admin/slider-form', $data);
        }else{
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }
}
