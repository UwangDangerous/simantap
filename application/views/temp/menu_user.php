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
                <a class="nav-link" href="<?= base_url(); ?>admin/pemasok">
                    <div class="sb-nav-link-icon"><i class="fa fa-wrench"></i></div>
                    Pemasok
                </a>
            </nav>
        </div>
    <!-- master data -->





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

<?php endif ; ?>