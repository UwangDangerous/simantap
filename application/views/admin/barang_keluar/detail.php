<div class="row">
    <div class="col-4">
        <b>PPPOMN-BMN</b> <br>
        Gudang BMN <br>
        Jalan Percetakan Negara Nomor 23 <br><br>

        Jakarta - 10560 - Indonesia <br><br>

        Telpon: +6221 4244691 <br>
        Email: ppid@pom.go.id
    </div>
    <div class="col-4"> 
        
            <b>Tanggal :  </b> <br>
            <?php $tanggal = explode(" ", $brg['tgl_brg_keluar']); ?>
            <?= $this->_Date->formatTanggal( $tanggal[0] ); ?> <?= $tanggal[1]; ?><br>
            <b>Referensi :  </b> <br>
            <?= $brg['kode_brg_keluar']; ?> <br>
            <?= $this->_Code->getBarcodeSVG($brg['kode_brg_keluar']); ?> 
       
    </div>
</div>
<br>

<div class="card p-2">
    <h4>Tambah Item</h4>
    <form action="<?= base_url();?>admin/barangMasuk/tambahItem/<?= $brg['id_brg_keluar'] ;?>" method='post'>
        <div class="row">
            <div class="col-md-3">
                <label for="kategori">Kategori</label>
                <?php $kategori = $this->db->get('kategori')->result_array() ; ?>

                <select name="kategori" id="kategori" class='form-control'>
                    <option value="">--pilih--</option>
                    <?php foreach ($kategori as $ktg) : ?>
                        <option value="<?= $ktg['id_ktg'] ;?>"> <?= $ktg['nama_ktg']; ?> </option>
                    <?php endforeach ; ?>
                </select>

            </div>
            <div class="col-md-7">
                <label for="flexibel">Barang</label>
                <select id="flexibel" name="id_barang" class="form-control" >
                    <option value="">-pilih -</option>
                    <?php foreach ($barang as $b) : ?>
                        <option class='<?= $b['id_ktg'];?>' value="<?= $b['id_barang'];?>"> <?= $b['nama_barang']; ?> </option>
                    <?php endforeach ; ?>
                </select>
            </div>

            <div class="col-md-2">
                <label for="jumlah_brg_keluar">Kuantitas</label>
                <input type="number" name="jumlah_brg_keluar" id="jumlah_brg_keluar" class='form-control'>
            </div>

            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        
    </form>
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

<br>
<div class="table-responsive">
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Kuantitas</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </tr>
            <?php $no=1 ; ?>
            <?php $total = 0; ?>
            <?php foreach ($item as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <?php $id = $row['id_brg_keluar_item']; ?>
                    <td><?= $row['nama_barang']; ?></td>
                    <td><?= $row['jumlah_brg_keluar']; ?></td>
                    <td><?= $row['nama_unit']; ?></td>
                    <td>
                        <a href="" class="badge badge-success" data-toggle='modal' data-target='#edit_item_<?= $id?>' data-toggle='tooltip' title='Ubah Item'><i class="fa fa-edit"></i></a>
                        <a href="<?= base_url(); ?>admin/barangMasuk/hapusItem/<?= $id; ?>/<?= $brg['id_brg_keluar'] ;?>" class="badge badge-danger" data-toggle='tooltip' title='Hapus Item' onclick='return confirm("Yakin hapus data ini?")'><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <!-- Modal Edit -->
                <div class="modal fade" id="edit_item_<?= $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url();?>admin/barangMasuk/ubahItem/<?= $id; ?>/<?= $brg['id_brg_keluar'];?>" method='post'>
                                <div class="modal-body">
                                    <label for="nama_barang">Deskripsi</label>
                                    <input type="text" id="nama_barang" class='form-control' disabled value="<?= $row['nama_barang'];?>">
                                    <label for="jumlah_brg_keluar_<?= $id;?>" class='mt-3'>Kuantitas</label>
                                    <input type="number" name="jumlah_brg_keluar_<?= $id;?>" id="jumlah_brg_keluar_<?= $id;?>" class='form-control' value="<?= $row['jumlah_brg_keluar'];?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>

            <?php endforeach ; ?>
        </thead>
    </table>

    <a href="<?= base_url(); ?>cetak/cetakBarangKeluar/<?= $brg['id_brg_keluar'] ; ?>" target="blank" class="btn btn-primary" data-toggle='tooltip' title='Cetak'><i class="fa fa-print"></i></a>
</div>

<script src="<?= base_url(); ?>assets/js/jquery-chained.min.js"></script>
<script>
    $(document).ready(function() {
        $("#flexibel").chained("#kategori");
    });
</script>