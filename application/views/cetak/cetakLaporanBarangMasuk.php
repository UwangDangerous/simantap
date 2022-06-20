<?php

$mpdf = new \Mpdf\Mpdf(['format' => [210, 297] ]); //215, 330

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Masuk</title>
    <link rel="stylesheet" href="'.base_url().'assets/css/cetak.css">
</head>
<body>

    <div id="header-laporan">
        <h3>
            LAPORAN BARANG MASUK PERIODE <br>
            '.  $this->_Date->formatTanggal( $tgl1 ).' s/d '.$this->_Date->formatTanggal( $tgl2 ).'
        </h3>
    </div>

    <div id="laporan">
        <table cellpadding=2 cellspacing=2>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <tbody>';
                $no = 1;
                foreach($barang as $row){
                    $jml = $this->Cetak_model->getStokMasuk($row['id_barang'], $tgl1, $tgl2) ;
                    if($jml > 0){
$html .=                '<tr>
                            <td align="center">'.$no++.'</td>
                            <td>'.$row['nama_barang'].'</td>
                            <td align="center">'.$row['nama_ktg'].'</td>
                            <td align="center">'. $jml .'</td>
                            <td align="center">'.$row['nama_unit'].'</td>
                        </tr>' ;    
                    }            
                }
$html .=    '</tbody>
        </table>
    </div>
    

    
</body>
</html>
' ;
$mpdf->SetHTMLFooter('Halaman {PAGENO}') ;
$mpdf->WriteHTML($html);
$mpdf->Output("Laporan_Barang_Masuk_".$this->_Date->formatTanggal( $tgl1 )."_sd_".$this->_Date->formatTanggal( $tgl2 )." .pdf","I");

// echo($html) ;
?>