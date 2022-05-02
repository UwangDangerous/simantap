<div class="card p-3">
    <form action="" method="post">
        <label for="code">Kode Kategori</label>
        <input type="text" name="code" id="code" class='form-control col-form-label-sm' placeholder="Kode Kategori" autocomplete='off'>
        <small class="form-text text-danger"><?= form_error('code'); ?></small>
        <label for="nama">Kategori</label>
        <input type="text" name="nama" id="nama" class='form-control col-form-label-sm' placeholder="Kategori" autocomplete='off'>
        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
        <br>
        <button class="btn btn-primary" type='submit'> Simpan </button>
    </form>
</div>