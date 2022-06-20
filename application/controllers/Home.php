<?php 

    class Home extends CI_Controller{

        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
        } 

        public function index() {
            if( $this->session->userdata('kunci') != null ){
                $data['judul'] = ''.WEB; 
                $data['header'] = 'Dashboard'; 
                $data['bread'] = 'Dashboard'; 

                $data['kategori'] = $this->db->get('kategori')->result_array() ;
                $data['barang'] = $this->barang() ;
                $data['permintaan'] = $this->getBarangKeluarBaru() ;
                
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

        public function barang() 
        {
            $this->db->join('kategori', 'kategori.id_ktg = barang.id_ktg', 'inner') ;
            return $this->db->get('barang')->result_array() ;
        }

        public function cari_stok() 
        {
            $id = $this->input->post('id_barang') ;

            $this->load->model('BarangKeluar_model') ;
            $stok = $this->BarangKeluar_model->getStok( $id ) ;
            
            $this->db->join('unit', 'unit.id_unit = barang.id_unit') ;
            $this->db->select('nama_unit') ;
            $satuan =  $this->db->get('barang')->row_array() ;

            if($stok[2] == 0){
                echo "<i>Habis</i>" ;
            }else{
                echo $stok[2].' '.$satuan['nama_unit'] ;
            }
        }

        public function getBarangKeluarBaru()
        {
            $this->db->where('status', 0)  ;
            return $this->db->get('brg_keluar')->num_rows() ;
            
        }

        

    }
?>