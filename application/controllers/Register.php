<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Register_model');
	}
	public function index()
	{
			$data['Register'] = $this->Register_model->get_Register();
			$this->load->view('Register_view');
	}

	public function tambah()
	{

    $nama_user = $this->input->post('nama_user');
    $username = $this->input->post('username');
    $level = $this->input->post('level');
    $password = md5($this->input->post('password'));

    $insert = $this->Register_model->tambah(array(
      'nama_user' => $nama_user,
      'username'	=> $username,
      'level'     => $level,
      'password'	=> $password
    ));

    if ($insert) {
      $this->session->set_flashdata('pesan', 'Register Berhasil');
  		redirect('Register');
    }
    else {
      $this->session->set_flashdata('pesan', 'Register Gagal');
  		redirect('Register');
    }
	}
}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */
