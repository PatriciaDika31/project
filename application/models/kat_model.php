<?php

class kat_model extends CI_Model {

    public function insert()
    {
        $kat = array(
                    
                    'nama_kat'      => $this->input->post('nama_kat')
        );

        $this->db->insert('kategori', $kat);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    public function get_data_kat()
    {
        return $this->db->get('kategori')
                        ->result();
    }

    public function hapus_kat($id)
    {
        $this->db->where('id_kat', $id)
                ->delete('kategori');

        if($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_data_kat_by_id($id)
    {
        return $this->db->where('id_kat', $id)
                        ->get('kategori')
                        ->row();
    }

    public function edit()
    {
      if($this->input->post()){
          $kat = array(
                          'nama_kat' => $this->input->post('nama_kat_edit')
                          );
      } else {
          $kat = array(
                          'nama_kat' => $this->input->post('nama_kat_edit')
                          );
      }
          $this->db->where('id_kat', $this->input->post('id_kat_edit'))
                   ->update('kategori', $kat);
          if ($this->db->affected_rows() > 0)
          {
            return TRUE;
          }else
            {
              return FALSE;
            }
    }
    // public function edit()
    // {
    //   $kat = array(
    //                   'nama_kat' => $this->input->post('nama_kat_edit'),
    //                   'katname' => $this->input->post('katname_edit'),
    //                   'password' => md5($this->input->post('password_edit'))
    //                   );
    //     $this->db->where('id_kat', $this->input->post('id_kat_edit'))
    //              ->update('kategori', $kat);
    //     if ($this->db->affected_rows() > 0)
    //     {
    //       return TRUE;
    //     }else
    //       {
    //         return FALSE;
    //       }
    // }
}
