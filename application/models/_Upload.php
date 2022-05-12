<?php 

    class _Upload extends CI_Model{
        public function uploadBerkasAjax($namaBerkas, $path, $type, $sesi="")
        {
           
            if( $_FILES[$namaBerkas]['name'] ) {
                $filename = explode("." , $_FILES[$namaBerkas]['name']) ;
                $berkas = strtolower(end($filename)) ;
                $config['upload_path'] = './'.$path; //assets/file-upload/surat 
                $config['allowed_types'] = "$type"; //'pdf|jpg|png|jpeg'
                $hashDate = substr(md5(date('Y-m-d H:i:s')),1,15) ;
                
                $config['file_name'] = $hashDate.'_rwn' ;
                $this->load->library('upload',$config);

                if($this->upload->do_upload($namaBerkas)){
                    $this->upload->initialize($config);
                }else{
                    $pesan = [
                        'pesan_'.$sesi => 'gagal simpan - tipe file tidak sesuai',
                        'warna_'.$sesi => 'danger'
                    ];
                    $this->session->set_flashdata($pesan);
                    return 'error' ;// redirect("$redirect") ;  
                }

                return $config['file_name'].'.'.$berkas ;
            } else{
                $pesan = [
                    'pesan_'.$sesi => 'gagal simpan - berkas tidak boleh kosong',
                    'warna_'.$sesi => 'danger'
                ];
                $this->session->set_flashdata($pesan);
                return 'error' ;// redirect("$redirect") ;  
            }
        }

        public function upload($namaBerkas, $path, $type)
        {
           
            if( $_FILES[$namaBerkas]['name'] ) {
                $filename = explode("." , $_FILES[$namaBerkas]['name']) ;
                $berkas = strtolower(end($filename)) ;
                $config['upload_path'] = './'.$path; //assets/file-upload/surat 
                $config['allowed_types'] = "$type"; //'pdf|jpg|png|jpeg'
                $hashDate = substr(md5(date('Y-m-d H:i:s')),1,15) ;
                
                $config['file_name'] = $hashDate.'_rwn' ;
                $this->load->library('upload',$config);

                if($this->upload->do_upload($namaBerkas)){
                    $this->upload->initialize($config);
                    return $config['file_name'].'.'.$berkas ;
                }else{
                    $pesan = [
                        'pesan' => 'gagal simpan - tipe file tidak sesuai',
                        'warna' => 'danger'
                    ];
                    $this->session->set_flashdata($pesan);
                    return 'error' ;// redirect("$redirect") ;  
                }
            } else{
                $pesan = [
                    'pesan' => 'gagal simpan - berkas tidak boleh kosong',
                    'warna' => 'danger'
                ];
                $this->session->set_flashdata($pesan);
                return 'error' ;// redirect("$redirect") ;  
            }
        }
    }

?>