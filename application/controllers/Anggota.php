<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Base.php';

class Anggota extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dataanggota', 'dataanggota');
        $this->load->model('Mstjabatan', 'mstjabatan');
        
	}
	
	public function index()
	{
        $data = array();
        $data['title'] = 'Pengaturan Data Guru/Karyawan';

        if ($this->cek_login(ADMIN)) {

            if(isset($_POST['btn-deletepeg'])){
                $IdAnggota = $this->input->post('IdAnggota');  
                $delete = $this->dataanggota->delete($IdAnggota);
                if($delete){
                    $this->session->set_flashdata('success', 'data guru/karyawan berhasil dihapus');                    
                }else{
                    $this->session->set_flashdata('error', 'data guru/karyawan gagal dihapus');                    
                }
                redirect(base_url('anggota'));              
            }
            //pagination
            $cari = isset($_GET['q']) ? $this->input->get('q') : "";
            $this->dataanggota->setNum_rows(true);
            $this->dataanggota->setLimit(-1);
            $data['jmlpos'] = $this->dataanggota->getallanggota($cari);
            $page = $this->uri->segment(3);
            $data['page'] = $page;
            $limit = 10;
            $this->dataanggota->setLimit($limit);
            $this->dataanggota->setPage($page);
            $this->dataanggota->setNum_rows(false);
            $data['dataanggota'] = $this->dataanggota->getallanggota($cari);
            $this->load_page(base_url('anggota/index'), $data['jmlpos'], $limit); //Base.php
            //pagination           
            $this->template->load('admin', 'admin/anggota', $data);
        }
	}
	
	public function tambah()
	{
        $data = array();
        $data['title'] = 'Tambah Data Guru/Karyawan';

        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-submit'])){
                $post = $this->input->post();
                $insert = $this->dataanggota->insert($post);
                if($insert){
                    $this->session->set_flashdata('success', 'data guru/karyawan berhasil ditambahkan');                    
                }else{
                    $this->session->set_flashdata('error', 'data guru/karyawan gagal ditambahkan');                    
                }
                redirect(base_url('anggota'));
            }
            $this->mstjabatan->setLimit(-1);
            $this->mstjabatan->setNum_rows(false);
            $data['datajabatan'] = $this->mstjabatan->getalljabatan();
            $this->template->load('admin', 'admin/anggota-form', $data);
        }
    }
    
    public function edit($IdAnggota = "")
    {
        $data = array();
        $data['title'] = 'Ubah Data Guru/Karyawan';

        if ($this->cek_login(ADMIN)) {
            $this->dataanggota->setIdAnggota($IdAnggota);
            $detailanggota = $this->dataanggota->getanggota();
            // echo $this->db->last_query();exit;
            if($detailanggota){
                if(isset($_POST['btn-submit'])){
                    $post = $this->input->post();
                    $update = $this->dataanggota->update($post, $IdAnggota);
                    if($update){
                        $this->session->set_flashdata('success', 'data guru/karyawan berhasil diperbarui');                    
                    }else{
                        $this->session->set_flashdata('error', 'data guru/karyawan gagal diperbarui');                    
                    }
                    redirect(base_url('anggota'));
                }
                $data['detailanggota'] = $detailanggota;
                $this->mstjabatan->setLimit(-1);
                $this->mstjabatan->setNum_rows(false);
                $data['datajabatan'] = $this->mstjabatan->getalljabatan();
                $this->template->load('admin', 'admin/anggota-form', $data);
            }else{
                $this->session->set_flashdata('error', 'halaman tidak dapat diakses, data tidak ditemukan');
                redirect(base_url('anggota'));
            }
        }
    }

    public function bagan()
    {
        $data = array();
        $data['title'] = 'Pengaturan Data Guru/Karyawan';

        if ($this->cek_login(ADMIN)) {
            $this->dataanggota->setLimit(-1);
            $this->dataanggota->setNum_rows(false);
            $data['dataanggota'] = $this->dataanggota->getallanggota();

            $this->template->load('admin', 'admin/anggota-viewbagan', $data);
        }
    }
}
