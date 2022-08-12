<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Base.php';

class Agenda extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sistemsetting', 'sistemsetting');
        $this->load->model('Posting', 'posting');
	}
	
	public function index()
	{
        $data = array();
        $data['title'] = 'Pengaturan Data Agenda';
        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-delete'])){
                $IdPos = $this->input->post('IdPos');
                $delete = $this->posting->delete($IdPos);
                if($delete){
                    $this->session->set_flashdata('success', 'agenda berhasil dihapus');
                }else{
                    $this->session->set_flashdata('error', 'agenda gagal dihapus');
                }
                redirect(base_url('agenda'));
            }
            //pagination
            $cari = isset($_GET['q']) ? $this->input->get('q') : "";
            $this->posting->setNum_rows(true);
            $this->posting->setLimit(-1);
            $data['jmlpos'] = $this->posting->getposting(AGENDA, $cari);
            $page = $this->uri->segment(3);
            $data['page'] = $page;
            $limit = 10;
            $this->posting->setLimit($limit);
            $this->posting->setPage($page);
            $this->posting->setNum_rows(false);
            $data['datapos'] = $this->posting->getposting(AGENDA, $cari);
            $this->load_page(base_url('agenda/index'), $data['jmlpos'], $limit); //Base.php
            //pagination

            $this->template->load('admin', 'admin/agenda', $data); 
        }else{
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }
    
    public function tambah()
    {
        $data = array();
        $data['title'] = 'Tambah agenda';
        $data['JenisPos'] = AGENDA;
        if ($this->cek_login(ADMIN)) {

            $this->load->helper('form');
            $this->load->library('form_validation');
            $err = $this->get_form_validation_error_message();
            $rules = [
                array('field' => 'TglPublikasi', 'label' => 'tanggal agenda', 'rules' => 'required', 'errors' => $err)
            ];
            $this->form_validation->set_rules($rules);

            if($this->form_validation->run() == TRUE){
                $post = $this->input->post();
                $post['JenisPos'] = AGENDA;
                $post['TglPublikasi'] = date_format(date_create($post['TglPublikasi']), 'Y-m-d H:i:s');
                if(isset($_POST['IsPublikasi'])){
                    $post['IsPublikasi'] = 1;
                }
                // _json($post);
                $insert = $this->posting->insert($post);
                if($insert){
                    $this->session->set_flashdata('success', 'agenda berhasil disimpan');
                    redirect(base_url('agenda'));
                }else{
                    $this->session->set_flashdata('error', 'agenda gagal disimpan');
                    redirect(base_url('agenda/tambah'));
                }
            }
            $this->template->load('admin', 'admin/agenda-form', $data);
        }else{
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }

    public function edit($IdPos)
    {
        $data = array();
        if ($this->cek_login(ADMIN)) {
            $detailpos = $this->posting->getdetailposting($IdPos);
            if($detailpos){
                $data['title'] = 'Ubah '.ucwords($detailpos['JenisPos']);
                if($detailpos['JenisPos'] === AGENDA){

                    $this->load->helper('form');
                    $this->load->library('form_validation');
                    $err = $this->get_form_validation_error_message();
                    $rules = [
                        array('field' => 'TglPublikasi', 'label' => 'tanggal agenda', 'rules' => 'required', 'errors' => $err)
                    ];
                    $this->form_validation->set_rules($rules);
                    
                    if($this->form_validation->run() == TRUE){
                        $post = $this->input->post();
                        $updatedata = array();
                        $updatedata['Judul'] = $post['Judul'];
                        $updatedata['IsiPos'] = $post['IsiPos'];
                        if(isset($_POST['IsPublikasi'])){
                            $updatedata['IsPublikasi'] = 1;
                        }else{
                            $updatedata['IsPublikasi'] = 0;
                        }
                        if(isset($_POST['TglPublikasi'])){
                            $updatedata['TglPublikasi'] = date_format(date_create($post['TglPublikasi']), 'Y-m-d H:i:s');
                        }
                        // _json($updatedata);
                        $update = $this->posting->update($IdPos, $updatedata);
                        if($update){
                            $this->session->set_flashdata('success', 'agenda berhasil diupdate');
                            redirect(base_url('agenda'));
                        }else{
                            $this->session->set_flashdata('error', 'agenda gagal diupdate');
                            redirect(base_url('agenda/edit/'.$IdPos));
                        }
                    }else{
                        $data['JenisPos'] = $detailpos['JenisPos'];
                        $data['detailpos'] = $detailpos;
                        $this->template->load('admin', 'admin/agenda-form', $data); 
                    }
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
