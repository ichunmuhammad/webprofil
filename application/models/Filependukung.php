<?php

class Filependukung extends CI_Model 
{

    public function create_kode($IdPos) {
        $sql = 'SELECT f.NoUrut FROM filependukung f
            WHERE f.IdPos = ?
            ORDER BY f.NoUrut DESC LIMIT 1';
        $query = $this->db->query($sql, [$IdPos]);
        if ($query) {
            $data = $query->row_array();
            return $data['NoUrut'] + 1;
        }
        return 1;
    }

    public function createObj($NoUrut, $data)
    {
        $insertdata = ['NoUrut'=>$NoUrut, 'KodePerson'=>$data['KodePerson'], 'IdPos'=>$data['IdPos'], 'Path'=>$data['Path']];
        if(isset($data['NamaFile'])) $insertdata['NamaFile'] = $data['NamaFile'];
        if(isset($data['Keterangan'])) $insertdata['Keterangan'] = $data['Keterangan'];
        return $insertdata;
    }

    public function getFilePendukung($IdPos, $NoUrut = "")
    {
        if($NoUrut !== ""){
            return $this->db->get_where('filependukung', [
                'IdPos'=>$IdPos, 'NoUrut'=>$NoUrut
            ])->result();
        }
        return $this->db->get_where('filependukung', [
            'IdPos'=>$IdPos
        ])->result();
    }

    public function setFilePendukung($IdPos, $insertdata)
    {
        $this->db->delete('filependukung', [
            'IdPos'=>$IdPos
        ]);
        $this->db->insert_batch('filependukung', $insertdata);
        return $this->db->affected_rows();    
    }

    public function updateFilePendukung($updatedata)
    {
        $IsExist = $this->db->get_where('filependukung', ['IdPos'=>$updatedata['IdPos'], 'NoUrut'=>$updatedata['NoUrut']])->num_rows();
        if($IsExist){
            $this->db->update('filependukung', $updatedata, ['IdPos'=>$updatedata['IdPos'], 'NoUrut'=>$updatedata['NoUrut']]);
            return $this->db->affected_rows();    
        }else{
            $this->db->insert('filependukung', $updatedata);
            return $this->db->affected_rows();    
        }
    }

    public function delete($IdPos, $NoUrut)
    {
        $this->db->delete('filependukung', [
            'IdPos'=>$IdPos, 'NoUrut'=>$NoUrut
        ]);
        return $this->db->affected_rows();    
    }

    public function deleteAll($IdPos)
    {
        $this->db->delete('filependukung', [
            'IdPos'=>$IdPos
        ]);
        return $this->db->affected_rows();    
    }
}
