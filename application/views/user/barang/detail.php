<div class="table-responsive">
    <table class="table table-sm table-bordered table-hover text-center">
        <thead>
            <tr>
                <th rowspan='2' class='align-middle'>No</th>
                <th rowspan='2' class='align-middle'>Nama Barang</th>
                <th colspan='2'>Jumlah</th>
                <th rowspan='2' class='align-middle'>satuan</th>
                <th rowspan='2' class='align-middle'>Kategori</th>
            </tr>
            <tr>
                <th>Diminta</th>
                <th>Terima</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($item as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_barang']; ?></td>
                    <td><?= $row['jumlah_brg_keluar']; ?></td>
                    <td><?= $row['konfirmasi']; ?></td>
                    <td><?= $row['nama_unit']; ?></td>
                    <td><?= $row['nama_ktg']; ?></td>
                </tr>
            <?php endforeach ; ?>
        </tbody>
    </table>
</div>