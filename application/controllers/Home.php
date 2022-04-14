<?php 

    class Home extends CI_Controller{

        // public function __construct() 
        // {
        //     parent::__construct() ;
        //     $this->load->library('form_validation');
        // } 

        public function index() {
            $data['judul'] = "PPPOMN - Perjalanan Dinas" ;
            $this->load->view('temp/header', $data) ;
            $this->load->view('home/index') ;
            $this->load->view('temp/footer') ;
        }

        

    }
?>