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
                'namaPelaksana' => $this->input->post('namaPelaksana')
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

            $this->formPelaksana($kode) ;
        }
    }

?>