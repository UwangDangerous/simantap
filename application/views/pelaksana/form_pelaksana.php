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
                <?php foreach ($pelaksana as $l) : ?>
                    <li>
                        <form action="" method='post'>
                            <label for="namaPelaksana">Nama Pelaksana Perjalanan Dinas (TANPA GELAR AKADEMIK)</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nama Pelaksana Perjalanan Dinas (TANPA GELAR AKADEMIK)">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="submit" data-toggle='tooltip' title='Ubah Data'><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-outline-primary" type="button" data-toggle='tooltip' title='Tambah Transportasi'><i class="fa fa-car"></i></button>
                                    <button class="btn btn-outline-primary" type="button" data-toggle='tooltip' title='Tambah Penginapan'><i class="fa fa-hotel"></i></button>
                                </div>
                            </div>
                        </form>
                    </li>
                <?php endforeach ; ?>
                <li>
                    <form action="" method='post' id='simpan-pelaksana'>
                        <label for="namaPelaksana">Nama Pelaksana Perjalanan Dinas (TANPA GELAR AKADEMIK)</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="Nama Pelaksana" name='namaPelaksana' placeholder="Nama Pelaksana Perjalanan Dinas (TANPA GELAR AKADEMIK)">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
                
            <?php else : ?>
                
                <li>
                    <form action="" method='post' id='simpan-pelaksana'>
                        <label for="namaPelaksana">Nama Pelaksana Perjalanan Dinas (TANPA GELAR AKADEMIK)</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="Nama Pelaksana" name='namaPelaksana' placeholder="Nama Pelaksana Perjalanan Dinas (TANPA GELAR AKADEMIK)">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </form>
                </li>

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
        
            <?php endif ; ?> 
        </ol>
    
    </div>
</div>
