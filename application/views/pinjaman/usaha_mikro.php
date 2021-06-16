<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Pengajuan Pinjaman</h2>
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
                        <label for="jenis_pinjaman" class="form-label">Jenis Pinjaman</label>
                        <input type="number" name="jenis_pinjaman" class="form-control" id="jenis_pinjaman" placeholder="Kredit Usaha Mikro" readonly required>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="jumlah_pinjaman" class="form-label">Jumlah Pinjaman</label>
                        <input type="number" name="jumlah_pinjaman" class="form-control" id="jumlah_pinjaman" placeholder="Maksimal 200 Juta" required value="<?= set_value('jumlah_pinjaman'); ?>">
                        <?= form_error('jumlah_pinjaman', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jumlah_angsuran" class="form-label">Jumlah Angsuran</label>
                    <select name="jumlah_angsuran" class="form-select" aria-label="Default select example" required>
                        <option value="">Pilih</option>
                        <option value="1">1 Tahun</option>
                        <option value="2">2 Tahun</option>
                        <option value="3">3 Tahun</option>
                        <option value="4">4 Tahun</option>
                        <option value="5">5 Tahun</option>
                    </select>
                </div>
                <br><br>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <small class="text-success">Klik Ajukan Pinjaman Untuk melanjutkan</small>
                    </div>
                </div>


                <button type="submit" name="submit" class="btn btn-primary">Ajukan Pinjaman</button>
            </form>
        </div>

    </div>
</section><!-- End Services Section -->