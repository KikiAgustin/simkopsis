<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Profile Nasabah</h2>
            <?= $this->session->flashdata('message'); ?>
        </div>
        <hr>
        <?php if ($anggota) : ?>
            <div class="row mb-3">
                <div class="col-lg-2 ">NIK</div>
                <div class="col-lg-9"><?= $anggota["anggota_nik"]; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Nama</div>
                <div class="col-lg-9"><?= $anggota["anggota_nama"]; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Email</div>
                <div class="col-lg-9"><?= $anggota["anggota_email"]; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Tempat Lahir</div>
                <div class="col-lg-9"><?= $anggota["anggota_tempat_lahir"]; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Tanggal Lahir</div>
                <div class="col-lg-9"><?= $anggota["anggota_tanggal_lahir"]; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Agama</div>
                <div class="col-lg-9"><?= $anggota["anggota_agama"]; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Nama Ibu Kandung</div>
                <div class="col-lg-9"><?= $anggota["anggota_nama_ibu"]; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Pekerjaan</div>
                <div class="col-lg-9"><?= $anggota["anggota_pekerjaan"]; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Status</div>
                <div class="col-lg-9"><?= $anggota["anggota_status_kawin"]; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Telepon</div>
                <div class="col-lg-9"><?= $anggota["anggota_nomor_hp"]; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Alamat</div>
                <div class="col-lg-9"><?= $anggota["anggota_alamat"]; ?></div>
            </div>
        <?php else : ?>
            <p class="text-danger">Kamu belum melengkapi profile, silahkan lengkapi profile untuk pengajuan pembukaan rekening dan pinjaman</p>
            <a class="btn btn-primary" href="<?= base_url('Profile/editProfile/') . $user['id']; ?>">Lengkapi Sekarang</a>
        <?php endif; ?>

        <hr>
    </div>
</section><!-- End Services Section -->