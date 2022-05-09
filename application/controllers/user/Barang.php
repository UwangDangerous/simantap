<?php 

    class Barang extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('BarangKeluar_model') ; //untuk user hanya tersedia barang keluar
            $this->load->model('_Date') ;
        }

        public function index()
        {
            if( $this->session->userdata('kunci') != null ){
                $data['judul'] = 'Permintaan Barang '; 
                $data['header'] = 'Permintaan Barang'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Permintaan Barang</a></li>
                
                '; 

                $data['brg_keluar'] = $this->BarangKeluar_model->getDataBarangKeluar($this->session->userdata('kunci')) ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('user/barang/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }
    }

?>