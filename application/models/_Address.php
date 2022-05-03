<?php 

    class _Address extends CI_Model{
        public function provinsi()
        {
            $data = $this->db->get('a_provinsi')->result_array() ;
            return $data ;
        }

        public function kota()
        {
            $this->db->join('a_provinsi', 'a_provinsi.id_prov = a_kota.id_prov', 'inner');
            $data = $this->db->get('a_kota')->result_array() ;
            return $data ;
        }
    }

?>