<?php
class Alpha_model extends CI_model
{
    public function get_alpha()
    {
        $this->db->select('*');
        $this->db->from('tbl_alpha');
        return $this->db->get()->row_array();
    }
    public function update_alpha($alpha,$id)
    {
        $this->db->empty_table('tbl_hitung');
        $sqldtall="SELECT * FROM tbl_penjualan NATURAL JOIN tbl_databarang ORDER BY id_databarang, bulan ASC";
        $query1 = $this->db->query($sqldtall);
        $dataall=  $query1->result_array();
        // echo(var_dump($dataall));
        $this->db->set('alpha',$alpha);
        $this->db->where('id_alpha',$id);
        $this->db->update('tbl_alpha');
        $dtseblumnya=0;
        $saksendblsblm=0;
        
        foreach ($dataall as $dataall) {
        //    echo($dataall['bulan']);
           if($dataall['bulan']==1){
            
            $data = array(
                'id_hitung'    => "",
                'id_penjualan'    => $dataall['id_penjualan'] ,
                's_aksen'    =>  $dataall['jumlah_penjualan'],
                's_2aksen'    =>  $dataall['jumlah_penjualan'],
                'at'    =>  $dataall['jumlah_penjualan'],
                'bt'    => '',
                'ft'    => '',
                'xt_min_ft'    => '',
                'abs_xt_min_ft_bagi_xt'    => ''
            );
            $dtseblumnya=$dataall['jumlah_penjualan'];
            $saksendblsblm=$dataall['jumlah_penjualan'];
            $this->db->insert('tbl_hitung', $data);
           }
           else{
            $saksen=$alpha*$dataall['jumlah_penjualan']+(1-$alpha)*$dtseblumnya; // Perhitungan S'
            $dtseblumnya= $saksen;
            $saksendbl=$alpha* $saksen+(1-$alpha)*$saksendblsblm; // Perhitungan S''
            $saksendblsblm=$saksendbl;
            $at=2*$saksen-$saksendbl; // Perhitungan at
            $bt=$alpha/(1-$alpha)*($saksen-$saksendbl); // Perhitungan bt
            $ft=$at+$bt; // Perhitungan Ft
            $xt_min_ft= $dataall['jumlah_penjualan']-  $ft; // Perhitungan Error
            $abs_xt_min_ft_bagi_xt=abs($xt_min_ft/$dataall['jumlah_penjualan']); // Perhitungan PE Absolute
            $data = array(
                'id_hitung'    => "",
                'id_penjualan'    => $dataall['id_penjualan'] ,
                's_aksen'    =>   $saksen,
                's_2aksen'    =>  $saksendbl,
                'at'    => $at,
                'bt'    => $bt,
                'ft'    => $ft,
                'xt_min_ft'    =>  $xt_min_ft,
                'abs_xt_min_ft_bagi_xt'    =>  $abs_xt_min_ft_bagi_xt
            );
          
            $this->db->insert('tbl_hitung', $data); // Memasukkan dalam Tabel Hitung
            // echo($alpha.'*'.$dataall['jumlah_air'].'1-'.$alpha.'*'.$dtseblumnya."=".$Yaksen."<br>");
           }
        }
        
    }   
}