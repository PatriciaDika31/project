<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function get_jml_mobil(){
		return $this->db->select('count(*) as jml_mobil')
					    ->get('tb_mobil')
					    ->row();
	}

	public function get_jml_transaksi(){
		return $this->db->select('count(*) as jml_transaksi')
					    ->get('transaksi')
					    ->row();
	}

	public function get_jml_user(){
		return $this->db->select('count(*) as jml_user')
					    ->get('tb_user')
					    ->row();
	}

}

/* End of file Kasir_model.php */
/* Location: ./application/models/Kasir_model.php */

/* End of file Kasir_model.php */
/* Location: ./application/models/Kasir_model.php */