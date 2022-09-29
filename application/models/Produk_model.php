<?php 

    class Produk_model extends CI_Model{
        public function getDataProduk()
        {
            $this->db->join('kategori', 'kategori.id_ktg = barang.id_ktg') ;
            $this->db->join('unit', 'unit.id_unit = barang.id_unit') ;
            $this->db->join('use_rak', 'use_rak.id = barang.id_barang', 'left') ;
            $this->db->join('rak', 'rak.id_rak = use_rak.id_rak', 'left') ;
            return $this->db->get('barang')->result_array();
        }

        public function getDataProdukEdit($id)
        {
            $this->db->where('id_barang', $id) ;
            return $this->db->get('barang')->row_array();
        }

        public function simpanData(){
            $query = [
                'kode_barang' => $this->input->post('kode_barang') ,
                'nama_barang' => $this->input->post('nama_barang') ,
                'id_ktg' => $this->input->post('id_ktg') ,
                'id_unit' => $this->input->post('id_unit') 
            ] ;

            if($this->db->insert('barang', $query)) {
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

        public function ubahData($id){
            $query = [
                'kode_barang' => $this->input->post('kode_barang') ,
                'nama_barang' => $this->input->post('nama_barang') ,
                'id_ktg' => $this->input->post('id_ktg') ,
                'id_unit' => $this->input->post('id_unit') 
            ] ;

            $this->db->where('id_barang',$id) ;
            $this->db->set($query) ;
            if($this->db->update('barang')) {
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
            redirect("admin/produk") ;

        }

        public function hapusData($id){
            $this->db->where('id_barang',$id) ;
            if($this->db->delete('barang')) {
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
            redirect("admin/produk") ;
        }
    }

?>