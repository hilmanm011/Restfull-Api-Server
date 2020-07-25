<?php

class Penduduk_model extends CI_Model
{

    public function getPenduduk($id = null)
    {
        if ($id  === null) {
            return $this->db->get('tbl_penduduk')->result_array();
        } else {
            return $this->db->get_where('tbl_penduduk', ['id' => $id])->result_array();
        }
    }


    public function deletePenduduk($id)
    {

        $this->db->delete('tbl_penduduk', ['id' => $id]);
        return $this->db->affected_rows();
    }


    public function createPenduduk($data)
    {
        $this->db->insert('tbl_penduduk', $data);
        return $this->db->affected_rows();
    }

    public function updatePenduduk($data, $id)
    {
        $this->db->update('tbl_penduduk', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
