<?php 

    class Unit_model extends CI_Model{
        public function getDataUnit()
        {
            return $this->db->get('unit')->result_array();
        }

        public function getDataUnitEdit($id)
        {
            $this->db->where('id_unit', $id) ;
            return $this->db->get('unit')->row_array();
        }

        public function simpanData(){
            $query = [
                'nama_unit' => $this->input->post('nama')
            ] ;

            if($this->db->insert('unit', $query)) {
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
            redirect("admin/unit") ;

        }

        public function ubahData($id){
            $query = [
                'nama_unit' => $this->input->post('nama')
            ] ;

            $this->db->where('id_unit',$id) ;
            $this->db->set($query) ;
            if($this->db->update('unit')) {
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
            redirect("admin/unit") ;

        }

        public function hapusData($id){
            $this->db->where('id_unit',$id) ;
            if($this->db->delete('unit')) {
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
            redirect("admin/unit") ;
        }
    }

?>