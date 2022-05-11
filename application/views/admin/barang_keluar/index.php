<div class="card p-3">
    <!-- <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-angle-down"></i>
                    </button>
                </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
    <br> -->

    <?php if(!empty($this->session->flashdata('pesan') )) : ?>
                    
        <div class="alert alert-<?= $this->session->flashdata('warna') ;?> alert-dismissible fade show" role="alert">
            <?=  $this->session->flashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <br>

    <?php endif ; ?>
    
    <div class="table-responsive">
        <table class="table table-sm table-bordered table-hover text-center" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Referensi</th>
                    <th>Tanggal Barang Keluar</th>
                    <th>Konsumen</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($brg as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['kode_brg_keluar']; ?></td>
                        <?php $tanggal = explode(" ", $row['tgl_brg_keluar']) ; ?>
                        <td><?= $this->_Date->formatTanggal( $tanggal[0] ); ?> <?= $tanggal[1]; ?></td>
                        <td><?= $row['nama_blakang']; ?></td>
                        <td>
                            <?php if($row['status'] == 1) : ?>
                                <i class="text-success">Selesai</i>
                            <?php else : ?>
                                <i class="text-warning">Menunggu Konfirmasi</i>
                            <?php endif ; ?>
                        </td>
                        <td>
                            <a href="<?= base_url();?>admin/barangKeluar/detail/<?= $row['id_brg_keluar']; ?>" class="badge badge-primary" data-toggle="tooltip" title="Rincian"><i class="fa fa-eye"></i></a>
                            <a href="<?= base_url();?>admin/barangKeluar/hapus/<?= $row['id_brg_keluar']; ?>" class="badge badge-danger" data-toggle="tooltip" title="Hapus Data" onclick="return confirm('Yakin Hapus ?')"><i class="fa fa-trash"></i></a>
                            <a target="blank" href="<?= base_url();?>cetak/cetakBarangKeluar/<?= $row['id_brg_keluar']; ?>" class="badge badge-warning" data-toggle="tooltip" title="Cetak PDF"><i class="fa fa-print"></i></a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
    
</div>
