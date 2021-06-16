<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Informasi Pinjaman Anda</h2>
        </div>
        <?= $this->session->flashdata('message'); ?>

        <?php if ($pinjaman['persetujuan'] == 0) : ?>
            <div class="row mb-3">
                <div class="col-lg-2">Nama Nasabah</div>
                <div class="col-lg-10"><?= $anggota['anggota_nama']; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Jenis Pinjaman</div>
                <div class="col-lg-10"><?= $pinjaman['jenis_pinjaman']; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Jumlah Pinjaman</div>
                <div class="col-lg-10">Rp. <?= number_format($pinjaman['jumlah_pinjaman']); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Jumlah Angsuran</div>
                <div class="col-lg-10">
                    <?= $pinjaman['jumlah_angsuran'] . $bayar; ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Angsuran</div>
                <div class="col-lg-10"><?= number_format($pinjaman['jumlah_pinjaman']); ?> / <?= $jumlah_angsuran; ?> = <?= number_format($pinjaman['jumlah_pinjaman'] / $jumlah_angsuran);  ?></div>
            </div>

            <?php if ($persyaratan) : ?>
                <hr>
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <p>Pengajuan Pinjaman anda sedang di proses</p>
                        <p>Tolong segera kirimkan data berikut:</p>
                        <ul>
                            <li>Copy KTP calon debitur</li>
                            <li>Copy Kartu Keluarga (KK)</li>
                            <li>Copy NPWP</li>
                            <li>Copy Surat Ijin Usaha Perdagangan (SIUP)</li>
                            <li>Copy buku Mandiri Tabungan</li>
                        </ul>
                        <p>Ke Alamat</p>
                        <p>BANKKU Jl. Cibaduyut lama No. 57A Kota Bandung Jawa Barat</p>
                    </div>
                </div>
            <?php else : ?>
                <hr>
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <p class="fw-bold">Anda belum mengirimkan persyaratan untuk pengajuan pinjaman</p>
                        <p>Silahkan tekan tombol Upload Persyaratan untuk mengirimkan data</p>
                        <a class="btn btn-primary" href="<?= base_url('PengajuanPinjaman/uploadData') ?>">Upload Persyaratan</a>
                    </div>
                </div>
            <?php endif; ?>

        <?php elseif ($pinjaman['persetujuan'] == 1) : ?>
            <div class="row mb-3">
                <div class="col-lg-2">Nama Nasabah</div>
                <div class="col-lg-10"><?= $anggota['anggota_nama']; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Jenis Pinjaman</div>
                <div class="col-lg-10"><?= $pinjaman['jenis_pinjaman']; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Jumlah Pinjaman</div>
                <div class="col-lg-10">Rp. <?= number_format($pinjaman['jumlah_pinjaman']); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Jumlah Angsuran</div>
                <div class="col-lg-10"><?= $pinjaman['jumlah_angsuran'] . $bayar; ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Angsuran</div>
                <div class="col-lg-10"><?= number_format($pinjaman['jumlah_pinjaman']); ?> / <?= $jumlah_angsuran; ?> = <?= number_format($pinjaman['jumlah_pinjaman'] / $jumlah_angsuran);  ?></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <p class="fw-bold">Selamat pengajuan pinjaman anda telah disetujui</p>
                    <p>Silahkan datang ke kantor cabang terdekat, untuk proses lebih lanjut</p>
                </div>
            </div>
        <?php elseif ($pinjaman['persetujuan'] == 2) : ?>
            <div class="row mb-3">
                <div class="col-lg-2">Nama Nasabah</div>
                <div class="col-lg-10"><?= $anggota['anggota_nama']; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Jenis Pinjaman</div>
                <div class="col-lg-10"><?= $pinjaman['jenis_pinjaman']; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Jumlah Pinjaman</div>
                <div class="col-lg-10">Rp. <?= number_format($pinjaman['jumlah_pinjaman']); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Jumlah Angsuran</div>
                <div class="col-lg-10">
                    <?= $pinjaman['jumlah_angsuran'] . $bayar; ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Angsuran</div>
                <div class="col-lg-10"><?= number_format($pinjaman['jumlah_pinjaman']); ?> / <?= $jumlah_angsuran; ?> = <?= number_format($pinjaman['jumlah_pinjaman'] / $jumlah_angsuran);  ?></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <p class="fw-bold text-danger">Mohon maaf pengajuan anda belum kami setujui</p>
                    <p>Silahkan datang ke kantor cabang terdekat, untuk proses lebih lanjut</p>
                </div>
            </div>
        <?php endif; ?>


    </div>
</section><!-- End Services Section -->