<div class="card p-3">
    <form action="" method="post">
        <label for="kode">Kode Perusahaan</label>
        <input type="text" name="kode" id="kode" class='form-control col-form-label-sm' placeholder="Kode Perusahaan" autocomplete='off' value="<?= $prsh['kode_perusahaan']; ?>">
        <small class="form-text text-danger"><?= form_error('kode'); ?></small>
        <label for="nama">Nama Perusahaan</label>
        <input type="text" name="nama" id="nama" class='form-control col-form-label-sm' placeholder="Nama Perusahaan" autocomplete='off' value="<?= $prsh['nama_perusahaan']; ?>" >
        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
        <label for="timy">Alamat</label>
        <textarea name="alamat" id="timy" cols="10" rows="5" class='form-control'><?= $prsh['alamat']; ?></textarea>
        <small class="form-text text-danger"><?= form_error('alamat'); ?></small>

        <div class="row">
            <div class="col-md-6">
                <label for="provinsi">Provinsi</label>
                <select name="provinsi" id="provinsi" class="form-control">
                    <option value="">--pilih--</option>
                    <?php foreach ($provinsi as $p) : ?>

                        <?php if($p['id_prov'] == $prsh['id_prov']) : ?>
                            <option selected value="<?= $p['id_prov'];?>"><?= $p['nama_prov']; ?> </option>
                        <?php else : ?>
                            <option value="<?= $p['id_prov'];?>"><?= $p['nama_prov']; ?> </option>
                        <?php endif ; ?>

                    <?php endforeach ; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('provinsi'); ?></small>
            </div>

            <div class="col-md-6">
                <label for="kota">Kabupaten / Kota</label>
                <select name="kota" id="kota" class="form-control" value="<?= set_select('kota');?>">
                    <option value="">--pilih--</option>
                    <?php foreach ($kota as $k) : ?>
                        <?php if($k['id_kota'] == $prsh['kota']) : ?>
                            <option selected value="<?= $k['id_kota'];?>" class='<?= $k['id_prov'];?>'> <?= $k['nama_kota']; ?> </option>
                        <?php else : ?>
                            <option value="<?= $k['id_kota'];?>" class='<?= $k['id_prov'];?>'> <?= $k['nama_kota']; ?> </option>
                        <?php endif ; ?>
                    <?php endforeach ; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('kota'); ?></small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="pos">Kode Pos</label>
                <input type="number" name="pos" id="pos" class='form-control col-form-label-sm' placeholder="Kode Pos" autocomplete='off' value="<?= $prsh['pos']; ?>" >
                <small class="form-text text-danger"><?= form_error('pos'); ?></small>
            </div>
            <div class="col-md-4">
                <label for="telp">No Telepon</label>
                <input type="number" name="telp" id="telp" class='form-control col-form-label-sm' placeholder="No Telepon" autocomplete='off' value="<?= $prsh['phone']; ?>" >
                <small class="form-text text-danger"><?= form_error('telp'); ?></small>
            </div>
            <div class="col-md-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class='form-control col-form-label-sm' placeholder="Email" autocomplete='off' value="<?= $prsh['email']; ?>" >
                <small class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
        </div>

        <br>
        <button class="btn btn-primary" type='submit'> Ubah </button>
    </form>
</div>