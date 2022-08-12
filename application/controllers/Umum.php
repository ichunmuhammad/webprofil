<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Base.php';

class Umum extends Base {

    private $data;
    private $template_umum = 'known';

    public function __construct() {
        parent::__construct();
        $this->load->model('Sistemsetting', 'sistemsetting');
        $this->load->model('Posting', 'posting');
        $this->load->model('Filependukung', 'filependukung');
        $this->load->model('Dataanggota', 'dataanggota');
        $this->load->model('Datapesan', 'datapesan');

        $settings = $this->db->get('sistemsetting')->result();

        $ip = $this->input->ip_address(); // Mendapatkan IP user
        $date = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");

        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
        $ss = isset($s) ? ($s) : 0;

        // Kalau belum ada, simpan data user tersebut ke database
        if ($ss == 0) {
            $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
        } else {
            // Jika sudah ada, update
            $this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }

        $logo = false;
        $namaweb = false;
        $banner_profil = false;
        $banner_profil_title = false;
        $banner_awal = false;
        $banner_awal_title = false;
        $banner_awal_subtitle = false;
        $profilkami = false;
        $kontak_kami = false;
        $lokasi_kami = false;
        $banner_kontak = false;
        $fb_link = false;
        $wa_link = false;
        $ig_link = false;
        $tg_link = false;
        $nama_dev = false;
        $url_dev = false;
        $tampilkan_visimisi = false;
        if ($settings) {
            foreach ($settings as $setting) {
                if ($setting->NamaSetting === 'BANNER_PROFIL') {
                    $banner_profil = $setting;
                } elseif ($setting->NamaSetting === 'BANNER_PROFIL_TITLE') {
                    $banner_profil_title = $setting;
                } elseif ($setting->NamaSetting === 'TAMPILKAN_VISI_MISI') {
                    $tampilkan_visimisi = $setting;
                } elseif ($setting->NamaSetting === 'BANNER_AWAL') {
                    $banner_awal = $setting;
                } elseif ($setting->NamaSetting === 'BANNER_AWAL_TITLE') {
                    $banner_awal_title = $setting;
                } elseif ($setting->NamaSetting === 'BANNER_AWAL_SUBTITLE') {
                    $banner_awal_subtitle = $setting;
                } elseif ($setting->NamaSetting === 'LOGO_WEBSITE') {
                    $logo = $setting;
                } elseif ($setting->NamaSetting === 'NAMA_WEBSITE') {
                    $namaweb = $setting;
                } elseif ($setting->NamaSetting === 'PROFIL_KAMI') {
                    $profilkami = $setting;
                } elseif ($setting->NamaSetting === 'KONTAK_KAMI') {
                    $kontak_kami = $setting;
                } elseif ($setting->NamaSetting === 'LOKASI_KAMI') {
                    $lokasi_kami = $setting;
                } elseif ($setting->NamaSetting === 'BANNER_KONTAK') {
                    $banner_kontak = $setting;
                }elseif($setting->NamaSetting === 'FACEBOOK_LINK'){
                    $fb_link = $setting;
                }elseif($setting->NamaSetting === 'WHATSAPP_LINK'){
                    $wa_link = $setting;
                }elseif($setting->NamaSetting === 'INSTAGRAM_LINK'){
                    $ig_link = $setting;
                } elseif($setting->NamaSetting === 'TELEGRAM_LINK'){
                    $tg_link = $setting;
                } elseif ($setting->NamaSetting === 'NAMA_DEVELOPER') {
                    $nama_dev = $setting;
                } elseif ($setting->NamaSetting === 'URL_DEVELOPER') {
                    $url_dev = $setting;
                }
            }
        }

        $pengunjunghariini = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
        $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();
        $totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung
        $bataswaktu = time() - 300;
        $pengunjungonline = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online

        $this->data['pengunjunghariini'] = $pengunjunghariini;
        $this->data['totalpengunjung'] = $totalpengunjung;
        $this->data['pengunjungonline'] = $pengunjungonline;

        $this->data = [
            'settings' => $settings, 'logo' => $logo, 'namaweb' => $namaweb, 'banner_awal' => $banner_awal, 'banner_awal_title' => $banner_awal_title, 'banner_awal_subtitle' => $banner_awal_subtitle, 'banner_profil' => $banner_profil, 'banner_profil_title' => $banner_awal_title, 'tampilkan_visimisi'=>$tampilkan_visimisi, 'profilkami' => $profilkami, 'kontak_kami' => $kontak_kami, 'lokasi_kami' => $lokasi_kami, 'banner_kontak' => $banner_kontak, 'fb_link'=>$fb_link, 'wa_link'=>$wa_link, 'ig_link'=>$ig_link, 'tg_link'=>$tg_link, 'nama_dev' => $nama_dev, 'url_dev' => $url_dev
        ];
    }

