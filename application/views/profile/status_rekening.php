<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Informasi Kartu Rekening</h2>
            <?= $this->session->flashdata('message'); ?>
        </div>
        <?php if ($rekening) : ?>
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <?= $anggota['anggota_nama']; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">BANKKU</h5>
                            <hr>
                            <p class="card-text"><?= $rekening['jenis_rekening']; ?></p>
                            <p class="card-text"><?= $rekening['jenis_kartu']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($rekening["status"] == 0) : ?>
            <br>
            <p class="text-danger">Silahkan datang ke kantor BANNKU cabang terdekat, untuk pengambilan kartu dan buku tabungan dengan membawa katu identitas</p>
        <?php elseif ($rekening["status"] == 2) : ?>
            <br>
            <p class="text-danger">Kartu Rekening Kamu sudah tidak aktif, silahkan datang ke kantor BANNKU terderkat untuk mengaktifkan kembali</p>
        <?php endif; ?>

    </div>
</section><!-- End Services Section -->