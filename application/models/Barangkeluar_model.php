<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangkeluar_model extends CI_Model {

	public function get_data()
	{
		return $this->db->query('SELECT k.id_barangkeluar, b.id_databarang, b.nama_barang, b.jenis, b.satuan, k.jumlah_keluar, k.tanggal_keluar FROM tbl_barangkeluar k JOIN tbl_databarang b ON k.id_databarang = b.id_databarang');
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($data, $table)
	{
		$this->db->where('id_barangkeluar', $data['id_barangkeluar']);
		$this->db->update($table, $data);
	}

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}

/* End of file Databarang_model.php */
/* Location: ./application/models/Databarang_model.php */