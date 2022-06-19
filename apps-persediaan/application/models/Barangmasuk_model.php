<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk_model extends CI_Model {


// Mengambil data pada tbl_barangmasuk, tbl_databarang dan tbl_supplier pada data base //
	public function get_data()
	{
		return $this->db->query('SELECT m.id_barangmasuk, b.id_databarang, s.id_supplier, b.nama_barang, b.jenis, b.satuan, m.jumlah_masuk, s.nama_supplier , m.tanggal_masuk FROM tbl_barangmasuk m JOIN tbl_databarang b ON m.id_databarang = b.id_databarang JOIN tbl_supplier s ON m.id_supplier = s.id_supplier');
	
	}
	
	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($data, $table)
	{
		$this->db->where('id_barangmasuk', $data['id_barangmasuk']);
		$this->db->update($table, $data);
	}

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}