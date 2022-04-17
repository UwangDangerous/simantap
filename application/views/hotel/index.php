<div id='hotel-<?= $p['kode_laksana']; ?>'>

    <?php if(!empty($this->session->flashdata('pesan_hotel') )) : ?>
            
        <div class="alert alert-<?=  $this->session->flashdata('warna_hotel') ; ?> alert-dismissible fade show" role="alert">
            <?=  $this->session->flashdata('pesan_hotel'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
    <?php endif ; ?>
    
    <div class="card p-2">
        <h5>
            Penginapan
            <button class="btn btn-outline-primary" type="button" id="hotel-show-<?= $kode_laksana;?>" data-toggle='tooltip' title='Tambah Data Hotel'><i class="fa fa-plus"></i></button>
        </h5>

        <?php if($hotel) : ?>
            <div class='table-responsive'>
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>Nama Hotel</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Biaya Hotel</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php foreach ($hotel as $h) : ?>
                        <tr>
                            <td><?= $h['namaHotel']; ?></td>
                            <td><?= $h['checkIn']; ?></td>
                            <td><?= $h['checkOut']; ?></td>
                            <td><?= $h['biaya_hotel']; ?></td>
                            <td>
                                <a href="" class="badge badge-danger" data-toggle='tooltip' title='Hapus Data' id='hotel-hapus-<?= $h['idHotel'];?>'><i class="fa fa-trash"></i></a>
                                <a href="" class="badge badge-primary"><i class="fa fa-info"></i></a>
                            </td>
                        </tr>

                        <script>
                            $("#hotel-hapus-<?= $h['idHotel'];?>").click(function(e){
                                if(confirm("Hapus Data Hotel?")) {
                                    e.preventDefault();
                                    $.ajax({
                                        url: '<?= base_url(); ?>pelaksana/hapus_hotel/<?= $kode_laksana;?>/<?= $h['idHotel'];?>',
                                        type: 'post',
                                        data: $(this).serialize(),             
                                        success: function(data) {
                                            $("#hotel-<?= $kode_laksana;?>").html(data) ;            
                                        }
                                    });
                                }else{
                                    return false ;
                                }
                            }) ;
                        </script>
                    <?php endforeach ; ?>
                </table>
            </div class='table-responsive'>
        <?php else : ?>
            <i class="text-danger">Data Kosong</i>
        <?php endif ; ?>
        <div id="hotel-tambah-<?= $kode_laksana;?>"></div>
    </div>
</div>

<script>
    $("#hotel-show-<?= $kode_laksana;?>").click(function(){
        $("#hotel-tambah-<?= $kode_laksana;?>").load("<?= base_url();?>pelaksana/tambah_hotel/<?= $kode_laksana;?>") ;
    });
</script>