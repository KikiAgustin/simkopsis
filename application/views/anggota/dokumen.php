<div class="row">

    <div class="col s12 m4 l4">
        <div id="profile-card" class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="<?= base_url('assets/images/office.jpg') ?>" alt="user bg">
            </div>
            <div class="card-content">
                <img src="<?= base_url('assets/images/admin.png') ?>" alt="" class="circle responsive-img activator card-profile-image">
                <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                    <i class="mdi-content-filter-list"></i>
                </a>

                <span class="card-title activator grey-text text-darken-4"><?= $anggota['anggota_nama'] ?></span>
                <p class="grey-text"><i class="mdi-action-perm-identity "></i>
                    <?php
                    if ($anggota['anggota_jk'] == 'L') {
                        echo 'Laki-laki';
                    } else {
                        echo 'Perempuan';
                    }
                    ?>
                </p>
                <p class="grey-text"><i class="mdi-action-store"></i> <?= $anggota['anggota_pekerjaan'] ?></p>
                <p class="grey-text"><i class="mdi-communication-email"></i> <?= $anggota['anggota_email'] ?></p>

            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><?= $anggota['anggota_nama'] ?> <i class="mdi-navigation-close right"></i></span>

                <h5 class="divider"></h5>
                <p class="ultra-small margin more-text" style="padding-left: 0px !important;">Informasi pribadi</p>
                <p><i class="mdi-social-cake"></i> <?= $anggota['anggota_tempat_lahir'] ?>, <?= $anggota['anggota_tanggal_lahir'] ?></p>
                <p><i class="mdi-action-favorite"></i> <?= $anggota['anggota_status_kawin'] ?></p>
                <p><i class="mdi-av-recent-actors"></i> <?= $anggota['anggota_agama'] ?></p>
                <p><i class="mdi-action-wallet-giftcard"></i> <?= $anggota['anggota_nama_ibu'] ?></p>
                <p><i class="mdi-social-school"></i> <?= $anggota['anggota_pendidikan'] ?></p>
                <p><i class="mdi-action-wallet-travel"></i> <?= $anggota['anggota_pekerjaan'] ?></p>
                <p><i class="mdi-editor-attach-money"></i> <?= $anggota['anggota_pendapatan'] ?></p>

                <p class="divider"></p>
                <p class="ultra-small margin more-text" style="padding-left: 0px !important;">Kontak</p>
                <p><i class="mdi-action-credit-card"></i> <?= $anggota['anggota_nik'] ?></p>
                <p><i class="mdi-action-perm-phone-msg"></i> <?= $anggota['anggota_nomor_hp'] ?></p>
                <p><i class="mdi-communication-email"></i> <?= $anggota['anggota_email'] ?></p>
                <p><i class="mdi-maps-pin-drop"></i> <?= $anggota['anggota_alamat'] ?></p>

            </div>
        </div>
    </div>

    <!-- dokumen dan data pengguna -->
    <div class="col s12 m8 l8 card white" style="max-height: 550px;height: 550px;overflow: auto">
        <ul class="tabs">
            <li class="tab col s3">
                <a href="#test3">dokumen</a>
            </li>
        </ul>

        <div id="test3" class="col s12">
            <div class="card-content">
                <div class="row">
                    <div class="col s12 m12">
                        <input type="text" class="" placeholder="cari dokumen">
                    </div>
                    <div class="col s12 m12 ">
                        <ul class="collection">
                            <li class="collection-item avatar">
                                <img src="<?= base_url('assets/gambar/persyaratan/') . $dokumen['foto_ktp']; ?>" alt="" class="circle">
                                <h5 class="no-margin">Foto KTP</h5>
                                <a href="<?= base_url('assets/gambar/persyaratan/') . $dokumen['foto_ktp']; ?>" target="_blank" class="secondary-content blue-text"><i class="mdi-image-remove-red-eye"></i></a>
                            </li>
                            <li class="collection-item avatar">
                                <img src="<?= base_url('assets/gambar/persyaratan/') . $dokumen['foto_kk']; ?>" alt="" class="circle">
                                <h5 class="no-margin">Foto Katu Keluarga</h5>
                                <a href="<?= base_url('assets/gambar/persyaratan/') . $dokumen['foto_kk']; ?>" target="_blank" class="secondary-content blue-text"><i class="mdi-image-remove-red-eye"></i></a>
                            </li>
                            <li class="collection-item avatar">
                                <img src="<?= base_url('assets/gambar/persyaratan/') . $dokumen['foto_npwp']; ?>" alt="" class="circle">
                                <h5 class="no-margin">Foto NPWP</h5>
                                <a href="<?= base_url('assets/gambar/persyaratan/') . $dokumen['foto_npwp']; ?>" target="_blank" class="secondary-content blue-text"><i class="mdi-image-remove-red-eye"></i></a>
                            </li>
                            <li class="collection-item avatar">
                                <img src="<?= base_url('assets/gambar/persyaratan/') . $dokumen['foto_siup']; ?>" alt="" class="circle">
                                <h5 class="no-margin">Foto Surat Ijin Usaha Perdangan (SIUP)</h5>
                                <a href="<?= base_url('assets/gambar/persyaratan/') . $dokumen['foto_siup']; ?>" target="_blank" class="secondary-content blue-text"><i class="mdi-image-remove-red-eye"></i></a>
                            </li>
                            <li class="collection-item avatar">
                                <img src="<?= base_url('assets/gambar/persyaratan/') . $dokumen['foto_tabungan']; ?>" alt="" class="circle">
                                <h5 class="no-margin">Foto Buku Tabungan</h5>
                                <a href="<?= base_url('assets/gambar/persyaratan/') . $dokumen['foto_tabungan']; ?>" target="_blank" class="secondary-content blue-text"><i class="mdi-image-remove-red-eye"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>