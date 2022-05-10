<?php 

    class BarangKeluar extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model('BarangKeluar_model') ;
            $this->load->model("_Date") ; 
            $this->load->model("_Code") ; 
            date_default_timezone_set('Asia/Jakarta');
        }

        public function index()
        {
            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Barang Keluar '; 
                $data['header'] = 'Barang Keluar'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Barang Keluar</a></li>
                
                '; 

                $data['brg'] = $this->BarangKeluar_model->getDataBarangAdmin() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/barang_keluar/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function aksi($id = 0) 
        {
            $this->db->order_by('id_brg_masuk', 'desc') ;
            $data['idNext'] = $this->db->get('brg_masuk')->row_array()['id_brg_masuk'] + 1 ;
            $data['pemasok'] = $this->db->get('perusahaan')->result_array() ;

            $aksi = 'Tambah Data' ;
            $load = 'tambah';

            if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                $data['judul'] = 'Barang Masuk '; 
                $data['header'] = 'Barang Masuk'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="'.base_url().'admin/barangMasuk">BarangMasuk</a></li>
                    <li class="breadcrumb-item active"><a>'.$aksi.'</a></li>
                
                '; 

                $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
                $this->form_validation->set_rules('nama_blakang', 'Nama Belakang', 'required');
                $this->form_validation->set_rules('email', 'Email / Username', 'required|valid_email');

                if($this->form_validation->run() == FALSE) {

                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view("admin/barang_masuk/$load") ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;
                }else{
                    $this->BarangMasuk_model->simpanData() ;
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
                if( $this->session->userdata('kunci') != null && $this->session->userdata('kunci') == 1 ){
                    $data['judul'] = 'Rincian Barang Masuk '; 
                    $data['header'] = 'Rincian Barang Masuk'; 
                    $data['bread'] = '
                    
                        <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="'.base_url().'admin/barangMasuk">Barang Masuk</a></li>
                        <li class="breadcrumb-item active"><a>Rincian</a></li>
                    
                    '; 

                    $data['brg'] = $this->BarangMasuk_model->getDetailBarangMasuk($id) ;
                    $data['item'] = $this->BarangMasuk_model->getDataBarangMasukItem($id) ;

                    $this->load->model("Produk_model") ;
                    $data['barang'] = $this->Produk_model->getDataProduk() ;
                    
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
                    "jumlah_brg_masuk" => $this->input->post("jumlah_brg_masuk_$id") 
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

            public function tambahItem($id)
            {
                $hs = $this->input->post('harga_satuan') ;
                $jml = $this->input->post('jumlah_brg_masuk') ;
                $t = $hs * $jml ;
                $query = [
                    'id_brg_masuk' => $id ,
                    'id_barang' => $this->input->post('id_barang'),
                    'jumlah_brg_masuk' => $jml
                ] ;

                // var_dump($query) ; die;

                if($this->db->insert('brg_masuk_item', $query)) {
                    $pesan = [
                        'pesan' => 'Item Berhasil Ditambah',
                        'warna' => 'success'
                    ];
                }else{
                    $pesan = [
                        'pesan' => 'Item Gagal Ditambah',
                        'warna' => 'danger'
                    ]; 
                }
                
                $this->session->set_flashdata($pesan) ;
                redirect("admin/barangMasuk/detail/$id") ;
            }

            public function hapusItem($id, $idMasuk) 
            {
                $this->db->where('id_brg_masuk_item', $id) ;
                if($this->db->delete('brg_masuk_item')) {
                    $pesan = [
                        'pesan' => 'Item Berhasil DiHapus',
                        'warna' => 'success'
                    ];
                }else{
                    $pesan = [
                        'pesan' => 'Item Gagal DiHapus',
                        'warna' => 'danger'
                    ]; 
                }

                $this->session->set_flashdata($pesan) ;
                redirect("admin/barangMasuk/detail/$idMasuk") ;
            }

        // ============================================================================================================





















        // with ajax
        public function tambahBarangMasuk($id)
        {
            $this->BarangMasuk_model->simpanData($id) ;
            $this->tambahItemBarang($id) ;
        }

        public function tambahItemBarang($id)
        {
            $this->load->model('_Date') ;

            $data['id'] = $id ;
            $data['barang'] = $this->db->get('barang')->result_array() ;

            $this->db->where('id_brg_masuk', $id) ;
            $this->db->join('barang','barang.id_barang = brg_masuk_item.id_barang') ;
            $this->db->join('unit','unit.id_unit = barang.id_unit') ;
            $data['item'] = $this->db->get('brg_masuk_item')->result_array() ;
            
            $this->load->view('admin/barang_masuk/tambah/item', $data) ;
        }

        public function simpanItemBarang($id)
        {
            $jml = $this->input->post('jumlah_brg_masuk') ;
            $query = [
                'id_brg_masuk' => $id ,
                'id_barang' => $this->input->post('id_barang'),
                'jumlah_brg_masuk' => $jml
            ] ;

            // var_dump($query) ;
            $this->db->insert('brg_masuk_item', $query) ;

            $this->session->set_flashdata(
                [
                    'pesan_tambah_item' => 'Item Pemesanan Berhasil Ditambah' ,
                    'warna_tambah_item' => 'success' 
                ]
            );
            $this->tambahItemBarang($id) ;
        }
        
        public function hapusItemBarang($id,$item) 
        {
            $this->db->where('id_brg_masuk_item', $item) ;
            $this->db->delete('brg_masuk_item') ;

            $this->session->set_flashdata(
                [
                    'pesan_tambah_item' => 'Item Berhasil Dihapus',
                    'warna_tambah_item' => 'success'
                ]
            );
            
            $this->tambahItemBarang($id) ;
        }
    }


?>