<?php 

    class Barang extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('BarangKeluar_model') ; //untuk user hanya tersedia barang keluar
            $this->load->model('_Date') ;
            $this->load->library('form_validation');
        }

        public function index()
        {
            if( $this->session->userdata('kunci') != null ){
                $data['judul'] = 'Permintaan Barang '; 
                $data['header'] = 'Permintaan Barang'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Permintaan Barang</a></li>
                
                '; 

                $data['brg_keluar'] = $this->BarangKeluar_model->getDataBarangKeluar($this->session->userdata('kunci')) ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('user/barang/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function tambah()
        {
            if( $this->session->userdata('kunci') != null ){
                $data['judul'] = 'Buat Permintaan '; 
                $data['header'] = 'Buat Permintaan'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="'.base_url().'user/barang">Permintaan Barang</a></li>
                    <li class="breadcrumb-item active"><a>Buat Permintaan</a></li>
                
                '; 

                $data['idNext'] = $this->BarangKeluar_model->getIDForNext() ;
                $data['brg'] = $this->BarangKeluar_model->getDataBarangKeluar($this->session->userdata('kunci')) ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('user/barang/tambah') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function tambahBarangKeluar($id)
        {
            $this->BarangKeluar_model->user_simpanData($id) ;
            $this->tampilItemBarang($id) ;
        }

        public function tampilItemBarang($id)
        {
            $data['id'] = $id ;
            $data['item'] = $this->BarangKeluar_model->getDataItemBarangKeluar($id) ;
            $data['barang'] = $this->BarangKeluar_model->getDataBarang() ;
            $this->load->view('user/barang/tambah/item', $data) ;
        }

        public function simpanItemKeluar($id)
        {
            $query = [
                'id_brg_keluar' => $id,
                'id_barang' => $this->input->post('id_barang') ,
                'jumlah_brg_keluar' => $this->input->post('jumlah_brg_keluar'),
                'konfirmasi' => 0 
            ];

            $this->db->insert('brg_keluar_item', $query) ;
            $this->session->set_flashdata(['pesan' => 'Data Berhasil Disimpan' , 'warna' => 'success']) ;
            $this->tampilItemBarang($id) ;
        }
    }

?>