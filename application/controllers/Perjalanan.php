<?php 

    class Perjalanan extends CI_Controller{

        public function __construct() 
        {
            parent::__construct() ;
            $this->load->model('_Sesi'); 
        } 

        public function index() {
            $data['judul'] = "Rekap Perjalanan Dinas" ;
            $this->load->view('temp/header', $data) ;
            $this->load->view('perjalanan/index') ;
            $this->load->view('temp/footer') ;
        }

        public function tambah() {
            $data['judul'] = "Tambah Perjalanan" ;
            $this->load->view('temp/header', $data) ;
            $this->load->view('perjalanan/tambah') ;
            $this->load->view('temp/footer') ;
        }

        public function simpan_perjalanan() 
        {
            $query = [
                'kode_jalan' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'noSpm' => $this->input->post('noSpm'),
                'uang_harian' => $this->input->post('uang_harian')
            ];

            // var_dump($query) ;
            if($this->db->insert('perjalanan', $query)){
                $this->_Sesi->set_sesi('pesan_perjalana','Data Berhasil Disimpan', 'warna_perjalanan', 'success') ;
            }else{
                $this->_Sesi->set_sesi('pesan_perjalana','Data Gagal Disimpan', 'warna_perjalanan', 'danger') ;
                redirect('perjalanan/tambah') ;
            }
        }

        

    }

?>