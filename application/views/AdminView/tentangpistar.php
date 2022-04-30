<?php  ?>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-content{ border-radius: 10px; }
	.tentang-logo img{ border: 1px solid black; }
	.nonaktif{display: none;}
	@media screen and (min-width: 751px){
		.left-about{ float: left;width: 40%; }
		.right-about{ float: left;width: 60%; }
		.tentang-tentang-kiri{float: left; width: 50%}
		.tentang-tentang-kanan{float: left; width: 50%}
	}
	@media screen and (max-width: 750px){
		.content-header h5{ font-size: 100%; }
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fa fa-exclamation-circle mr-1"></i>
						Tentang Pistar
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<?php foreach ($tentang as $ttg) { ?>
				<div class="left-about">
					<div class="tentang-logo text-center">
						<form enctype="multipart/form-data" method="post" action="<?= base_url('Administrator/Tentang_Pistar/ganti_logo') ?>">
							<div class="form-group">
								<input type="hidden" name="id_tentang" class="form-control text-center" value="<?= $ttg->id_tentang ?>">
							</div>
							<h4><strong>Logo PISTAR</strong></h4>
							<img src="<?= base_url('assets/mystyle/img/'.$ttg->logo_pistar) ?>" width="75%"><br><br>
							<h6><strong>Ganti Logo</strong></h6>
							<input type="file" name="logo_pistar" class="form-control"><br>
							<input type='submit' name='submit' value='ganti logo' />
							<!-- <button class="btn text-white" type="submit" style="background-color: rgb(140, 38, 242);">Ganti Logo</button> -->
						</form>
						<br><br>
						<form method="post" action="<?= base_url('Administrator/Tentang_Pistar/ganti_bank') ?>">
							<h4><strong>Nomor Rekening PISTAR</strong></h4>
							<?php foreach ($rekening as $bank): ?>
								<div>
									<input type="hidden" name="id_rekening" value="<?= $bank->id_rekening ?>">
								</div>
								<div class="float-start col-4">
									Atas Nama : 
								</div>
								<div class="float-start col-5">
									<input type="text" name="atas_nama" class="form-control" value="<?= $bank->atas_nama ?>">
								</div>
								<div class="float-start col-2">
									<a href="<?= base_url('Administrator/Tentang_Pistar/hapus_bank?id_rekening='.$bank->id_rekening) ?>"><i class="fas fa-trash text-danger"></i></button>
								</div>
								<div class="clearfix m-1"></div>
								<div class="float-start col-2">
									<input type="text" name="jenis_bank" value="<?= $bank->jenis_bank ?>" class="form-control">
								</div>
								<div class="float-start col-6">
									<input type="number" name="nomor_rekening" value="<?= $bank->nomor_rekening ?>" class="form-control">
								</div>
								<div class="float-start col-3">
									<button class="btn btn-info">Ganti</button>
								</div>
								<div class="clearfix"></div>
								<br>
							<?php endforeach ?>
						</form>
						<br>						
						<form method="post" action="<?= base_url('Administrator/Tentang_Pistar/tambah_bank') ?>">
							<a style="cursor: pointer;" onclick="tambah()" class="tambah btn btn-warning">Tambah Rekening</a>
							<a style="cursor: pointer;" onclick="kurang()" class="btn btn-secondary kurang nonaktif text-white">Close</a>
							<br><br>
							<div class="tambah-bank nonaktif">
								<div class="float-start col-4">
									Atas Nama : 
								</div>
								<div class="float-start col-6">
									<input type="text" name="atas_nama" class="form-control">
								</div>
								<div class="clearfix m-1"></div>
								<div class="float-start col-2">
									<input type="text" name="jenis_bank" class="form-control">
								</div>
								<div class="float-start col-6">
									<input type="number" name="nomor_rekening" class="form-control">
								</div>
								<div class="float-start col-3">
									<button class="btn btn-info">Tambah</button>
								</div>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
					<br>
				</div>
				<div class="right-about">
					<div class="tentang-tentang">
						<form method="post" action="<?= base_url('Administrator/Tentang_Pistar/ganti_tentang') ?>">
							<div class="form-group">
								<input type="hidden" name="id_tentang" class="form-control text-center" value="<?= $ttg->id_tentang ?>">
							</div>
							<div class="form-group">
								<input type="text" name="nama" class="form-control text-center" value="PISTAR" readonly>
							</div>
							<div class="form-group">
								<label for="alamat_pistar">Alamat Pistar</label>
								<input type="text" name="alamat_pistar" class="form-control" value="<?= $ttg->alamat_pistar ?>">
							</div>
							<div class="tentang-tentang-kiri pl-2 pr-2">
								<div class="form-group">
									<label for="nama_pt">Nama PT</label>
									<input type="text" name="nama_pt" class="form-control" value="<?= $ttg->nama_pt ?>">
								</div>
								<div class="form-group">
									<label for="no_telepon_pistar">No Telepon</label>
									<input type="text" name="no_telepon_pistar" class="form-control" value="<?= $ttg->no_telepon_pistar ?>">
								</div>
								<div class="form-group">
									<label for="inkedin_pistar">Link Facebook</label>
									<input type="text" name="inkedin_pistar" class="form-control" value="<?= $ttg->facebook_pistar ?>">
								</div>
								<div class="form-group">
									<label for="youtube_pistar">Link Youtube</label>
									<input type="text" name="youtube_pistar" class="form-control" value="<?= $ttg->youtube_pistar ?>">
								</div>
							</div>
							<div class="tentang-tentang-kanan pr-2 pl-2">
								<div class="form-group">
									<label for="email_pistar">Email</label>
									<input type="text" name="email_pistar" class="form-control" value="<?= $ttg->email_pistar ?>">
								</div>
								<div class="form-group">
									<label for="whatsapp_admin_pistar">No Whatsapp</label>
									<input type="text" name="whatsapp_admin_pistar" class="form-control" value="<?= $ttg->whatsapp_admin_pistar ?>" placeholder="exp: 62822-------">
								</div>
								<div class="form-group">
									<label for="instagram_pistar">Link Instagram</label>
									<input type="text" name="instagram_pistar" class="form-control" value="<?= $ttg->instagram_pistar ?>">
								</div>
								<div class="form-group">
									<label for="tiktok_pistar">Link Tiktok</label>
									<input type="text" name="tiktok_pistar" class="form-control" value="<?= $ttg->tiktok_pistar ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="tentang_pistar">Tentang Pistar</label>
								<textarea name="tentang_pistar" class="form-control" style="height: 150px;"><?= $ttg->tentang_pistar ?></textarea>
							</div>
							<div class="form-group text-center">
								<button class="btn text-white" style="background-color: rgb(140, 38, 242);">Ganti Keterangan</button>
							</div>
						</form>
					</div>
				</div>
				<div class="clearfix"></div>
			<?php } ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	function tambah(){
		var tambahkurang = document.querySelectorAll('.tambah');
		var kurangtambah = document.querySelectorAll('.kurang');
		var tambah = document.querySelectorAll('.tambah-bank');
		tambah[0].classList.remove('nonaktif');
		kurangtambah[0].classList.remove('nonaktif');
		tambahkurang[0].classList.add('nonaktif');
	}
	function kurang(){
		var tambahkurang = document.querySelectorAll('.tambah');
		var kurangtambah = document.querySelectorAll('.kurang');
		var tambah = document.querySelectorAll('.tambah-bank');
		tambah[0].classList.add('nonaktif');
		kurangtambah[0].classList.add('nonaktif');
		tambahkurang[0].classList.remove('nonaktif');
	}
</script>