    public function index() {
        $data = $this->data;
        $data['title'] = 'Halaman umum';
        $this->posting->setIsPublikasi(1);
        $this->posting->setLimit(-1);
        $dataslider = $this->posting->getposting(SLIDER);
        $data['dataslider'] = $dataslider;
        $datavisi = $this->posting->getposting(VISI);
        $data['datavisi'] = $datavisi;
        $datamisi = $this->posting->getposting(MISI);
        $data['datamisi'] = $datamisi;
        $this->posting->setLimit(3);
        $dataagenda = $this->posting->getposting(AGENDA);
        $data['dataagenda'] = $dataagenda;
        $datapengumuman = $this->posting->getposting(PENGUMUMAN);
        $data['datapengumuman'] = $datapengumuman;
        $this->posting->setLimit(6);
        $dataartikel = $this->posting->getposting(ARTIKEL);
        $data['dataartikel'] = $dataartikel;
        $datafoto = $this->posting->getposting(FOTO);
        $data['datafoto'] = $datafoto;
        $this->template->loadfrontend($this->template_umum, 'beranda', $data);
    }

    public function profil() {
        $data = $this->data;
        $this->template->loadfrontend($this->template_umum, 'profil', $data);
    }

    public function kontak() {
        if (isset($_POST['submit'])) {
            $post = $this->input->post();
            $insert = $this->datapesan->insert($post['NamaLengkap'], $post['Email'], $post['IsiPesan']);
            if ($insert) {
                $this->session->set_flashdata('success', 'pesan berhasil dikirim');
                redirect(base_url('kontak'));
            } else {
                $this->session->set_flashdata('success', 'pesan gagal dikirim');
                redirect(base_url('kontak'));
            }
        }
        $data = $this->data;
        $this->template->loadfrontend($this->template_umum, 'kontak', $data);
    }

    public function artikel($param = "") {
        $page = false;
        $data = $this->data;
        if ($param !== "" && !is_numeric($param)) {
            $detail_artikel = $this->db->get_where('posting', [
                'slug' => $param, 'JenisPos' => ARTIKEL,
            ])->row_array();
            if ($detail_artikel) {
                $data['detail_artikel'] = $detail_artikel;
                $data['datapendukung'] = $this->filependukung->getFilePendukung($detail_artikel['IdPos']);
                // _json($data);
                $this->template->loadfrontend($this->template_umum, 'artikel-detail', $data);
            } else {
                redirect(base_url('page/artikel'));
            }
        } else {
            if ($param !== "" && is_numeric($param)) {
                $page = $param;
            }
            //pagination
            $cari = isset($_GET['q']) ? $this->input->get('q') : "";
            $this->posting->setNum_rows(true);
            $this->posting->setLimit(-1);
            $this->posting->setIsPublikasi(1);
            $data['jmlpos'] = $this->posting->getposting(ARTIKEL, $cari);
            $data['page'] = $page;
            $limit = 9;
            $this->posting->setLimit($limit);
            $this->posting->setPage($page);
            $this->posting->setNum_rows(false);
            $dataartikel = $this->posting->getposting(ARTIKEL, $cari);
            $i = 0;
            foreach ($dataartikel as $art) {
                $dataartikel[$i]->datapendukung = $this->filependukung->getFilePendukung($art->IdPos);
                $i++;
            }
            $data['dataartikel'] = $dataartikel;
            $this->load_page(base_url('page/artikel'), $data['jmlpos'], $limit); //Base.php
            //pagination
            $this->template->loadfrontend($this->template_umum, 'artikel', $data);
        }
    }

    public function agenda($param = "") {
        $page = false;
        $data = $this->data;
        if ($param !== "" && !is_numeric($param)) {
            $detail_agenda = $this->db->get_where('posting', [
                'slug' => $param, 'JenisPos' => AGENDA,
            ])->row_array();
            if ($detail_agenda) {
                $data['detail_agenda'] = $detail_agenda;
                // _json($data);
                $this->template->loadfrontend($this->template_umum, 'agenda-detail', $data);
            } else {
                redirect(base_url('page/agenda'));
            }
        } else {
            if ($param !== "" && is_numeric($param)) {
                $page = $param;
            }
            //pagination
            $cari = isset($_GET['q']) ? $this->input->get('q') : "";
            $this->posting->setNum_rows(true);
            $this->posting->setLimit(-1);
            $this->posting->setIsPublikasi(1);
            $data['jmlpos'] = $this->posting->getposting(AGENDA, $cari);
            $data['page'] = $page;
            $limit = 9;
            $this->posting->setLimit($limit);
            $this->posting->setPage($page);
            $this->posting->setNum_rows(false);
            $dataagenda = $this->posting->getposting(AGENDA, $cari);
            $data['dataagenda'] = $dataagenda;
            $this->load_page(base_url('page/agenda'), $data['jmlpos'], $limit); //Base.php
            //pagination
            $this->template->loadfrontend($this->template_umum, 'agenda', $data);
        }
    }

