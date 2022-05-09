<?php 

    class BarangKeluar_model extends CI_Model{
        public function getDataBarang()
        {
            $this->db->where("'id_ktg' != '2'") ;
            return $this->db->get('barang')->result_array() ;
        }

        public function getDataBarangKeluar($id)
        {
            $this->db->where('id_user', $id) ;
            $this->db->order_by('id_brg_keluar', 'desc') ;
            return $this->db->get('brg_keluar')->result_array() ;
        }
    }

?>