<div class="card p-3">
    <div class="row">
        <div class="col">
            <a href="<?= base_url(); ?>user/barang/tambah" class="btn btn-primary">Buat Permintaan Barang</a>
        </div>
        <br>
        <br>
    </div>

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
        <table class="table table-bordered table-hover text-center table-sm" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Referensi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ; ?>
                <?php foreach ($brg_keluar as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <?php $tanggal = explode(" ", $row['tgl_brg_keluar'] ); ?>
                            <?= $this->_Date->formatTanggal( $tanggal[0] ); ?> <?= $tanggal[1]; ?>
                        </td>
                        <td><?= $row['kode_brg_keluar']; ?></td>
                        <td>
                            <?php if($row['status'] == 1) : ?>
                                <span class="text-success">Diterima</span>
                            <?php elseif($row['status'] == 2) : ?>
                                <span class="text-danger">Ditolak</span>
                            <?php else : ?>
                                <span class="text-warning">Menunggu Konfirmasi</span>
                            <?php endif ; ?>
                        </td>
                        <td></td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>