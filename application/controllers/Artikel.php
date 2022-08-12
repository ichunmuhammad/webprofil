<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Base.php';

class Artikel extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sistemsetting', 'sistemsetting');
        $this->load->model('Posting', 'posting');
        $this->load->model('Filependukung', 'filependukung');
        
	}
	
	public function index()
	{
        $data = array();
        $data['title'] = 'Pengaturan Data Artikel';
        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-delete'])){
                $IdPos = $this->input->post('IdPos');
                $datapendukung = $this->filependukung->getFilePendukung($IdPos);
                $deleteAll = $this->filependukung->deleteAll($IdPos);
                if($deleteAll){
                    foreach ($datapendukung as $pendukung ) {
                        if(file_exists('assets/upload/'.$pendukung->Path)){
                            unlink('assets/upload/'.$pendukung->Path);
                        }
                    }
                }
                $delete = $this->posting->delete($IdPos);
                if($delete){
                    $this->session->set_flashdata('success', 'artikel berhasil dihapus');
                }else{
                    $this->session->set_flashdata('error', 'artikel gagal dihapus');
                }
                redirect(base_url('artikel'));
            }elseif(isset($_POST['btn-delete-file'])){
                $IdPos = $this->input->post('IdPos');
                $NoUrut = $this->input->post('NoUrut');
                $datapendukung = $this->filependukung->getFilePendukung($IdPos, $NoUrut);
                $delete = $this->filependukung->delete($IdPos, $NoUrut);
                if($delete){
                    foreach ($datapendukung as $pendukung ) {
                        if(file_exists('assets/upload/'.$pendukung->Path)){
                            unlink('assets/upload/'.$pendukung->Path);
                        }
                    }
                    $this->session->set_flashdata('success', 'gambar pendukung berhasil dihapus');
                }else{
                    $this->session->set_flashdata('error', 'gambar pendukung gagal dihapus');
                }
                redirect(base_url('artikel'));
            }
            //pagination
            $cari = isset($_GET['q']) ? $this->input->get('q') : "";
            $this->posting->setNum_rows(true);
            $this->posting->setLimit(-1);
            $data['jmlpos'] = $this->posting->getposting(ARTIKEL, $cari);
            $page = $this->uri->segment(3);
            $data['page'] = $page;
            $limit = 10;
            $this->posting->setLimit($limit);
            $this->posting->setPage($page);
            $this->posting->setNum_rows(false);
            $datapos = $this->posting->getposting(ARTIKEL, $cari);
            $i = 0;
            foreach ($datapos as $pos) {
                $datapendukung = $this->filependukung->getFilePendukung($pos->IdPos);
                $datapos[$i]->datapendukung = $datapendukung;
                $i++;
            }
            $data['datapos'] = $datapos;
            // _json($data);
            $this->load_page(base_url('artikel/index'), $data['jmlpos'], $limit); //Base.php
            //pagination

            $this->template->load('admin', 'admin/artikel', $data); 
        }else{
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }
    
    public function tambah()
    {
        $data = array();
        $data['title'] = 'Tambah Artikel';
        $data['JenisPos'] = ARTIKEL;
        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-submit'])){

                $insertdatapendukung = array();
                $IdPos = $this->posting->create_kode();
                $NoUrut = 1;

                $target_dir = 'assets/upload/sup';
                $Path1 = $this->uploadimage('Path1', $target_dir);
                $fileImageName1 = false;
                if($Path1){
                    if($Path1 != 404){
                        $fileImageName1 = 'sup/'.$Path1;
                        $insertdata = ['IdPos'=>$IdPos, 'KodePerson'=>$this->session->userdata('KodePerson'), 'NoUrut'=>$NoUrut, 'Path'=>$fileImageName1, 'NamaFile'=>'File Pendukung Artikel '.$NoUrut];
                        array_push($insertdatapendukung, $insertdata);
                        $NoUrut++;
                    }
                }
                $Path2 = $this->uploadimage('Path2', $target_dir);
                $fileImageName2 = false;
                if($Path2){
                    if($Path2 != 404){
                        $fileImageName2 = 'sup/'.$Path2;
                        $insertdata = ['IdPos'=>$IdPos, 'KodePerson'=>$this->session->userdata('KodePerson'), 'NoUrut'=>$NoUrut, 'Path'=>$fileImageName2, 'NamaFile'=>'File Pendukung Artikel '.$NoUrut];
                        array_push($insertdatapendukung, $insertdata);
                        $NoUrut++;
                    }
                }
                $Path3 = $this->uploadimage('Path3', $target_dir);
                $fileImageName3 = false;
                if($Path3){
                    if($Path3 != 404){
                        $fileImageName3 = 'sup/'.$Path3;
                        $insertdata = ['IdPos'=>$IdPos, 'KodePerson'=>$this->session->userdata('KodePerson'), 'NoUrut'=>$NoUrut, 'Path'=>$fileImageName3, 'NamaFile'=>'File Pendukung Artikel '.$NoUrut];
                        array_push($insertdatapendukung, $insertdata);
                        $NoUrut++;
                    }
                }

                $post = $this->input->post();
                $post['JenisPos'] = ARTIKEL;
                if(isset($_POST['IsPublikasi'])){
                    $post['IsPublikasi'] = 1;
                    $post['TglPublikasi'] = date('Y-m-d H:i:s');
                }
                // _json($insertdatapendukung);
                $insert = $this->posting->insert($post);
                if($insert){
                    if(sizeof($insertdatapendukung) > 0){
                        $insertberkas = $this->filependukung->setFilePendukung($IdPos, $insertdatapendukung);
                        if($insertberkas){
                            $this->session->set_flashdata('success', 'artikel telah berhasil disimpan');
                            redirect(base_url('artikel'));
                        }else{
                            $this->session->set_flashdata('success', 'artikel berhasil disimpan');
                            redirect(base_url('artikel'));
                        }
                    }else{
                        $this->session->set_flashdata('success', 'artikel berhasil disimpan');
                        redirect(base_url('artikel'));
                    }
                }else{
                    $this->session->set_flashdata('error', 'artikel gagal disimpan');
                    redirect(base_url('artikel/tambah'));
                }
            }
            $this->template->load('admin', 'admin/artikel-form', $data);
        }else{
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }

    public function edit()
    {
        $data = array();
        if ($this->cek_login(ADMIN)) {
            $IdPos = $this->input->get('id');            
            $detailpos = $this->posting->getdetailposting($IdPos);
            if($detailpos){
                $data['title'] = 'Ubah '.ucwords($detailpos['JenisPos']);
                if($detailpos['JenisPos'] === ARTIKEL){
                    $datapendukung = $this->filependukung->getFilePendukung($IdPos);
                    $file_to_remove = array();
                    if(isset($_POST['btn-submit'])){
                        $post = $this->input->post();

                        $insertdatapendukung = array();
        
                        $target_dir = 'assets/upload/sup';
                        $Path1 = $this->uploadimage('Path1', $target_dir);
                        $fileImageName1 = false;
                        if($Path1){
                            if($Path1 != 404){
                                $fileImageName1 = 'sup/'.$Path1;
                                $insertdata = ['IdPos'=>$IdPos, 'KodePerson'=>$this->session->userdata('KodePerson'), 'NoUrut'=>1, 'Path'=>$fileImageName1, 'NamaFile'=>'File Pendukung Artikel 1'];
                                array_push($insertdatapendukung, $insertdata);

                                if(sizeof($datapendukung)>0){
                                    $pendukung = $datapendukung[0];
                                    array_push($file_to_remove, 'assets/upload/'.$pendukung->Path);
                                }
                            }
                        }
                        $Path2 = $this->uploadimage('Path2', $target_dir);
                        $fileImageName2 = false;
                        if($Path2){
                            if($Path2 != 404){
                                $fileImageName2 = 'sup/'.$Path2;
                                $insertdata = ['IdPos'=>$IdPos, 'KodePerson'=>$this->session->userdata('KodePerson'), 'NoUrut'=>2, 'Path'=>$fileImageName2, 'NamaFile'=>'File Pendukung Artikel 2'];
                                array_push($insertdatapendukung, $insertdata);
                                $NoUrut++;

                                if(sizeof($datapendukung)>1){
                                    $pendukung = $datapendukung[1];
                                    array_push($file_to_remove, 'assets/upload/'.$pendukung->Path);
                                }
                            }
                        }
                        $Path3 = $this->uploadimage('Path3', $target_dir);
                        $fileImageName3 = false;
                        if($Path3){
                            if($Path3 != 404){
                                $fileImageName3 = 'sup/'.$Path3;
                                $insertdata = ['IdPos'=>$IdPos, 'KodePerson'=>$this->session->userdata('KodePerson'), 'NoUrut'=>3, 'Path'=>$fileImageName3, 'NamaFile'=>'File Pendukung Artikel 3'];
                                array_push($insertdatapendukung, $insertdata);
                                $NoUrut++;

                                if(sizeof($datapendukung)>2){
                                    $pendukung = $datapendukung[2];
                                    array_push($file_to_remove, 'assets/upload/'.$pendukung->Path);
                                }
                            }
                        }
                        
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
                            if(sizeof($insertdatapendukung) > 0){
                                foreach ($insertdatapendukung as $ins) {
                                    $updated = $this->filependukung->updateFilePendukung($ins);
                                }
                                if(sizeof($file_to_remove)>0){
                                    foreach ($file_to_remove as $file) {
                                        //hapus file lama dari penyimpanan server
                                        if(file_exists($file)){
                                            unlink($file);
                                        }
                                    }
                                }
                                $this->session->set_flashdata('success', 'artikel telah berhasil diperbarui');
                                redirect(base_url('artikel'));
                            }else{
                                $this->session->set_flashdata('success', 'artikel berhasil diperbarui');
                                redirect(base_url('artikel'));
                            }
                        }else{
                            $this->session->set_flashdata('error', 'artikel gagal diperbarui');
                            redirect(base_url('artikel/edit/'.$IdPos));
                        }
                    }
                    $data['datapendukung'] = $datapendukung;
                    $data['JenisPos'] = $detailpos['JenisPos'];
                    $data['detailpos'] = $detailpos;
                    $this->template->load('admin', 'admin/artikel-form', $data); 
                }
            }else{
                $this->session->set_flashdata('error', 'halaman tidak dapat diakses, data posting tidak ditemukan');
                redirect(base_url('artikel'));
            }
        }else{
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }
}
