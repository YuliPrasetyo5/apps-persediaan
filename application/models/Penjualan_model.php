<?php
class Penjualan_model extends CI_model
{
    public function get_all_penjualan($id)
    {
        $this->db->select('*');
        
        $this->db->from('tbl_penjualan');
        
        $this->db->join('tbl_databarang', 'tbl_penjualan.id_databarang = tbl_databarang.id_databarang', 'left');
        $this->db->where('tbl_databarang.id_databarang',  $id);
        return $this->db->get()->result_array();
       
    }
    public function get_penjualan_byid($id)
    {
        return $this->db->get_where('tbl_penjualan', array('id_penjualan' =>  $id))->row_array();
    }
    public function update_penjualan($penjualan,$id_penjualan) //??
    {
        
        $this->db->set('penjualan',$penjualan); //??
        $this->db->where('id_penjualan',$id_penjualan); //??
        $this->db->update('tbl_penjualan');
    }
    public function hps_penjualan($id)
    {
        $this->db->where('id_penjualan', $id);
        $this->db->delete('tbl_penjualan');
    }   
    public function add_penjualan($id_databarang,$bulan,$tahun,$jumlah_penjualan)
    {
        $data = array(
            'id_penjualan'    => "",
            'id_databarang'    => $id_databarang,
            'bulan'    => $bulan,
            'tahun'    => $tahun,
            'jumlah_penjualan'    => $jumlah_penjualan
        );
 
        $this->db->insert('tbl_penjualan', $data);
    }
    public function get_id_db_bypenjualan($id)
    {
        $this->db->select('*');
        
        $this->db->from('tbl_penjualan');
        
        $this->db->join('tbl_databarang', 'tbl_penjualan.id_databarang = tbl_databarang.id_databarang', 'left');
        $this->db->where('tbl_penjualan.id_penjualan',  $id);
        return $this->db->get()->result_array();
    }   
}