<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Edit Profile Nasabah</h2>
        </div>

        <div class="row">
            <form action="" method="POST">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" value="<?= $user['name']; ?>" required>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="number" name="nik" class="form-control" id="nik" placeholder="NIK" required value="<?= set_value('nik'); ?>">
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" aria-label="Default select example" required>
                            <option value="">Pilih</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" required value="<?= set_value('tempat_lahir'); ?>">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" required value="<?= set_value('tanggal_lahir'); ?>">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <select name="agama" class="form-select" aria-label="Default select example" required>
                            <option value="">Pilih</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghuchu">Konghuchu</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="nama_ibu" class="form-label">Nama Ibu Kandung</label>
                        <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" placeholder="Nama Ibu Kandung" required value="<?= set_value('nama_ibu'); ?>">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= set_value('alamat'); ?></textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" required value="<?= set_value('pekerjaan'); ?>">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <input type="text" name="pendidikan" class="form-control" id="pendidikan" placeholder="Pendidikan" required value="<?= set_value('pendidikan'); ?>">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="status_kawin" class="form-label">Status Perkawinan</label>
                        <select name="status_kawin" class="form-select" aria-label="Default select example" required>
                            <option value="">Pilih</option>
                            <option value="lajang">lajang</option>
                            <option value="menikah">menikah</option>
                            <option value="janda">janda</option>
                            <option value="duda">duda</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="number" name="telepon" class="form-control" id="telepon" placeholder="Telepon" required value="<?= set_value('telepon'); ?>">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Edit profile</button>
            </form>
        </div>

    </div>
</section><!-- End Services Section -->