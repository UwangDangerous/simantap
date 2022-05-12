<?php 

    class Kuali extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            // $this->load->library('form_validation');
            $this->load->model('AlatGelas_model') ;
            $this->load->model('_Date') ;
        }

        public function index()
        {
            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Alat Gelas Kualitatif '.WEB; 
                $data['header'] = 'Alat Gelas Kualitatif'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Alat Gelas Kualitatif</a></li>
                
                '; 
                
                $data['brg'] = $this->AlatGelas_model->getDataAlatGelas(21) ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/kuali/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }
    }

?>