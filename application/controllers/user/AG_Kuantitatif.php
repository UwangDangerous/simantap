<?php 

    class AG_Kuantitatif extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('AlatGelas_model') ;
        }

        public function index()
        {
            if( $this->session->userdata('kunci') != null ){
                $data['judul'] = 'Alat Gelas Kuantitatif '; 
                $data['header'] = 'Alat Gelas Kuantitatif'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Alat Gelas Kuantitatif</a></li>
                
                '; 

                $data['brg'] = $this->AlatGelas_model->getDataAlatGelas(22) ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('user/ag_kuanti/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function detail($id)
        {
            if( $this->session->userdata('kunci') != null ){
                $data['judul'] = 'Rincian Alat Gelas Kuantitatif '; 
                $data['header'] = 'Rincian Alat Gelas Kuantitatif'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="'.base_url().'">Rincian Alat Gelas Kuantitatif</a></li>
                    <li class="breadcrumb-item active"><a>Rincian</a></li>
                
                '; 

                $data['judul_detail'] = $this->AlatGelas_model->judulDetail($id) ;
                $data['brg'] = $this->AlatGelas_model->getDataAlatGelas(22) ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('user/ag_kuanti/detail') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }
    }

?>