<?php

class user extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->Library('form_validation');
        // $this->load->helper('url');
    }

    public function index()
    {
        if($this->session->userdata('login_status') == TRUE) {
            $data['user'] = $this->user_model->get_data_user();

            $data['content_view'] = 'user_view';
            $this->load->view('template', $data);
        } else {
            redirect('Login');
        }
    }

    function tambah()
    {
        if($this->session->userdata('login_status') == TRUE){

            $this->form_validation->set_rules('nama_user', 'Nama user', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('level', 'level', 'trim|required');

            if($this->form_validation->run() == TRUE) {

                if($this->user_model->insert() == TRUE){

                    $this->session->set_flashdata('pesan', 'Tambah user Berhasil');
                    redirect('user');
                } else {
                    $this->session->set_flashdata('pesan', 'Tambah user Gagal!');
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('pesan', validation_errors());
                redirect('user');
            }
    } else {
        redirect('Login');
    }
}

    function hapus()
    {
        if($this->session->userdata('login_status') == TRUE){

            $id_user = $this->uri->segment(3);

            if($this->user_model->hapus_user($id_user)) {

                $this->session->set_flashdata('pesan', 'Hapus user Berhasil');
                redirect('user');
            } else {
                    $this->session->set_flashdata('pesan', 'Hapus user Gagal!');
                    redirect('user');
                }

            } else {
            redirect('Login');
        }

    }

    public function json_user_by_id()
    {
        if($this->session->userdata('login_status') == TRUE) {
            $id_user = $this->uri->segment(3);

            $data = $this->user_model->get_data_user_by_id($id_user);
            echo json_encode($data);
        } else {
            redirect('Login');
        }
    }
    public function ubah()
    {
      if($this->session->userdata('login_status') == TRUE)
      {

        $this->form_validation->set_rules('nama_user_edit', 'Nama User', 'trim|required');
        $this->form_validation->set_rules('username_edit', 'Username', 'trim|required');
        $this->form_validation->set_rules('level_edit', 'level', 'trim|required');

        if($this->form_validation->run() == TRUE)
        {
          if($this->user_model->edit() == TRUE)
          {
            $this->session->set_flashdata('pesan', 'Ubah user Berhasil');
            redirect('user');
          }
            else
            {
              $this->session->set_flashdata('pesan', 'Ubah user Gagal');
              redirect('user');
            }
         }
          else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('user');
          }
      }
        else {
          {
            redirect('login');
          }
        }
}
}
