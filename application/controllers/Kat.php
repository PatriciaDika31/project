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
    // Tambah Kategori Mobil
    function tambah()
    {
      //Akan berhasil ditambah dengan syarat nama kategori harus terisi 
            $this->form_validation->set_rules('nama_kat', 'Nama kat', 'trim|required');

            if($this->form_validation->run() == TRUE) {

                if($this->kat_model->insert() == TRUE){
                    //Jika kategori berhasil ditambah maka akan mencetak
                    $this->session->set_flashdata('pesan', 'Tambah Kategori Mobil Berhasil');
                    redirect('kat');
                } else {
                    //Jika gagal ditambah maka akan mencetak 
                    $this->session->set_flashdata('pesan', 'Tambah Kategori Mobil Gagal!');
                    redirect('kat');
                }
            } else {
                $this->session->set_flashdata('pesan', validation_errors());
                redirect('kat');
            }
}
  //Menghapus Kategori Mobil
    function hapus()
    {
            $id_kat = $this->uri->segment(3);
            //akan mengarah ke kat_model kemudian mengarah ke fungsi hapus kat untuk melakukan penghapusan 
            // dimana yang dihapus berdsarkan id_kat (id_kategoti)
            if($this->kat_model->hapus_kat($id_kat)) {
              //Jika berhasil dihapus mak akan mencetak
                $this->session->set_flashdata('pesan', 'Hapus Kategori Mobil Berhasil');
                redirect('kat');
            } else {
                //Jika behasil maka akan me
                    $this->session->set_flashdata('pesan', 'Hapus Katrgori Mobil Gagal!');
                    redirect('kat');
                }

    }

    public function json_kat_by_id()
    {
      //Mengambil data dari id_kategori
      // $this->uri->segment(3) data yang dikirim dalam berbentuk id 

            $id_kat = $this->uri->segment(3);

            $data = $this->kat_model->get_data_kat_by_id($id_kat);
            echo json_encode($data);
    }
    
    //Mengubah Kategori Mobil
    public function ubah()
    {
        $this->form_validation->set_rules('nama_kat_edit', 'Nama kat', 'trim|required');

        if($this->form_validation->run() == TRUE)
        {
          if($this->kat_model->edit() == TRUE)
          {
            $this->session->set_flashdata('pesan', 'Ubah Kategori Mobil Berhasil');
            redirect('kat');
          }
            else
            {
              $this->session->set_flashdata('pesan', 'Ubah Kategori Mobil Gagal');
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
