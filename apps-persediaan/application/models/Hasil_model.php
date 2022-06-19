<?php
class Hasil_model extends CI_model
{
    public function get_hitung($id)
    {
        $this->db->select('*');
        
        $this->db->from('tbl_penjualan');
        
        $this->db->join('tbl_databarang', 'tbl_penjualan.id_databarang = tbl_databarang.id_databarang', 'left');
        $this->db->join('tbl_hitung', 'tbl_penjualan.id_penjualan = tbl_hitung.id_penjualan', 'left');
        $this->db->where('tbl_penjualan.id_databarang',  $id);
       

        return $this->db->get()->result_array();
    }
    public function get_at($id)
    {
        $this->db->select('jumlah_penjualan');
        
        $this->db->from('tbl_penjualan');
        
        $this->db->join('tbl_databarang', 'tbl_penjualan.id_databarang = tbl_databarang.id_databarang', 'left');
        $this->db->join('tbl_hitung', 'tbl_penjualan.id_penjualan = tbl_hitung.id_penjualan', 'left');
        $this->db->where('tbl_penjualan.id_databarang',  $id);
        // $this->db->where('hasil_forecast !=',  '');
        return $this->db->get()->result_array();
    }
    public function get_ft($id)
    {
        $this->db->select('ft');
        
        $this->db->from('tbl_penjualan');
        
        $this->db->join('tbl_databarang', 'tbl_penjualan.id_databarang = tbl_databarang.id_databarang', 'left');
        $this->db->join('tbl_hitung', 'tbl_penjualan.id_penjualan = tbl_hitung.id_penjualan', 'left');
        $this->db->where('tbl_penjualan.id_databarang',  $id);
        // $this->db->where('hasil_forecast !=',  '');
        return $this->db->get()->result_array();
    }
    public function get_mape($id)
    {
        $sum="SELECT SUM(abs_xt_min_ft_bagi_xt) as total FROM tbl_hitung NATURAL JOIN tbl_penjualan WHERE id_databarang=$id";    
        $query1 = $this->db->query($sum);
        $sumabs=  (double) $query1->row_array()['total'];
        $carin="SELECT COUNT(abs_xt_min_ft_bagi_xt) as n FROM tbl_hitung NATURAL JOIN tbl_penjualan WHERE id_databarang=$id";
        $query2 = $this->db->query($carin);
        $n=  (integer) $query2->row_array()['n'];
        if ($n==0){ 
            
            $MAPE=0;
        }else{
            $MAPE=(100/$n)*$sumabs; // Menghitung nilai MAPE
        }
       
        return $MAPE;
    }
    public function get_masa_depan($id)
    {
        $this->db->select('*');
        
        $this->db->from('tbl_ramal_masadepan');
        
        $this->db->join('tbl_databarang', 'tbl_ramal_masadepan.id_databarang = tbl_databarang.id_databarang', 'left');
      
        $this->db->where('tbl_ramal_masadepan.id_databarang',  $id);
        return $this->db->get()->result_array();
    }
    public function get_label_bawah($id)
    {
        $this->db->select('bulan');
        
        $this->db->from('tbl_penjualan');

        $this->db->where('id_databarang',  $id);
        return $this->db->get()->result_array();
    }
}