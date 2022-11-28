<?php

class mobil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mobil_model');
        $this->load->model('kat_model');
        $this->load->Library('form_validation');
        // $this->load->helper('url');
    }

    public function index()
    {

            $data['mobil'] = $this->Mobil_model->get_mobil();
            $data['kategori'] = $this->kat_model->get_data_kat();

            $data['content_view'] = 'mobil_view';
            $this->load->view('template', $data);

    }

    function tambah($gambar)
    {
            $this->form_validation->set_rules('merk', 'Merk', 'trim|required');
            $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
            $this->form_validation->set_rules('type', 'Type', 'trim|required');
            $this->form_validation->set_rules('stok', 'Stok', 'trim|required');
            $this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
            $this->form_validation->set_rules('plat_nomor', 'Plat Nomor', 'trim|required');
            $this->form_validation->set_rules('tahun_produksi', 'Tahun Produksi', 'trim|required');
            $this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');

            if($this->form_validation->run() == TRUE) {
              $config['upload_path'] = './assets/images/mobil';
				      $config['allowed_types'] = 'gif|jpg|png';
				      $config['max_size'] = '2000000';
				      $this->load->library('upload', $config);
              if($this->upload->do_upload('gambar')){
      					if($this->Mobil_model->tambah($this->upload->data()) == TRUE)
      					{
      						$this->session->set_flashdata('pesan', 'Tambah Mobil berhasil');
      						redirect('Mobil');
      					} else {
      						$this->session->set_flashdata('pesan', 'Tambah Mobil gagal');
      						redirect('Mobil');
      					}
      				} else {
      					$this->session->set_flashdata('pesan', $this->upload->display_errors());
      					redirect('Mobil');
      				}
      			} else {
      				$this->session->set_flashdata('pesan', validation_errors());
      				redirect('Mobil');
      			}
        }
//                 if($this->mobil_model->insert() == TRUE){
//
//                     $this->session->set_flashdata('pesan', 'Tambah mobil Berhasil');
//                     redirect('mobil');
//                 } else {
//                     $this->session->set_flashdata('pesan', 'Tambah mobil Gagal!');
//                     redirect('mobil');
//                 }
//             } else {
//                 $this->session->set_flashdata('pesan', validation_errors());
//                 redirect('mobil');
//             }
// }

// function hapus($id)
//     {
//         if($this->session->userdata()){
//           $this->Mobil_model->hapus_data($id, 'tb_mobil');
//           $this->session->set_flashdata('pesan', 'Hapus mobil Berhasil');
//           redirect('mobil');
//         } else {
//           $this->session->set_flashdata('pesan', 'Hapus mobil Gagal');
//           redirect('mobil');
//         }
//     }

            // if($this->Mobil_model->hapus_data() {
            //     $this->session->set_flashdata('pesan', 'Hapus mobil Berhasil');
            //     redirect('mobil');
            // } else {
            //         $this->session->set_flashdata('pesan', 'Hapus mobil Gagal!');
            //         redirect('mobil');
            //     }

    // function hapus()
    // {
    //         if($this->Mobil_model->hapus_data() == TRUE) {
    //             $this->session->set_flashdata('pesan', 'Hapus mobil Berhasil');
    //             redirect('mobil');
    //         } else {
    //                 $this->session->set_flashdata('pesan', 'Hapus mobil Gagal!');
    //                 redirect('mobil');
    //             }
    // }
    public function json_kat_by_id($id_kat)
    {
            $id_kat = $this->uri->segment(3);

            $data = $this->kat_model->get_data_mobil_by_id($id_kat);
            echo json_encode($data);
    }

    public function edit()
    {

      $this->form_validation->set_rules('edit_merk', 'Merk', 'trim|required');
      $this->form_validation->set_rules('edit_kode', 'Kode', 'trim|required');
      $this->form_validation->set_rules('edit_type', 'Type', 'trim|required');
      $this->form_validation->set_rules('edit_stok', 'Stok', 'trim|required');
      $this->form_validation->set_rules('edit_kategori', 'Kategori', 'trim|required');
      $this->form_validation->set_rules('edit_plat_nomor', 'Plat Nomor', 'trim|required');
      $this->form_validation->set_rules('edit_tahun_produksi', 'Tahun Produksi', 'trim|required');
      $this->form_validation->set_rules('edit_biaya', 'Biaya', 'trim|required');

        if($this->form_validation->run() == TRUE)
        {
          if($this->Mobil_model->edit_data() == TRUE)
          {
            $this->session->set_flashdata('pesan', 'Ubah mobil Berhasil');
            redirect('mobil');
          }
            else
            {
              $this->session->set_flashdata('pesan', 'Ubah mobil Gagal');
              redirect('mobil');
            }
         }
          else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('mobil');
          }
      }

      function hapus()
      {
              $id_mobil = $this->uri->segment(3);

              if($this->Mobil_model->hapus($id_mobil)) {

                  $this->session->set_flashdata('pesan', 'Hapus Data Mobl Berhasil');
                  redirect('mobil');
              } else {
                      $this->session->set_flashdata('pesan', 'Hapus Data Mobil Gagal!');
                      redirect('mobil');
                  }

      }
      public function get_data_mobil_by_id($id_mobil)
  	  {
          if($this->session->userdata('login_status') == TRUE){
            $id_mobil = $this->uri->segment(3);
  			     $data = $this->Mobil_model->get_data_mobil_by_id($id_mobil);
  			   echo json_encode($data);

  		  } else {
  			   redirect('login');
  		  }
  	  }
}
