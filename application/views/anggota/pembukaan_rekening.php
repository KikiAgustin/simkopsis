<div class="row show-on-large hide-on-small-only">
    <div class="col s12 ">
        <div class="card">
            <div class="card-content margin" style="margin: 12px;">
                <div class="row">
                    <div class="col s6 m6 l6">
                        <h4 class="cardbox-text light left margin">daftar Pembukaan Rekening Baru</h4>
                    </div>
                </div>
            </div>

            <br>
            <div class="divider"></div>
            <table class="bordered" id="pembukaan-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Nasabah</th>
                        <th>Jenis Rekening</th>
                        <th>Jenis Kartu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($anggota as $key => $value) :
                    ?>
                        <tr>
                            <td class="grey-text text-darken-1"><?= $no ?></td>
                            <td class="grey-text text-darken-1">
                                <a href="<?= base_url('anggota/' . $value['id_anggota']) ?>" style="text-decoration: underline"><?= $value['nama'] ?></a>
                            </td>
                            <td class="grey-text text-darken-1"><?= $value['jenis_rekening'] ?></td>
                            <td class="grey-text text-darken-1"><?= $value['jenis_kartu'] ?></td>
                            <td class="grey-text text-darken-1">
                                <?php if ($value['status'] == 0) : ?>
                                    <span class="task-cat orange">Proses</span>
                                <?php elseif ($value['status'] == 1) : ?>
                                    <span class="task-cat green">Selesai</span>
                                    <?php elseif ($value['status'] == 2) : ?>\
                                    <span class="task-cat red">Expire</span>
                                <?php endif; ?>
                            </td>
                            <?php
                            if ($this->session->userdata('level') == 'pengurus') :
                            ?>
                                <td>
                                    <div class="row">
                                        <a href="#done" class="btn-flat waves-effect waves-orange col l6 modal-trigger center" title="Selesai">
                                            <i class="mdi-action-done green-text"></i>
                                        </a>
                                        <a href="#expire" class="btn-flat waves-effect waves-red col l6 modal-trigger center" title="Expire">
                                            <i class="mdi-content-create  orange-text text-darken-3"></i>
                                        </a>
                                    </div>
                                </td>
                            <?php
                            endif;
                            ?>

                            <!-- Modal delete -->
                            <div id="expire" class="modal">
                                <div class="modal-content">
                                    <h4 class="red-text text-lighten-1">
                                        <i class="mdi-action-info-outline"></i> Apakah anda yakin mau nasabah ini sudah expire
                                    </h4>
                                    <div class="modal-content">
                                        <h4>
                                            item yang anda hapus akan tersimpan ke data arsip
                                        </h4>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('anggota/expire/' . $value['id_anggota']) ?>" class="waves-effect waves-red btn-flat modal-action modal-close">lanjutkan</a>
                                    <a href="#!" class="waves-effect btn-flat modal-action modal-close">Batalkan</a>
                                </div>
                            </div>

                            <div id="done" class="modal">
                                <div class="modal-content">
                                    <h4 class="red-text text-lighten-1">
                                        <i class="mdi-action-info-outline"></i> Apakah anda yakin mau nasabah ini sudah selesai semua administrasinya
                                    </h4>
                                    <div class="modal-content">
                                        <h4>
                                            item yang anda hapus akan tersimpan ke data arsip
                                        </h4>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('anggota/done/' . $value['id_anggota']) ?>" class="waves-effect waves-red btn-flat modal-action modal-close">lanjutkan</a>
                                    <a href="#!" class="waves-effect btn-flat modal-action modal-close">Batalkan</a>
                                </div>
                            </div>

                        </tr>
                    <?php
                        $no++;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Floating Action Button -->
<?php
if ($this->session->userdata('level') == 'pengurus') :
?>
    <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
        <a class="btn-floating btn-large teal" href="<?= base_url('anggota/tambah') ?>">
            <i class="mdi-av-playlist-add"></i>
        </a>
    </div>
<?php
endif;
?>
<!-- Floating Action Button -->