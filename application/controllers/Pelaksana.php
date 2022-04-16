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

                $this->db->where('kode_laksana', $kode_laksana) ;
                $data['transportasi'] = $this->db->get('use_trans')->result_array() ;

                // $data['kendaraan'] = $this->db->get('transportasi')->result_array() ;
                // $data['pp'] = ['Pulang','Pergi'] ;

                $this->load->view('transport/index',$data) ;
            }

            public function model_tambah_transport($kode_laksana)
            {
                $data['kode_laksana'] = $kode_laksana ;
                $data['kendaraan'] = $this->db->get('transportasi')->result_array() ;
                $data['pp'] = ['Pulang','Pergi'] ;
                $this->load->view('transport/tambah',$data) ;
            }

            public function simpan_transport($kode_laksana) 
            {
                $kendaraan = $this->input->post('kendaraan') ;
                if($kendaraan > 2) {
                    $pesan = [
                        'pesan_trans' => 'Transportasi Kereta dan Pesawat Berhasil Ditambah' ,
                        'warna_trans' => 'success' 
                    ] ;
                }else{
                    $pesan = [
                        'pesan_trans' => 'Transportasi Mobil dan kendaraa umum Berhasil Ditambah' ,
                        'warna_trans' => 'success' 
                    ] ;
                }
                $this->session->set_flashdata($pesan) ;
                $this->transport($kode_laksana);
            }
        // ====================================================================================================
        // transport























        // transport
        // ====================================================================================================
            public function hotel($kode_laksana){
                $data['kode_laksana'] = $kode_laksana ;
                $this->load->view('hotel/index',$data) ;
            }
        // ====================================================================================================
        // transport
    }

?>