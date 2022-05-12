<div class="card p-3">
    <?php $user = $this->session->userdata('kunci'); ?>
    <h4>Rincian Alat Gelas Kualitatif</h4> <br>
    <div class="row">
        <div class="col">
            <table cellpadding="5" style="font-size:14pt">
                <tr>
                    <th>Nama Barang</th>
                    <th>:</th>
                    <td><?= $judul_detail; ?></td>
                </tr>
                <tr>
                    <th>Dari Gudang BMN</th>
                    <th>:</th>
                    <td><?= $n =  $this->AlatGelas_model->getNormal($id , $user); ?></td>
                </tr>
                <tr>
                    <th>Hilang</th>
                    <th>:</th>
                    <td><?= $h =  $this->AlatGelas_model->getHilang($id , $user); ?></td>
                </tr>
                <tr>
                    <th>Ditemukan</th>
                    <th>:</th>
                    <td><?= $k =  $this->AlatGelas_model->getKetemu($id , $user); ?></td>
                </tr>
                <tr>
                    <th>Rusak / Pecah</th>
                    <th>:</th>
                    <td><?= $r =  $this->AlatGelas_model->getRusak($id , $user); ?></td>
                </tr>
                <tr>
                    <th>Alat Gelas Keluar</th>
                    <th>:</th>
                    <td><?= $p =  $this->AlatGelas_model->getPindah($id); ?></td>
                </tr>
                <tr>
                    <th>Alat Gelas Masuk</th>
                    <th>:</th>
                    <td><?= $pm =  $this->AlatGelas_model->getPindahMasuk($id); ?></td>
                </tr>
                <tr>
                    <th>Total Alat Gelas Normal Tersedia </th>
                    <th>:</th>
                    <?php 
                        $total = $n - $h ;
                        $total += $k ;
                        $total -= $r ;
                        $total -= $p ;
                        $total += $pm ;
                    ?>
                    <td><?= $total  ?></td>
                </tr>
            </table>
        </div>
    </div>
    <br>

    <?php if(!empty($this->session->flashdata('pesan') )) : ?>
                    
        <div class="alert alert-<?= $this->session->flashdata('warna') ;?> alert-dismissible fade show" role="alert">
            <?=  $this->session->flashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <br>

    <?php endif ; ?>

    <div class="accordion" id="accordionExample">
    
        <div class="card"> <!-- hilang -->
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#hilang" aria-expanded="false" aria-controls="hilang">
                        <i class="fas fa-angle-down"></i>
                    </button>
                    <button class="btn btn-outline-primary"data-toggle="modal" data-target="#modal_tambah_hilang" data-toggle='tooltip' title="Tambah Laporan Barang Ketemu" aria-expanded="false" aria-controls="hilang">
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
                                    <th>Aksi</th>
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
                                        <td><a href="<?= base_url();?>user/ag_kualitatif/hapus/<?= $id;?>/<?= $h['id_alat'];?>" class="badge badge-danger" data-toggle='tooltip' title="hapus data" onclick="return confirm('Yakin Hapus Data?')"> <i class="fa fa-trash"></i> </a></td>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($rusak as $r) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $r['jumlah_alat']; ?></td>
                                        <td><?= $this->_Date->formatTanggal( $r['tanggal'] ); ?></td>
                                        <td><a href="<?= base_url();?>foto_upload/<?= $r['gambar'];?>" class="badge badge-primary" data-toggle="tooltip" title="Tampilkan Foto Bukti"><i class="fa fa-eye"></i></a></td>
                                        <td><?= $r['keterangan']; ?></td>
                                        <td><a href="<?= base_url();?>user/ag_kualitatif/hapus/<?= $id;?>/<?= $r['id_alat'];?>" class="badge badge-danger" data-toggle='tooltip' title="hapus data" onclick="return confirm('Yakin Hapus Data?')"> <i class="fa fa-trash"></i> </a></td>
                                    </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card"> <!-- ditemukan -->
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#ketemu" aria-expanded="false" aria-controls="ketemu">
                        <i class="fas fa-angle-down"></i>
                    </button>
                    <button class="btn btn-outline-primary"data-toggle="modal" data-target="#modal_tambah_ketemu" data-toggle='tooltip' title="Tambah Laporan Barang Ditemukan" aria-expanded="false" aria-controls="ketemu">
                        <i class="fa fa-plus"></i>
                    </button>
                    Barang Ditemukan
                </h5>
            </div>
            <div id="ketemu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover text-center" id="tabel_ketemu">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($ketemu as $k) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $k['jumlah_alat']; ?></td>
                                        <td><?= $this->_Date->formatTanggal( $k['tanggal'] ); ?></td>
                                        <td><?= $k['keterangan']; ?></td>
                                        <td><a href="<?= base_url();?>user/ag_kualitatif/hapus/<?= $id;?>/<?= $k['id_alat'];?>" class="badge badge-danger" data-toggle='tooltip' title="hapus data" onclick="return confirm('Yakin Hapus Data?')"> <i class="fa fa-trash"></i> </a></td>
                                    </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card"> <!-- pindah -->
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#pindah" aria-expanded="false" aria-controls="pindah">
                        <i class="fas fa-angle-down"></i>
                    </button>
                    <button class="btn btn-outline-primary"data-toggle="modal" data-target="#modal_tambah_pindah" data-toggle='tooltip' title="Tambah Laporan Barang Ketemu" aria-expanded="false" aria-controls="pindah">
                        <i class="fa fa-plus"></i>
                    </button>
                    Alat Gelas Keluar Ke Balai
                </h5>
            </div>
            <div id="pindah" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover text-center" id="tabel_pindah">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Balai</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pindah as $p) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $p['nama_blakang']; ?></td>
                                        <td><?= $p['jumlah_pindah']; ?></td>
                                        <td><?= $this->_Date->formatTanggal( $p['tgl_pindah'] ); ?></td>
                                        <td><?= $p['keterangan']; ?></td>
                                        <td><a href="<?= base_url();?>user/ag_kualitatif/hapus/<?= $id;?>/<?= $p['id_agp'];?>" class="badge badge-danger" data-toggle='tooltip' title="hapus data" onclick="return confirm('Yakin Hapus Data?')"> <i class="fa fa-trash"></i> </a></td>
                                    </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card"> <!-- pindah Masuk -->
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#pindahMasuk" aria-expanded="false" aria-controls="pindahMasuk">
                        <i class="fas fa-angle-down"></i>
                    </button>
                    Alat Gelas Masuk Ke Balai
                </h5>
            </div>
            <div id="pindahMasuk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover text-center" id="tabel_pindahMasuk">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Balai</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pindahMasuk as $pm) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $pm['nama_blakang']; ?></td>
                                        <td><?= $pm['jumlah_pindah']; ?></td>
                                        <td><?= $this->_Date->formatTanggal( $pm['tgl_pindah'] ); ?></td>
                                        <td><?= $pm['keterangan']; ?></td>
                                        <td><a href="<?= base_url();?>user/ag_kualitatif/hapus/<?= $id;?>/<?= $pm['id_agp'];?>" class="badge badge-danger" data-toggle='tooltip' title="hapus data" onclick="return confirm('Yakin Hapus Data?')"> <i class="fa fa-trash"></i> </a></td>
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
    $("#tabel_ketemu").dataTable();
    $("#tabel_pindah").dataTable();
    $("#tabel_pindahMasuk").dataTable();
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
                        <i class="text-danger">* FIle JPG,PNG</i> <br>
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

<!-- Modal Tambah Ketemu -->
    <div class="modal fade" id="modal_tambah_ketemu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan Barang Ditemukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url();?>user/ag_kualitatif/tambah/<?= $id;?>/3" method="post">
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
<!-- Modal Tambah Ketemu -->

<!-- Modal Tambah Pindah -->
    <div class="modal fade" id="modal_tambah_pindah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan Barang Diminta / Pindah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url();?>user/ag_kualitatif/pindah/<?= $id;?>/21" method="post">
                    <div class="modal-body">
                        <label for="user2">Dari <?= $this->session->userdata('nama_user');?> Ke </label>
                        <select name="user2" id="user2" class='form-control'>
                            <?php foreach ($balai as $b) : ?>
                                <option value="<?= $b['id_user'];?>"><?= $b['nama_depan']; ?> <?= $b['nama_blakang']; ?></option>
                            <?php endforeach ; ?>
                        </select>
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
<!-- Modal Tambah Pindah -->