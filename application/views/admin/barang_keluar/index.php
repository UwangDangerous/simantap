<div class="card p-3">
    <div class="accordion" id="accordionExample">
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
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
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
                    <th>No Referensi</th>
                    <th>Tanggal Barang Keluar</th>
                    <th>Konsumen</th>
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
                            <a href="" class="badge badge-primary" data-toggle="tooltip" title="Rincian"><i class="fa fa-eye"></i></a>
                            <a href="" class="badge badge-success" data-toggle="tooltip" title="Ubah Data"><i class="fa fa-edit"></i></a>
                            <a href="" class="badge badge-danger" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash"></i></a>
                            <a href="" class="badge badge-warning" data-toggle="tooltip" title="Cetak PDF"><i class="fa fa-print"></i></a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
    
</div>
