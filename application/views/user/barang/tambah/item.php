<div id="tombol_item">
    <?php if(!empty($this->session->flashdata('pesan') )) : ?>
                        
        <div class="alert alert-<?= $this->session->flashdata('warna') ;?> alert-dismissible fade show" role="alert">
            <?=  $this->session->flashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <br>

    <?php endif ; ?>
    <h3>
        Item Permintaan Barang
        <button class="btn btn-primary" type="button" data-toggle='tooltip' title='Segarkan' id="tombol-refresh-segarkan"><i class="fa fa-sync"></i></button>
    </h3>
    <form action="" method="post" id="tambahItemBarang">
        <div class="row">
            <div class="col-md-8">
                <label for="flexibel1">Barang</label>
                <select id="flexibel1" name="id_barang" class="form-control" >
                    <option value="">-pilih -</option>
                    <?php foreach ($barang as $b) : ?>
                        <option value="<?= $b['id_barang'];?>"> <?= $b['nama_barang']; ?> </option>
                    <?php endforeach ; ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="jumlah_brg_keluar">Jumlah Barang</label>
                <input type="text" name="jumlah_brg_keluar" id="jumlah_brg_keluar" class='form-control'>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <div class="table-responsive mt-3">
        <table class="table table-sm table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>QTY</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach ($item as $i) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['nama_barang']; ?></td>
                        <td><?= $i['jumlah_brg_keluar']; ?> <?= $i['nama_unit']; ?></td>
                        <td>
                            <a href="" class="badge badge-danger" id="hapusItemBarang" data-toggle='tooltip' title='ubah hapus'><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    <script>
                        $("#hapusItemBarang").click(function (e){
                            if(confirm("hapus data?")){
                                    e.preventDefault();
                                    $.ajax({
                                        url: '<?= base_url(); ?>user/barang/hapusItemKeluar/<?= $id; ?>/<?= $i['id_brg_keluar_item']; ?>',
                                        type: 'post',
                                        data: $(this).serialize(),             
                                        success: function(data) {               
                                            $('#tombol_item').html(data) ;      
                                        }
                                    });
                            }else{
                                return false;
                            }
                        });
                    </script>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $("#tombol-refresh-segarkan").click(function(){
        $("#tombol_item").load("<?= base_url();?>user/barang/tampilItemBarang/<?= $id;?>")
    });

    $("#tambahItemBarang").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '<?= base_url(); ?>user/barang/simpanItemKeluar/<?= $id; ?>',
            type: 'post',
            data: $(this).serialize(),     
            success: function(data) {               
                $('#tombol_item').html(data) ;      
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#flexibel1").select2({
            theme: 'bootstrap4',
            placeholder: "--Pilih--"
        });
    });
</script>