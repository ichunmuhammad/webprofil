<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Base.php';

class Jabatan extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mstjabatan', 'mstjabatan');
	}
	
	public function index()
	{
        $data = array();
        $data['title'] = 'Pengaturan Data Guru/Karyawan';

        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-deletejab'])){
                $KodeJabatan = $this->input->post('KodeJabatan');
                $this->mstjabatan->setKodeJabatan($KodeJabatan);
                $detailjabatan = $this->mstjabatan->getalljabatan();
                if($detailjabatan){
                    if($detailjabatan['JumlahAnggota'] > 0){
                        $this->session->set_flashdata('error', 'proses hapus data jabatan gagal, jabatan masih dipakai atau masih terdapat beberapa orang yg menjabat');
                        redirect(base_url('jabatan'));
                    }else{
                        $delete = $this->mstjabatan->delete();
                        if($delete){
                            $this->session->set_flashdata('success', 'data jabatan berhasil dihapus');
                            redirect(base_url('jabatan'));
                        }else{
                            $this->session->set_flashdata('error', 'data jabatan gagal dihapus');
                            redirect(base_url('jabatan'));
                        }
                    }
                }else{
                    $this->session->set_flashdata('error', 'proses hapus data jabatan gagal, data tidak ditemukan!');
                    redirect(base_url('jabatan'));
                }
            }
            //pagination
            $cari = isset($_GET['q']) ? $this->input->get('q') : "";
            $this->mstjabatan->setNum_rows(true);
            $this->mstjabatan->setLimit(-1);
            $data['jmlpos'] = $this->mstjabatan->getalljabatan($cari);
            $page = $this->uri->segment(3);
            $data['page'] = $page;
            $limit = 10;
            $this->mstjabatan->setLimit($limit);
            $this->mstjabatan->setPage($page);
            $this->mstjabatan->setNum_rows(false);
            $data['datajabatan'] = $this->mstjabatan->getalljabatan($cari);
            $this->load_page(base_url('jabatan/index'), $data['jmlpos'], $limit); //Base.php
            //pagination      
            $this->template->load('admin', 'admin/jabatan', $data);
        }
    }
    
    public function tambah()
    {
        $data = array();
        $data['title'] = 'Tambah Data Jabatan';

        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-submit'])){
                $post = $this->input->post();
                $insert = $this->mstjabatan->insert($post['KodeJabatanAtas'], $post['NamaJabatan']);
                if($insert){
                    $this->session->set_flashdata('success', 'proses simpan data jabatan berhasil');
                    redirect(base_url('jabatan'));
                }else{
                    $this->session->set_flashdata('error', 'proses simpan data jabatan gagal');
                    redirect(base_url('jabatan'));                    
                }
            }
            $this->mstjabatan->setLimit(-1);
            $this->mstjabatan->setNum_rows(false);
            $data['datajabatan'] = $this->mstjabatan->getalljabatan();
            $this->template->load('admin', 'admin/jabatan-form', $data);
        }
    }

    public function edit($KodeJabatan = "")
    {
        $data = array();
        $data['title'] = 'Ubah Data Jabatan';

        if ($this->cek_login(ADMIN)) {
            $this->mstjabatan->setKodeJabatan($KodeJabatan);
            $detailjabatan = $this->mstjabatan->getalljabatan();
            if($detailjabatan){
                if(isset($_POST['btn-submit'])){
                    $post = $this->input->post();
                    $update = $this->mstjabatan->update($post['KodeJabatanAtas'], $post['NamaJabatan']);
                    if($update){
                        $this->session->set_flashdata('success', 'proses simpan perubahan data jabatan berhasil');
                        redirect(base_url('jabatan'));
                    }else{
                        $this->session->set_flashdata('error', 'proses simpan perubahan data jabatan gagal');
                        redirect(base_url('jabatan'));                    
                    }
                }
                $data['detailjabatan'] = $detailjabatan;
                $this->mstjabatan->setKodeJabatan(false);
                $this->mstjabatan->setLimit(-1);
                $this->mstjabatan->setNum_rows(false);
                $data['datajabatan'] = $this->mstjabatan->getalljabatan();
                $this->template->load('admin', 'admin/jabatan-form', $data);
            }else{
                $this->session->set_flashdata('error', 'halaman tidak dapat diakses, data jabatan tidak ditemukan!');
                redirect(base_url('jabatan'));
            }
        }
    }
}
