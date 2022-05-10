<div class="card p-3">
    <form action="" method='post' id="form-tambah-brg-keluar">
        <div class="row">
            <div class="col-md-4">
                <label for="tgl_brg_keluar">Tanggal<i class="text-danger">*</i></label>
                <input type="date" name="tgl_brg_keluar" id="tgl_brg_keluar" class='form-control'>
            </div>
            <div class="col-md-8">
                <label for="kode_brg_keluar">No. Referensi <i class="text-danger">*</i></label>
                <input type="text" name="kode_brg_keluar" id="kode_brg_keluar" class='form-control' value="BMN_ITEM_OUT<?= date("Y/m").'/'.substr(md5(date("Y-m-d G:i:s")), 0,4) ; ?>">
            </div>
        </div> <br>
        <div id="tombol_item">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
</div>


<script>
    $("#form-tambah-brg-keluar").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '<?= base_url(); ?>user/barang/tambahBarangKeluar/<?= $idNext; ?>',
            type: 'post',
            data: $(this).serialize(),     
            success: function(data) {               
                $('#tombol_item').html(data) ;      
            }
        });
    });
</script>