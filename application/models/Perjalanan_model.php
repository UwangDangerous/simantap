<?php 

    class Perjalanan_model extends CI_Model{
        public function getDataPerjalan()
        {
            return $this->db->get('perjalanan')->result_array() ;
        }

        public function getDataPelaksana($id) 
        {
            $this->db->where('kode_jalan', $id) ;
            return $this->db->get('pelaksana')->result_array();
        }

        public function getJumlahPerjalanan($id) 
        {
            $this->db->where('perjalanan.kode_jalan', $id) ;
            $this->db->join('pelaksana','pelaksana.kode_laksana = use_trans.kode_laksana') ;
            $this->db->join('perjalanan','perjalanan.kode_jalan = pelaksana.kode_jalan') ;
            $this->db->join('transportasi', 'transportasi.idTrans = use_trans.idTrans') ;
            $this->db->select('perjalanan.kode_jalan') ;
            return $this->db->get('use_trans')->num_rows();
        }

        public function getDataTrans($id) 
        {
            $this->db->where('pelaksana.kode_laksana', $id) ;
            $this->db->join('pelaksana','pelaksana.kode_laksana = use_trans.kode_laksana') ;
            $this->db->join('transportasi', 'transportasi.idTrans = use_trans.idTrans') ;
            return $this->db->get('use_trans')->result_array();
        }
    }

?>