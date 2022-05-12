<div class="card p-3">
    <div class="accordion" id="accordionExample">
        <div class="card"> <!-- brg masuk -->
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fa fa-print"></i> 
                    </button> Laporan Barang Masuk
                </h5>
            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="<?= base_url();?>cetak/cetakLaporanBarangMasuk" method="post" target="blank">
                        <h5><label for="">Periode</label></h5>
                        <div class="input-group mb-3">
                            <span class='input-group-text'>Dari</span>
                            <input type="date" class="form-control" name='tgl1'>
                            <span class='input-group-text'>Sampai</span>
                            <input type="date" class="form-control" name='tgl2'>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fa fa-print"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card"> <!-- brg keluar -->
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fa fa-print"></i> 
                    </button> Laporan Barang Keluar
                </h5>
            </div>

            <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="<?= base_url();?>cetak/cetakLaporanBarangKeluar" method="post" target="blank">
                        <h5><label for="">Periode</label></h5>
                        <div class="input-group mb-3">
                            <span class='input-group-text'>Dari</span>
                            <input type="date" class="form-control" name='tgl1'>
                            <span class='input-group-text'>Sampai</span>
                            <input type="date" class="form-control" name='tgl2'>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fa fa-print"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-sm table-striped table-bordered text-center" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($barang as $row) : ?>
                    <?php $stok = $this->BarangKeluar_model->getStok($row['id_barang']) ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $stok[0]; ?></td>
                        <td><?= $stok[1]; ?></td>
                        <td><?= $stok[2]; ?></td>
                        <td><?= $row['nama_unit']; ?></td>
                        <td><?= $row['nama_ktg']; ?></td>
                        <td>
                            <a href="<?= base_url();?>admin/stok/detail/<?= $row['id_barang'];?>" class="badge badge-primary" data-toggle='tooltip' title='Rincian'><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>