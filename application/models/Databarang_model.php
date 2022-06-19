<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Databarang_model extends CI_Model {

	public function get_all_databarang()
    {
        $this->db->select('*');
        $this->db->from('tbl_databarang');
        return $this->db->get()->result_array();
    }

     public function get_databarang_byid($id)
    {
        return $this->db->get_where('tbl_databarang', array('id_databarang' =>  $id))->row_array();
    }

    // public function hasil_jumlah($id)
    // {
    // 	$sumjb="SELECT SUM(jumlah_barang) as jm FROM tbl_databarang NATURAL JOIN tbl_databarang WHERE id_databarang=$id";    
    //     $queryjb = $this->db->query($sumjb);
    // 	$sumjm="SELECT SUM(jumlah_masuk) as jm FROM tbl_barangmasuk NATURAL JOIN tbl_databarang WHERE id_databarang=$id";    
    //     $queryjm = $this->db->query($sumjm);
    //     $sumjk="SELECT SUM(jumlah_keluar) as jk FROM tbl_barangkeluar NATURAL JOIN tbl_databarang WHERE id_databarang=$id";    
    //     $queryjk = $this->db->query($sumjk);

    //     $jb = ($sumjm+$sumjb) - ($sumjk);
    // } ???

	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($data, $table)
	{
		$this->db->where('id_databarang', $data['id_databarang']);
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