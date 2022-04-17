<a href="<?= base_url();?>perjalanan/tambah" class="btn btn-primary" data-toggle='tooltip' title='Tambah Perjalanan'>Tambah Perjalanan</i></a>

<div class="table-responsive mt-3">
    <table class="table table-sm table-bordered table-hover text-center" style='font-size:10pt'>
        <thead>
            <tr>
                <th>Perjalanan Dinas</th>
                <th>No. SPM</th>
                <th>Uang Harian</th>
                <th>Total SPJ</th>

                <th>Pelaksana</th>
                <th>Uang Representasi</th>

                <th>Transportasi</th>
                <th>Perusahaan</th>
                <th>Pergi/Pulang</th>
                <th>No. Tiket</th>
                <th>Kode Boking</th>
                <th>No. Penerbangan</th>
                <th>Tempat Asal</th>
                <th>Tempat Tujuan</th>
                <th>Tanggal Terbang</th>
                <th>Harga Tiket</th>

                <th>Nama Hotel</th>
                <th>Alamat Hotel</th>
                <th>No. Telp</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>No. Kamar</th>
                <th>No. Invoice</th>
                <th>Biaya hotel</th>
            </tr>
        </thead>
        <tbody style="overflow-y: scroll">
            <?php foreach ($perjalanan as $row) : ?>
                <?php $pelaksana = $this->Perjalanan_model->getDataPelaksana($row['kode_jalan']) ; ?>
                <?php if( count($pelaksana) > $jml_trans = $this->Perjalanan_model->getJumlahPerjalanan($row['kode_jalan'])) : ?>
                    <?php $jml_pelaksana = count($pelaksana) ; ?>
                <?php else : ?>
                    <?php $jml_pelaksana = $jml_trans ; ?>
                <?php endif ; ?>
                <tr>
                    <td rowspan=<?= $jml_pelaksana ;?>><?= $row['nama']; ?></td>
                    <td rowspan=<?= $jml_pelaksana ;?>><?= $row['noSpm']; ?></td>
                    <td rowspan=<?= $jml_pelaksana ;?>><?= $this->_Sesi->rupiah( $row['uang_harian'] ); ?></td>
                    <td rowspan=<?= $jml_pelaksana ;?>></td>
                    <?php if($pelaksana) : ?>
                        
                        <?php foreach ($pelaksana as $p) : ?>

                            <?php $transport = $this->Perjalanan_model->getDataTrans($p['kode_laksana']) ; ?>
                            
                            <?php $i = 1; ?>
                            <?php if($i == 1) : ?>
                                <td rowspan = <?= count($transport); ?>><?= $p['namaPelaksana']; ?></td>
                                <td rowspan = <?= count($transport); ?>><?= $p['uang_representasi']; ?></td>

                                <?php if($transport) : ?>
                                    
                                    <?php foreach ($transport as $trans) : ?>
                                                <td><?= $trans['namaTrans']; ?></td>
                                                <td><?= $trans['nama_maskapai']; ?></td>
                                                <td><?= $trans['pp']; ?></td>
                                                <td><?= $trans['no_tiket']; ?></td>
                                                <td><?= $trans['kode_boking']; ?></td>
                                                <td><?= $trans['no_pembayaran']; ?></td>
                                                <td><?= $trans['tempat_asal']; ?></td>
                                                <td><?= $trans['tempat_tujuan']; ?></td>
                                                <td><?= $this->_Date->formatTanggal( $trans['tgl_kepergian'] ); ?></td>
                                                <td><?= $this->_Sesi->rupiah( $trans['harga_tiket'] ); ?></td>
                                            </tr>
                                    <?php endforeach ; ?>

                                <?php else : ?>
                                    <td colspan=10><i class="text-danger">Data Kosong</i></td>
                                <?php endif ; ?>

                            </tr>
                            <?php else : ?>
                                <tr>
                                    <td><?= $p['namaPelaksana']; ?></td>
                                </tr>
                            <?php endif ; ?>
                            
                            <?php $i++ ; ?>
    
                        <?php endforeach ; ?>

                    <?php else : ?>
                        
                    <td colspan=12><i class="text-danger">Data Kosong</i></td>
                </tr>
                    <?php endif ; ?>
                    
               

                
            <?php endforeach ; ?>
        </tbody>
    </table>
</div>