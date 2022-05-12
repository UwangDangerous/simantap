<div class="card p-3">
    <div class="row">
        <div class="col">
            <table cellpadding=3 style="font-size:14pt">
                <tr>
                    <th>Nama Barang</th>
                    <th>:</th>
                    <td><?= $judul_halaman['nama_barang']; ?></td>
                </tr>
                <tr>
                    <th>Jumlah Barang Masuk</th>
                    <th>:</th>
                    <td><?= $stok[0]; ?> <?= $judul_halaman['nama_unit']; ?></td>
                </tr>
                <tr>
                    <th>Jumlah Barang Keluar</th>
                    <th>:</th>
                    <td><?= $stok[1]; ?> <?= $judul_halaman['nama_unit']; ?></td>
                </tr>
                <tr>
                    <th>Stok Barang Tersedia</th>
                    <th>:</th>
                    <td><?= $stok[2]; ?> <?= $judul_halaman['nama_unit']; ?></td>
                </tr>
            </table>
        </div>
    </div>

    <br>

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-angle-down"></i>
                    </button> Riwayat Barang Masuk
                </h5>
            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center" id="tabel-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tangaal</th>
                                    <th>Pemasok</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($masuk as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?php $tanggal = explode(" ",$row['tgl_brg_masuk']) ; ?>
                                            <?= $this->_Date->formatTanggal($tanggal[0]); ?> <?= $tanggal[1]; ?>
                                        </td>
                                        <td><?= $row['nama_perusahaan']; ?></td>
                                        <td><?= $row['jumlah_brg_masuk']; ?></td>
                                    </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fas fa-angle-down"></i> 
                    </button> Riwayat Barang Keluar
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center" id="tabel-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tangaal</th>
                                    <th>Pemasok</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($keluar as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?php $tanggal = explode(" ",$row['tgl_brg_keluar']) ; ?>
                                            <?= $this->_Date->formatTanggal($tanggal[0]); ?> <?= $tanggal[1]; ?>
                                        </td>
                                        <td><?= $row['nama_blakang']; ?></td>
                                        <td><?= $row['jumlah_brg_keluar']; ?></td>
                                    </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#tabel-1").dataTable() ;
</script>