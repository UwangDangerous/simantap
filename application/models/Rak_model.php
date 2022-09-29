<?php 

    class Rak_model extends CI_Model{
        public function getDataRak($id=0)
        {
            if($id > 0){
                $this->db->where('id_rak', $id) ;
            }
            return $this->db->get('rak');
        }

        // public function getDataUnitEdit($id)
        // {
        //     $this->db->where('id_unit', $id) ;
        //     return $this->db->get('unit')->row_array();
        // }

        public function simpanData(){
            $query = [
                'nama_rak' => $this->input->post('nama')
            ] ;

            $this->db->insert('rak', $query) ;

            if($this->db->affected_rows() > 0){
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
            redirect("admin/rak") ;

        }

        public function ubahData($id){
            $query = [
                'nama_rak' => $this->input->post('nama')
            ] ;

            $this->db->where('id_rak',$id) ;
            $this->db->set($query) ;
            $this->db->update('rak') ;
            if($this->db->affected_rows()) {
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
            redirect("admin/rak") ;

        }

        public function hapusData($id){
            $this->db->where('id_rak',$id) ;
            $this->db->delete('rak') ;
            if($this->db->affected_rows()) {
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
            redirect("admin/rak") ;
        }







        public function use_rak_simpan($id)
        {
            $query = [
                'id_rak' => $this->input->post('rak'),
                'id' => $id
            ] ;

            $this->db->insert('use_rak', $query) ;
            if($this->db->affected_rows()) {
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
            redirect("admin/produk") ;
        }

        public function use_rak_ubah($id)
        {
            $query = [
                'id_rak' => $this->input->post('rak'),
            ] ;

            $this->db->where('id', $id) ;
            $this->db->set($query) ;
            $this->db->update('use_rak') ;
            if($this->db->affected_rows()) {
                $pesan = [
                    'pesan' => 'Data Berhasil DiUbah' ,
                    'warna' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal DiUbah' ,
                    'warna' => 'danger'
                ];
            }
            $this->session->set_flashdata($pesan) ;
            redirect("admin/produk") ;
        }
    }

?>