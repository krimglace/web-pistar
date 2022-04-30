<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	@media screen and (min-width: 751px){
		.pesanan{ float: left; width: 22.5%; margin-right: 2.5% }
		.hari-les{float: left; width: 15%; margin-right: 1.6%;}
		.catatan{ float: right; width: 36%; margin-right: 4% }
		.kode{ float: right; width: 18%; margin-right: 2% }
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fas fa-plus mr-1"></i>
						Tambah Pemesanan Les
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="">
				<h4 class="mb-4 text-center"><strong>Pesanan</strong></h4>
				<form method="post" action="<?= base_url('Siswa/Pemesanan_Les/Tambah_Pesanan_Aksi') ?>">
					<?php foreach( $siswawali as $ssw ) : ?>
					<input type="hidden" name="ids" value="<?= $ssw->id_siswawali ?>" class="form-control">
					<?php endforeach; ?>
					<div class="form-group pesanan">
						<label>Paket</label>
						<select class="form-control" name="paket">
							<?php foreach( $paket as $pkt ) : ?>
							<option value="Paket <?= $pkt->nama_paket ?>">Paket <?= $pkt->nama_paket ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group pesanan">
						<label>Sistem Pembelajaran</label>
						<select class="form-control" name="sistem">
							<option value="Online">Online</option>
							<option value="Offline">Offline</option>
						</select>
					</div>
					<div class="form-group pesanan">
						<label>Guru Les Yang Diinginkan</label>
						<select class="form-control" name="JK">
							<option value="Laki - Laki">Laki - Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group pesanan">
						<label>Mata Pelajaran</label>
						<select class="form-control" name="mapel">
							<?php 
								foreach( $siswawali as $ssw ) :
									$query = "SELECT * FROM tb_mapel WHERE tingkatan = '".$ssw->tingkat."'";
									$data = $this->db->query($query)->result();

									foreach($data as $dt) :
							?>
							<option value="<?= $dt->nama_mapel ?>"><?= $dt->nama_mapel ?></option> 
						<?php endforeach;
							endforeach; ?>
						</select>
					</div>
					<div class="clearfix"> </div>
					<div class="form-group text-center mt-3">
						<h4><strong>Hari Les</strong></h4>
					</div>
					<div class="form-group hari-les text-center">
						<label>Senin</label>
						<input type="time" name="senin" class="form-control">
					</div>
					<div class="form-group hari-les text-center">
						<label>Selasa</label>
						<input type="time" name="selasa" class="form-control">
					</div>
					<div class="form-group hari-les text-center">
						<label>Rabu</label>
						<input type="time" name="rabu" class="form-control">
					</div>
					<div class="form-group hari-les text-center">
						<label>Kamis</label>
						<input type="time" name="kamis" class="form-control">
					</div>
					<div class="form-group hari-les text-center">
						<label>Jumat</label>
						<input type="time" name="jumat" class="form-control">
					</div>
					<div class="form-group hari-les text-center">
						<label>Sabtu</label>
						<input type="time" name="sabtu" class="form-control">
					</div>
					<div class="clearfix"></div>
					<div class="form-group kode">
						<label>Kode Referral (Opsional)</label>
						<input type="text" name="kode" class="form-control">
					</div>
					<div class="form-group kode">
						<label>Tanggal Mulai</label>
						<input type="date" name="tanggal" class="form-control" required>
					</div>
					<div class="form-group kode">
						<label>Jumlah Siswa</label>
						<input type="number" name="jumlah" class="form-control" required>
					</div>
					<div class="form-group catatan">
						<label>Catatan (Kriteria Khusus Guru)</label>
						<textarea class="form-control" name="catatan"></textarea>
					</div>
					<div class="clearfix"></div>
					<button type="submit" class="btn btn-success form-control">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>