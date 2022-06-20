<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-sm table-striped table-bordered text-center" id="tabel">
            <thead>
                <tr>
                    <th class='align-middle'>No</th>
                    <th class='align-middle'>Nama Barang</th>
                    <th class='align-middle'>Stok BMN</th>
                    <th class='align-middle'>BBP</th>
                    <th class='align-middle'>BPPB</th>
                    <th class='align-middle'>MBM</th>
                    <th class='align-middle'>KPA</th>
                    <th class='align-middle'>Kalibrasi</th>
                    <th class='align-middle'>Kobonappza</th>
                    <th class='align-middle'>BPKOM</th>
                    <th class='align-middle'>OTKOS</th>
                    <th class='align-middle'>TU</th>
                    <th class='align-middle'>Total</th>
                    <!-- <th class='align-middle'>Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach ($brg as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td> <!-- No -->
                        <td><?= $row['nama_barang']; ?></td> <!-- Nama Barang -->
                        <td><?= $bmn = $this->BarangKeluar_model->getStok($row['id_barang'])[2]; ?></td> <!-- Stok BMN -->
                        <td><?= $bbp = $this->AlatGelas_model->getTotalKualitatif($row['id_barang'], 49); ?></td> <!-- BBP -->
                        <td><?= $bppb = $this->AlatGelas_model->getTotalKualitatif($row['id_barang'], 50); ?></td> <!-- BPPB -->
                        <td><?= $mbm = $this->AlatGelas_model->getTotalKualitatif($row['id_barang'], 51); ?></td> <!-- MBM -->
                        <td><?= $kpa = $this->AlatGelas_model->getTotalKualitatif($row['id_barang'], 53); ?></td> <!-- KPA -->
                        <td><?= $kalibrasi = $this->AlatGelas_model->getTotalKualitatif($row['id_barang'], 54); ?></td> <!-- Kalibrasi -->
                        <td><?= $kobonapza = $this->AlatGelas_model->getTotalKualitatif($row['id_barang'], 55); ?></td> <!-- Kobonappza -->
                        <td><?= $bpkom = $this->AlatGelas_model->getTotalKualitatif($row['id_barang'], 56); ?></td> <!-- BPKOM -->
                        <td><?= $otkos = $this->AlatGelas_model->getTotalKualitatif($row['id_barang'], 57); ?></td> <!-- OTKOS -->
                        <td><?= $tu = $this->AlatGelas_model->getTotalKualitatif($row['id_barang'], 52); ?></td> <!-- TU -->
                        <td><?= $bmn + $bbp + $bppb + $mbm + $kpa + $kalibrasi + $kobonapza + $bpkom + $otkos + $tu; ?></td> <!-- Total -->
                        <!-- <td></td> Aksi -->
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>