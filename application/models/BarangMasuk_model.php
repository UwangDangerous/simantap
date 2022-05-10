<?php 

    class BarangMasuk_model extends CI_Model{
        public function getDataBarangMasuk()
        {
            $this->db->join('perusahaan','perusahaan.id_perusahaan = brg_masuk.id_perusahaan') ;
            $this->db->order_by('id_brg_masuk','desc') ;
            return $this->db->get('brg_masuk')->result_array();
        }

        public function getDataBarangMasukEdit($id)
        {
            $this->db->where('id_brg_masuk', $id) ;
            return $this->db->get('brg_masuk')->row_array();
        }

        public function getDetailBarangMasuk($id)
        {
            $this->db->where('brg_masuk.id_brg_masuk', $id) ;
            $this->db->join('perusahaan','perusahaan.id_perusahaan = brg_masuk.id_perusahaan') ;
            $this->db->join('a_kota','a_kota.id_kota = perusahaan.kota') ;
            $this->db->join('a_provinsi', 'a_provinsi.id_prov = a_kota.id_prov') ;
            return $this->db->get('brg_masuk')->row_array();
        }

        public function getDataBarangMasukItem($id)
        {
            $this->db->where('id_brg_masuk', $id) ;
            $this->db->join('barang','barang.id_barang = brg_masuk_item.id_barang') ;
            $this->db->join('unit', 'unit.id_unit = barang.id_unit') ;
            return $this->db->get('brg_masuk_item')->result_array() ;
        }

        public function simpanData($id){
            if($_FILES['berkas']['name']) {
                $this->load->model("_Upload") ;
                $berkas = $this->_Upload->uploadBerkasAjax('berkas', 'berkas','pdf', 'tambah_item') ;
            }else{
                $berkas = '' ;
            }
            $query = [
                'id_brg_masuk' => $id ,
                'kode_brg_masuk' => $this->input->post('kode_brg_masuk') ,
                'tgl_brg_masuk' => $this->input->post('tgl_brg_masuk').' '.date("G:i:s") ,
                'id_perusahaan' => $this->input->post('id_perusahaan') ,
                'note' => $this->input->post('note') ,
                'berkas' => $berkas 
            ] ;

            if($this->db->insert('brg_masuk', $query)){
                $pesan = [
                    'pesan_tambah_item' => 'Data Berhasil Disimpan' ,
                    'warna_tambah_item' => 'success'
                ] ;
            }else{
                $pesan = [
                    'pesan_tambah_item' => 'Data Gagal Disimpan' ,
                    'warna_tambah_item' => 'danger'
                ] ;
            }

            $this->session->set_flashdata($pesan) ;
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
            $this->db->where('id_brg_masuk',$id) ;
            if($this->db->delete('brg_masuk')) {
                
                $this->db->where('id_brg_masuk', $id) ;
                $this->db->delete('brg_masuk_item') ;
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
            redirect("admin/barangMasuk") ;
        }
    }

?>