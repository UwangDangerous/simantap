<?php 

    class Cetak extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('BarangMasuk_model') ;
            $this->load->model("_Date") ; 
            $this->load->model("_Code") ; 
        }

        public function cetakBarangMasuk($id)
        {
            $data['item_brg_masuk'] = $this->BarangMasuk_model->getDataBarangMasukItem($id) ;
            $this->load->model('BarangMasuk_model') ; 
            $data['barang_masuk'] = $this->BarangMasuk_model->getDetailBarangMasuk($id) ;
            $this->load->view('cetak/cetakBarangMasuk', $data);
        }
    }

?>