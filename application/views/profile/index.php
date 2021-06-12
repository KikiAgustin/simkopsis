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
                <div class="col-lg-9">3204352903888098</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Nama</div>
                <div class="col-lg-9">Kiki Agustin</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Email</div>
                <div class="col-lg-9">kikiagustin62@gmail.com</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Tempat Lahir</div>
                <div class="col-lg-9">Bandung</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Tanggal Lahir</div>
                <div class="col-lg-9">31 January 1999</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Agama</div>
                <div class="col-lg-9">Islam</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Nama Ibu Kandung</div>
                <div class="col-lg-9">Popon</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Pekerjaan</div>
                <div class="col-lg-9">Pelajar</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Status</div>
                <div class="col-lg-9">lajang</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Telepon</div>
                <div class="col-lg-9">085789885886</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Pendapatan Perbulan</div>
                <div class="col-lg-9">10.000.000</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Alamat</div>
                <div class="col-lg-9">Kota Baru Parahyangan Blok. A No. 10 Bandung Barat Jawa Barat</div>
            </div>
        <?php else : ?>
            <p class="text-danger">Kamu belum melengkapi profile, silahkan lengkapi profile untuk pengajuan pembukaan rekening dan pinjaman</p>
            <a class="btn btn-primary" href="<?= base_url('Profile/editProfile/') . $user['id']; ?>">Lengkapi Sekarang</a>
        <?php endif; ?>

        <hr>
    </div>
</section><!-- End Services Section -->