    public function pengumuman($param = "") {
        $page = false;
        $data = $this->data;
        if ($param !== "" && !is_numeric($param)) {
            $detail_pengumuman = $this->db->get_where('posting', [
                'slug' => $param, 'JenisPos' => PENGUMUMAN,
            ])->row_array();
            if ($detail_pengumuman) {
                $data['detail_pengumuman'] = $detail_pengumuman;
                // _json($data);
                $this->template->loadfrontend($this->template_umum, 'pengumuman-detail', $data);
            } else {
                redirect(base_url('page/pengumuman'));
            }
        } else {
            if ($param !== "" && is_numeric($param)) {
                $page = $param;
            }
            //pagination
            $cari = isset($_GET['q']) ? $this->input->get('q') : "";
            $this->posting->setNum_rows(true);
            $this->posting->setLimit(-1);
            $this->posting->setIsPublikasi(1);
            $data['jmlpos'] = $this->posting->getposting(PENGUMUMAN, $cari);
            $data['page'] = $page;
            $limit = 5;
            $this->posting->setLimit($limit);
            $this->posting->setPage($page);
            $this->posting->setNum_rows(false);
            $datapengumuman = $this->posting->getposting(PENGUMUMAN, $cari);
            $data['datapengumuman'] = $datapengumuman;
            $this->load_page(base_url('page/pengumuman'), $data['jmlpos'], $limit); //Base.php
            //pagination
            $this->template->loadfrontend($this->template_umum, 'pengumuman', $data);
        }
    }

    public function foto($page = "") {
        $data = $this->data;
        //pagination
        $cari = isset($_GET['q']) ? $this->input->get('q') : "";
        $this->posting->setNum_rows(true);
        $this->posting->setLimit(-1);
        $this->posting->setIsPublikasi(1);
        $data['jmlpos'] = $this->posting->getposting(FOTO, $cari);
        $data['page'] = $page;
        $limit = 9;
        $this->posting->setLimit($limit);
        $this->posting->setPage($page);
        $this->posting->setNum_rows(false);
        $datafoto = $this->posting->getposting(FOTO, $cari);
        $data['datafoto'] = $datafoto;
        $this->load_page(base_url('page/foto'), $data['jmlpos'], $limit); //Base.php
        //pagination
        $this->template->loadfrontend($this->template_umum, 'foto', $data);
    }

    public function video($page = "") {
        $data = $this->data;
        //pagination
        $cari = isset($_GET['q']) ? $this->input->get('q') : "";
        $this->posting->setNum_rows(true);
        $this->posting->setLimit(-1);
        $this->posting->setIsPublikasi(1);
        $data['jmlpos'] = $this->posting->getposting(VIDEO, $cari);
        $data['page'] = $page;
        $limit = 9;
        $this->posting->setLimit($limit);
        $this->posting->setPage($page);
        $this->posting->setNum_rows(false);
        $datavideo = $this->posting->getposting(VIDEO, $cari);
        $data['datavideo'] = $datavideo;
        $this->load_page(base_url('page/video'), $data['jmlpos'], $limit); //Base.php
        //pagination
        $this->template->loadfrontend($this->template_umum, 'video', $data);
    }

    public function kurikulum($page = "") {
        $data = $this->data;
        //pagination
        $cari = isset($_GET['q']) ? $this->input->get('q') : "";
        $this->posting->setNum_rows(true);
        $this->posting->setLimit(-1);
        $this->posting->setIsPublikasi(1);
        $data['jmlpos'] = $this->posting->getposting(DOKUMEN, $cari);
        $data['page'] = $page;
        $limit = 9;
        $this->posting->setLimit($limit);
        $this->posting->setPage($page);
        $this->posting->setNum_rows(false);
        $datadokumen = $this->posting->getposting(DOKUMEN, $cari);
        $data['datadokumen'] = $datadokumen;
        $this->load_page(base_url('page/kurikulum'), $data['jmlpos'], $limit); //Base.php
        //pagination
        $this->template->loadfrontend($this->template_umum, 'kurikulum', $data);
    }

    public function guru() {
        $data = $this->data;
        $this->dataanggota->setLimit(-1);
        $this->dataanggota->setNum_rows(false);
        $data['dataanggota'] = $this->dataanggota->getallanggota();
        $this->template->loadfrontend($this->template_umum, 'guru', $data);
    }
}