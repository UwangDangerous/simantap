<?php 

    class Cetak_model extends CI_Model{
        public function getStokMasuk($id, $tgl1, $tgl2)
        {
            $this->db->where('id_barang', $id) ;
            $this->db->where("tgl_brg_masuk BETWEEN '$tgl1' AND '$tgl2'") ;
            $this->db->join('brg_masuk', 'brg_masuk.id_brg_masuk = brg_masuk_item.id_brg_masuk') ;
            $this->db->select_sum('jumlah_brg_masuk') ;
            $masuk = $this->db->get('brg_masuk_item')->row_array()['jumlah_brg_masuk'] ;
            if($masuk == null) {
                $masuk = 0 ;
            }
            return $masuk ;
        }

        public function getStokKeluar($id, $tgl1, $tgl2)
        {
            $this->db->where('id_barang', $id) ;
            $this->db->where("tgl_brg_keluar BETWEEN '$tgl1' AND '$tgl2'") ;
            $this->db->join('brg_keluar', 'brg_keluar.id_brg_keluar = brg_keluar_item.id_brg_keluar') ;
            $this->db->select_sum('jumlah_brg_keluar') ;
            $keluar = $this->db->get('brg_keluar_item')->row_array()['jumlah_brg_keluar'] ;
            if($keluar == null) {
                $keluar = 0 ;
            }
            return $keluar ;
        }

        public function getDataBarang()
        {
            $this->db->join('unit', 'unit.id_unit = barang.id_unit') ;
            $this->db->join('kategori', 'kategori.id_ktg = barang.id_ktg') ;
            $this->db->order_by('nama_ktg', 'asc') ;
            $this->db->select('id_barang, nama_unit, nama_ktg, nama_barang') ;
            return $this->db->get('barang')->result_array() ;
        }

        public function getDataLaporanMasuk($tgl1, $tgl2)
        {
            $this->db->where("tgl_brg_masuk BETWEEN '$tgl1' AND '$tgl2'") ;
            $this->db->join('barang', 'barang.id_barang = brg_masuk_item.id_barang') ;
            $this->db->join('kategori', 'kategori.id_ktg = barang.id_ktg') ;
            $this->db->join('unit', 'unit.id_unit = barang.id_unit') ;
            $this->db->join('brg_masuk', 'brg_masuk.id_brg_masuk = brg_masuk_item.id_brg_masuk') ;
            $this->db->order_by('barang.id_barang', 'asc') ;
            $masuk = $this->db->get('brg_masuk_item')->result_array() ;
            return $masuk ;
        }

        public function getDataLaporanKeluar($tgl1, $tgl2)
        {
            $this->db->where("tgl_brg_keluar BETWEEN '$tgl1' AND '$tgl2'") ;
            $this->db->join('barang', 'barang.id_barang = brg_keluar_item.id_barang') ;
            $this->db->join('kategori', 'kategori.id_ktg = barang.id_ktg') ;
            $this->db->join('unit', 'unit.id_unit = barang.id_unit') ;
            $this->db->join('brg_keluar', 'brg_keluar.id_brg_keluar = brg_keluar_item.id_brg_keluar') ;
            $this->db->order_by('barang.id_barang', 'asc') ;
            $keluar = $this->db->get('brg_keluar_item')->result_array() ;
            return $keluar ;
        }
    }

?>