<div class="card p-3">
    <div class="row">
        <div class="col">
            <a href="<?= base_url();?>admin/perusahaan/aksi" class="btn btn-primary">Tambah Data</a>
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
        <table class="table table-bordered table-hover text-center" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Perusahaan</th>
                    <th>Nama Perusahaan</th>
                    <th>Kota</th>
                    <th>No Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($perusahaan as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['kode_perusahaan']; ?></td>
                        <td><?= $row['nama_perusahaan']; ?></td>
                        <td><?= $row['nama_kota']; ?></td>
                        <td><?= $row['phone']; ?></td>
                        <td>
                            <a href="<?= base_url();?>admin/perusahaan/aksi/<?= $row['id_perusahaan'];?>" class="badge badge-success" data-toggle='tooltip' title='Ubah Data'><i class="fa fa-edit"></i></a>
                            <a href="<?= base_url();?>admin/perusahaan/hapus/<?= $row['id_perusahaan'];?>" class="badge badge-danger" data-toggle='tooltip' title='Hapus Data' onclick='return confirm("Yakin hapus data ini?")'><i class="fa fa-trash"></i></a>
                            <a href="" class="badge badge-info" data-toggle='modal' data-target='#detail_<?= $row['id_perusahaan'];?>' data-toggle='tooltip' title='Rincian'><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="detail_<?= $row['id_perusahaan'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Lengkap <?= $row['nama_perusahaan'];?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-3">Alamat</div>
                                <div class="col-9"><?= $row['alamat']; ?></div>
                                <div class="col-3">Kota</div>
                                <div class="col-9"><?= $row['nama_kota']; ?></div>
                                <div class="col-3">Provinsi</div>
                                <div class="col-9"><?= $row['nama_prov']; ?></div>
                                <div class="col-3">Pos</div>
                                <div class="col-9"><?= $row['pos']; ?></div>
                                <div class="col-3">Email</div>
                                <div class="col-9"><?= $row['email']; ?></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        </div>
                        </div>
                    </div>
                    </div>

                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>