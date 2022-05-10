<?php

$mpdf = new \Mpdf\Mpdf(['format' => [210, 297] ]); //215, 330

$tanggal = explode(' ',$barang_masuk['tgl_brg_masuk']) ;
$tgl = $this->_Date->formatTanggal($tanggal[0]).' '.$tanggal[1] ;
$ref = $barang_masuk['kode_brg_masuk'] ;



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

    <div id="header-masuk">
        <table>
            <tr>
                <td valign="top">Tanggal</td>
                <td valign="top">:</td>
                <td valign="top" width="400px">'. $tgl.'</td>
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
                    Ke : <br> <br>
                    <b>'.$barang_masuk['nama_perusahaan'].'</b> <br> <br>
                    '.$barang_masuk['alamat'].' <br>
                    '.$barang_masuk['nama_kota'].' '.$barang_masuk['nama_prov'].' Indonesia <br><br><br>

                    Telepon : '.$barang_masuk['phone'].' <br>
                    Email : '.$barang_masuk['email'].'
                </td>
                <td valign="top" width="50%">
                    Dari : <br> <br>
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
                <th width=5%> No. </th>
                <th width=45%> Deskripsi </th>
                <th width=10%> Kuantitas </th>
                <th width=10%> Satuan </th>
            </tr> ';
            $no = 1 ;
            foreach($item_brg_masuk as $row) {
$html .= '
            <tr>
                <td align=center> '.$no++.' </td>
                <td> '.$row["nama_barang"].' </td>
                <td align=center> '.$row['jumlah_brg_masuk'].' </td>
                <td align=center> '.$row['nama_unit'].' </td>
            </tr> 
        ' ;
            }

$html .= '
        </table>
    </div>

    <br><br>

    <div id="tanda-tangan">
        Admin
        <br>
        <br>
        <br>
        <br>
        Stamp & Tanda Tangan
    </div>
        

    
</body>
</html>
' ;
$mpdf->SetHTMLFooter('Halaman {PAGENO}') ;
$mpdf->WriteHTML($html);
$mpdf->Output("$ref.pdf","I");

// echo($html) ;
?>