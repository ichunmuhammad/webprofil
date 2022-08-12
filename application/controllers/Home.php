<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Base.php';

class Home extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('Userlogin', 'userlogin');
        $this->load->library('Nativesession','nativesession');
	}
	
	public function index($bulan = 0)
	{
        $data = array();
        $data['title'] = 'Dashboard Admin Panel';

        if ($this->cek_login(ADMIN)) {
            if(isset($_POST['btn-submit'])){
                $post = $this->input->post();
                $updatedata = [
                    'NamaLengkap'=>$post['NamaLengkap'], 'Username'=>$post['Username'], 'Telp'=>$post['Telp']
                ];
                if(isset($_POST['Password']) && $_POST['Password'] !== ""){
                    $updatedata['Password'] = md5($post['Password']);
                }
                $update = $this->userlogin->update($this->session->userdata('KodePerson'), $updatedata);
                if($update){

                    $datauser = $this->userlogin->getUserloginByKode($this->session->userdata('KodePerson'));
                    //set session
                    $datauser['LOGGEDIN'] = LOGGEDIN;
                    $lvl = md5(base64_encode($datauser['JenisUser']));
                    $datauser['USR'] = $lvl;
                    $this->nativesession->set('status', 'loggedin');
                    $this->session->set_userdata($datauser);
                    //set session
                    
                    $this->session->set_flashdata('success', 'data login berhasil diperbarui');
                    redirect(base_url('home'));
                }else{
                    $this->session->set_flashdata('error', 'data login gagal diperbarui');
                    redirect(base_url('home'));
                }
            }
                
            date_default_timezone_set('Asia/Jakarta');
            $date = date("Y-m-d"); // Mendapatkan tanggal sekarang
            $bulans = array(
                1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            );
            if($bulan == 0){ 
                $bulan = 0+date('m'); 
            }elseif($bulan < 1){
                $bulan = 1;
                redirect(base_url('home/'.$bulan));
            }elseif($bulan > sizeof($bulans)){
                $bulan = 12;
                redirect(base_url('home/'.$bulan));
            }
            $NamaBulan = $bulans[$bulan];

            $pengunjunghariini = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
            $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();
            $totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung
            $bataswaktu = time() - 300;
            $pengunjungonline = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online

            $data['allvisitor'] = $this->db->query("SELECT count(DISTINCT v.ip) AS JumlahVisitor, DATE_FORMAT(v.date, 'Tgl %d') AS DateFormat, v.date AS DateVisit FROM visitor v WHERE MONTH(v.date) = ? GROUP BY v.date", [$bulan])->result();
    
            $data['pengunjunghariini'] = $pengunjunghariini;
            $data['totalpengunjung'] = $totalpengunjung;
            $data['pengunjungonline'] = $pengunjungonline;
            $data['NamaBulan'] = $NamaBulan;
            $data['bulan'] = $bulan;

            // _json($data);

            $this->template->load('admin', 'admin/dashboard', $data);
        }
	}
}
