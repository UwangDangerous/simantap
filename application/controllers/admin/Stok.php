<?php 

    class Stok extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            // $this->load->library('form_validation');
            $this->load->model('Stok_model') ;
            $this->load->model('BarangKeluar_model') ;
            $this->load->model('_Date') ;
        }

        public function index()
        {
            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Stok Gudang BMN '.WEB; 
                $data['header'] = 'Stok Gudang BMN'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Stok Gudang BMN</a></li>
                
                '; 
                
                $data['barang'] = $this->Stok_model->getDataBarang() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/stok/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function detail($id)
        {
            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Rincian Stok Barang '.WEB; 
                $data['header'] = 'Rincian Stok Barang'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="'.base_url().'admin/stok">Stok Gudang BMN</a></li>
                    <li class="breadcrumb-item active"><a>Rincian Stok Barang</a></li>
                
                '; 
                
                $data['id'] = $id;
                $data['judul_halaman'] = $this->Stok_model->getJudul($id) ;
                $data['masuk'] = $this->Stok_model->getDataMasuk($id) ;
                $data['keluar'] = $this->Stok_model->getDataKeluar($id) ;
                $data['stok'] = $this->BarangKeluar_model->getStok($id) ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/stok/detail') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }
    }

?>