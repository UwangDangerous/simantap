<?php 

    class BarangKeluar_model extends CI_Model{
        // USER
            public function getDataBarang($ktg=0)
            {
                if($ktg == 0){
                    $this->db->where("'id_ktg' != '21' AND 'id_ktg' != '22'") ;
                }
                return $this->db->get('barang')->result_array() ;
            }

            public function getDataBarangKeluar($id)
            {
                $this->db->where('id_user', $id) ;
                $this->db->order_by('id_brg_keluar', 'desc') ;
                return $this->db->get('brg_keluar')->result_array() ;
            }

            public function user_simpanData($id)
            {
                $tgl = '' ;
                if($this->input->post('kode_brg_keluar') == ''){
                    $tgl = $this->input->post('tgl_brg_keluar').' '.date('G:i:s');
                }else{
                    $tgl = date("Y-m-d G:i:s") ;
                }
                
                $query = [
                    'id_brg_keluar' => $id,
                    'tgl_brg_keluar' => $tgl ,
                    'kode_brg_keluar' => $this->input->post('kode_brg_keluar'),
                    'id_user' => $this->session->userdata('kunci'),
                    'status' => 0
                ] ;

                $this->db->insert('brg_keluar', $query) ;
                $this->session->set_flashdata(['pesan' => 'Data Berhasil Disimpan' , 'warna' => 'success']) ;
            }

            public function getDataItemBarangKeluar($id)
            {
                $this->db->where('id_brg_keluar', $id) ;
                $this->db->join('barang', 'barang.id_barang = brg_keluar_item.id_barang') ;
                $this->db->join('unit', 'unit.id_unit = barang.id_unit') ;
                return $this->db->get('brg_keluar_item')->result_array();
            }
        // USER



        // ADMIN
            public function getDataBarangAdmin()
            {
                $this->db->join('user', 'user.id_user = brg_keluar.id_user') ;
                $this->db->order_by('id_brg_keluar', 'desc');
                return $this->db->get('brg_keluar')->result_array() ;
            }
        // ADMIN



        // GENERAL
            public function getIDForNext()
            {
                $this->db->order_by('id_brg_keluar', 'desc') ;
                $this->db->select('id_brg_keluar') ;
                return $this->db->get('brg_keluar')->row_array()['id_brg_keluar'] + 1 ;
            }
        // GENERAL
    }

?>