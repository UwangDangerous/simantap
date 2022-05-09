<?php 

    class Kategori extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model('Kategori_model') ;
        }

        public function index()
        {
            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Dashboard '; 
                $data['header'] = 'Dashboard'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Kategori</a></li>
                
                '; 

                $data['kategori'] = $this->Kategori_model->getDataKategori() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/kategori/index') ;
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
                $data['ktg'] = $this->Kategori_model->getDataKategoriEdit($id) ;
            }

            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Kategori '; 
                $data['header'] = 'Kategori'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="'.base_url().'admin/kategori">Kategori</a></li>
                    <li class="breadcrumb-item active"><a>'.$aksi.'</a></li>
                
                '; 

                $this->form_validation->set_rules('code', 'Kode Kategori', 'required');
                $this->form_validation->set_rules('nama', 'Kategori', 'required');

                if($this->form_validation->run() == FALSE) {

                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view("admin/kategori/$load") ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;
                }else{
                    if($id == 0){
                        $this->Kategori_model->simpanData() ;
                    }else{
                        $this->Kategori_model->ubahData($id) ;
                    }
                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login");
                redirect("login") ;
            }
        }

        public function hapus($id)
        {
            $this->Kategori_model->hapusData($id) ;
        }
    }

?>