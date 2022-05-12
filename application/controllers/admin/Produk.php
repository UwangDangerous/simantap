<?php 

    class Produk extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model('Produk_model') ;
        }

        public function index()
        {
            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Daftar Produk '.WEB; 
                $data['header'] = 'Daftar Produk'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Daftar Produk</a></li>
                
                '; 

                $data['produk'] = $this->Produk_model->getDataProduk() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/produk/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function aksi($id = 0) 
        {
            if($id == 0){
                $aksi = 'Tambah Data' ;
                $load = 'tambah';
            }else{
                $aksi = 'Ubah Data' ;
                $load = 'ubah' ;
                $data['produk'] = $this->Produk_model->getDataProdukEdit($id) ;
            }

            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Produk '.WEB; 
                $data['header'] = 'Produk'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="'.base_url().'admin/produk">Produk</a></li>
                    <li class="breadcrumb-item active"><a>'.$aksi.'</a></li>
                
                '; 

                $this->form_validation->set_rules('kode_barang', 'Kode Produk', 'required|max_length[8]');
                $this->form_validation->set_rules('nama_barang', 'Nama Produk', 'required');
                $this->form_validation->set_rules('id_ktg', 'Kategori', 'required');
                $this->form_validation->set_rules('id_unit', 'Unit', 'required');

                if($this->form_validation->run() == FALSE) {
                    $this->load->model("Unit_model") ;
                    $data['unit'] = $this->Unit_model->getDataUnit() ;
                    $this->load->model("Kategori_model") ;
                    $data['ktg'] = $this->Kategori_model->getDataKategori() ;
                    $data['kode'] = substr(sha1(md5(date("Y-m-d G:i:s"))), 0, 8) ;

                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view("admin/produk/$load") ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;
                }else{
                    if($id == 0){
                        $this->Produk_model->simpanData() ;
                    }else{
                        $this->Produk_model->ubahData($id) ;
                    }
                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login");
                redirect("login") ;
            }
        }

        public function hapus($id)
        {
            $this->Produk_model->hapusData($id) ;
        }
    }

?>