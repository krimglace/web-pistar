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
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fas fa-user mr-1"></i>
						<?php foreach( $pengajar as $tutor ) : ?>
						Profil <?= $tutor->nama_lengkap_tutor ?>
						<?php endforeach;?>
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="">
				<h4 class="mb-4"><strong>Data Profil</strong></h4>
				<?php foreach( $pengajar as $tutor ) : ?>
					<div class="left-about">
						<div class="tentang-logo text-center">
							<form enctype="multipart/form-data" method="post" action="<?= base_url('Tutor/Profil/Ganti_FotoProfil') ?>">
								<div class="form-group">
									<input type="hidden" name="id_tutor" class="form-control text-center" value="<?= $tutor->id_tutor ?>">
								</div>
								<h4><strong>Foto Profil</strong></h4>
								<img src="<?= base_url('assets/mystyle/img/tutor/'.$tutor->gambar_guru) ?>" width="75%"><br><br>
								<h6><strong>Ganti Foto</strong></h6>
								<input type="file" name="gambar_guru" class="form-control"><br>
								<input type='submit' name='submit' value='Ganti Foto' />
							</form>
						</div>
						<br>
					</div>
					<div class="right-about pl-3">
						<div class="tentang-tentang">
							<form method="post" action="<?= base_url('Tutor/Profil/Ganti_Profil') ?>">
								<div class="form-group">
									<label>ID Tutor</label>
									<input type="text" name="id_tutor" class="form-control" value="<?= $tutor->id_tutor ?>" readonly>
								</div>
								<div class="form-group leftt">
									<label>Nama Lengkap</label>
									<input type="text" name="nama_lengkap_tutor" class="form-control" value="<?= $tutor->nama_lengkap_tutor ?>">
								</div>
								<div class="form-group rightt">
									<label>Nama Panggilan</label>
									<input type="text" name="nama_panggilan_tutor" class="form-control" value="<?= $tutor->nama_panggilan_tutor ?>">
								</div>
								<br>
								<div class="form-group leftt">
									<label>Email</label>
									<input type="email" name="email_tutor" class="form-control" value="<?= $tutor->email_tutor ?>">
								</div>
								<div class="form-group rightt">
									<label>No. Whatsapp</label><br>
									<input type="text" class="form-control float-left col-3" value="(+62)" readonly>
									<input type="number" name="no_whatsapp_tutor" class="float-left col-9 form-control" value="<?= $tutor->no_whatsapp_tutor ?>">
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
								<div class="form-group">
									<div class="float-left col-7">
										<label>Password</label>
										<input readonly type="password" name="password" class="form-control" value="<?= $tutor->password_tutor ?>">
									</div>
									<div class="float-right col-4">
										<label>Ganti Password</label><br>
										<button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#exampleModal">
  											Ganti
										</button>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group leftt">
									<label>Universitas</label>
									<input type="text" name="universitas_tutor" class="form-control" value="<?= $tutor->universitas_tutor ?>">
								</div>
								<div class="form-group rightt">
									<label>Jurusan</label><br>
									<input type="text" name="jurusan_tutor" class="form-control" value="<?= $tutor->jurusan_tutor ?>">
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
								<div class="form-group leftt">
									<label>Asal Provinsi</label>
									<input type="text" name="provinsi" class="form-control" value="<?= $tutor->provinsi ?>">
								</div>
								<div class="form-group rightt">
									<label>Kabupaten/Kota</label><br>
									<input type="text" name="kabupaten_kota" class="form-control" value="<?= $tutor->kabupaten_kota ?>">
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
								<div class="form-group leftt">
									<label>Mata Pelajaran</label>
									<input type="text" name="matapelajaran_tempuh" class="form-control" value="<?= $tutor->matapelajaran_tempuh ?>">
								</div>
								<div class="form-group rightt">
									<label>Quotes Tutor</label><br>
									<input type="text" name="quotes_tutor" class="form-control" value="<?= $tutor->quotes_tutor ?>">
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>								
								<div class="form-group text-center">
									<button class="btn text-white" style="background-color: rgb(140, 38, 242);">Ganti Keterangan</button>
								</div>
							</form>
						</div>
					</div>
					<div class="clearfix"></div>
				<?php endforeach?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" style="z-index: 100000" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('Tutor/Profil/Ganti_Password') ?>">
	      <div class="modal-body">
	      	<?php foreach( $pengajar as $tutor ) : ?>
	      	<div class="form-group">
	      		<label>ID</label>
	       		<input type="text" name="id_tutor" class="form-control" value="<?= $tutor->id_tutor ?>" readonly>
	       	</div>
	       	<div class="form-group">
	      		<label>Password Lama</label>
	       		<input type="password" name="last_pass" class="form-control" required>
	       	</div>
	       	<div class="form-group">
	      		<label>Password Baru</label>
	       		<input type="password" name="new_pass" class="form-control" required>
	       	</div>
	       	<?php endforeach;?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	  </form>
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