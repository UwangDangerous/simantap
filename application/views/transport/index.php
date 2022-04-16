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

