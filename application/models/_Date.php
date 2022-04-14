<?php 

    class _Date extends CI_Model{
        public function formatTanggal($tanggal) 
        {
            $bulan = explode('-', $tanggal);
            $b = '' ;

            switch ($bulan[1]) {
                case 1 :
                    $b = 'Januari' ; break ;
                case 2 :
                    $b = 'Februari' ; break ;
                case 3 :
                    $b = 'Maret' ; break ;
                case 4 :
                    $b = 'April' ; break ;
                case 5 :
                    $b = 'Mei' ; break ;
                case 6 :
                    $b = 'Juni' ; break ;
                case 7 :
                    $b = 'Juli' ; break ;
                case 8 :
                    $b = 'Agustus' ; break ;
                case 9 :
                    $b = 'September' ; break ;
                case 10 :
                    $b = 'Oktober' ; break ;
                case 11 :
                    $b = 'November' ; break ;
                case 12 :
                    $b = 'Desember' ; break ;
                default :
                    $b = '00' ;
            }

            if($b == '00') {
                return '-' ;
            }else{
                return $bulan[2].' '.$b.' '.$bulan[0] ;
            }
        }

        public function formatTanggalHari($tanggal) 
        {
            $bulan = date('Y-m-d l', strtotime($tanggal)) ;
            $bulan = explode(' ', $bulan) ;

            $hari = $bulan[1] ;
            
            if($hari == 'Sunday'){
                $hari = 'Minggu' ;
            }elseif($hari == 'Monday'){
                $hari = 'Senin' ;
            }elseif($hari == 'Tuesday'){
                $hari = 'Selasa' ;
            }elseif($hari == 'Wednesday'){
                $hari = 'Rabu' ;
            }elseif($hari == 'Thursday'){
                $hari = 'Kamis' ;
            }elseif($hari == 'Friday'){
                $hari = 'Jumat' ;
            }elseif($hari == 'Saturday'){
                $hari = 'Sabtu' ;
            }else{
                $hari = '' ;
            }



            $bulan = explode('-', $bulan[0]);
            $b = '' ;

            switch ($bulan[1]) {
                case 1 :
                    $b = 'Januari' ; break ;
                case 2 :
                    $b = 'Februari' ; break ;
                case 3 :
                    $b = 'Maret' ; break ;
                case 4 :
                    $b = 'April' ; break ;
                case 5 :
                    $b = 'Mei' ; break ;
                case 6 :
                    $b = 'Juni' ; break ;
                case 7 :
                    $b = 'Juli' ; break ;
                case 8 :
                    $b = 'Agustus' ; break ;
                case 9 :
                    $b = 'September' ; break ;
                case 10 :
                    $b = 'Oktober' ; break ;
                case 11 :
                    $b = 'November' ; break ;
                case 12 :
                    $b = 'Desember' ; break ;
                default :
                    $b = '00' ;
            }

            if($b == '00') {
                return '-' ;
            }else{
                return $hari.', '.$bulan[2].' '.$b.' '.$bulan[0] ;
            }
        }

    }

?>