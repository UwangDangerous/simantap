<div class="card p-3">
    <div id="sesi"></div>
    <form action="" method='post' class='myform' id='simpan-perjalanan'>
        <h3>Tambah Perjalanan Dinas</h3>
        <?php 
            $kode = substr(md5(date('Y-m-d H:i:s')),1,5) ; 
        ?>

        <input type="hidden" name='kode' value='<?= $kode; ?>'>

        <label for="nama">Maksud Perjalanan Dinas <b>*</b></label>
        <textarea name="nama" id="nama" cols="30" rows="5" class='form-control mb-3'></textarea>

        <label for="noSpm">No. SPM <b>*</b></label>
        <input type="text" name="noSpm" id="noSpm" class='form-control mb-3'>
        
        <label for="uang_harian">Uang Harian <b>*</b></label>
        <input type="number" name="uang_harian" id="uang_harian" class='form-control mb-3' placeholder='tuliskan tanpa koma (10000)'>

        <button class='btn btn-primary' type='submit' id='btn-simpan-perjalanan'>Simpan</button>
        <button class='btn btn-primary' type='button' id='tambah-pelaksana'>Tambah Pelaksana</button>
        <div id="form-pelaksana"> </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        $("#tambah-pelaksana").hide();
        
        $("#simpan-perjalanan").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '<?= base_url(); ?>perjalanan/simpan_perjalanan',
                type: 'post',
                data: $(this).serialize(),             
                success: function(data) {               
                    $('#sesi').html(data) ;
                    $("#btn-simpan-perjalanan").hide();
                    $("#tambah-pelaksana").show();
                }
            });
        });
    
        $("#tambah-pelaksana").click(function(){
            $("#form-pelaksana").load('<?= base_url();?>pelaksana/formPelaksana/<?= $kode; ?>') ;
        });
    });
</script>