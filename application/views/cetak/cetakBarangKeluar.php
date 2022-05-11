<?php

$mpdf = new \Mpdf\Mpdf(['format' => [210, 297] ]); //215, 330

$tanggal = explode(' ',$barang_keluar['tgl_brg_keluar']) ;
$tgl = $this->_Date->formatTanggal($tanggal[0]).' '.$tanggal[1] ;
$ref = $barang_keluar['kode_brg_keluar'] ;



$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuitansi Barang Masuk</title>
    <link rel="stylesheet" href="'.base_url().'assets/css/cetak.css">
</head>
<body>

    <div id="header">
        <img src="'.base_url().'assets/img/logo.png" alt="">
    </div>

    <div id="header-keluar">
        <table>
            <tr>
                <td valign="top">Tanggal</td>
                <td valign="top">:</td>
                <td valign="top">'. $tgl.'</td>
                <td rowspan=2> <barcode code="'.$ref.'" type="C128B" width="" height="2"  /> </td>
            </tr>
            <tr>
                <td valign="top">Referensi</td>
                <td valign="top">:</td>
                <td valign="top">'.$ref.'</td>
            </tr>
        </table>
        
    </div>

    <div id="tabel-informasi">
        <table>
            <tr>
                <td valign="top" width="50%">
                    Dari : <br> <br>
                    <b style="text-transform: uppercase;">'.$barang_keluar['nama_depan'].' '.$barang_keluar['nama_blakang'].'</b> <br> 
                    <br>
                    <br>
                    email : '.$barang_keluar['username'].'
                </td>
                <td valign="top" width="50%">
                    Ke : <br> <br>
                    <b>PPPOMN-BMN</b> <br> <br>
                    Gudang BMN <br>
                    Jalan Percetakan Negara Nomor 23 <br>
                    
                    Jakarta - 10560 - Indonesia <br><br><br>

                    Telepon : +6221 4244691 <br>
                    Email : ppid@pom.go.id 
                </td>
            </tr>
        </table>
    </div>

    <br><br>

    <div id="tabel-item">
        <table border=1 cellpadding=2>
            <tr>
                <th rowspan=2 width=5%> No. </th>
                <th rowspan=2 width=45%> Deskripsi </th>
                <th width=5% colspan=2> qty </th>
                <th rowspan=2 width=10%> Satuan </th>
            </tr> 
            <tr> 
                <th> Diminta </th>
                <th> Terima </th>
            </tr> 
            
            ';
            $no = 1 ;
            foreach($item_brg_keluar as $row) {
$html .= '
            <tr>
                <td align=center> '.$no++.' </td>
                <td> '.$row["nama_barang"].' </td>
                <td align=center> '.$row['jumlah_brg_keluar'].' </td>
                <td align=center> </td>
                <td align=center> '.$row['nama_unit'].' </td>
            </tr> 
        ' ;
            }

$html .= '
        </table>
    </div>

    <br><br>

    <div id="tanda-tangan-user">
        <span style="text-transform: uppercase;">'.$barang_keluar['nama_depan'].' '.$barang_keluar['nama_blakang'].'</span>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <u>Tanda Tangan</u>
    </div>

    <div id="tanda-tangan-admin">
        <span style="text-transform: uppercase;">Admin BMN</span>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <u>Tanda Tangan</u>
    </div>
        

    
</body>
</html>
' ;
$mpdf->SetHTMLFooter('Halaman {PAGENO}') ;
$mpdf->WriteHTML($html);
$mpdf->Output("$ref.pdf","I");

// echo($html) ;
?>