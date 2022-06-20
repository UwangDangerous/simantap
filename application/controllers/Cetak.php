<?php 

    class Cetak extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model("_Date") ; 
            $this->load->model("_Code") ; 
            $this->load->model("Cetak_model") ; 
        }
        
        public function cetakBarangMasuk($id)
        {
            $this->load->model('BarangMasuk_model') ;
            $data['item_brg_masuk'] = $this->BarangMasuk_model->getDataBarangMasukItem($id) ;
            $data['barang_masuk'] = $this->BarangMasuk_model->getDetailBarangMasuk($id) ;
            $this->load->view('cetak/cetakBarangMasuk', $data);
        }
        
        public function cetakBarangKeluar($id)
        {
            $this->load->model('BarangKeluar_model') ;
            $data['barang_keluar'] = $this->BarangKeluar_model->getDetailBarangKeluar($id) ;
            $data['item_brg_keluar'] = $this->BarangKeluar_model->getDataItemBarangKeluar($id) ;
            $this->load->view('cetak/cetakBarangKeluar', $data);
        }

        public function cetakLaporanBarangMasuk()
        {
            $this->load->model('Cetak_model') ;
            $data['tgl1'] = $this->input->post('tgl1') ;
            $data['tgl2'] = $this->input->post('tgl2') ;
            $data['barang'] = $this->Cetak_model->getDataLaporanMasuk($data['tgl1'], $data['tgl2']) ;
            
            $this->load->view('cetak/cetakLaporanBarangMasuk',$data) ; 
        }

        public function cetakLaporanBarangKeluar()
        {
            $this->load->model('Cetak_model') ;
            $data['tgl1'] = $this->input->post('tgl1') ;
            $data['tgl2'] = $this->input->post('tgl2') ;
            $data['barang'] =$this->Cetak_model->getDataLaporanKeluar($data['tgl1'], $data['tgl2']) ; ;

            $this->load->view('cetak/cetakLaporanBarangKeluar',$data) ; 
        }
    }

?>