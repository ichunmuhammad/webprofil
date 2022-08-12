<?php

class Datapesan extends CI_Model {

    private $page = 0;
    private $limit = 10;
    private $num_rows = false;
    private $IsDibaca = -1;
    private $KodePerson;

    public function create_kode() {
        date_default_timezone_set('Asia/Jakarta');
        $year = date('Y-m');
        $sql = "SELECT RIGHT(KodePesan, 8) AS kode FROM pesan WHERE KodePesan LIKE '%$year%' ORDER BY KodePesan DESC LIMIT 1";
        $query = $this->db->query($sql);
        if ($query) {
            $kode = 1;
            $num = $query->num_rows();
            if ($num != 0) {
                $data = $query->row_array();
                $kode = $data['kode'] + 1;
            } else {
                $kode = 1;
            }
            $bikin_kode = str_pad($kode, 8, "0", STR_PAD_LEFT);
            return "MSG-".$year."-" . $bikin_kode;
        }
        return FALSE;
    }
    
    public function insert($NamaPengirim, $Email, $IsiPesan)
    {
        $KodePesan = $this->create_kode();
        $Enc = md5($KodePesan.$Email);
        $this->db->insert('pesan', ['KodePesan'=>$KodePesan, 'NamaPengirim'=>$NamaPengirim, 'Email'=>$Email, 'IsiPesan'=>$IsiPesan, 'Enc'=>$Enc]);
        return $this->db->affected_rows();
    }

    public function getpesan($cari = "") {
        $q = $this->db->select('p.*, u.NamaLengkap')
            ->from('pesan p')
            ->join('userlogin u', 'u.KodePerson = p.KodePerson', 'LEFT')
            ->order_by('p.IsDibaca ASC, p.TglDiterima ASC, p.NamaPengirim ASC')
            ->group_by('p.KodePesan');

        if ($this->IsDibaca != -1) {
            $q->where('p.IsDibaca', $this->IsDibaca);
        }
        if ($this->limit != -1) {
            $q->limit($this->limit, $this->page);
        }
        if ($cari !== "") {
            $q->group_start()->like('p.NamaPengirim', $cari)->or_like('p.IsiPesan', $cari)->or_like('p.Email', $cari)->or_like('u.NamaLengkap', $cari)->group_end();
        }
        if ($this->num_rows) {
            return $q->get()->num_rows();
        }
        if ($this->KodePerson) {
            return $q->where('p.KodePerson', $this->KodePerson)->get()->row_array();
        }
        return $q->get()->result();
    }

    public function update($KodePesan, $updatedata)
    {
        $this->db->update('pesan', $updatedata, ['KodePesan'=>$KodePesan]);
        return $this->db->affected_rows();        
    }

    public function createObj($data)
    {
        $obj = array();
        if(isset($data['KodePesan'])) $obj['KodePesan'] = $data['KodePesan'];
        if(isset($data['KodePerson'])) $obj['KodePerson'] = $data['KodePerson'];
        if(isset($data['Email'])) $obj['Email'] = $data['Email'];
        if(isset($data['NamaPengirim'])) $obj['NamaPengirim'] = $data['NamaPengirim'];
        if(isset($data['IsiPesan'])) $obj['IsiPesan'] = $data['IsiPesan'];
        if(isset($data['IsDibaca'])) $obj['IsDibaca'] = $data['IsDibaca'];
        if(isset($data['TglDiterima'])) $obj['TglDiterima'] = $data['TglDiterima'];
        return $obj;
    }

    public function getdetail($Enc)
    {
        $q = $this->db->select('p.*, u.NamaLengkap')
            ->from('pesan p')
            ->join('userlogin u', 'u.KodePerson = p.KodePerson', 'LEFT')
            ->where('p.Enc', $Enc);
        return $q->get()->row_array();
    }

    public function setKodePerson($KodePerson) {
        $this->KodePerson = $KodePerson;
    }

    public function getKodePerson() {
        return $this->KodePerson;
    }

    public function setIsDibaca($IsDibaca) {
        $this->IsDibaca = $IsDibaca;
    }

    public function getIsDibaca() {
        return $this->IsDibaca;
    }

    public function setNum_rows($num_rows) {
        $this->num_rows = $num_rows;
    }

    public function getNum_rows() {
        return $this->num_rows;
    }

    public function setLimit($limit) {
        $this->limit = $limit;
    }

    public function getLimit() {
        return $this->limit;
    }

    public function setPage($page) {
        $this->page = $page;
    }

    public function getPage() {
        return $this->page;
    }
}
