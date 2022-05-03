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
                        <td>
                            <a href="" class="badge badge-primary" data-toggle='modal' data-target='#detail_<?= $row['id_brg_masuk'];?>' data-toggle='tooltip' title='Tampilkan Rincian'><i class="fa fa-eye"></i></a>
                            <a href="<?= base_url();?>admin/BarangMasuk/aksi/<?= $row['id_brg_masuk'];?>" class="badge badge-success" data-toggle='tooltip' title='Ubah Data'><i class="fa fa-edit"></i></a>
                            <a href="<?= base_url();?>admin/BarangMasuk/hapus/<?= $row['id_brg_masuk'];?>" class="badge badge-danger" data-toggle='tooltip' title='Hapus Data' onclick='return confirm("Yakin hapus data ini?")'><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="detail_<?= $row['id_brg_masuk'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Rincian Pembelian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-4">
                                    <b><?= $row['nama_perusahaan']; ?></b> <br>
                                    <?= $row['alamat']; ?>
                                    <br>
                                    <?= $row['pos']; ?><br>
                                    <?= $row['nama_kota']; ?>
                                    <?= $row['nama_prov']; ?> Indonesia
                                    <br>
                                    Telepon : <?= $row['phone']; ?> <br>
                                    Email : <?= $row['email']; ?>
                                </div>
                                <div class="col-4">
                                    <b>PPPOMN-BMN</b> <br>
                                    Gudang BMN <br>
                                    Jalan Percetakan Negara Nomor 23 <br><br>

                                    Jakarta - 10560 - Indonesia <br><br>

                                    Telpon: +6221 4244691 <br>
                                    Email: ppid@pom.go.id
                                </div>
                                <div class="col-4">
                                    test
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>