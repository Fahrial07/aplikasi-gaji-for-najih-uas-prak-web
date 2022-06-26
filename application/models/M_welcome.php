<?php
class M_welcome extends CI_Model
{
	public function input($data)
	{
		$this->db->insert('data_gaji', $data);
	}

	public function tampil_data()
	{
		return $this->db->get('data_gaji')->result();
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->set($data);
		$this->db->update('data_gaji');
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('data_gaji');
	}
}
