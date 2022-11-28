<?php

class Mobil_model extends CI_Model {

    public function tambah($gambar)
    {
        $data = array(
                    'merk'      => $this->input->post('merk'),
                    'kode'      => $this->input->post('kode'),
                    'type'      => $this->input->post('type'),
                    'stok'      => $this->input->post('stok'),
                    'id_kat'      => $this->input->post('kategori'),
                    'plat_nomor'      => $this->input->post('plat_nomor'),
                    'tahun_produksi'      => $this->input->post('tahun_produksi'),
                    'biaya'      => $this->input->post('biaya'),
                    'gambar'			=> $gambar['file_name']
        );

        $this->db->insert('tb_mobil', $data);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    public function get_mobil(){
      return $this->db->join('kategori','kategori.id_kat = tb_mobil.id_kat')
                      ->get('tb_mobil')
                      ->result();
    }

    public function get_data_kat()
    {
        return $this->db->get('kategori')
                        ->result();
    }

    public function hapus($id)
    	{
        // $w = array('id_mobil' => $id);
    		$this->db->where('id_mobil', $id)
    				     ->delete('tb_mobil');
    		if($this->db->affected_rows() > 0){
    			return TRUE;
    		} else {
    			return FALSE;
    		}
    	}
    // public function hapus($id)
    // {edi
    //     $this->db->where('id_mobil', $id)
    //             ->delete('tb_mobil');
    //
    //     if($this->db->affected_rows() > 0) {
    //         return TRUE;
    //     } else {
    //         return FALSE;
    //     }
    // }

    public function get_data_mobil_by_id($id)
    {
        return $this->db->where('id_mobil', $id)
                        ->get('tb_mobil')
                        ->row();
    }

    public function edit_data()
    {
          $data = array(  
                          'merk'      => $this->input->post('edit_merk'),
                          'kode'      => $this->input->post('edit_kode'),
                          'type'      => $this->input->post('edit_type'),
                          'stok'      => $this->input->post('edit_stok'),
                          'id_mobil'      => $this->input->post('edit_id_mobil'),
                          'plat_nomor'      => $this->input->post('edit_plat_nomor'),
                          'id_kat'      => $this->input->post('edit_kategori'),
                          'tahun_produksi'      => $this->input->post('edit_tahun_produksi'),
                          'biaya'      => $this->input->post('edit_biaya')
                          );

          $this->db->where('id_mobil', $this->input->post('edit_id_mobil'))
                   ->update('tb_mobil', $data);
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
    //   $mobil = array(
    //                   'nama_mobil' => $this->input->post('nama_mobil_edit'),
    //                   'mobilname' => $this->input->post('mobilname_edit'),
    //                   'password' => md5($this->input->post('password_edit'))
    //                   );
    //     $this->db->where('id_mobil', $this->input->post('id_mobil_edit'))
    //              ->update('mobil', $mobil);
    //     if ($this->db->affected_rows() > 0)
    //     {
    //       return TRUE;
    //     }else
    //       {
    //         return FALSE;
    //       }
    // }
}
