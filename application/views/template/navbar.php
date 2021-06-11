<style>
    .navbar .getstarted {
        background: #3498db;
        padding: 8px 25px;
        margin-left: 30px;
        border-radius: 50px;
        color: #fff;
    }

    .navbar .getstarted:hover {
        color: #fff;
        background: #4aa3df;
    }
</style>
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <h1><a href="<?= base_url('Home'); ?>">Bankku</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="<?= base_url("Home/simpanan"); ?>">Simpanan</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url("Home/pinjaman"); ?>">Pinjaman</a></li>
                <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Aksi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('BukaRekening'); ?>">Buka Rekening Baru</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('PengajuanPinjaman'); ?>">pengajuan Pinjman</a></li>
                    </ul>
                </li>
                <li><a class="getstarted scrollto" href="<?= base_url('Auth'); ?>">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->