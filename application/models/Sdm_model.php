<?php 

    class Sdm_model extends CI_Model{
        public function getDataSdm()
        {
            return $this->db->get('user')->result_array();
        }

        public function getDataSdmEdit($id)
        {
            $this->db->where('id_user', $id) ;
            return $this->db->get('user')->row_array();
        }

        public function simpanData(){
            $this->load->helper('security') ;
            $pass = do_hash('Simantap123!@', 'sha1') ;
            $query = [
                'username' => $this->input->post('email') ,
                'password' => $pass ,
                'email' => $this->input->post('email') ,
                'aktif' => 1,
                'nama_depan' => $this->input->post('nama_depan') ,
                'nama_blakang' => $this->input->post('nama_blakang') 
            ] ;

            if($this->db->insert('user', $query)) {
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
            redirect("admin/sdm") ;

        }

        public function ubahData($id){
            $query = [
                'username' => $this->input->post('email') ,
                'password' => $pass ,
                'email' => $this->input->post('email') ,
                'aktif' => 1,
                'nama_depan' => $this->input->post('nama_depan') ,
                'nama_blakang' => $this->input->post('nama_blakang') 
            ] ;

            $this->db->where('id_user',$id) ;
            $this->db->set($query) ;
            if($this->db->update('sdm')) {
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
            redirect("admin/sdm") ;

        }

        public function hapusData($id){
            $this->db->where('id_user',$id) ;
            if($this->db->delete('user')) {
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
            redirect("admin/sdm") ;
        }
    }

?>