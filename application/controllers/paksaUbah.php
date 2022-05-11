<?php 

    class paksaUbah extends CI_Controller{
        public function index()
        {
            $barang = $this->db->get('brg_keluar_item')->result_array() ;
            foreach($barang as $b){
                $this->db->where('id_brg_keluar_item', $b['id_brg_keluar_item']) ;
                $this->db->set('konfirmasi', $b['jumlah_brg_keluar']) ;
                $this->db->update('brg_keluar_item') ;
            }
        }
    }

?>