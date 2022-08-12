<?php

class Sistemsetting extends CI_Model 
{
    
    public function getallsetting()
    {
        return $this->db->select('s.*, u.NamaLengkap')
            ->from('sistemsetting s')
            ->join('userlogin u', 'u.KodePerson = s.KodePerson', 'LEFT')
            ->order_by('s.KodeSetting', 'ASC')
            ->get()
            ->result();
    }

    public function update($KodeSetting, $Value, $KodePerson = "")
    {
        $val = ['Value'=>$Value];
        if($KodePerson !== ""){
            $val['KodePerson'] = $KodePerson;
        }
        $this->db->update('sistemsetting', $val, ['KodeSetting'=>$KodeSetting]);
        return true;
    }
}
