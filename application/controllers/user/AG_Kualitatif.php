<?php 

    class AG_Kualitatif extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('AlatGelas_model') ;
            $this->load->model('_Date') ;
            $this->load->model('_Upload') ;
        }

        public function index()
        {
            if( $this->session->userdata('kunci') != null ){
                $data['judul'] = 'Alat Gelas Kualitatif '; 
                $data['header'] = 'Alat Gelas Kualitatif'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Alat Gelas Kualitatif</a></li>
                
                '; 

                $data['brg'] = $this->AlatGelas_model->getDataAlatGelas(21) ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('user/ag_kuali/index') ;
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
                $data['judul'] = 'Rincian Alat Gelas Kualitatif '; 
                $data['header'] = 'Rincian Alat Gelas Kualitatif'; 
                $data['bread'] = '
                
                    <li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="'.base_url().'user/ag_kualitatif">Rincian Alat Gelas Kualitatif</a></li>
                    <li class="breadcrumb-item active"><a>Rincian</a></li>
                
                '; 

                $data['id'] = $id ; //id barang
                $data['judul_detail'] = $this->AlatGelas_model->judulDetail($id) ;
                $data['hilang'] = $this->AlatGelas_model->getDataHilang($id) ;
                $data['rusak'] = $this->AlatGelas_model->getDataRusak($id) ;
                $data['ketemu'] = $this->AlatGelas_model->getDataKetemu($id) ;
                $data['pindah'] = $this->AlatGelas_model->getDataPindah($id) ;
                $data['pindahMasuk'] = $this->AlatGelas_model->getDataPindahMasuk($id) ;
                $data['balai'] = $this->db->get_where('user', 'id_user != 1')->result_array() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('user/ag_kuali/detail') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function tambah($id,$ket) 
        {
            $img = '' ;
            $user = $this->session->userdata('kunci') ;
            if($ket == 1){ //barang hilang
                $alert = 'Hilang' ;
            }elseif($ket == 2){
                $alert = "Rusak / Pecah" ;
                if($_FILES['gambar']['name']){
                    $img = $this->_Upload->upload('gambar', 'foto_upload', 'jpg|png|jpeg') ;
                }
            }

            $query = [
                'id_barang' => $id,
                'id_user' => $user,
                'ket' => $ket,
                'jumlah_alat' => $this->input->post('jumlah_alat'),
                'tanggal' => date("Y-m-d"),
                'keterangan' => $this->input->post('keterangan'),
                'gambar' => $img 
            ];

            if($img != 'error'){

                if($this->db->insert('alat_gelas', $query))
                {
                    $pesan = [
                        'pesan' => "Data Barang $alert Berhasil Disimpan",
                        'warna' => 'success'
                    ];
                }else{
                    $pesan = [
                        'pesan' => "Data Barang $alert Gagal Disimpan",
                        'warna' => 'danger'
                    ];
                }

            }

            $this->session->set_flashdata($pesan);
            redirect("user/ag_kualitatif/detail/$id") ;
        }

        public function hapus($id, $hapus)
        {
            $this->db->where('id_alat', $hapus);
            $this->db->delete('alat_gelas') ;
            $this->session->set_flashdata(
                [
                    'pesan' => 'Data Berhasil Dihapus',
                    'warna' => 'success'
                ]
            );
            redirect("user/ag_kualitatif/detail/$id") ;
        }

        public function pindah(){
            // $this->->()
        }
    }

?>