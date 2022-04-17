<div id="hotel-tambah-<?= $kode_laksana;?>">
    <div class="card p-2 mt-4">
        <h6>Tambah Hotel</h6>
        <form action="" method='post' id='hotel-simpan-<?= $kode_laksana;?>'>
            <label for="namaHotel">Nama Hotel</label>
            <input type="text" name="namaHotel" id="namaHotel" class='form-control mb-2'>
            <label for="alamatHotel">Alamat</label>
            <textarea name="alamatHotel" id="alamatHotel" cols="30" rows="6" class='form-control mb-2'></textarea>
            <label for="noTelp">No. Telepon Hotel</label>
            <input type="number" name="noTelp" id="noTelp" class='form-control mb-2'>
            <div class="row">
                <div class="col-md-6">
                    <label for="checkIn">Check In</label>
                    <input type="date" name="checkIn" id="checkIn" class='form-control mb-2'>
                </div>
                <div class="col-md-6">
                    <label for="checkOut">Check Out</label>
                    <input type="date" name="checkOut" id="checkOut" class='form-control mb-2'>
                </div>
            </div>
            <label for="noKamar">No. Kamar</label>
            <input type="text" name="noKamar" id="noKamar" class='form-control mb-2'>
            <label for="noInvoice">No. Invoice</label>
            <input type="text" name="noInvoice" id="noInvoice" class='form-control mb-2'>
            <label for="biaya_hotel">Biaya Hotel</label>
            <input type="number" name="biaya_hotel" id="biaya_hotel" class='form-control mb-2'>
            
            <button class="btn btn-primary" type='submit'>Simpan</button>
        </form>
    </div>
</div> 

<script>
    $("#hotel-simpan-<?= $kode_laksana;?>").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '<?= base_url(); ?>pelaksana/simpan_hotel/<?= $kode_laksana;?>',
            type: 'post',
            data: $(this).serialize(),             
            success: function(data) {
                $("#hotel-<?= $kode_laksana;?>").html(data) ;            
            }
        });
    }) ;
</script>