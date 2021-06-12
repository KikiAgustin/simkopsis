<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Pembukaan Rekening Baru</h2>
            <p>Silahkan isi form dibawah ini dengan lengkap</p>
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
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="jenis_rekening" class="form-label">Pilih Jenis Rekening</label>
                        <select name="jenis_rekening" class="form-select" aria-label="Default select example" required>
                            <option value="">Pilih</option>
                            <option value="Tabungan Bisnis">Tabungan Bisnis</option>
                            <option value="Deposito Rupiah">Deposito Rupiah</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="jenis_kartu" class="form-label">Pilih Jenis Kartu</label>
                        <select name="jenis_kartu" class="form-select" aria-label="Default select example" required>
                            <option value="">Pilih</option>
                            <option value="Silver GPN">Silver GPN</option>
                            <option value="Gold GPN">Gold GPN</option>
                            <option value="Platinum GPN">Platinum GPN</option>
                            <option value="Silver Visa">Silver Visa</option>
                            <option value="Gold Visa">Gold Visa</option>
                            <option value="Platinum Visa">Platinum Visa</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="tujuan_buka_rekening" class="form-label">Tujuan Buka Rekening</label>
                        <select name="tujuan_buka_rekening" class="form-select" aria-label="Default select example" required>
                            <option value="">Pilih</option>
                            <option value="Menabung">Menabung</option>
                            <option value="penempatan Dana">penempatan Dana</option>
                            <option value="Investasi">Investasi</option>
                            <option value="lainnya">lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="foto_ktp" class="form-label">Foto KTP</label>
                        <input name="foto_ktp" class="form-control form-control-sm" id="foto_ktp" type="file" required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Buka Rekening Sekarang</button>
            </form>
        </div>

    </div>
</section><!-- End Services Section -->