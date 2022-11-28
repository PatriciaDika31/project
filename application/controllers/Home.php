<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('dashboard_model');
  }
  
  public function index()
  {
    if($this->session->userdata('login_status') == TRUE){

      $data['content_view'] = 'dashboard_view';
      $data['jml_mobil'] = $this->dashboard_model->get_jml_mobil();
      $data['jml_transaksi'] = $this->dashboard_model->get_jml_transaksi();
      $data['jml_user'] = $this->dashboard_model->get_jml_user();
      $this->load->view('template', $data);

    } else {
      redirect('login/index');
    }
  }

}

/* End of file Kasir.php */
/* Location: ./application/controllers/Kasir.php */