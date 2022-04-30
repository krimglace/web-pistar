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
						<?php foreach( $siswawali as $siswa ) : ?>
						Profil <?= $siswa->nama_lengkap_user ?>
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
				<?php foreach( $siswawali as $siswa ) : ?>
					<div class="left-about">
						<div class="tentang-logo text-center">
							<form enctype="multipart/form-data" method="post" action="<?= base_url('Siswa/Profil/Ganti_FotoProfil') ?>">
								<div class="form-group">
									<input type="hidden" name="id_siswawali" class="form-control text-center" value="<?= $siswa->id_siswawali ?>">
								</div>
								<h4><strong>Foto Profil</strong></h4>
								<img src="<?= base_url('assets/mystyle/img/user/'.$siswa->pp_siswa) ?>" width="75%"><br><br>
								<h6><strong>Ganti Foto</strong></h6>
								<input type="file" name="pp_siswa" class="form-control"><br>
								<input type='submit' name='submit' value='Ganti Foto' />
							</form>
						</div>
						<br>
					</div>
					<div class="right-about pl-3">
						<div class="tentang-tentang">
							<form method="post" action="<?= base_url('Siswa/Profil/Ganti_Profil') ?>">
								<div class="form-group">
									<label>ID Siswa</label>
									<input type="text" name="id_siswawali" class="form-control" value="<?= $siswa->id_siswawali ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Lengkap Siswa</label>
									<input type="text" name="nama_lengkap_user" class="form-control" value="<?= $siswa->nama_lengkap_user ?>">
								</div>
								<div class="form-group">
									<label>Nama Panggilan Siswa</label>
									<input type="text" name="nama_panggilan_user" class="form-control" value="<?= $siswa->nama_panggilan_user ?>">
								</div>
								<div class="form-group">
									<label>Email Siswa</label>
									<input type="email" name="email_user" class="form-control" value="<?= $siswa->email_user ?>">
								</div>
								<div class="form-group">
									<label>Nomor Whatsapp Siswa</label>
									<input type="number" name="no_whatsapp_user" class="form-control" value="<?= $siswa->no_whatsapp_user ?>">
								</div>
								<div class="form-group">
									<label>Alamat Siswa</label>
									<input type="text" name="alamat_user" class="form-control" value="<?= $siswa->alamat_user ?>">
								</div>
								<div class="form-group">
									<div class="float-left col-7">
										<label>Password Siswa</label>
										<input readonly type="password" name="password" class="form-control" value="<?= $siswa->password_user ?>">
									</div>
									<div class="float-right col-4">
										<label>Ganti Password</label><br>
										<button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#exampleModal">
  											Ganti
										</button>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label>Kelas</label>
									<select name="kelas_user" class="form-control">
										<option value="Belum Sekolah" <?php if($siswa->kelas == "TK") { echo "selected";} ?> >TK</option>
										<option value="1" <?php if($siswa->kelas == "1") { echo "selected";} ?> >1</option>
										<option value="2" <?php if($siswa->kelas == "2") { echo "selected";} ?> >2</option>
										<option value="3" <?php if($siswa->kelas == "3") { echo "selected";} ?> >3</option>
										<option value="4" <?php if($siswa->kelas == "4") { echo "selected";} ?> >4</option>
										<option value="5" <?php if($siswa->kelas == "5") { echo "selected";} ?> >5</option>
										<option value="6" <?php if($siswa->kelas == "6") { echo "selected";} ?> >6</option>
										<option value="7" <?php if($siswa->kelas == "7") { echo "selected";} ?> >7</option>
										<option value="8" <?php if($siswa->kelas == "8") { echo "selected";} ?> >8</option>
										<option value="9" <?php if($siswa->kelas == "9") { echo "selected";} ?> >9</option>
									</select>
								</div>
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
      <form method="post" action="<?= base_url('Siswa/Profil/Ganti_Password') ?>">
	      <div class="modal-body">
	      	<?php foreach( $siswawali as $siswa ) : ?>
	      	<div class="form-group">
	      		<label>ID</label>
	       		<input type="text" name="id_siswawali" class="form-control" value="<?= $siswa->id_siswawali ?>" readonly>
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