<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url() ; ?>dashboard">SIMANTAP</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav d-none d-md-inline-block form-inline ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item dflex justify-content-between" href="<?= base_url(); ?>notifikasi/logout">Notifikasi <span class='badge badge-danger'>2</span></a>
                <a class="dropdown-item" href="<?= base_url(); ?>login/logout">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">
                        <?= $this->session->userdata('nama'); ?> <br>
                        <?= $this->session->userdata('nip'); ?>
                    </div>
                    
                    <!-- master data -->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Master Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url(); ?>jenisSample">
                                    <div class="sb-nav-link-icon"><i class="fas fa-virus"></i></div>
                                    Jenis Vaksin
                                </a>
                                <a class="nav-link" href="<?= base_url(); ?>jenisSample/jenisPengujian">
                                    <div class="sb-nav-link-icon"><i class="fas fa-vial"></i></div>
                                    Jenis Pengujian
                                </a>
                                <a class="nav-link" href="<?= base_url(); ?>jenisSample/jenisKemasan">
                                    <div class="sb-nav-link-icon"><i class="fa fa-prescription-bottle"></i></div>
                                    Jenis Kemasan
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
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= $this->session->userdata('namaLevel'); ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?= $header; ?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"> <?= $bread; ?> </li>
                </ol>