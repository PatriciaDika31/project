<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login_model extends CI_Model
  {
    public function user_check()
    {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      // $level = $this->input->post('level');

      $query = $this->db->where('username', $username)
                        ->where('password', MD5($password))
                        ->get('tb_user');

      if($query->num_rows() > 0)
      {
        $data_login = $query->row();
        $data_session = array(
                          'username'  => $username,
                          'level'     => $data_login->level,
                          'login_status'  => TRUE

                        );

        $this->session->set_userdata($data_session);

        return true;
      }
      else
      {
        return false;
      }
    }
  }
?>
