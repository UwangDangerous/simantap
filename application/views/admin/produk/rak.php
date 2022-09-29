<div class="card p-3">
    <form action="" method="post">
        <label for="rak">Pilih Rak</label>
        <select name="rak" id="rak" class="form-control">
            <option value="">--pilih--</option>
            <?php foreach ($rak as $r) : ?>
                <?php if($use->row_array()['id_rak'] == $r['id_rak'] ) : ?>
                    <option selected value="<?= $r['id_rak'] ; ?>"><?= $r['nama_rak']; ?></option>
                <?php else : ?>
                    <option value="<?= $r['id_rak'] ; ?>"><?= $r['nama_rak']; ?></option>
                <?php endif ; ?>
            <?php endforeach ; ?>
        </select>
        <small class="form-text text-danger"><?= form_error('rak'); ?></small>
        <br>
        <button class="btn btn-primary" type='submit'> Simpan </button>
    </form>
</div>