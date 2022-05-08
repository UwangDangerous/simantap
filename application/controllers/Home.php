<?php 

    class Home extends CI_Controller{

        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
        } 

        public function index() {
            if( $this->session->userdata('kunci') != null ){
                $data['judul'] = 'Dashboard '; 
                $data['header'] = 'Dashboard'; 
                $data['bread'] = 'Dashboard'; 
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('home/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                // $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function file($id = 0)
        {
            // $this->db->where('id_brg_masuk', $id) ;
            // $berkas = $this->db->get('brg_masuk')->row_array() ;
            // $berkas = $berkas['berkas'] ;
            // // var_dump($berkas) ; die;
            // // var_dump(file_exists("./berkas/$berkas")) ; die;
            // if (file_exists("./berkas/$berkas") == false) {
            //     $this->load->helper('download');
            //     force_download("http://localhost/simantap_2/berkas/$berkas", null);
            //     exit();
            // }
            // $this->session->set_flashdata( 
            //     [
            //         'pesan' => 'Berkas Kosong',
            //         'warna' => 'danger'
            //     ]
            // );
            // redirect($_SERVER['HTTP_REFERER']);
        }

        

    }
?>