<div class="card p-3">
    <form action="" method="post">
        <label for="nama">Nama Rak</label>
        <input type="text" name="nama" id="nama" class='form-control col-form-label-sm' placeholder="" autocomplete='off'>
        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
        <br>
        <button class="btn btn-primary" type='submit'> Simpan </button>
    </form>
</div>