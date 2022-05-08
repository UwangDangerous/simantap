<div class="card p-3">
    <div class="row">
        <div class="col">
            <a href="<?= base_url();?>admin/BarangMasuk/aksi" class="btn btn-primary">Tambah Data</a>
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
    
    <div class="table-responsive">
        <table class="table table-sm table-bordered table-hover text-center" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Tanggal Barang Masuk</th>
                    <th>Pemasok</th>
                    <th width='5px'>Berkas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($brg as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['kode_brg_masuk']; ?></td>
                        <td>
                            <?php
                                $tgl = explode(" ",$row['tgl_brg_masuk']); 
                                echo $this->_Date->formatTanggal($tgl[0]) ;
                            ?>
                        </td>
                        <td><?= $row['nama_perusahaan']; ?></td>
                        <td><a href="<?= base_url();?>berkas/<?= $row['berkas'];?>" class="badge badge-secondary" target='blank' data-toggle='tooltip' title='Tampilkan Berkas'><i class="fa fa-file"></i></a></td>
                        <td>
                            <!-- <a href="" class="badge badge-primary" data-toggle='modal' data-target='#detail_<?//= $row['id_brg_masuk'];?>' data-toggle='tooltip' title='Tampilkan Rincian'><i class="fa fa-eye"></i></a> -->
                            <a href="<?= base_url();?>admin/BarangMasuk/detail/<?= $row['id_brg_masuk'];?>" class="badge badge-primary" data-toggle='tooltip' title='Tampilkan Rincian'><i class="fa fa-eye"></i></a>
                            <a href="<?= base_url();?>admin/BarangMasuk/hapus/<?= $row['id_brg_masuk'];?>" class="badge badge-danger" data-toggle='tooltip' title='Hapus Data' onclick='return confirm("Yakin hapus data ini?")'><i class="fa fa-trash"></i></a>
                            <a href="<?= base_url();?>cetak/cetakBarangMasuk/<?= $row['id_brg_masuk'];?>" class="badge badge-warning" data-toggle='tooltip' title='Cetak' target='blank'><i class="fa fa-print"></i></a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
    
</div>
