<div class="card p-3">
    <form action="" method="post">
        <label for="nama_depan">Nama Depan</label>
        <input type="text" name="nama_depan" id="nama_depan" class='form-control col-form-label-sm' placeholder="Nama Depan" autocomplete='off' value="<?= set_value("nama_depan"); ?>">
        <small class="form-text text-danger"><?= form_error('nama_depan'); ?></small>
        <label for="nama_blakang">Nama Belakang</label>
        <input type="text" name="nama_blakang" id="nama_blakang" class='form-control col-form-label-sm' placeholder="Nama Belakang" autocomplete='off' value="<?= set_value("nama_blakang"); ?>">
        <small class="form-text text-danger"><?= form_error('nama_blakang'); ?></small>
        <label for="email">Email / Username</label>
        <input type="email" name="email" id="email" class='form-control col-form-label-sm' placeholder="Email / Username" autocomplete='off' value="<?= set_value("email"); ?>">
        <small class="form-text text-danger"><?= form_error('email'); ?></small>
        <br>
        <button class="btn btn-primary" type='submit'> Simpan </button>
    </form>
</div>