<?php if($this->session->userdata('kunci') == 1) : ?>
    <!-- master data -->
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Master Data
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?= base_url(); ?>admin/kategori">
                    <div class="sb-nav-link-icon"><i class="fa fa-folder"></i></div>
                    Kategori
                </a>
                <a class="nav-link" href="<?= base_url(); ?>admin/unit">
                    <div class="sb-nav-link-icon"><i class="fa fa-wrench"></i></div>
                    Unit
                </a>
                <a class="nav-link" href="<?= base_url(); ?>admin/perusahaan">
                    <div class="sb-nav-link-icon"><i class="fa fa-user-tie"></i></div>
                    Pemasok
                </a>
                <a class="nav-link" href="<?= base_url(); ?>admin/sdm">
                    <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                    SDM
                </a>
            </nav>
        </div>
    </a>
    <!-- master data -->

    <!-- produk -->
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produk" aria-expanded="false" aria-controls="produk">
            <div class="sb-nav-link-icon"><i class="fas fa-shopping-basket"></i></div>
                Produk
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="produk" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?= base_url(); ?>admin/produk">
                    <div class="sb-nav-link-icon"><i class="fab fa-dropbox"></i></div>
                    Daftar Produk
                </a>
                <a class="nav-link" href="<?= base_url(); ?>admin/barangMasuk">
                    <div class="sb-nav-link-icon"><i class="fas fa-cart-plus"></i></div>
                    Barang Masuk
                </a>
                <a class="nav-link" href="<?= base_url(); ?>admin/barangKeluar">
                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                    Barang Keluar
                </a>
                <a class="nav-link" href="<?= base_url(); ?>user/alatGelas">
                    <div class="sb-nav-link-icon"><i class="fa fa-vial"></i></div>
                    Alat Gelas
                </a>
            </nav>
        </div>
    </a>
    <!-- produk -->





    <!-- Akun -->
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Akun" aria-expanded="false" aria-controls="Akun">
            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
            Profil
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="Akun" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class='nav-link' href="<?= base_url(); ?>notifikasi">
                    <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                    Notifikasi 
                    <span class="badge badge-danger">2</span>
                </a>

                <a class="nav-link" href="<?= base_url(); ?>login/logout">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Logout
                </a>
            </nav>
        </div>
    <!-- Akun -->
<?php else : ?>

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produk" aria-expanded="false" aria-controls="produk">
            <div class="sb-nav-link-icon"><i class="fas fa-shopping-basket"></i></div>
                Produk
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="produk" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?= base_url(); ?>user/barang">
                    <div class="sb-nav-link-icon"><i class="fa fa-fas fa-shopping-cart"></i></div>
                    Permintaan Barang
                </a>
                <a class="nav-link" href="<?= base_url(); ?>user/ag_kualitatif">
                    <div class="sb-nav-link-icon"><i class="fa fa-vial"></i></div>
                    Alat Gelas Kualitatif
                </a>
                <a class="nav-link" href="<?= base_url(); ?>user/ag_kuantitatif">
                    <div class="sb-nav-link-icon"><i class="fa fa-vial"></i></div>
                    Alat Gelas Kuantitatif
                </a>
            </nav>
        </div>
    </a>

<?php endif ; ?>