<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'Base.php';

class Dokumen extends Base
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sistemsetting', 'sistemsetting');
        $this->load->model('Posting', 'posting');
    }

    public function index()
    {
        $data = array();
        $data['title'] = 'Pengaturan Data Dokumen';
        if ($this->cek_login(ADMIN)) {
            if (isset($_POST['btn-delete'])) {
                $IdPos = $this->input->post('IdPos');
                $detailpos = $this->posting->getdetailposting($IdPos);
                if ($detailpos) {
                    $delete = $this->posting->delete($IdPos);
                    if ($delete) {
                        //hapus file lama dari penyimpanan server
                        $target_dir = 'assets/upload/';
                        if (file_exists($target_dir . $detailpos['IsiPos'])) {
                            unlink($target_dir . $detailpos['IsiPos']);
                        }
                        $this->session->set_flashdata('success', $detailpos['JenisPos'] . ' berhasil dihapus');
                    } else {
                        $this->session->set_flashdata('error', $detailpos['JenisPos'] . ' gagal dihapus');
                    }
                    redirect(base_url('webprofil/' . $detailpos['JenisPos']));
                } else {
                    $this->session->set_flashdata('error', 'proses hapus data gagal, data tidak ditemukan');
                    redirect(base_url('webprofil/artikel'));
                }
            } elseif (isset($_POST['btn-publikasi'])) {
                $IdPos = $this->input->post('IdPos');
                $IsPublikasi = $this->input->post('IsPublikasi');
                $update = $this->posting->update($IdPos, [
                    'IsPublikasi' => $IsPublikasi
                ]);
                if ($update) {
                    $this->session->set_flashdata('success', 'proses update data berhasil');
                } else {
                    $this->session->set_flashdata('error', 'update data gagal diproses');
                }
                redirect(base_url('dokumen'));
            }
            //pagination
            $cari = isset($_GET['q']) ? $this->input->get('q') : "";
            $this->posting->setNum_rows(true);
            $this->posting->setLimit(-1);
            $data['jmlpos'] = $this->posting->getposting(DOKUMEN, $cari);
            $page = $this->uri->segment(3);
            $data['page'] = $page;
            $limit = 10;
            $this->posting->setLimit($limit);
            $this->posting->setPage($page);
            $this->posting->setNum_rows(false);
            $data['datapos'] = $this->posting->getposting(DOKUMEN, $cari);
            $this->load_page(base_url('webprofil/dokumen'), $data['jmlpos'], $limit); //Base.php
            //pagination

            $this->template->load('admin', 'admin/dokumen', $data);
        } else {
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }

    public function tambah()
    {
        $data = array();
        $data['title'] = 'Tambah Dokumen';
        $data['JenisPos'] = DOKUMEN;
        $JenisPos = $data['JenisPos'];
        if ($this->cek_login(ADMIN)) {
            if (isset($_POST['btn-submit'])) {
                $post = $this->input->post();
                $target_dir = 'assets/upload/dokumen';
                $upload = $this->uploaddok('Path', $target_dir);
                if ($upload) {
                    $fileImageName = 'dokumen/' . $upload;
                    $post['IsiPos'] = $fileImageName;
                    $post['JenisPos'] = DOKUMEN;
                    $post['IsPublikasi'] = 1;
                    $post['TglPublikasi'] = date('Y-m-d H:i:s');
                    $insert = $this->posting->insert($post);
                    if ($insert) {
                        $this->session->set_flashdata('success', 'dokumen berhasil disimpan');
                        redirect(base_url($JenisPos));
                    } else {
                        $this->session->set_flashdata('error', 'dokumen gagal disimpan');
                        redirect(base_url($JenisPos . '/tambah'));
                    }
                } else {
                    $this->session->set_flashdata('error', $JenisPos . ' gagal disimpan');
                    redirect(base_url($JenisPos . '/tambah'));
                }
            }
            $this->template->load('admin', 'admin/dokumen-form', $data);
        } else {
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }

    public function edit($IdPos)
    {
        $data = array();
        if ($this->cek_login(ADMIN)) {
            $detailpos = $this->posting->getdetailposting($IdPos);
            if ($detailpos) {
                $data['title'] = 'Ubah ' . ucwords($detailpos['JenisPos']);
                if ($detailpos['JenisPos'] === ARTIKEL) {
                    if (isset($_POST['btn-submit'])) {
                        $post = $this->input->post();
                        $updatedata = array();
                        $updatedata['Judul'] = $post['Judul'];
                        $updatedata['IsiPos'] = $post['IsiPos'];
                        if (isset($_POST['IsPublikasi'])) {
                            $updatedata['IsPublikasi'] = 1;
                            $updatedata['TglPublikasi'] = date('Y-m-d H:i:s');
                        } else {
                            $updatedata['IsPublikasi'] = 0;
                        }
                        $update = $this->posting->update($IdPos, $updatedata);
                        if ($update) {
                            $this->session->set_flashdata('success', 'artikel berhasil diupdate');
                            redirect(base_url('artikel'));
                        } else {
                            $this->session->set_flashdata('error', 'artikel gagal diupdate');
                            redirect(base_url('artikel/edit/' . $IdPos));
                        }
                    }
                    $data['JenisPos'] = $detailpos['JenisPos'];
                    $data['detailpos'] = $detailpos;
                    $this->template->load('admin', 'admin/dokumen-form', $data);
                }
            } else {
                $this->session->set_flashdata('error', 'halaman tidak dapat diakses, data posting tidak ditemukan');
                redirect(base_url('artikel'));
            }
        } else {
            $this->template->load('admin', 'err/akses_blok', $data);
        }
    }
}
