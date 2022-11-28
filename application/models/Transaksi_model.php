<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function cari_mobil()
	{
		$data_cart = $this->db->where('tb_mobil.kode', $this->input->post('kode'))
							 
							  ->get('tb_mobil')
							  ->row();
		if($data_cart != NULL){

			//cek stok
			if($data_cart->stok > 0){
				$cart_array = array(
								'cart_id'	=> $this->session->userdata('username'),
								'id_mobil' 	=> $data_cart->id_mobil
							);						
				$this->db->insert('cart',$cart_array);

				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	public function get_data_mobil_by_id($id)
	{
		return $this->db->where('id_mobil', $id)
						->get('tb_mobil')
						->row();
	}

	public function get_cart()
	{
		return $this->db->join('tb_mobil', 'tb_mobil.id_mobil = cart.id_mobil')
                       
                        ->get('cart')
                        ->result();
					    
	}

	public function hapus_item_cart()
	{
		$this->db->where('id', $this->input->post('hapus_id'))
				 ->delete('cart');

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah_jumlah_cart()
	{
		$data = array(
				'jumlah' => $this->input->post('jumlah')
			);

		//cek stok awal dulu untuk memastikan stok lebih dari jumlah yang dibeli
		$stok_awal = $this->get_data_mobil_by_id($this->input->post('id_mobil'))->stok;
		if($stok_awal >= $this->input->post('jumlah')){
			$this->db->where('id', $this->input->post('id'))
					 ->update('cart', $data);
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_total_belanja()
	{
		return $this->db->select('SUM(tb_mobil.biaya*cart.jumlah) as total')
						->where('cart.cart_id', $this->session->userdata('username'))
						->join('tb_mobil', 'tb_mobil.id_mobil = cart.id_mobil')
						->get('cart')
						->row()->total;
	}

	public function tambah_transaksi()
	{
		$data_transaksi = array(
				'id_kasir'		=> $this->session->userdata('username'),
				'nama_pembeli'	=> $this->input->post('nama_pembeli')
			);
		$this->db->insert('transaksi', $data_transaksi);
		$last_insert_id = $this->db->insert_id();
		//insert detil transksi
		for($i = 0; $i < count($this->get_cart()); $i++)
		{
			$data_detil_transaksi = array(
				'id_transaksi'	=> $last_insert_id,
				'id_mobil'		=> $this->input->post('id_mobil')[$i],
				'jumlah'		=> $this->input->post('jumlah')[$i]
			);

			//memasukan ke tabel detil transaksi
			$this->db->insert('detil_transaksi', $data_detil_transaksi);

			//mengurangi stok buku
			$stok_awal = $this->get_data_mobil_by_id($this->input->post('id_mobil')[$i])->stok;
			$stok_akhir = $stok_awal-$this->input->post('jumlah')[$i];
			$stok = array('stok' => $stok_akhir);
			$this->db->where('id_mobil', $this->input->post('id_mobil')[$i])
					 ->update('tb_mobil', $stok);

		}


		//mengkosongkan cart berdasarkan kasir yang melakukan transaksi
		$this->db->where('cart_id', $this->session->userdata('username'))
				 ->delete('cart');

		return TRUE;

	}

	public function get_riwayat_transaksi()
	{
		return $this->db->select('transaksi.id_transaksi, transaksi.nama_pembeli, transaksi.id_kasir, 
		transaksi.tgl_beli, (SELECT SUM(detil_transaksi.jumlah*tb_mobil.biaya) FROM detil_transaksi 
		JOIN tb_mobil ON tb_mobil.id_mobil = detil_transaksi.id_mobil WHERE id_transaksi = transaksi.id_transaksi )
		as total')
						->join('detil_transaksi','detil_transaksi.id_transaksi = transaksi.id_transaksi')
						->join('tb_mobil','tb_mobil.id_mobil = detil_transaksi.id_mobil')
						->group_by('id_transaksi')
						->get('transaksi')
						->result();
	}

	public function get_transaksi_by_id($id)
	{
		return $this->db->select('tb_mobil.kode, tb_mobil.merk, tb_mobil.type, 
		tb_mobil.biaya, detil_transaksi.jumlah')
						->where('id_transaksi', $id)
						->join('tb_mobil','tb_mobil.id_mobil = detil_transaksi.id_mobil')
						->get('detil_transaksi')
						->result();
	}

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */