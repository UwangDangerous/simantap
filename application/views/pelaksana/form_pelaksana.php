<div id="form-pelaksana">
    <div class="card p-3">
        <?php if(!empty($this->session->flashdata('pesan_pelaksana') )) : ?>
            
            <div class="alert alert-<?=  $this->session->flashdata('warna_pelaksana') ; ?> alert-dismissible fade show" role="alert">
                <?=  $this->session->flashdata('pesan_pelaksana'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
        <?php endif ; ?>

        <?php $pelaksana = $this->db->get_where('pelaksana',['kode_jalan' => $kode])->result_array(); ?>
        <ol>
            <?php if($pelaksana) : ?>
                <?php foreach ($pelaksana as $p) : ?>
                    <li>
                        <form action="" method='post' id='ubah-pelaksana-<?= $p['kode_laksana'];?>'>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="uang_representasi">Uang Representasi</label>
                                    <input type="number" name="uang_representasi" id="uang_representasi" class='form-control' placeholder='Tuliskan Tanpa Koma *(1000)' value='<?= $p['uang_representasi'] ;?>'>
                                </div>
                                <div class="col-md-8">

                                    <label for="namaPelaksana">Nama Pelaksana Perjalanan Dinas (TANPA GELAR AKADEMIK)</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Nama Pelaksana Perjalanan Dinas (TANPA GELAR AKADEMIK)" value='<?= $p['namaPelaksana'] ;?>' id='namaPelaksana' name='namaPelaksana'>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-success" type="submit" data-toggle='tooltip' title='Ubah Data'><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-outline-danger" type="button" id='hapus-pelaksana-<?= $p['kode_laksana'];?>' data-toggle='tooltip' title='Hapus Data'><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row mb-3">
                            <div class="col-lg-6 mb-3">
                                <div id="transport-<?= $p['kode_laksana']; ?>"></div> 
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div id="hotel-<?= $p['kode_laksana']; ?>"></div> 
                            </div>
                        </div>
                    </li>

                    <script>
                        $("#hapus-pelaksana-<?= $p['kode_laksana'];?>").click(function(e){
                            if(confirm("Hapus Data?")){
                                e.preventDefault();
                                $.ajax({
                                    url: '<?= base_url(); ?>pelaksana/hapus_pelaksana/<?= $kode;?>/<?= $p['kode_laksana'];?>',
                                    type: 'post',
                                    data: $(this).serialize(),             
                                    success: function(data) {
                                        $("#form-pelaksana").html(data) ;            
                                    }
                                });
                            }else{
                                return false;
                            }
                        });

                        $("#ubah-pelaksana-<?= $p['kode_laksana'];?>").submit(function(e){
                            if(confirm("Ubah Data?")){
                                e.preventDefault();
                                $.ajax({
                                    url: '<?= base_url(); ?>pelaksana/ubah_pelaksana/<?= $kode;?>/<?= $p['kode_laksana'];?>',
                                    type: 'post',
                                    data: $(this).serialize(),             
                                    success: function(data) {
                                        $("#form-pelaksana").html(data) ;            
                                    }
                                });
                            }else{
                                return false;
                            }
                        });


                        $("#transport-<?= $p['kode_laksana']; ?>").load("<?= base_url(); ?>pelaksana/transport/<?= $p['kode_laksana'];?>") ;
                        $("#hotel-<?= $p['kode_laksana']; ?>").load("<?= base_url(); ?>pelaksana/hotel/<?= $p['kode_laksana'];?>") ;
                        

                    </script>
                <?php endforeach ; ?>
                <li>
                    <form action="" method='post' id='simpan-pelaksana'>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="uang_representasi">Uang Representasi</label>
                                <input type="number" name="uang_representasi" id="uang_representasi" class='form-control' placeholder='Tuliskan Tanpa Koma *(1000)'>
                            </div>
                            <div class="col-lg-8">
                                <label for="namaPelaksana">Nama Pelaksana Perjalanan Dinas (TANPA GELAR AKADEMIK)</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="Nama Pelaksana" name='namaPelaksana' placeholder="Nama Pelaksana Perjalanan Dinas (TANPA GELAR AKADEMIK)">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
                
            <?php else : ?>
                
                <li>
                    <form action="" method='post' id='simpan-pelaksana'>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="uang_representasi">Uang Representasi</label>
                                <input type="number" name="uang_representasi" id="uang_representasi" class='form-control' placeholder='Tuliskan Tanpa Koma *(1000)'>
                            </div>
                            <div class="col-md-8">
                                <label for="namaPelaksana">Nama Pelaksana Perjalanan Dinas (TANPA GELAR AKADEMIK)</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="Nama Pelaksana" name='namaPelaksana' placeholder="Nama Pelaksana Perjalanan Dinas (TANPA GELAR AKADEMIK)">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>

            <?php endif ; ?> 
        </ol>
    
    </div>
</div>

<script>
    $("#simpan-pelaksana").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '<?= base_url(); ?>pelaksana/simpan_pelaksana/<?= $kode;?>',
            type: 'post',
            data: $(this).serialize(),             
            success: function(data) {
                $("#form-pelaksana").html(data) ;            
            }
        });
    });
</script>
