<?php

class Mstjabatan extends CI_Model {

    private $page = 0;
    private $limit = 10;
    private $num_rows = false;
    private $KodeJabatan = false;

    public function getalljabatan($cari = "") {
        $q = $this->db->select('j.*, count(a.IdAnggota) AS JumlahAnggota')
            ->from('jabatan j')
            ->join('anggota a', 'a.KodeJabatan = j.KodeJabatan', 'LEFT')
            ->group_by('j.KodeJabatan')
            ->order_by('j.KodeJabatan');
        if($this->KodeJabatan){
            $q->where('j.KodeJabatan', $this->getKodeJabatan());
            return $q->get()->row_array();
        }
        if ($cari !== "") {
            $q->group_start()->like('j.NamaJabatan', $cari)->group_end();
        }
        if ($this->limit != -1) {
            $q->limit($this->limit, $this->page);
        }
        if ($this->num_rows) {
            return $q->get()->num_rows();
        }
        return $q->get()->result();            
    }

    public function insert($KodeJabatanAtas, $NamaJabatan)
    {
        $this->db->insert('jabatan', ['KodeJabatanAtas'=>$KodeJabatanAtas, 'NamaJabatan'=>$NamaJabatan]);
        return $this->db->affected_rows();
    }

    public function update($KodeJabatanAtas, $NamaJabatan)
    {
        if($this->getKodeJabatan()){
            $this->db->update('jabatan', ['KodeJabatanAtas'=>$KodeJabatanAtas, 'NamaJabatan'=>$NamaJabatan], ['KodeJabatan'=>$this->getKodeJabatan()]);
            return true;
        }
        return false;
    }

    public function delete()
    {
        if($this->getKodeJabatan()){
            $this->db->delete('jabatan', ['KodeJabatan'=>$this->getKodeJabatan()]);
            return $this->db->affected_rows();
        }
        return false;
    }

    public function getbawahan($KodeJabatan) {
        return $this->db->get_where('jabatan', ['KodeJabatanAtas' => $KodeJabatan])->result();
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

    public function setKodeJabatan($KodeJabatan)
    {
        $this->KodeJabatan = $KodeJabatan;
    }

    public function getKodeJabatan()
    {
        return $this->KodeJabatan;
    }
}

?>