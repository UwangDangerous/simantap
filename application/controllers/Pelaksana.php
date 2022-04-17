<?php 

    class Pelaksana extends CI_Controller{
        public function formPelaksana($kode)
        {
            $this->load->helper('security') ;
            $data['kode'] = $kode ;
            $this->load->view('pelaksana/form_pelaksana', $data) ;
        }

        public function simpan_pelaksana($kode){
            $query = [
                'kode_laksana' => substr(md5(date('Y-m-d H:i:s')),1,10) ,
                'kode_jalan' => $kode ,
                'namaPelaksana' => $this->input->post('namaPelaksana'),
                'uang_representasi' => $this->input->post('uang_representasi')
            ] ;

            if($this->db->insert('pelaksana', $query) ) {
                $pesan = [
                    'pesan_pelaksana' => "Pelaksana Berhasil Ditambah",
                    'warna_pelaksana' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan_pelaksana' => "Pelaksana Gagal Ditambah",
                    'warna_pelaksana' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            $this->formPelaksana($kode) ;
        }

        public function hapus_pelaksana($kode, $kode_laksana){
            $this->db->where('kode_laksana', $kode_laksana) ;
            if($this->db->delete('pelaksana') ) {
                $pesan = [
                    'pesan_pelaksana' => "Pelaksana Berhasil Dihapus",
                    'warna_pelaksana' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan_pelaksana' => "Pelaksana Gagal Dihapus",
                    'warna_pelaksana' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            $this->formPelaksana($kode) ;
        }

        public function ubah_pelaksana($kode, $kode_laksana){
            $query = [
                'namaPelaksana' => $this->input->post('namaPelaksana'),
                'uang_representasi' => $this->input->post('uang_representasi')
            ];
            $this->db->where('kode_laksana', $kode_laksana) ;
            $this->db->set($query) ;
            if($this->db->update('pelaksana') ) {
                $pesan = [
                    'pesan_pelaksana' => "Pelaksana Berhasil Diubah",
                    'warna_pelaksana' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan_pelaksana' => "Pelaksana Gagal Diubah",
                    'warna_pelaksana' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            $this->formPelaksana($kode) ;
        }










        






























        // transport
        // ====================================================================================================
            public function transport($kode_laksana)
            {
                $data['kode_laksana'] = $kode_laksana ;

                $this->load->model('_Date') ;

                $this->db->where('kode_laksana', $kode_laksana) ;
                $this->db->join('transportasi', 'transportasi.idTrans = use_trans.idTrans') ;
                $this->db->select('transportasi.idTrans as idTrans, nama_maskapai, tempat_asal, tempat_tujuan, no_tiket, kode_boking, no_pembayaran, pp, tgl_kepergian, harga_tiket,namaTrans, idUT ') ;
                $this->db->order_by('idUT','asc') ;
                $data['transportasi'] = $this->db->get('use_trans')->result_array() ;

                $this->load->view('transport/index',$data) ;
            }

            public function model_tambah_transport($kode_laksana)
            {
                $data['kode_laksana'] = $kode_laksana ;

                $data['kendaraan'] = $this->db->get('transportasi')->result_array() ;

                $data['pp'] = ['Pergi','Pulang'] ;
                $this->load->view('transport/tambah',$data) ;
            }

            public function simpan_transport($kode_laksana) 
            {
                $kendaraan = $this->input->post('kendaraan') ;
                if($kendaraan > 2) {
                    $query = [
                        "idTrans" => $this->input->post('kendaraan') ,
                        "kode_laksana" => $kode_laksana ,
                        "harga_tiket" => $this->input->post("harga_tiket"),
                        "nama_maskapai" => $this->input->post("nama_maskapai"),
                        "no_tiket" => $this->input->post("no_tiket"),
                        "kode_boking" => $this->input->post("kode_boking"),
                        "no_pembayaran" => $this->input->post("no_pembayaran"),
                        "tempat_asal" => $this->input->post("tempat_asal"),
                        "tempat_tujuan" => $this->input->post("tempat_tujuan"),
                        "tgl_kepergian" => $this->input->post("tgl_kepergian"),
                        "pp" => $this->input->post("pp")
                    ];
                }else{
                    $query = [
                        "idTrans" => $this->input->post('kendaraan') ,
                        "kode_laksana" => $kode_laksana ,
                        "harga_tiket" => $this->input->post("harga_tiket"),
                        "nama_maskapai" => '-',
                        "no_tiket" => '-',
                        "kode_boking" => '-',
                        "no_pembayaran" => '-',
                        "tempat_asal" => '-',
                        "tempat_tujuan" =>'-',
                        "tgl_kepergian" => $this->input->post("tgl_kepergian"),
                        "pp" => '-'
                    ];
                }

                if($this->db->insert('use_trans', $query)) {
                    $pesan = [
                        'pesan_trans' => 'Data Transportasi Berhasil Ditambah' ,
                        'warna_trans' => 'success' 
                    ] ;
                }else{
                    $pesan = [
                        'pesan_trans' => 'Data Transportasi Gagal Ditambah' ,
                        'warna_trans' => 'danger' 
                    ] ;
                }

                $this->session->set_flashdata($pesan) ;
                $this->transport($kode_laksana);
            }

            public function hapus_trans($kode_laksana, $id)
            {
                $this->db->where('idUT', $id) ;
                if($this->db->delete('use_trans')) {
                    $pesan = [
                        'pesan_trans' => 'Data Transportasi Berhasil Dihapus' ,
                        'warna_trans' => 'success' 
                    ] ;
                }else{
                    $pesan = [
                        'pesan_trans' => 'Data Transportasi Gagal Dihapus' ,
                        'warna_trans' => 'danger' 
                    ] ;
                }

                $this->session->set_flashdata($pesan) ;
                $this->transport($kode_laksana);
            }
        // ====================================================================================================
        // transport

























        // hotel
        // ====================================================================================================
            public function hotel($kode_laksana){
                $data['kode_laksana'] = $kode_laksana ;

                $this->db->where('kode_laksana', $kode_laksana) ;
                $data['hotel'] = $this->db->get('hotel')->result_array() ;
                $this->load->view('hotel/index',$data) ;
            }

            public function tambah_hotel($kode_laksana)
            {
                $data['kode_laksana'] = $kode_laksana ;

                $this->load->view('hotel/tambah',$data) ;
            }

            public function simpan_hotel($kode_laksana)
            {
                $query = [
                    'kode_laksana' => $kode_laksana ,
                    'namaHotel' => $this->input->post('namaHotel'),
                    'alamatHotel' => $this->input->post('alamatHotel'),
                    'noTelp' => $this->input->post('noTelp'),
                    'checkIn' => $this->input->post('checkIn'),
                    'checkOut' => $this->input->post('checkOut'),
                    'biaya_hotel' => $this->input->post('biaya_hotel'),
                    'noKamar' => $this->input->post('noKamar'),
                    'noInvoice' => $this->input->post('noInvoice')
                ];

                if( $this->db->insert('hotel', $query) ) {
                    $pesan = [
                        'pesan_hotel' => "Hotel Berhasil Disimpan" ,
                        'warna_hotel' => 'success'
                    ];
                }else{
                    $pesan = [
                        'pesan_hotel' => "Hotel Gagal Disimpan" ,
                        'warna_hotel' => 'danger'
                    ];
                }


                $this->session->set_flashdata($pesan) ;
                $this->hotel($kode_laksana) ;
            }
            public function hapus_hotel($kode_laksana, $id)
            {
                $this->db->where('idHotel', $id) ;
                if( $this->db->delete('hotel') ) {
                    $pesan = [
                        'pesan_hotel' => "Hotel Berhasil Dihapus" ,
                        'warna_hotel' => 'success'
                    ];
                }else{
                    $pesan = [
                        'pesan_hotel' => "Hotel Gagal Dihapus" ,
                        'warna_hotel' => 'danger'
                    ];
                }


                $this->session->set_flashdata($pesan) ;
                $this->hotel($kode_laksana) ;
            }
        // ====================================================================================================
        // hotel
    }

?>