<div class="card mb-3  text-white bg-primary"> <!-- text-white bg-primary -->
    <div class="card-header"><h5>Cek Ketersediaan Barang</h5></div>
    <div class="card-body">

        <form action="" method='post' id='cek_stok'>
            <div class="row">
                <div class="col-md-3">
                    <select name="kategori" id="kategori" class='form-control'>
                        <option value="">--Kategori--</option>
                        <?php foreach ($kategori as $ktg) : ?>
                            <option value="<?= $ktg['id_ktg'] ;?>"> <?= $ktg['nama_ktg']; ?> </option>
                        <?php endforeach ; ?>
                    </select>

                </div>
                <div class="col-md-6">
                    <select id="flexibel" name="id_barang" class="form-control" >
                        <option value="">--Barang--</option>
                        <?php foreach ($barang as $b) : ?>
                            <option class='<?= $b['id_ktg'];?>' value="<?= $b['id_barang'];?>"> <?= $b['nama_barang']; ?> </option>
                        <?php endforeach ; ?>
                    </select>
                </div>

                <div class="col-md-1">
                    <button class='btn btn-primary' type="submit"><i class="fa fa-search"></i></button>
                </div>
            

                <div class="col-md-2">
                    <h5><div id="hasil_cek_stok">Tersedia</div></h5>
                </div>
            </div>
        </form>

    </div>
</div>


<?php if($this->session->userdata('kunci') == 1) : ?>
    
    <div class="row text-center">


        <div class="col-md-3">
            <a href="<?= base_url();?>admin/kategori" style="text-decoration:none" data-toggle='tooltip' title='Kategori'>
                <div class="card bg-warning text-white mb-3">
                    <div class="card-body">
                        <h5><i class="fa fa-folder"></i> Kategori</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?= base_url();?>admin/unit" style="text-decoration:none" data-toggle='tooltip' title='Unit'>
                <div class="card bg-warning text-white mb-3">
                    <div class="card-body">
                        <h5><i class="fa fa-wrench"></i> Unit</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?= base_url();?>admin/perusahaan" style="text-decoration:none" data-toggle='tooltip' title='Pemasok'>
                <div class="card bg-warning text-white mb-3">
                    <div class="card-body">
                        <h5><i class="fa fa-user-tie"></i> Pemasok</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?= base_url();?>admin/sdm" style="text-decoration:none" data-toggle='tooltip' title='User'>
                <div class="card bg-warning text-white mb-3">
                    <div class="card-body">
                        <h5><i class="fa fa-users"></i> User</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?= base_url();?>admin/produk" style="text-decoration:none" data-toggle='tooltip' title='Daftar Produk'>
                <div class="card bg-danger text-white mb-3">
                    <div class="card-body">
                        <h5><i class="fab fa-dropbox"></i> Daftar Produk</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?= base_url();?>admin/barangMasuk" style="text-decoration:none" data-toggle='tooltip' title='Barang Masuk'>
                <div class="card bg-danger text-white mb-3">
                    <div class="card-body">
                        <h5><i class="fas fa-cart-plus"></i> Barang Masuk</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?= base_url();?>admin/barangKeluar" style="text-decoration:none" data-toggle='tooltip' title='Barang Keluar'>
                <div class="card bg-danger text-white mb-3">
                    <div class="card-body">
                        <h5><i class="fas fa-shopping-cart"></i> Barang Keluar</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?= base_url();?>admin/kuali" style="text-decoration:none" data-toggle='tooltip' title='Laporan Alat Gelas Kualitatif'>
                <div class="card bg-success text-white mb-3">
                    <div class="card-body">
                        <h5><i class="fa fa-vial"></i> Alat Gelas Kualitatif</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?= base_url();?>admin/kuanti" style="text-decoration:none" data-toggle='tooltip' title='Laporan Alat Gelas Kuantitatif'>
                <div class="card bg-success text-white mb-3">
                    <div class="card-body">
                        <h5><i class="fas fa-filter"></i> Alat Gelas Kuantitatif</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?= base_url();?>admin/stok" style="text-decoration:none" data-toggle='tooltip' title='Kartu Stok'>
                <div class="card bg-success text-white mb-3">
                    <div class="card-body">
                        <h5><i class="fas fa-money-bill-alt"></i> Kartu Stok</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <div class="card mb-3  text-white bg-primary"> <!-- text-white bg-primary -->
        <div class="card-header">
            <h5>
                <?php if($permintaan > 0) : ?>
                    <a href="<?= base_url();?>admin/barangKeluar" class="badge badge-danger"><?= $permintaan; ?> </a>
                <?php endif ; ?>
                Permintaan Barang Baru
            </h5>
        </div>
    </div>

<?php else : ?>
    <div class="text-center">
        <div class="row">
            <div class="col-md-4">
                <a href="<?= base_url();?>user/barang" style="text-decoration:none" data-toggle='tooltip' title='Permintaan Barang'>
                    <div class="card bg-warning text-white mb-3">
                        <div class="card-body">
                            <h5><i class="fa fa-fas fa-shopping-cart"></i> Permintaan Barang</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url();?>user/ag_kualitatif" style="text-decoration:none" data-toggle='tooltip' title='Alat Gelas Kualitatif'>
                    <div class="card bg-danger text-white mb-3">
                        <div class="card-body">
                            <h5><i class="fa fa-vial"></i> Alat Gelas Kualitatif</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url();?>user/ag_kuantitatif" style="text-decoration:none" data-toggle='tooltip' title='Alat Gelas Kuantitatif'>
                    <div class="card bg-success text-white mb-3">
                        <div class="card-body">
                            <h5><i class="fas fa-filter"></i> Alat Gelas Kuantitatif</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
<?php endif ; ?>




<script>
    $("#cek_stok").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '<?= base_url(); ?>home/cari_stok',
            type: 'post',
            data: $(this).serialize(),     
            success: function(data) {               
                $('#hasil_cek_stok').html(data) ;      
            }
        });
    });
</script>






<script src="<?= base_url(); ?>assets/js/jquery-chained.min.js"></script>
<script>
    $(document).ready(function() {
        $("#flexibel").chained("#kategori");
    });
</script>