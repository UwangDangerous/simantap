<div class="card p-3">
    <form action="" method="post">
        <label for="kode_barang">Kode Produk</label>
        <input type="text" name="kode_barang" id="kode_barang" class='form-control col-form-label-sm' placeholder="Kode Produk" autocomplete='off' value="<?= $kode; ?>">
        <small class="form-text text-danger"><?= form_error('kode_barang'); ?></small>
        
        <label for="nama_barang">Nama Produk</label>
        <input type="text" name="nama_barang" id="nama_barang" class='form-control col-form-label-sm' placeholder="Nama Produk" autocomplete='off' value="<?= set_value("nama_barang"); ?>">
        <small class="form-text text-danger"><?= form_error('nama_barang'); ?></small>

        <label for="id_ktg">Kategori</label>
        <select name="id_ktg" id="id_ktg" class='form-control'>
            <option value="">--pilih--</option>
            <?php foreach ($ktg as $k) : ?>
                <?php if(set_value("id_ktg") == $k['id_ktg']) : ?>
                    <option selected value="<?= $k['id_ktg'];?>"> <?= $k['id_ktg']; ?> </option>
                <?php else : ?>
                    <option value="<?= $k['id_ktg'];?>"> <?= $k['nama_ktg']; ?> </option>
                <?php endif ; ?>
            <?php endforeach ; ?>
        </select>
        <small class="form-text text-danger"><?= form_error('id_ktg'); ?></small>

        <label for="id_unit">Unit</label>
        <select name="id_unit" id="id_unit" class='form-control'>
            <option value="">--pilih--</option>
            <?php foreach ($unit as $u) : ?>
                <?php if(set_value("id_unit") == $u['id_unit']) : ?>
                    <option selected value="<?= $u['id_unit'];?>"> <?= $u['id_unit']; ?> </option>
                <?php else : ?>
                    <option value="<?= $u['id_unit'];?>"> <?= $u['nama_unit']; ?> </option>
                <?php endif ; ?>
            <?php endforeach ; ?>
        </select>
        <small class="form-text text-danger"><?= form_error('id_unit'); ?></small>

        <br>
        <button class="btn btn-primary" type='submit'> Simpan </button>
    </form>
</div>