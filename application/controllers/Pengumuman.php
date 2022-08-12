<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Base.php';

class Pengumuman extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sistemsetting', 'sistemsetting');
        $this->load->model('Posting', 'posting');
	}
	
	public function index()
	{
        $data = array();
        $data['title'] = 'Pengaturan Data Pengumuman';
        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-delete'])){
                $IdPos = $this->input->post('IdPos');
                $delete = $this->posting->delete($IdPos);
                if($delete){
                    $this->session->set_flashdata('success', 'pengumuman berhasil dihapus');
                }else{
                    $this->session->set_flashdata('error', 'pengumuman gagal dihapus');
                }
                redirect(base_url('pengumuman'));
            }
            //pagination
            $cari = isset($_GET['q']) ? $this->input->get('q') : "";
            $this->posting->setNum_rows(true);
            $this->posting->setLimit(-1);
            $data['jmlpos'] = $this->posting->getposting(PENGUMUMAN, $cari);
            $page = $this->uri->segment(3);
            $data['page'] = $page;
            $limit = 10;
            $this->posting->setLimit($limit);
            $this->posting->setPage($page);
            $this->posting->setNum_rows(false);
            $data['datapos'] = $this->posting->getposting(PENGUMUMAN, $cari);
            $this->load_page(base_url('pengumuman/index'), $data['jmlpos'], $limit); //Base.php
            //pagination

            $this->template->load('admin', 'admin/pengumuman', $data); 
        }else{
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }
    
    public function tambah()
    {
        $data = array();
        $data['title'] = 'Tambah pengumuman';
        $data['JenisPos'] = PENGUMUMAN;
        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-submit'])){
                $post = $this->input->post();
                $post['JenisPos'] = PENGUMUMAN;
                if(isset($_POST['IsPublikasi'])){
                    $post['IsPublikasi'] = 1;
                    $post['TglPublikasi'] = date('Y-m-d H:i:s');
                }
                $insert = $this->posting->insert($post);
                if($insert){
                    $this->session->set_flashdata('success', 'pengumuman berhasil disimpan');
                    redirect(base_url('pengumuman'));
                }else{
                    $this->session->set_flashdata('error', 'pengumuman gagal disimpan');
                    redirect(base_url('pengumuman/tambah'));
                }
            }
            $this->template->load('admin', 'admin/pengumuman-form', $data);
        }else{
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }

    public function edit()
    {
        $data = array();
        $IdPos = $this->input->get('id');  
        if ($this->cek_login(ADMIN)) {
            $detailpos = $this->posting->getdetailposting($IdPos);
            if($detailpos){
                $data['title'] = 'Ubah '.ucwords($detailpos['JenisPos']);
                if($detailpos['JenisPos'] === PENGUMUMAN){
                    if(isset($_POST['btn-submit'])){
                        $post = $this->input->post();
                        $updatedata = array();
                        $updatedata['Judul'] = $post['Judul'];
                        $updatedata['IsiPos'] = $post['IsiPos'];
                        if(isset($_POST['IsPublikasi'])){
                            $updatedata['IsPublikasi'] = 1;
                            $updatedata['TglPublikasi'] = date('Y-m-d H:i:s');
                        }else{
                            $updatedata['IsPublikasi'] = 0;
                        }
                        $update = $this->posting->update($IdPos, $updatedata);
                        if($update){
                            $this->session->set_flashdata('success', 'pengumuman berhasil diupdate');
                            redirect(base_url('pengumuman'));
                        }else{
                            $this->session->set_flashdata('error', 'pengumuman gagal diupdate');
                            redirect(base_url('pengumuman/edit/'.$IdPos));
                        }
                    }
                    $data['JenisPos'] = $detailpos['JenisPos'];
                    $data['detailpos'] = $detailpos;
                    $this->template->load('admin', 'admin/pengumuman-form', $data); 
                }
            }else{
                $this->session->set_flashdata('error', 'halaman tidak dapat diakses, data posting tidak ditemukan');
                redirect(base_url('pengumuman'));
            }
        }else{
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }
}
