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
                        <label for="jenis_pinjaman" class="form-label">Pilih Jenis Pinjaman</label>
                        <select name="jenis_pinjaman" class="form-select" aria-label="Default select example" required>
                            <option value="">Pilih</option>
                            <option value="Kredit Modal Kerja">Kredit Modal Kerja</option>
                            <option value="Kredit Usaha Mikro">Kredit Usaha Mikro</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="jumlah_pinjaman" class="form-label">Jumlah Pinjaman</label>
                        <input type="number" name="jumlah_pinjaman" class="form-control" id="jumlah_pinjaman" placeholder="Jumlah Pinjaman" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="tujuan_pinjaman" class="form-label">Tujuan Peminjaman</label>
                        <input type="text" name="tujuan_pinjaman" class="form-control" id="tujuan_pinjaman" placeholder="Jumlah Pinjaman" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <small class="text-danger">Klik Ajukan Pinjama Untuk melanjutkan</small>
                    </div>
                </div>


                <button type="submit" name="submit" class="btn btn-primary">Ajukan Pinjaman</button>
            </form>
        </div>

    </div>
</section><!-- End Services Section -->