<?php

class kat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kat_model');
        $this->load->model('Mobil_model');
        $this->load->Library('form_validation');
        // $this->load->helper('url');
    }

    public function index()
    {
              $data['content_view'] = 'kat_view';
              $data['mobil'] = $this->Mobil_model->get_mobil();
              $data['kategori'] = $this->kat_model->get_data_kat();


            $this->load->view('template', $data);

    }

    function tambah()
    {

            $this->form_validation->set_rules('nama_kat', 'Nama kat', 'trim|required');

            if($this->form_validation->run() == TRUE) {

                if($this->kat_model->insert() == TRUE){

                    $this->session->set_flashdata('pesan', 'Tambah kat Berhasil');
                    redirect('kat');
                } else {
                    $this->session->set_flashdata('pesan', 'Tambah kat Gagal!');
                    redirect('kat');
                }
            } else {
                $this->session->set_flashdata('pesan', validation_errors());
                redirect('kat');
            }
}

    function hapus()
    {
            $id_kat = $this->uri->segment(3);

            if($this->kat_model->hapus_kat($id_kat)) {

                $this->session->set_flashdata('pesan', 'Hapus kat Berhasil');
                redirect('kat');
            } else {
                    $this->session->set_flashdata('pesan', 'Hapus kat Gagal!');
                    redirect('kat');
                }

    }

    public function json_kat_by_id()
    {
            $id_kat = $this->uri->segment(3);

            $data = $this->kat_model->get_data_kat_by_id($id_kat);
            echo json_encode($data);
    }
    public function ubah()
    {
        $this->form_validation->set_rules('nama_kat_edit', 'Nama kat', 'trim|required');

        if($this->form_validation->run() == TRUE)
        {
          if($this->kat_model->edit() == TRUE)
          {
            $this->session->set_flashdata('pesan', 'Ubah kat Berhasil');
            redirect('kat');
          }
            else
            {
              $this->session->set_flashdata('pesan', 'Ubah kat Gagal');
              redirect('kat');
            }
         }
          else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('kat');
          }
      }
      public function get_data_kat_by_id($id)
      {
        if ($this->session->userdata('login_status') == TRUE) {
          $data = $this->kat_model->get_data_kat_by_id($id);
          echo json_encode($data);
        }else {
          redirect('login');
        }
      }
}
