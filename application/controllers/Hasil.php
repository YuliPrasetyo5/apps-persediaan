<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        //apabila tidak ada session login akan di arahkan ke controller login
        if(empty($this->session->userdata('login'))){
            redirect('login');
        }
        $this->load->model('databarang_model');
        $this->load->model('penjualan_model');
        $this->load->model('Hasil_model');
        $this->load->model('Ramal_model');
        $this->load->model('User_model');
        // is_logged_in();
    }
	public function index()
	{
        $data['title'] = "Hasil Forecast";
        // $id_user=$this->session->userdata('id_user'); //Bug Login
        // $data['user']=$this->User_model->get_user($id_user);
		$data['data_databarang']=$this->databarang_model->get_all_databarang(); //??
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('hasil_forecast/index.php',$data);
        $this->load->view('templates/footer');
    }
    public function detail($id)
	{
             $data['title'] = "Detail Forecast";
            // $id_user=$this->session->userdata('id_user'); //Bug Login
            // $data['user']=$this->User_model->get_user($id_user);
            $data['dt_databarang'] = $this->databarang_model->get_databarang_byid($id); //??
            $data['penjualan']=$this->penjualan_model->get_all_penjualan($id);
            $data['hitung']=$this->Hasil_model->get_hitung($id);
            $data['haha']=$this->Hasil_model->get_hitung($id);
            $data['MAPE']=$this->Hasil_model->get_mape($id);
            $data['masa_dpn']=$this->Hasil_model->get_masa_depan($id);
            $data['at']=$this->Hasil_model->get_at($id);
            $data['ft']=$this->Hasil_model->get_ft($id);
            $data['bulan']=$this->Hasil_model->get_label_bawah($id);
            $data['nama'] = $data['dt_databarang']['nama_barang']; //??
            $data['nama'] = $data['dt_databarang']['nama_barang']; //??
            // echo(var_dump($data['at']));
            // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('hasil_forecast/detail_hasil.php',$data);
        $this->load->view('templates/footer');;
    }
    public function ramal($id)
	{
        $data['title'] = "Ramal";
        $data['dt_databarang'] = $this->databarang_model->get_databarang_byid($id); //??
        $data['nama_db'] = $data['dt_databarang']['nama_barang']; //??
        // $id_user=$this->session->userdata('id_user');        //Bug Login
        // $data['user']=$this->User_model->get_user($id_user);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('hasil_forecast/ramal.php',$data);
        $this->load->view('templates/footer');;
    }
    public function hitungramal()
	{ 
        $id_databarang=$this->input->post('id_databarang', true);
        $bulan=(integer) $this->input->post('bulan', true);

        $sqltahun="SELECT tahun  FROM tbl_penjualan WHERE id_databarang=$id_databarang order by tahun desc limit 1" ;    
        $querytahun=$this->db->query($sqltahun);
        $tahun=(int) $querytahun->row_array()['tahun'];
      
        $sql1="SELECT count(id_ramal_masadepan) as total FROM tbl_ramal_masadepan WHERE id_databarang=$id_databarang";    
        $query1 = $this->db->query($sql1);
        $countramal=  (int) $query1->row_array()['total'];

        $sqlqueryhitungbulan="SELECT count(bulan) as totalbulan FROM tbl_penjualan WHERE id_databarang=$id_databarang";    
        $queryhitungbulan=$this->db->query($sqlqueryhitungbulan);
        $hitungbulan=(int) $queryhitungbulan->row_array()['totalbulan'];

        $sqlqueryat="SELECT at FROM tbl_hitung  natural join tbl_penjualan WHERE id_databarang=$id_databarang order by id_hitung desc limit 1";    
        $queryat=$this->db->query($sqlqueryat);
        $at=(int) $queryat->row_array()['at'];
        
        $sqlquerybt="SELECT bt FROM tbl_hitung  natural join tbl_penjualan WHERE id_databarang=$id_databarang order by id_hitung desc limit 1";    
        $querybt=$this->db->query($sqlquerybt);
        $bt=(int) $querybt->row_array()['bt'];
        
       
        if($hitungbulan==30){
            $tahunini=$tahun+1;
        }
        else{
            $tahunini=$tahun;
        }
        if($countramal!=0){
            $sqlhps="DELETE FROM tbl_ramal_masadepan WHERE id_databarang=$id_databarang";    
            $this->db->query($sqlhps);
            for ($x = 1; $x <= $bulan; $x++){
                $jumlah_penjualan=$at+$bt*$x;
                // $this->Ramal_model->add_ramal(1,1,$x,1);
                $this->Ramal_model->add_ramal($id_databarang,$tahunini,$x,$jumlah_penjualan);
               
            }
        }else{
            for ($x = 1; $x <= $bulan; $x++){
                $jumlah_penjualan=$at+$bt*$x;
                // $this->Ramal_model->add_ramal(1,1,$x,1);
                $this->Ramal_model->add_ramal($id_databarang,$tahunini,$x,$jumlah_penjualan);
               
            }
        }
        // echo(var_dump($countramal));
        // die;
        $this->session->set_flashdata('flash', 'Sukses');
                $this->session->set_flashdata('data', 'Ramalan Masa Depan');
                $url='hasil/detail/'.$id_databarang;
                redirect($url);
    }
}
?>