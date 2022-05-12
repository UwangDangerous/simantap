<?php 

    class Perusahaan extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model('Perusahaan_model') ;
            $this->load->model('_Address') ;
        }

        public function index()
        {
            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Pemasok '.WEB; 
                $data['header'] = 'Pemasok'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Pemasok</a></li>
                
                '; 
                
                $data['perusahaan'] = $this->Perusahaan_model->getDataPerusahaan() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/perusahaan/index') ;
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
                $data['prsh'] = $this->Perusahaan_model->getDataPerusahaanEdit($id) ;
            }

            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Pemasok '.WEB; 
                $data['header'] = 'Pemasok'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="'.base_url().'admin/perusahaan">Pemasok</a></li>
                    <li class="breadcrumb-item active"><a>'.$aksi.'</a></li>
                
                '; 

                $this->form_validation->set_rules('kode', 'Kode Perusahaan', 'required');
                $this->form_validation->set_rules('nama', 'Nama Perusahaan', 'required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'required');
                $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
                $this->form_validation->set_rules('kota', 'Kabupaten / Kota', 'required');
                $this->form_validation->set_rules('pos', 'Kode Pos', 'required');
                $this->form_validation->set_rules('telp', 'No Telepon', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

                if($this->form_validation->run() == FALSE) {

                    $data['provinsi'] = $this->_Address->provinsi() ;
                    $data['kota'] = $this->_Address->kota() ;

                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view("admin/perusahaan/$load") ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;
                }else{
                    if($id == 0){
                        $this->Perusahaan_model->simpanData() ;
                    }else{
                        $this->Perusahaan_model->ubahData($id) ;
                    }
                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login");
                redirect("login") ;
            }
        }

        public function hapus($id)
        {
            $this->Perusahaan_model->hapusData($id) ;
        }
    }

?>