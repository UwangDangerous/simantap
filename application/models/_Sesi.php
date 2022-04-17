<?php 

    class _Sesi extends CI_Model{
        public function set_sesi($pesan,$pesan_value, $warna, $warna_value)
        {
            $query = [
                $pesan => $pesan_value,
                $warna => $warna_value
            ] ;

            $this->session->set_flashdata($query) ;
            $this->get_sesi($pesan, $warna) ;
        }

        public function get_sesi($pesan, $warna)
        {
            echo "
                <div class='alert alert-".$this->session->flashdata($warna)."' alert-dismissible fade show role='alert'>
                        ".$this->session->flashdata($pesan)."
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            ";
        }

        public function rupiah($rp)
        {
            $hasil_rupiah ='Rp' . number_format($rp,0,',','.');
	        return $hasil_rupiah;
        }
    }
    
    ?>