<div id="sales-top-home-page">
	<div class="row">
		<div class="col s12 m12">
			<div class="card-panel">
				<h5 class="more-text center grey-text">tambah data Kredi Modal Kerja UMKM</h5>

				<form action="<?= base_url('pinjaman-mudharabah/tambah') ?>" enctype="multipart/form-data" method="post" autocomplete="off">

					<div class="row margin">
						<div class="col s12 m1">
							<h3 class="grey-text">
								<i class="mdi-action-perm-identity"></i>
							</h3>
						</div>
						<div class="input-field col s12 m11">
							<input id="search-anggota" type="text" class="validate custom-box-search" name="anggota-form" required placeholder="ketikkan nama anggota">
							<input type="text" name="anggota" id="id-anggota" hidden>
							<!--set jenis simpanan directly-->
							<input type="text" name="jenis" value="amanah" hidden>
						</div>

						<div class="input-field col s12 m12">
							<i class="mdi-action-account-balance-wallet prefix grey-text text-lighten-1"></i>
							<input id="pinjaman" type="number" name="total-pinjam" required>
							<label for="pinjaman">Total Pinjam</label>
						</div>

						<div class="input-field col s12 m12 " style="margin-bottom: 30px">
							<i class="mdi-device-access-time prefix grey-text text-lighten-1"></i>
							<input id="tenggat" type="number" class="validate" name="tenggat-pinjam" required>
							<label for="tenggat">Tenggat Waktu Peminjaman</label>
						</div>

						<div id="dokumen-peminjaman-done" style="display: none">
							<div class="col s12 m12 ">
								<div id="simpanan-alert" class="card green lighten-5 z-depth-1">
									<div class="card-content green-text ">
										<p><span><i class="mdi-navigation-check"></i></span> Dokumen sudah lengkap</p>
									</div>
								</div>
							</div>
						</div>

						<div id="dokumen-peminjaman" style="display: none">
							<div class="col s12 m12 ">
								<div id="simpanan-alert" class="card orange lighten-5 z-depth-1">
									<div class="card-content orange-text ">
										<p><span><i class="mdi-navigation-close"></i></span> Dokumen belum lengkap <span id="lengkapi"></span></p>
									</div>
								</div>
							</div>
						</div>

						<div class="col s12 m12 ">
							<div id="simpanan-alert" class="card green lighten-5 z-depth-1">
								<div class="card-content green-text ">
									<p>KREDIT MODAL KERJA : Kredit Modal Kerja Adalah fasilitas kredit yang diberikan untuk memenuhi kebutuhan modal kerja yang habis dalam satu siklus usaha dan atau kebutuhan modal kerja yang bersifat khusus seperti untuk membiayai inventory / piutang / proyek atau kebutuhan khusus lainnya.</p>
								</div>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="input-field col s12 m6">
							<a href="<?= base_url('anggota') ?>" class="btn waves-effect col s12 z-depth-0 grey lighten-4 black-text">batalkan</a>
						</div>
						<div class="input-field col s12 m6">
							<button type="submit" name="tambah" class="btn waves-effect waves-light col s12 blue" id="tombol-tambah">
								tambahkan
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>