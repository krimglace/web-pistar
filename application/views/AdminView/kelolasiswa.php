<?php  ?>
<script type="text/javascript" src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fa fa-users mr-1"></i>
						Kelola Siswa
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<h5 class="text-center"><strong>Siswa</strong></h5>
			<div class="table-post">
				<table class="table table-striped table-bordered">
					<tr>
						<th>No</th>
						<th>ID</th>
						<th>Nama Lengkap</th>
						<th>Email</th>
						<th>No Telepon</th>
						<th class="text-center">Aksi</th>
					</tr>
					<?php
						$no = 1;
						foreach( $siswa as $ssw ) :
					?>
					<tr class="bg-success">
						<td class="text-white"><?= $no++ ?></td>
						<td class="text-white text-center"><?= $ssw->id_siswawali ?><br><a href="<?= base_url('Administrator/Kelola_Pengguna/ResetPasswordSiswa/'.$ssw->id_siswawali) ?>" class="btn btn-info">Reset Password</a></td>
						<td class="text-white"><?= $ssw->nama_lengkap_user ?></td>
						<td class="text-white"><?= $ssw->email_user ?></td>
						<td class="text-white"><?= $ssw->no_whatsapp_user ?></td>
						<td class="text-center"><a href="<?= base_url('Administrator/Kelola_Pengguna/HapusSiswa/'.$ssw->id_siswawali) ?>"><h3><i class="text-dark fa fa-trash"></i></h3></a></td>
					</tr>
					<?php
						endforeach;
					?>
				</table>
			</div>
		</div>
	</div>
</div>