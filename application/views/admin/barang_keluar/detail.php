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
    <div class="col-4">
        <?php if($brg['status']==1) : ?>
            <i class="text-success">Transaksi Selesai</i>
        <?php endif ; ?>
    </div>
</div>
<br>

<div class="card p-2">
    <h4>Tambah Item</h4>
    <form action="<?= base_url();?>admin/barangKeluar/tambahItem/<?= $brg['id_brg_keluar'] ;?>" method='post'>
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
    <table class="table table-sm table-bordered table-hover text-center">
        <thead>
            <tr>
                <th class="align-middle" rowspan="2">No</th>
                <th class="align-middle" rowspan="2">Deskripsi</th>
                <th class="align-middle" colspan="2">Kuantitas</th>
                <th class="align-middle" rowspan="2">Satuan</th>
                <th class="align-middle" rowspan="2">Aksi</th>
            </tr>
            <tr>
                <th class="align-middle">Diminta</th>
                <th class="align-middle">Konfiramasi</th>
            </tr>
            <?php $no=1 ; ?>
            <?php $total = 0; ?>
            <form action="<?= base_url(); ?>admin/barangKeluar/konfirmasi/<?= $brg['id_brg_keluar'];?>" method="post">
                <?= $id_array = ''; ?>
                <?php foreach ($item as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <?php $id = $row['id_brg_keluar_item']; ?>
                        <?php $id_array .= $id.'|'; ?>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['jumlah_brg_keluar']; ?></td>
                        <td>
                            <?php if($row['konfirmasi'] == 0) : ?>
                                <input type="number" name="konfirmasi_<?= $id;?>" value="<?= $row['jumlah_brg_keluar'];?>" class="form-control" style="width:100px; margin:auto">
                            <?php else : ?>
                                <?= $row['konfirmasi']; ?>
                            <?php endif ; ?>
                        </td>
                        <td><?= $row['nama_unit']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/barangKeluar/hapusItem/<?= $id; ?>/<?= $brg['id_brg_keluar'] ;?>" class="badge badge-danger" data-toggle='tooltip' title='Hapus Item' onclick='return confirm("Yakin hapus data ini?")'><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
    
                <?php endforeach ; ?>

                <?php if($brg['status']==0) : ?>
                    
                    <?php if($item) : ?>
                        <tr>
                            <input type="hidden" name='id_array' value="<?= trim($id_array,"|") ;?>">
                            <th colspan=3></th>
                            <th> <button type="submit" class="btn btn-primary" onclick="return confirm('Data Sudah Benar ?');">Konfirmasi</button> </th>
                            <th colspan=2></th>
                        </tr>
                    <?php endif ; ?>

                <?php endif ; ?>
            </form>
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