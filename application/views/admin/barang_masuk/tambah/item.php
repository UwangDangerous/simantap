<div id="tambah_barang_masuk">

    <?php if(!empty($this->session->flashdata('pesan_tambah_item') )) : ?>
                        
        <div class="alert alert-<?= $this->session->flashdata('warna_tambah_item') ;?> alert-dismissible fade show" role="alert">
            <?=  $this->session->flashdata('pesan_tambah_item'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <br>

    <?php endif ; ?>
    <h3>
        Item Pemesanan
        <a href='#' class='badge badge-primary' id="segarkan" data-toggle='tooltip' title='segarkan'><i class="fa fa-sync"></i></a>
    </h3> 
    
    <form action="" method='post' id='form_tambah_item'>
        <div class="row">
            <div class="col-md-6">
                <label for="flexibel1">Barang</label>
                <select id="flexibel1" name="id_barang" class="form-control" >
                    <option value="">-pilih -</option>
                    <?php foreach ($barang as $b) : ?>
                        <option value="<?= $b['id_barang'];?>"> <?= $b['nama_barang']; ?> </option>
                    <?php endforeach ; ?>
                </select>
            </div>

            <div class="col-md-2">
                <label for="jumlah_brg_masuk">Jumlah Barang Masuk</label>
                <input type="number" name="jumlah_brg_masuk" id="jumlah_brg_masuk" class='form-control'>
            </div>
            
            <div class="col-md-4">
                <label for="harga_satuan">Harga Satuan</label>
                <div class="input-group mb-3">
                    <input type="number" name="harga_satuan" id="harga_satuan" class='form-control' placeholder="ketik tanpa koma/titk">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2">Simpan</button>
                    </div>
                </div>
                
            </div>

            <div id="total_hidden"></div>

        </div>
    </form>

    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>QTY</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            <?php $total = 0 ?>
            <tbody>
                <?php foreach ($item as $i) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['nama_barang']; ?></td>
                        <td><?= $i['jumlah_brg_masuk']; ?> ( <?= $i['nama_unit']; ?> )</td>
                        <td><?= $this->_Date->rupiah( $i['harga_satuan'] ); ?></td>
                        <td><?= $this->_Date->rupiah( $i['subtotal'] ); ?></td>
                        <?php $total += $i['subtotal'] ; ?>
                        <td><a href="#" id='form_hapus_item<?= $i['id_brg_masuk_item'];?>' data-toggle='tooltip' title='Hapus Item' class="badge badge-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>

                    <script>
                        $("#form_hapus_item<?= $i['id_brg_masuk_item'];?>").click(function(e){
                            if(confirm("Hapus Item?")){
                                e.preventDefault();
                                $.ajax({
                                    url: '<?= base_url(); ?>admin/barangMasuk/hapusItemBarang/<?= $id ;?>/<?= $i['id_brg_masuk_item'];?>/<?= $total;?>/<?= $i['subtotal'];?>',
                                    type: 'post',
                                    data: $(this).serialize(),             
                                    success: function(data) {               
                                        $('#tombol_item').html(data) ;      
                                    }
                                });
                            }else{
                                return false;
                            }
                        }) ;
                    </script>
                <?php endforeach ; ?>
                <tr>
                    <th colspan=4>Total</th>
                    <th><?= $this->_Date->rupiah( $total ); ?></th>
                    <th>-</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<a href="<?= base_url();?>cetak/cetakBarangMasuk/<?= $id;?>" target='blank' data-toggle='tooltip' title='Cetak PDF' class="btn btn-primary"><i class="fa fa-print"></i></a>

<script>
    $("#segarkan").click(function(){
        $("#tombol_item").load("<?= base_url();?>admin/barangMasuk/tambahItemBarang/<?= $id; ?>") ;
    });

    $("#form_tambah_item").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '<?= base_url(); ?>admin/barangMasuk/simpanItemBarang/<?= $id; ?>',
            type: 'post',
            data: $(this).serialize(),             
            success: function(data) {               
                // document.getElementById("form_tambah_item").reset();
                $('#tombol_item').html(data) ;      
            }
        });
    }) ;

    $("#total_hidden").html(`<input type="hidden" name='total' value='<?= $total ;?>'>`) ;
</script>



<script>
    $(document).ready(function () {
        $("#flexibel1").select2({
            theme: 'bootstrap4',
            placeholder: "--Pilih--"
        });
    });
</script>