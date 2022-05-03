<div class="card p-3">
    <div class="row">
        <div class="col">
            <a href="<?= base_url();?>admin/produk/aksi" class="btn btn-primary">Tambah Data</a>
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
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Unit</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($produk as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td> <?= $row['kode_barang']; ?> </td>
                        <td> <?= $row['nama_barang']; ?> </td>
                        <td> <?= $row['nama_unit']; ?> </td>
                        <td> <?= $row['nama_ktg']; ?> </td>
                        <td>
                            <a href="<?= base_url();?>admin/produk/aksi/<?= $row['id_barang'];?>" class="badge badge-success" data-toggle='tooltip' title='Ubah Data'><i class="fa fa-edit"></i></a>
                            <a href="<?= base_url();?>admin/produk/hapus/<?= $row['id_barang'];?>" class="badge badge-danger" data-toggle='tooltip' title='Hapus Data' onclick='return confirm("Yakin hapus data ini?")'><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>