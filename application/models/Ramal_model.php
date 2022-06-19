<?php
class Ramal_model extends CI_model
{
    public function get_Ramal()
    {
        $this->db->select('*');
        $this->db->from('tbl_ramal_masadepan');
        return $this->db->get()->result_array();
    }
    public function add_ramal($id_databarang,$tahun,$bulan,$jumlah_penjualan)
    {
        $data = array(
            'id_ramal_masadepan'    => "",
            'id_databarang'    => $id_databarang,
            'tahun'    => $tahun,
            'bulan'    => $bulan,
            'jumlah_penjualan'    => $jumlah_penjualan
        );
 
        $this->db->insert('tbl_ramal_masadepan', $data);
    }  
}