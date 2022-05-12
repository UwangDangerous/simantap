<?php 

    class Stok_model extends CI_Model{
        public function getDataBarang()
        {
            $this->db->join('unit', 'unit.id_unit = barang.id_unit') ;
            $this->db->join('kategori', 'kategori.id_ktg = barang.id_ktg') ;
            // $this->db->order_by('nama_ktg', 'asc') ;
            $this->db->select('id_barang, nama_unit, nama_ktg, nama_barang') ;
            return $this->db->get('barang')->result_array() ;
        }

        public function getDataMasuk($id)
        {
            $this->db->where('id_barang', $id) ;
            $this->db->join('brg_masuk', 'brg_masuk.id_brg_masuk = brg_masuk_item.id_brg_masuk') ;
            $this->db->join('perusahaan','perusahaan.id_perusahaan = brg_masuk.id_perusahaan') ;
            $this->db->select('tgl_brg_masuk, nama_perusahaan, jumlah_brg_masuk ') ;
            return $this->db->get('brg_masuk_item')->result_array() ;
        }

        public function getDataKeluar($id)
        {
            $this->db->where('id_barang', $id) ;
            $this->db->join('brg_keluar', 'brg_keluar.id_brg_keluar = brg_keluar_item.id_brg_keluar') ;
            $this->db->join('user','user.id_user = brg_keluar.id_user') ;
            $this->db->select('tgl_brg_keluar, nama_blakang, jumlah_brg_keluar ') ;
            return $this->db->get('brg_keluar_item')->result_array() ;
        }

        public function getJudul($id)
        {
            $this->db->where('id_barang', $id) ;
            $this->db->select('nama_barang');
            $this->db->join('unit', 'unit.id_unit = barang.id_unit') ;
            $this->db->join('kategori', 'kategori.id_ktg = barang.id_ktg') ;
            $this->db->select('nama_unit, nama_barang') ;
            return $this->db->get('barang')->row_array() ;
        }
    }

?>