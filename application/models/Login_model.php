<?php 

    class Login_model extends CI_Model{

        public function cekLogin($name, $pass)
        {
            $this->load->helper('security');
            $pass = do_hash($pass, 'sha1') ;
            $this->db->where("username", $name) ; //= '$name' OR 'email' = '$name' "
            $this->db->where('password', $pass);
            $query = $this->db->get('user')->row_array();
            if ($query){
    
                $sesi = [
                    'kunci' => $query['id_user'] ,
                    'nama_user' => $query['nama_depan'].' '.$query['nama_blakang'],
                    'namaLevel' => $query['nama_blakang']
                ] ;
                $this->session->set_userdata($sesi);
                redirect('home');
    
            }
            else{
                $this->session->set_flashdata('login' , 'MAAF Username atau Password Anda salah!, Mohon diperiksa kembali');
                redirect('login');
            }
        }
        
    }

?>