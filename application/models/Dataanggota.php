<?php

class Dataanggota extends CI_Model 
{

    private $KodeJabatanAtas = 0;
    private $IsAktif = -1;
    private $IdAnggota = false;
    private $errmessage;
    private $page = 0;
    private $limit = 10;
    private $num_rows = false;

    public function create_kode() {
        $sql = 'SELECT IdAnggota AS kode FROM anggota ORDER BY IdAnggota DESC LIMIT 1';
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
            $bikin_kode = str_pad($kode, 15, "0", STR_PAD_LEFT);
            return $bikin_kode;
        }
        return FALSE;
    }

    public function insert($data)
    {
        $IdAnggota = $this->create_kode();
        $insertdata = [ 
            'IdAnggota'=>$IdAnggota, 'NamaLengkap'=>$data['NamaLengkap'], 'KodeJabatan'=>$data['KodeJabatan'], 'Telp'=>$data['Telp'], 'Kelamin'=>$data['Kelamin']
        ];
        if(isset($data['IsAktif'])){
            $insertdata['IsAktif'] = $data['IsAktif'];
        }
        $this->db->insert('anggota', $insertdata);
        return $this->db->affected_rows();        
    }

    public function update($data, $IdAnggota)
    {
        $updatedata = [ 
            'NamaLengkap'=>$data['NamaLengkap'], 'KodeJabatan'=>$data['KodeJabatan'], 'Telp'=>$data['Telp'], 'Kelamin'=>$data['Kelamin']
        ];
        if(isset($data['IsAktif'])){
            $updatedata['IsAktif'] = $data['IsAktif'];
        }else{
            $updatedata['IsAktif'] = 0;
        }
        $this->db->update('anggota', $updatedata, ['IdAnggota'=>$IdAnggota]);
        return true;
    }

    public function getallanggota($cari = "")
    {
        $query = $this->db->select('a.*, j.*')
            ->from('anggota a')
            ->join('jabatan j', 'j.KodeJabatan = a.KodeJabatan', 'LEFT');
       if($this->IsAktif != -1){
            $query->where('a.IsAktif', $this->IsAktif);
        }
        if ($cari !== "") {
            $query->group_start()->like('a.NamaLengkap', $cari)->or_like('j.NamaJabatan', $cari)->group_end();
        }
        if ($this->limit != -1) {
            $query->limit($this->limit, $this->page);
        }
        if ($this->num_rows) {
            return $query->get()->num_rows();
        }
        return $query->get()->result();
     }

     public function delete($IdAnggota)
     {
         $this->db->delete('anggota', ['IdAnggota'=>$IdAnggota]);
         return $this->db->affected_rows();        
     }

    public function getanggota()
    {
        $where = array();
        if($this->IdAnggota){
            $where['a.IdAnggota'] = $this->IdAnggota;
            
            return $this->db->select('a.*, j.*')
                ->from('anggota a')
                ->join('jabatan j', 'j.KodeJabatan = a.KodeJabatan', 'LEFT')
                ->where($where)
                ->get()
                ->row_array();
        }else{            
            $where['j.KodeJabatanAtas'] =  $this->KodeJabatanAtas;
            if($this->IsAktif != -1){
                $where['a.IsAktif'] = $this->IsAktif;
            }
            return $this->db->select('a.*, j.*')
                ->from('anggota a')
                ->join('jabatan j', 'j.KodeJabatan = a.KodeJabatan', 'LEFT')
                ->where($where)
                ->get()
                ->result();
        }
    }

    public function setKodeJabatanAtas($KodeJabatanAtas)
    {
        $this->KodeJabatanAtas = $KodeJabatanAtas;
    }

    public function getKodeJabatanAtas()
    {
        return $this->KodeJabatanAtas;
    }

    public function setIsAktif($IsAktif)
    {
        $this->IsAktif = $IsAktif;
    }

    public function getIsAktif()
    {
        return $this->IsAktif;
    }

    public function setIdAnggota($IdAnggota)
    {
        $this->IdAnggota = $IdAnggota;
    }

    public function getIdAnggota()
    {
        return $this->IdAnggota;
    }

    public function getErr() {
        return $this->errmessage;
    }

    public function setNum_rows($num_rows) {
        $this->num_rows = $num_rows;
    }

    public function setLimit($limit) {
        $this->limit = $limit;
    }

    public function setPage($page) {
        $this->page = $page;
    }

    public function getPage() {
        return $this->page;
    }

    public function getLimit() {
        return $this->limit;
    }

    public function getNum_rows() {
        return $this->num_rows;
    }
}