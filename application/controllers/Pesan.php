<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Base.php';

class Pesan extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('Datapesan', 'datapesan');
	}
	
	public function index()
	{
        $data = array();
        $data['title'] = 'List Data Pesan dan Saran Masuk';

        if ($this->cek_login(ADMIN)) {
            //pagination
            $cari = isset($_GET['q']) ? $this->input->get('q') : "";
            $this->datapesan->setNum_rows(true);
            $this->datapesan->setLimit(-1);
            $data['jmlpos'] = $this->datapesan->getpesan($cari);
            $page = $this->uri->segment(3);
            $data['page'] = $page;
            $limit = 10;
            $this->datapesan->setLimit($limit);
            $this->datapesan->setPage($page);
            $this->datapesan->setNum_rows(false);
            $data['datapesan'] = $this->datapesan->getpesan($cari);
            $this->load_page(base_url('pesan/index'), $data['jmlpos'], $limit); //Base.php
            //pagination
            $this->template->load('admin', 'admin/pesan', $data);
        }
    }
    
    public function view($Enc)
    {
        $data = array();
        $data['title'] = 'Data Pesan dan Saran Masuk';

        if ($this->cek_login(ADMIN)) {
            $detailpesan = $this->datapesan->getdetail($Enc);
            if($detailpesan){
                $update_dibaca = $this->datapesan->update($detailpesan['KodePesan'], [
                    'IsDibaca'=>1, 'KodePerson'=>$this->session->userdata('KodePerson')
                ]);
                $data['detailpesan'] = $detailpesan;
                $this->template->load('admin', 'admin/pesan-view', $data);
            }else{
                $this->session->set_flashdata('error', 'halaman tidak dapat diakses, data pesan tidak ditemukan');
                redirect(base_url('pesan'));
            }
        }
    }
}
