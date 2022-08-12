<?php

class Posting extends CI_Model {

    private $errmessage;
    private $page = 0;
    private $limit = 10;
    private $num_rows = false;
    private $IsPublikasi = -1;

    public function create_kode() {
        $sql = 'SELECT RIGHT(IdPos, 4) AS kode FROM posting ORDER BY IdPos DESC LIMIT 1';
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
            $bikin_kode = str_pad($kode, 4, "0", STR_PAD_LEFT);
            return "POS-" . $bikin_kode;
        }
        return FALSE;
    }

    public function getposting($JenisPos, $cari = "") {
        $where = [
            'JenisPos' => $JenisPos,
        ];
        if($this->getIsPublikasi() != -1){
            $where['IsPublikasi'] = $this->getIsPublikasi();
        }
        $query = $this->db->select('p.*, u.NamaLengkap')
            ->from('posting p')
            ->join('userlogin u', 'u.KodePerson = p.KodePerson', 'LEFT')
            ->where($where)
            ->order_by('TglDibuat', 'DESC');
        if ($cari !== "") {
            $query->group_start()->like('p.Judul', $cari)->or_like('p.IsiPos', $cari)->group_end();
        }
        if ($this->limit != -1) {
            $query->limit($this->limit, $this->page);
        }
        if ($this->num_rows) {
            return $query->get()->num_rows();
        }
        return $query->get()->result();
    }

    public function getdetailposting($IdPos)
    {
        $query = $this->db->select('p.*, u.NamaLengkap')
            ->from('posting p')
            ->join('userlogin u', 'u.KodePerson = p.KodePerson', 'LEFT')
            ->where([
                'IdPos' => $IdPos,
            ]);
        return $query->get()->row_array();
    }

    public function insert($data) {
        $IdPos = $this->create_kode();
        $slug = slug($data['Judul']);
        $i = 1;
        while ($this->cek_slug($slug)) {
            $slug =  slug($data['Judul']).$i;
            $i++;
        }
        $insertdata = ['IdPos' => $IdPos, 'Judul' => $data['Judul'], 'IsiPos' => $data['IsiPos'], 'JenisPos' => $data['JenisPos'], 'TglDibuat' => date('Y-m-d H:i:s'), 'KodePerson'=>$this->session->userdata('KodePerson'), 'slug'=>$slug];
        if (isset($data['IsPublikasi'])) {
            $insertdata['IsPublikasi'] = $data['IsPublikasi'];
        }

        if (isset($data['TglPublikasi'])) {
            $insertdata['TglPublikasi'] = $data['TglPublikasi'];
        }

        $this->db->insert('posting', $insertdata);
        return $this->db->affected_rows();
    }

    public function cek_slug($slug)
    {
        $checked = $this->db->get_where('posting', ['slug'=>$slug])->num_rows();
        return $checked;
    }

    public function update($IdPos, $updatedata)
    {
        if(isset($updatedata['Judul'])){            
            $slug = slug($updatedata['Judul']);
            $i = 1;
            while ($this->cek_slug($slug) > 0) {
                $slug =  slug($updatedata['Judul']).$i;
                $i++;
            }
            $updatedata['slug'] = $slug;
        }
        $this->db->update('posting', $updatedata, ['IdPos'=>$IdPos]);
        return true;
    }

    public function delete($IdPos)
    {
        $this->db->delete('posting', ['IdPos'=>$IdPos]);
        return $this->db->affected_rows();
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

    public function setIsPublikasi($IsPublikasi)
    {
        $this->IsPublikasi = $IsPublikasi;
    }

    public function getIsPublikasi()
    {
        return $this->IsPublikasi;
    }
}
