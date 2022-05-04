<?php 

    class BarangMasuk extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model('BarangMasuk_model') ;
            $this->load->model("_Date") ; 
            $this->load->model("_Code") ; 
        }

        public function index()
        {
            if( $this->session->userdata('kunci') != null ){
                $data['judul'] = 'Barang Masuk '; 
                $data['header'] = 'Barang Masuk'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Barang Masuk</a></li>
                
                '; 

                $data['brg'] = $this->BarangMasuk_model->getDataBarangMasuk() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/barang_masuk/index') ;
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
                $data['sdm'] = $this->BarangMasuk_model->getDataBarangMasukEdit($id) ;
            }

            if( $this->session->userdata('kunci') != null ){
                $data['judul'] = 'SDM '; 
                $data['header'] = 'SDM'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="'.base_url().'admin/sdm">BarangMasuk</a></li>
                    <li class="breadcrumb-item active"><a>'.$aksi.'</a></li>
                
                '; 

                $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
                $this->form_validation->set_rules('nama_blakang', 'Nama Belakang', 'required');
                $this->form_validation->set_rules('email', 'Email / Username', 'required|valid_email');

                if($this->form_validation->run() == FALSE) {

                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view("admin/sdm/$load") ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;
                }else{
                    if($id == 0){
                        $this->BarangMasuk_model->simpanData() ;
                    }else{
                        $this->BarangMasuk_model->ubahData($id) ;
                    }
                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login");
                redirect("login") ;
            }
        }

        public function hapus($id)
        {
            $this->BarangMasuk_model->hapusData($id) ;
        }
        







        // ============================================================================================================
            public function detail($id)
            {
                if( $this->session->userdata('kunci') != null ){
                    $data['judul'] = 'Rincian Barang Masuk '; 
                    $data['header'] = 'Rincian Barang Masuk'; 
                    $data['bread'] = '
                    
                        <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="'.base_url().'admin/barangMasuk">Barang Masuk</a></li>
                        <li class="breadcrumb-item active"><a>Rincian</a></li>
                    
                    '; 

                    $data['brg'] = $this->BarangMasuk_model->getDetailBarangMasuk($id) ;
                    $data['item'] = $this->BarangMasuk_model->getDataBarangMasukItem($id) ;
                    
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/barang_masuk/detail') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;
                }else{
                    $this->session->set_flashdata("login", "Silahkan Login Kembali");
                    redirect("login") ;
                }
            }

            public function ubahItem($id, $id_brg)
            {
                $query = [
                    "jumlah_brg_masuk" => $this->input->post("jumlah_brg_masuk_$id") ,
                    "harga_satuan" => $this->input->post("harga_satuan_$id") ,
                    "subtotal" => $this->input->post("subtotal_$id") 
                ] ;

                $this->db->where('id_brg_masuk_item', $id) ;
                $this->db->set($query) ;
                if($this->db->update('brg_masuk_item')) {
                    $pesan = [
                        'pesan' => 'Item Berhasil Diubah' ,
                        'warna' => 'success' 
                    ];
                }else{
                    $pesan = [
                        'pesan' => 'Item Gagal Diubah' ,
                        'warna' => 'danger' 
                    ];
                }

                $this->session->set_flashdata($pesan) ;
                redirect("admin/BarangMasuk/detail/$id_brg");
            }
        // ============================================================================================================
    }


?>