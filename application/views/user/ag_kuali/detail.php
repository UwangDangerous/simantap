<div class="card p-3">

    <h4><?= $judul_detail; ?></h4> <br>

    <div class="accordion" id="accordionExample">
    
        <div class="card"> <!-- hilang -->
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#hilang" aria-expanded="false" aria-controls="hilang">
                        <i class="fas fa-angle-down"></i>
                    </button>
                    <button class="btn btn-outline-primary"data-toggle="modal" data-target="#modal_tambah_hilang" data-toggle='tooltip' title="Tambah Laporan Barang Hilang" aria-expanded="false" aria-controls="hilang">
                        <i class="fa fa-plus"></i>
                    </button>
                    Barang Hilang
                </h5>
            </div>
            <div id="hilang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover text-center" id="tabel_hilang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($hilang as $h) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $h['jumlah_alat']; ?></td>
                                        <td><?= $this->_Date->formatTanggal( $h['tanggal'] ); ?></td>
                                        <td><?= $h['keterangan']; ?></td>
                                    </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card"> <!-- rusak -->
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#rusak" aria-expanded="false" aria-controls="rusak">
                        <i class="fas fa-angle-down"></i>
                    </button>
                    <button class="btn btn-outline-primary"data-toggle="modal" data-target="#modal_tambah_rusak" data-toggle='tooltip' title="Tambah Laporan Barang Rusak / Pecah" aria-expanded="false" aria-controls="hilang">
                        <i class="fa fa-plus"></i>
                    </button>
                    Barang Rusak / Pecah
                </h5>
            </div>
            <div id="rusak" class="collapse" aria-labelledby="rusak" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover text-center" id="tabel_rusak">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Gambar</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($rusak as $r) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $r['jumlah_alat']; ?></td>
                                        <td><?= $this->_Date->formatTanggal( $r['tanggal'] ); ?></td>
                                        <td><a href="foto" class="badge badge-primary" data-toggle="tooltip" title="Tampilkan Foto Bukti"><i class="fa fa-eye"></i></a></td>
                                        <td><?= $r['keterangan']; ?></td>
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
    $("#tabel_hilang").dataTable();
    $("#tabel_rusak").dataTable();
</script>


<!-- Modal Tambah Hilang -->
    <div class="modal fade" id="modal_tambah_hilang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan Barang Hilang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url();?>user/ag_kualitatif/tambah/<?= $id;?>/1" method="post">
                    <div class="modal-body">
                        <label for="jumlah_alat">Jumlah Barang</label>
                        <input type="number" name="jumlah_alat" id="jumlah_alat" class='form-control'>
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="5" class='form-control'></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal Tambah Hilang -->

<!-- Modal Tambah Rusak -->
    <div class="modal fade" id="modal_tambah_rusak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan Barang Rusak / Pecah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url();?>user/ag_kualitatif/tambah/<?= $id;?>/2" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label for="jumlah_alat">Jumlah Barang</label>
                        <input type="number" name="jumlah_alat" id="jumlah_alat" class='form-control'>
                        <label for="gambar">Foto Bukti</label>
                        <input type="file" name="gambar" id="gambar" class='form-control'>
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="5" class='form-control'></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal Tambah Rusak -->

