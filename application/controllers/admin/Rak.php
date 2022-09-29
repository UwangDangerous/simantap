<?php 

    class Rak extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model('Rak_model') ;
        }

        public function index()
        {
            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Rak '.WEB; 
                $data['header'] = 'Rak Barang'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Rak</a></li>
                
                '; 

                $data['rak'] = $this->Rak_model->getDataRak()->result_array() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/rak/index') ;
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
                $data['rak'] = $this->Rak_model->getDataRak($id)->row_array() ;
            }

            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Rak Barang '.WEB; 
                $data['header'] = 'Rak Barang'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="'.base_url().'admin/rak">Rak</a></li>
                    <li class="breadcrumb-item active"><a>'.$aksi.'</a></li>
                
                '; 

                $this->form_validation->set_rules('nama', 'Nama Unit', 'required');

                if($this->form_validation->run() == FALSE) {

                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view("admin/rak/$load") ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;
                }else{
                    if($id == 0){
                        $this->Rak_model->simpanData() ;
                    }else{
                        $this->Rak_model->ubahData($id) ;
                    }
                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login");
                redirect("login") ;
            }
        }

        public function hapus($id)
        {
            $this->Rak_model->hapusData($id) ;
        }
    }

?>