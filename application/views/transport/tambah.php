<div id="transport-<?= $kode_laksana;?>">
    <div class="card p-2 mt-4">
        <h6>Tambah Transportasi</h6>
        <form action="" method='post' id='tambah-trans'>
            <label for="kendaraan-tambah">Kendaraan</label>
            <select name="kendaraan" id="kendaraan-tambah" class='form-control'>
                <?php foreach ($kendaraan as $k) : ?>
                    <option value="<?= $k['idTrans'];?>"><?= $k['namaTrans'];?></option>
                <?php endforeach ; ?>
            </select>
            <label for="harga_tiket">Biaya / Harga Tiket</label>
            <input type="number" name="harga_tiket" id="harga_tiket" class='form-control' placeholder='tuliskan tanpa koma *(1000)'>
            <div id="input-kendaraan-tambahan"></div>
            <button class="btn btn-primary mt-3" type='submit'>Simpan</button>
    
        </form>
    </div>

    <script>
        $("#kendaraan-tambah").change(function(){
            if($("#kendaraan-tambah").val() > 2) {
                $("#input-kendaraan-tambahan").html(`
                    <label for="nama_maskapai">Nama Perusahaan</label>
                    <input type="text" name="nama_maskapai" id="nama_maskapai" class='form-control'>

                    <label for="no_tiket">No. Tiket</label>
                    <input type="text" name="no_tiket" id="no_tiket" class='form-control'>

                    <label for="kode_boking">Kode Boking</label>
                    <input type="text" name="kode_boking" id="kode_boking" class='form-control'>

                    <label for="no_pembayaran">No. Pembayaran</label>
                    <input type="text" name="no_pembayaran" id="no_pembayaran" class='form-control'>

                    <label for="tempat_asal">Tempat Asal</label>
                    <input type="text" name="tempat_asal" id="tempat_asal" class='form-control'>

                    <label for="tempat_tujuan">Tempat Tujuan</label>
                    <input type="text" name="tempat_tujuan" id="tempat_tujuan" class='form-control'>

                    <label for="tempat_tujuan">Pulang / Pergi</label>
                    <select name="tempat_tujuan" id="tempat_tujuan" class='form-control'>
                        
                        <?php foreach($pp as $p) : ?>
                            <option value="<?= $p ; ?>"><?= $p ; ?></option>
                        <?php endforeach ; ?>
                        
                    </select>
                `);
            }else{
                $("#input-kendaraan-tambahan").html('');
            }
        });

        $("#tambah-trans").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '<?= base_url(); ?>pelaksana/simpan_transport/<?= $kode_laksana;?>',
                type: 'post',
                data: $(this).serialize(),             
                success: function(data) {
                    $("#transport-<?= $kode_laksana;?>").html(data) ;            
                }
            });
        }) ;
    </script>
    
</div>