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
                                <span class="text-success">Selesai</span>
                            <?php else : ?>
                                <span class="text-warning">Prosess</span>
                            <?php endif ; ?>
                        </td>
                        <td>
                            <a href="" class="badge badge-primary" data-toggle="modal" data-target="#modal_detail_<?= $row['id_brg_keluar']; ?>" data-toggle='tooltip' title='Tampilkan Rincian'><i class="fa fa-eye"></i></a>
                            <?php if($row['status'] == 0) : ?>
                                <a href="" class="badge badge-success" data-toggle='tooltip' title='Ubah Data'><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url(); ?>user/barang/hapus/<?= $row['id_brg_keluar'];?>" class="badge badge-danger" data-toggle='tooltip' title='Hapus Data' onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i></a>
                            <?php endif ; ?>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="modal_detail_<?= $row['id_brg_keluar']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Rincian Permintaan No. <?= $row['id_brg_keluar']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row col-8">
                                Tanggal:    <?php $tanggal = explode(" ", $row['tgl_brg_keluar'] ); ?> <?= $this->_Date->formatTanggal( $tanggal[0] ); ?> <?= $tanggal[1]; ?>
                                <br>
                                No. Referensi : <?= $row['kode_brg_keluar']; ?> <br><br>
                            </div>
                            <div id="detail_<?= $row['id_brg_keluar'];?>"></div>
                            <script>$("#detail_<?= $row['id_brg_keluar'];?>").load("<?= base_url();?>user/barang/tabelDetail/<?= $row['id_brg_keluar'];?>")</script>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url();?>cetak/cetakBarangKeluar/<?= $row['id_brg_keluar'];?>" target='blank' class="btn btn-warning" data-toggle='tooltip' title='Cetak Nota Permintaan Barang'><i class="fa fa-print"></i></a>
                        </div>
                        </div>
                    </div>
                    </div>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>