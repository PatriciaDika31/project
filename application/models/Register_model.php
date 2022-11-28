<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

	public function get_Register(){
		return $this->db->get('tb_user')
						->result();
	}
	public function get_data_Register_by_id($id)
	{
		return $this->db->where('id', $id)
						->get('tb_user')
						->row();
	}
	public function tambah($data = array())
	{
    return $this->db->insert('tb_user', $data);
	}
}

/* End of file Register_model.php */
/* Location: ./application/models/Register_model.php */
