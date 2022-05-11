<?php 

    class AlatGelas_model extends CI_Model{
        // GENERAL
            // id 21 = kualitatif 22 = kuantitatif
            public function getDataAlatGelas($ktg)
            {
                $this->db->where('id_ktg', $ktg) ;
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

            public function getKetemu($id, $user) 
            {
                $this->db->where('id_barang',$id) ;
                $this->db->where('id_user', $user) ;
                $this->db->where('ket', 3) ;
                return $this->db->get('alat_gelas')->row_array()['jumlah_alat'] ; 
            }

            public function getDataHilang($id)
            {
                $user = $this->session->userdata('kunci') ;
                $this->db->where('id_barang',$id) ;
                $this->db->where('id_user', $user) ;
                $this->db->where('ket', 1) ;
                return $this->db->get('alat_gelas')->result_array() ; 
            }

            public function getDataRusak($id)
            {
                $user = $this->session->userdata('kunci') ;
                $this->db->where('id_barang',$id) ;
                $this->db->where('id_user', $user) ;
                $this->db->where('ket', 2) ;
                return $this->db->get('alat_gelas')->result_array() ; 
            }

            public function judulDetail($id) 
            {
                $this->db->where('id_barang', $id);
                $this->db->select('nama_barang') ;
                return $this->db->get('barang')->row_array()['nama_barang'] ;
            }
        // GENERAL
    }

?>