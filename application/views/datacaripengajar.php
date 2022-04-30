<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	@media screen and (min-width: 751px){
		.left-about{ float: left;width: 40%; }
		.right-about{ float: left;width: 60%; }
		.tentang-tentang-kiri{float: left; width: 50%}
		.tentang-tentang-kanan{float: left; width: 50%}
		.leftt{ float: left; width: 47.5% }
		.rightt{ float: right; width: 47.5% }
	}
	@media screen and (max-width: 750px){
		.content-header h5{ font-size: 100%; }
	}
</style>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<div class="content-wrapper mt-5">
	<div class="container-fluid">
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="">
				<h4 class="mb-4"><strong>Data Profil Pengajar</strong></h4>
				<?php foreach( $pengajar as $tutor ) : ?>
					<div class="left-about">
						<div class="tentang-logo text-center">
							<div class="form-group">
								<input type="hidden" name="id_tutor" class="form-control text-center" value="<?= $tutor->id_tutor ?>">
							</div>
							<h4><strong>Foto Profil</strong></h4>
							<img src="<?= base_url('assets/mystyle/img/tutor/'.$tutor->gambar_guru) ?>" width="75%"><br><br>
							<?php

								$query = "SELECT AVG(jumlah_ratting) as jml_ratting FROM tb_ratting_tutor WHERE id_tutor = '".$tutor->id_tutor."'";
								$queryRerataRatting = $this->db->query($query)->result();
								foreach( $queryRerataRatting as $qrr ) :
							?>
							<h3><i class="fa fa-star text-warning"></i>  <?= $qrr->jml_ratting ?></strong></h3>
							<?php 
								endforeach;

								$query = "SELECT COUNT(id_pesanan) as pesanan FROM tb_pesanan_les WHERE id_tutor = '".$tutor->id_tutor."'";
								$queryRerataRatting = $this->db->query($query)->result();
								foreach( $queryRerataRatting as $qra ) :
							?>
							<h3><i class="fa fa-user text-info"></i>  <?= $qra->pesanan ?></strong></h3>
							<?php endforeach ?>
						</div>
						<br>
					</div>
					<div class="right-about pl-3">
						<div class="tentang-tentang">
							<div class="form-group">
								<label>ID Tutor</label>
								<input type="text" name="id_tutor" class="form-control" value="<?= $tutor->id_tutor ?>" readonly>
							</div>
							<div class="form-group leftt">
								<label>Nama Lengkap</label>
								<input readonly type="text" name="nama_lengkap_tutor" class="form-control" value="<?= $tutor->nama_lengkap_tutor ?>">
							</div>
							<div class="form-group rightt">
								<label>Nama Panggilan</label>
								<input readonly type="text" name="nama_panggilan_tutor" class="form-control" value="<?= $tutor->nama_panggilan_tutor ?>">
							</div>
							<br>
							<div class="form-group leftt">
								<label>Email</label>
								<input readonly type="email" name="email_tutor" class="form-control" value="<?= $tutor->email_tutor ?>">
							</div>
							<div class="form-group rightt">
								<label>No. Whatsapp</label><br>
								<input readonly type="text" class="form-control float-left col-3" value="(+62)" readonly>
								<input readonly type="number" name="no_whatsapp_tutor" class="float-left col-9 form-control" value="<?= $tutor->no_whatsapp_tutor ?>">
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group leftt">
								<label>Universitas</label>
								<input readonly type="text" name="universitas_tutor" class="form-control" value="<?= $tutor->universitas_tutor ?>">
							</div>
							<div class="form-group rightt">
								<label>Jurusan</label><br>
								<input readonly type="text" name="jurusan_tutor" class="form-control" value="<?= $tutor->jurusan_tutor ?>">
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group leftt">
								<label>Asal Provinsi</label>
								<input readonly type="text" name="provinsi" class="form-control" value="<?= $tutor->provinsi ?>">
							</div>
							<div class="form-group rightt">
								<label>Kabupaten/Kota</label><br>
								<input readonly type="text" name="kabupaten_kota" class="form-control" value="<?= $tutor->kabupaten_kota ?>">
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group leftt">
								<label>Mata Pelajaran</label>
								<input readonly type="text" name="matapelajaran_tempuh" class="form-control" value="<?= $tutor->matapelajaran_tempuh ?>">
							</div>
							<div class="form-group rightt">
								<label>Quotes Tutor</label><br>
								<input readonly type="text" name="quotes_tutor" class="form-control" value="<?= $tutor->quotes_tutor ?>">
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>							
						</div>
					</div>
					<div class="clearfix"></div>
				<?php endforeach?>
			</div>
		</div>
	</div>
</div>

<!-- <button class="third btn bg-primary">Title, Text and Icon</button> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
// 	document.querySelector(".third").addEventListener('click', function(){
//   swal("Our First Alert", "With some body text and success icon!", "success");
// });

</script>