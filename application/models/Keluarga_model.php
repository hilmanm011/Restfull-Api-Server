<?php

class Keluarga_model extends CI_Model
{


    public function getKeluarga($id = null)
    {
        if ($id === null) {

            return $this->db->get('keluarga')->result_array();
        } else {
            return $this->db->get_where('keluarga', ['id' => $id])->result_array();
        }
    }

    public function deleteKeluarga($id)
    {
        $this->db->delete('keluarga', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createKeluarga($data)
    {
        $this->db->insert('keluarga', $data);
        return $this->db->affected_rows();
    }

    public function updateKeluarga($data, $id)
    {
        $this->db->update('keluarga', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
