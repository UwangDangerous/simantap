<?php 

    class AlatGelas_model extends CI_Model{
        // GENERAL
            // id 21 = kualitatif 22 = kuantitatif
            public function getDataAlatGelas($ktg)
            {
                $this->db->where('id_ktg', $ktg) ;
                return $this->db->get('barang')->result_array() ;
            }

            
            // hitungan
                public function getNormal($id, $user) 
                {
                    $this->db->where('id_barang',$id) ;
                    $this->db->where('id_user', $user) ;
                    $this->db->join('brg_keluar', 'brg_keluar.id_brg_keluar = brg_keluar_item.id_brg_keluar') ;
                    $this->db->select_sum('konfirmasi') ;
                    $data = $this->db->get('brg_keluar_item')->row_array() ; 
                    if($data['konfirmasi'] > 0){
                        return $data['konfirmasi'] ;
                    }else{
                        return 0 ;
                    }
                }

                public function getHilang($id, $user) 
                {
                    $this->db->where('id_barang',$id) ;
                    $this->db->where('id_user', $user) ;
                    $this->db->where('ket', 1) ;
                    $this->db->select_sum('jumlah_alat');
                    $data = $this->db->get('alat_gelas')->row_array() ; 
                    if($data['jumlah_alat'] > 0){
                        return $data['jumlah_alat'] ;
                    }else{
                        return 0 ;
                    }
                }

                public function getRusak($id, $user) 
                {
                    $this->db->where('id_barang',$id) ;
                    $this->db->where('id_user', $user) ;
                    $this->db->where('ket', 2) ;
                    $this->db->select_sum('jumlah_alat');
                    $data = $this->db->get('alat_gelas')->row_array() ; 
                    if($data['jumlah_alat'] > 0){
                        return $data['jumlah_alat'] ;
                    }else{
                        return 0 ;
                    } 
                    
                }

                public function getKetemu($id, $user) 
                {
                    $this->db->where('id_barang',$id) ;
                    $this->db->where('id_user', $user) ;
                    $this->db->where('ket', 3) ;
                    $this->db->select_sum('jumlah_alat');
                    $data = $this->db->get('alat_gelas')->row_array() ; 
                    if($data['jumlah_alat'] > 0){
                        return $data['jumlah_alat'] ;
                    }else{
                        return 0 ;
                    }
                }

                public function getPindah($id)
                {
                    $user = $this->session->userdata('kunci') ;
                    $this->db->where('id_barang',$id) ;
                    $this->db->where('user1', $user) ;
                    $this->db->select_sum('jumlah_pindah') ;
                    $data = $this->db->get('alat_gelas_pindah')->row_array() ; 
                    if($data['jumlah_pindah'] > 0){
                        return $data['jumlah_pindah'] ;
                    }else{
                        return 0 ;
                    }
                }

                public function getPindahMasuk($id)
                {
                    $user = $this->session->userdata('kunci') ;
                    $this->db->where('id_barang',$id) ;
                    $this->db->where('user2', $user) ;
                    $this->db->select_sum('jumlah_pindah') ;
                    $data = $this->db->get('alat_gelas_pindah')->row_array() ; 
                    if($data['jumlah_pindah'] > 0){
                        return $data['jumlah_pindah'] ;
                    }else{
                        return 0 ;
                    }
                }
            // hitungan

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

            public function getDataKetemu($id)
            {
                $user = $this->session->userdata('kunci') ;
                $this->db->where('id_barang',$id) ;
                $this->db->where('id_user', $user) ;
                $this->db->where('ket', 3) ;
                return $this->db->get('alat_gelas')->result_array() ; 
            }

            public function getDataPindah($id)
            {
                $user = $this->session->userdata('kunci') ;
                $this->db->where('id_barang',$id) ;
                $this->db->where('user1', $user) ;
                $this->db->join('user','id_user = user2') ;
                $this->db->select('jumlah_pindah,id_agp,tgl_pindah,keterangan,nama_blakang') ;
                return $this->db->get('alat_gelas_pindah')->result_array() ; 
            }

            public function getDataPindahMasuk($id)
            {
                $user = $this->session->userdata('kunci') ;
                $this->db->where('id_barang',$id) ;
                $this->db->where('user2', $user) ;
                $this->db->join('user','id_user = user1') ;
                $this->db->select('jumlah_pindah,id_agp,tgl_pindah,keterangan,nama_blakang') ;
                return $this->db->get('alat_gelas_pindah')->result_array() ; 
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