<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Upload Persyaratan</h2>
            <p>Silahkan lengkapi persyaratan dibawah ini</p>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-lg-2 fw-bold">NIK</div>
            <div class="col-lg-10 fw-bold"><?= $anggota['anggota_nik']; ?></div>
        </div>
        <div class="row">
            <div class="col-lg-2 fw-bold">Nama Nasabah</div>
            <div class="col-lg-10 fw-bold"><?= $anggota['anggota_nama']; ?></div>
        </div>
        <br><br>
        <div class="row">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_anggota" value="<?= $anggota['anggota_id']; ?>">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="foto_ktp" class="form-label">Foto KTP</label>
                        <input name="foto_ktp" class="form-control form-control-sm" id="foto_ktp" type="file" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="foto_kk" class="form-label">Foto Kartu Keluarga</label>
                        <input name="foto_kk" class="form-control form-control-sm" id="foto_kk" type="file" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="foto_npwp" class="form-label">Foto NPWP</label>
                        <input name="foto_npwp" class="form-control form-control-sm" id="foto_npwp" type="file" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="foto_siup" class="form-label">Foto Surat Ijin Usaha Perdangan</label>
                        <input name="foto_siup" class="form-control form-control-sm" id="foto_siup" type="file" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="foto_tabungan" class="form-label">Foto Tabungan</label>
                        <input name="foto_tabungan" class="form-control form-control-sm" id="foto_tabungan" type="file" required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Upload Data</button>
            </form>
        </div>

    </div>
</section><!-- End Services Section -->