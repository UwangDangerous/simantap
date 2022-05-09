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

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center table-sm" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Normal</th>
                    <th>Rusak</th>
                    <th>Hilang</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ; ?>
                <?php foreach ($brg as $row) : ?>
                    <?php 
                        $normal = 0;
                        $hilang = 0;
                        $rusak = 0 ;
                        $total = 0 ;
                        
                        
                        if($n = $this->AlatGelas_model->getNormal($row['id_barang'] , $this->session->userdata('kunci'))) {
                            $normal = $n;
                            $h = $this->AlatGelas_model->getHilang($row['id_barang'] , $this->session->userdata('kunci')) ;
                            if($h){
                                $hilang = $h ;
                                $total = $n - $h ;
                            }else{
                                $hilang = 0 ;
                                $total = $n ;
                            }

                            $r = $this->AlatGelas_model->getRusak($row['id_barang'] , $this->session->userdata('kunci')) ;
                            if($r){
                                $rusak = $r ;
                                $total = $total - $r ;
                            }else{
                                $rusak = 0 ;
                            }

                        }
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $normal; ?></td>
                        <td><?= $rusak; ?></td>
                        <td><?= $hilang; ?></td>
                        <td><?= $total; ?></td>
                        <td></td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>