<?php 

    class Perusahaan_model extends CI_Model{
        public function getDataPerusahaan()
        {
            $this->db->join('a_kota','a_kota.id_kota = perusahaan.kota') ;
            $this->db->join('a_provinsi','a_provinsi.id_prov = a_kota.id_prov') ;
            return $this->db->get('perusahaan')->result_array();
        }

        public function getDataPerusahaanEdit($id)
        {
            $this->db->join('a_kota','a_kota.id_kota = perusahaan.kota') ;
            $this->db->join('a_provinsi','a_provinsi.id_prov = a_kota.id_prov') ;
            $this->db->select("
                                a_provinsi.id_prov as id_prov , 
                                a_kota.id_kota as kota, 
                                email,
                                phone,
                                pos,
                                kode_perusahaan,
                                nama_perusahaan,
                                id_perusahaan,
                                alamat
                            ") ;
            $this->db->where('id_perusahaan', $id) ;
            return $this->db->get('perusahaan')->row_array();
        }

        public function simpanData(){
            $query = [
                'nama_perusahaan' => $this->input->post('nama') ,
                'kode_perusahaan' => $this->input->post('kode') ,
                'alamat' => $this->input->post('alamat') ,
                'kota' => $this->input->post('kota') ,
                'pos' => $this->input->post('pos') ,
                'phone' => $this->input->post('telp') ,
                'email' => $this->input->post('email') 
            ] ;

            if($this->db->insert('perusahaan', $query)) {
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
            redirect("admin/perusahaan") ;

        }

        public function ubahData($id){
            $query = [
                'nama_perusahaan' => $this->input->post('nama') ,
                'kode_perusahaan' => $this->input->post('kode') ,
                'alamat' => $this->input->post('alamat') ,
                'kota' => $this->input->post('kota') ,
                'pos' => $this->input->post('pos') ,
                'phone' => $this->input->post('telp') ,
                'email' => $this->input->post('email') 
            ] ;

            $this->db->where('id_perusahaan',$id) ;
            $this->db->set($query) ;
            if($this->db->update('perusahaan')) {
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
            redirect("admin/perusahaan") ;

        }

        public function hapusData($id){
            $this->db->where('id_perusahaan',$id) ;
            if($this->db->delete('perusahaan')) {
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
            redirect("admin/perusahaan") ;
        }
    }

?>