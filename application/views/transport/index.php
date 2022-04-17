<div id="transport-<?= $kode_laksana;?>">

    <?php if(!empty($this->session->flashdata('pesan_trans') )) : ?>
            
        <div class="alert alert-<?=  $this->session->flashdata('warna_trans') ; ?> alert-dismissible fade show" role="alert">
            <?=  $this->session->flashdata('pesan_trans'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
    <?php endif ; ?>
    
    <div class="card p-2">
        <h5>
            Transportasi 
            <button class="btn btn-outline-primary" type="button" id="trans-show-<?= $kode_laksana;?>" data-toggle='tooltip' title='Tambah Transportasi'><i class="fa fa-plus"></i></button>
        </h5>
        <?php if($transportasi) : ?> 
            
            <table-responsive>
                <table class="table table-sm table-bordered table-striped text-center" id="tabel" style="font-size:10pt">
                    <thead>
                        <tr>
                            <th>Transportasi</th>
                            <th>Perusahaan</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Tanggal</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transportasi as $t) : ?>
                            <tr>
                                <td><?= $t['namaTrans']; ?></td>
                                <td><?= $t['nama_maskapai']; ?></td>
                                <td><?= $t['tempat_asal']; ?></td>
                                <td><?= $t['tempat_tujuan']; ?></td>
                                <td><?= $this->_Date->formatTanggal($t['tgl_kepergian']) ?></td>
                                <td><?= $t['harga_tiket']; ?></td>
                                <td>
                                    <a href="" class="badge badge-danger" id='hapus-trans-<?= $t['idUT'];?>' data-toggle='tooltip' title='Hapus Data?'><i class="fa fa-trash"></i></a>
                                    <a href="" class="badge badge-primary" data-toggle='modal' data-target="#detail-trans-<?= $t['idUT'];?>" data-toggle='tooltip' title='Detail'><i class="fa fa-info"></i></a>
                                </td>
                            </tr>

                            <script>
                                $("#hapus-trans-<?= $t['idUT'];?>").click(function(e){
                                    if(confirm("Hapus Data?")) {
                                        e.preventDefault();
                                        $.ajax({
                                            url: '<?= base_url(); ?>pelaksana/hapus_trans/<?= $kode_laksana;?>/<?= $t['idUT'];?>',
                                            type: 'post',
                                            data: $(this).serialize(),             
                                            success: function(data) {
                                                $("#transport-<?= $kode_laksana;?>").html(data) ;            
                                            }
                                        });
                                    }else{
                                        return false ;
                                    }
                                }) ;
                            </script>

                            <!-- detail -->
                            <div class="modal fade" id="detail-trans-<?= $t['idUT'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Transportasi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                                <span class='text-hitam'>Transportasi</span>  : <?= $t['namaTrans']; ?> <br>

                                                <?php if($t['idTrans'] > 2) : ?>
                                                    
                                                    <span class='text-hitam'>Perusahaan</span> : <?= $t['nama_maskapai']; ?> <br>
                                                    <span class='text-hitam'>Tempat Asal</span> : <?= $t['tempat_asal']; ?> <br>
                                                    <span class='text-hitam'>Tempat Tujuan</span> : <?= $t['tempat_tujuan']; ?> <br>
                                                    <span class='text-hitam'>No. Tiket</span> : <?= $t['no_tiket']; ?> <br>
                                                    <span class='text-hitam'>Kode Boking</span> : <?= $t['kode_boking']; ?> <br>
                                                    <span class='text-hitam'>No. Pembayaran</span> : <?= $t['no_pembayaran']; ?> <br>
                                                    <?php if($t['pp'] == "Pergi") : ?>
                                                        Pergi / <del>Pulang</del> <br>
                                                    <?php else : ?>
                                                        Pulang / <del>Pergi</del> <br>
                                                    <?php endif ; ?>

                                                <?php endif ; ?>

                                                <span class='text-hitam'>Tangal</span> : <?= $this->_Date->formatTanggal( $t['tgl_kepergian'] ); ?> <br>
                                                <span class='text-hitam'>Harga Tiket / Biaya</span> : <?= $t['harga_tiket']; ?>
                                                
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ; ?>
                    </tbody>
                </table>
            </table-responsive>

        <?php else : ?>
            <i class="text-danger">Data Kosong</i>
        <?php endif ; ?>
        
        <div id="tambah-transport-<?= $kode_laksana; ?>"></div>
    </div>


    <script>
        $("#trans-show-<?= $kode_laksana;?>").click(function(){
            $("#tambah-transport-<?= $kode_laksana; ?>").load("<?= base_url(); ?>pelaksana/model_tambah_transport/<?= $kode_laksana;?>") ;
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


<!-- 	idUTU	idTrans	kode_laksana	nama_maskapai	no_tiket	kode_boking	no_pembayaran	tempat_asal	tujuan	tgl_terbang	harga_tiket
 -->

