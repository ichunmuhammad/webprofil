<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Base.php';

class Visimisi extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sistemsetting', 'sistemsetting');
        $this->load->model('Posting', 'posting');
	}
	
	public function index()
	{
        $data = array();
        $data['title'] = 'Pengaturan Data Visi & Misi';

        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-submit'])){
                $post = $this->input->post();
                $post['IsPublikasi'] = 1;
                $post['TglPublikasi'] = date('Y-m-d H:i:s');
                $insert = $this->posting->insert($post);
                if($insert){
                    $this->session->set_flashdata('success', $post['JenisPos'].' berhasil disimpan');
                }else{
                    $this->session->set_flashdata('error', $post['JenisPos'].' gagal disimpan');
                }
                redirect(base_url('visimisi/'));
            }elseif(isset($_POST['btn-delete'])){
                $IdPos = $this->input->post('IdPos');
                $JenisPos = $this->input->post('JenisPos');
                $delete = $this->posting->delete($IdPos);
                if($delete){
                    $this->session->set_flashdata('success', $JenisPos.' berhasil dihapus');
                }else{
                    $this->session->set_flashdata('error', $JenisPos.' gagal dihapus');
                }
                redirect(base_url('visimisi/'));
            }
            $data['datavisi'] = $this->posting->getposting(VISI);
            $data['datamisi'] = $this->posting->getposting(MISI);
            $this->template->load('admin', 'admin/visimisi', $data);
        }
	}
}
