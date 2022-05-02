<div class="card p-3">
    <?php if(!empty($this->session->flashdata('pesan') )) : ?>
                    
        <div class="alert alert-<?= $this->session->flashdata('warna') ;?> alert-dismissible fade show" role="alert">
            <?=  $this->session->flashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <br>

    <?php endif ; ?>

    <form action="" method="post">
        <label for="nama">Kategori</label>
        <input type="text" name="nama" id="nama" class='form-control col-form-label-sm' placeholder="Kategori" autocomplete='off' value='<?= $unit['nama_unit'];?>'>
        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
        <br>
        <button class="btn btn-primary" type='submit'> Ubah </button>
    </form>
</div>