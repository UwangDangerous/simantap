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
        <table class="table table-bordered table-striped text-center table-sm" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th data-toggle="tooltip" title='Normal dan tersedia'>N</th>
                    <th data-toggle="tooltip" title='Alat Gelas Rusak / Pecah / Tidak Layak Digunakan'>R</th>
                    <th data-toggle="tooltip" title='Alat Gelas Hilang'>H</th>
                    <th data-toggle="tooltip" title='Alat Gelas Keluar Ke Balai'>PK</th>
                    <th data-toggle="tooltip" title='Alat Gelas Masuk Dari Balai'>PM</th>
                    <th data-toggle="tooltip" title='Total Keseluruhan'>Total</th>
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
                        $ketemu = 0;
                        $pindah = 0;
                        $pindahMasuk = 0;
                        
                        
                        if($n = $this->AlatGelas_model->getNormal($row['id_barang'] , $this->session->userdata('kunci'))) {
                            $normal = $n;
                            $h = $this->AlatGelas_model->getHilang($row['id_barang'] , $this->session->userdata('kunci')) ;
                            if($h){
                                $hilang = $h ;
                                $total = $n - $h ;

                                $k = $this->AlatGelas_model->getKetemu($row['id_barang'] , $this->session->userdata('kunci')) ;
                                if($k) {
                                    $hilang -= $k;
                                    $total += $k;
                                }
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

                            $p = $this->AlatGelas_model->getPindah($row['id_barang'] , $this->session->userdata('kunci')) ;
                            if($p){
                                $pindah = $p ;
                                // $total = $total - $r ;
                            }else{
                                $pindah = 0 ;
                            }

                            $pm = $this->AlatGelas_model->getPindahMasuk($row['id_barang'] , $this->session->userdata('kunci')) ;
                            if($pm){
                                $pindahMasuk = $pm ;
                                // $total = $total - $r ;
                            }else{
                                $pindahMasuk = 0 ;
                            }
                        }
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $total; ?></td> <!-- total yg normal -->
                        <td><?= $rusak; ?></td>
                        <td><?= $hilang; ?></td>
                        <td><i class="text-danger"><?= $pindah; ?></i></td> 
                        <td><i class="text-danger"><?= $pindahMasuk; ?></i></td> 
                        <td><?= $normal; ?></td> <!-- total yg pernah digunakan -->
                        <td><a href="<?= base_url();?>user/ag_kualitatif/detail/<?= $row['id_barang'];?>" class="badge badge-primary" data-toggle='tooltip' title='Tampilkan Rincian'><i class="fa fa-eye"></i></a></td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>