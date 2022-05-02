<?php 

    class Kategori_model extends CI_Model{
        public function getDataKategori()
        {
            return $this->db->get('kategori')->result_array();
        }

        public function getDataKategoriEdit($id)
        {
            $this->db->where('id_ktg', $id) ;
            return $this->db->get('kategori')->row_array();
        }

        public function simpanData(){
            $query = [
                'kode_ktg' => $this->input->post('code') ,
                'nama_ktg' => $this->input->post('nama')
            ] ;

            if($this->db->insert('kategori', $query)) {
                $pesan = [
                    'pesan' => 'Data Berhasil Disimpan' ,
                    'warna' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Disimpan' ,
                    'warna' => 'danger'
                ];
            }
            $this->session->set_flashdata($pesan) ;
            redirect("admin/kategori") ;

        }

        public function ubahData($id){
            $query = [
                'kode_ktg' => $this->input->post('code') ,
                'nama_ktg' => $this->input->post('nama')
            ] ;

            $this->db->where('id_ktg',$id) ;
            $this->db->set($query) ;
            if($this->db->update('kategori')) {
                $pesan = [
                    'pesan' => 'Data Berhasil Diubah' ,
                    'warna' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Diubah' ,
                    'warna' => 'danger'
                ];
            }
            $this->session->set_flashdata($pesan) ;
            redirect("admin/kategori") ;

        }

        public function hapusData($id){
            $this->db->where('id_ktg',$id) ;
            if($this->db->delete('kategori')) {
                $pesan = [
                    'pesan' => 'Data Berhasil Dihapus' ,
                    'warna' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Dihapus' ,
                    'warna' => 'danger'
                ];
            }
            $this->session->set_flashdata($pesan) ;
            redirect("admin/kategori") ;
        }
    }

?>