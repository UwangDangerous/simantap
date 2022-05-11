<div class="table-responsive">
    <table class="table table-sm table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($item as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_barang']; ?></td>
                    <td><?= $row['jumlah_brg_keluar']; ?> <?= $row['nama_unit']; ?></td>
                    <td><?= $row['nama_ktg']; ?></td>
                </tr>
            <?php endforeach ; ?>
        </tbody>
    </table>
</div>