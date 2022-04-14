<?php 

    class Home extends CI_Controller{

        // public function __construct() 
        // {
        //     parent::__construct() ;
        //     $this->load->library('form_validation');
        // } 

        public function index() {
            $this->load->model("_Date") ;
            $this->load->view('home/index') ;
        }

        

    }
?>