<?php

class user_model extends CI_Model {

    public function insert()
    {
        $user = array(
                    'id_user'        => NULL,
                    'nama_user'      => $this->input->post('nama_user'),
                    'username'       => $this->input->post('username'),
                    'password'       => md5($this->input->post('password')),
                    'level'          => $this->input->post('level')
        );

        $this->db->insert('tb_user', $user);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    public function get_data_user()
    {
        return $this->db->get('tb_user')
                        ->result();
    }

    public function hapus_user($id)
    {
        $this->db->where('id_user', $id)
                ->delete('tb_user');

        if($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_data_user_by_id($id)
    {
        return $this->db->where('id_user', $id)
                        ->get('tb_user')
                        ->row();
    }

    public function edit()
    {
      if($this->input->post('password_edit') != NULL){
          $user = array(
                          'nama_user' => $this->input->post('nama_user_edit'),
                          'username' => $this->input->post('username_edit'),
                          'password' => md5($this->input->post('password_edit')),
                          'level'    => $this->input->post('level_edit')
                          );
      } else {
          $user = array(
                          'nama_user' => $this->input->post('nama_user_edit'),
                          'username' => $this->input->post('username_edit'),
                          'level'    => $this->input->post('level_edit')

                          );
      }
          $this->db->where('id_user', $this->input->post('id_user_edit'))
                   ->update('tb_user', $user);
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
    //   $user = array(
    //                   'nama_user' => $this->input->post('nama_user_edit'),
    //                   'username' => $this->input->post('username_edit'),
    //                   'password' => md5($this->input->post('password_edit'))
    //                   );
    //     $this->db->where('id_user', $this->input->post('id_user_edit'))
    //              ->update('tb_user', $user);
    //     if ($this->db->affected_rows() > 0)
    //     {
    //       return TRUE;
    //     }else
    //       {
    //         return FALSE;
    //       }
    // }
}
