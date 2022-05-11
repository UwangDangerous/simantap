<?php 

    class AlatGelas_model extends CI_Model{
        public function getDataAlatGelas()
        {
            $this->db->where('id_ktg', 21) ;
            return $this->db->get('barang')->result_array() ;
        }

        public function getNormal($id, $user) 
        {
            $this->db->where('id_barang',$id) ;
            $this->db->where('id_user', $user) ;
            $this->db->join('brg_keluar', 'brg_keluar.id_brg_keluar = brg_keluar_item.id_brg_keluar') ;
            $this->db->select_sum('konfirmasi') ;
            return $this->db->get('brg_keluar_item')->row_array()['konfirmasi'] ; 
        }

        public function getHilang($id, $user) 
        {
            $this->db->where('id_barang',$id) ;
            $this->db->where('id_user', $user) ;
            $this->db->where('ket', 1) ;
            return $this->db->get('alat_gelas')->row_array()['jumlah_alat'] ; 
        }

        public function getRusak($id, $user) 
        {
            $this->db->where('id_barang',$id) ;
            $this->db->where('id_user', $user) ;
            $this->db->where('ket', 2) ;
            return $this->db->get('alat_gelas')->row_array()['jumlah_alat'] ; 
        }
    }

?>