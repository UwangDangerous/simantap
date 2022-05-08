<div class="card p-3">
    <form action="" method="post" enctype="multipart/form-data" id='tambah_barang_masuk'>
        <div class="row">
            <div class="col-md-12">
                <div id="pemasok">
                    <label for="flexibel">Pemasok</label>
                    <div class="row">
                        <div class="col-10">
                            <select id="flexibel" name="id_perusahaan" class="form-control" >
                                <?php foreach ($pemasok as $p) : ?>
                                    <option value="<?= $p['id_perusahaan'];?>"> <?= $p['nama_perusahaan']; ?> </option>
                                <?php endforeach ; ?>
                            </select>
                        </div>
                        <div class="col-2">
                            <a href='<?= base_url();?>admin/perusahaan' data-toggle='tooltip' title='Tambah Pemasok' class="btn btn-outline-primary" id="button-addon2"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="tgl_brg_masuk">Tanggal <i class="text-danger">*</i></label>
                <input type="date" name="tgl_brg_masuk" id="tgl_brg_masuk" class='form-control'>
            </div>
            <div class="col-md-4">
                <label for="kode_brg_masuk">No Referensi <i class="text-danger">*</i></label>
                <input type="text" name="kode_brg_masuk" id="kode_brg_masuk" class='form-control' value="PO<?= date("Y/m/").''.substr(md5(date("Y-m-d G:i:s")),0,4); ?>">
            </div>
            <div class="col-md-4">
                <label for="berkas">Lampirkan Dokumen</label>
                <input type="file" name="berkas" id="berkas" class='form-control'>
            </div>
            
            <div class="col-md-12">
                <label for="note">Catatan</label>
                <textarea name="note" id="note" cols="10" rows="3" placeholder="catatan" class='form-control'></textarea>
            </div>
        </div>
        <input type="hidden" name='id_brg_masuk' value='<?= $idNext ; ?>'>

        <br>
        <div id="tombol_item">
            <button class="btn btn-primary" type='submit'> Simpan </button>
        </div>
    </form>

    <br><br>

</div>

<script>
    $("#tambah_barang_masuk").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '<?= base_url(); ?>admin/barangMasuk/tambahBarangMasuk/<?= $idNext; ?>',
            type: 'post',
            data: new FormData(this), //ajax untuk upload
            processData:false,
            contentType:false,
            cache:false, 
            async:false, //ajax untuk upload            
            success: function(data) {               
                $('#tombol_item').html(data) ;      
            }
        });
    });
</script>