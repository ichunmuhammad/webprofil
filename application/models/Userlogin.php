<?php

class Userlogin extends CI_Model 
{

    public function create_kode() {
        $sql = 'SELECT RIGHT(KodePerson, 7) AS kode FROM userlogin ORDER BY KodePerson DESC LIMIT 1';
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
            $bikin_kode = str_pad($kode, 7, "0", STR_PAD_LEFT);
            return "PRS-" . $bikin_kode;
        }
        return FALSE;
    }

    public function getUserlogin($UserName, $Password)
    {
        return $this->db->select('u.*')
                ->from('userlogin u')
                ->where(array(
                    'u.Username'=>$UserName, 'u.Password'=>md5($Password)
                ))
                ->get()
                ->row_array();
    }

    public function getUserloginByKode($KodePerson)
    {
        return $this->db->select('u.*')
                ->from('userlogin u')
                ->where(array(
                    'u.KodePerson'=>$KodePerson
                ))
                ->get()
                ->row_array();
    }

    public function insert($KodePerson, $data)
    {
        $user = ['KodePerson'=>$KodePerson, 'NamaLengkap'=>$data['NamaLengkap'], 'Username'=>$data['Username'], 'Password'=>$data['Password'], 'IsAktif'=>1, 'JenisUser'=>$data['JenisUser']];
        if(isset($data['KodePegawai'])) $user['KodePegawai'] = $data['KodePegawai'];
        if(isset($data['Telepon'])) $user['Telepon'] = $data['Telepon'];
        $this->db->insert('userlogin', $user);
        return $this->db->affected_rows();
    }

    public function update($KodePerson, $data)
    {
        $user = ['NamaLengkap'=>$data['NamaLengkap'], 'Username'=>$data['Username']];
        if(isset($data['Password'])) $user['Password'] = $data['Password'];
        if(isset($data['IsAktif'])) $user['IsAktif'] = $data['IsAktif'];
        if(isset($data['JenisUser'])) $user['JenisUser'] = $data['JenisUser'];
        if(isset($data['Telp'])) $user['Telp'] = $data['Telp'];
        $this->db->update('userlogin', $user, ['KodePerson'=>$KodePerson]);
        return true;
    }

    public function cek_username($Username)
    {
        return $this->db->get_where('userlogin', ['Username'=>$Username])->row_array();
    }
}
