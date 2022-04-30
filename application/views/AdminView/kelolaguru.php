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
						Kelola Guru
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<h5 class="text-center"><strong>Guru</strong></h5>
			<div class="table-post">
				<table class="table table-striped table-bordered">
					<tr>
						<th>No</th>
						<th>ID</th>
						<th>Nama Lengkap</th>
						<th>Email</th>
						<th>No Telepon</th>
						<th colspan="2" class="text-center">Aksi</th>
					</tr>
					<?php
						$no = 1;
						foreach( $guru as $gr ) :
							if( $gr->setujui_tutor == '' ) :
					?>
						<tr class="bg-warning">
							<td class="text-white"><?= $no++ ?></td>
							<td class="text-white text-center"><?= $gr->id_tutor ?><br><a href="<?= base_url('Administrator/Kelola_Pengguna/ResetPasswordGuru/'.$gr->id_tutor) ?>" class="btn btn-info">Reset Password</a></td>
							<td class="text-white"><?= $gr->nama_lengkap_tutor ?></td>
							<td class="text-white"><?= $gr->email_tutor ?></td>
							<td class="text-white"><?= $gr->no_whatsapp_tutor ?></td>
							<td class="text-center"><a href="<?= base_url('Administrator/Kelola_Pengguna/SetujuiTutor/'.$gr->id_tutor) ?>"><h3><i class="text-dark fa fa-user-plus"></i></h3></a></td>
							<td class="text-center"><a href="<?= base_url('Administrator/Kelola_Pengguna/TidakSetujuiTutor/'.$gr->id_tutor) ?>"><h3><i class="text-dark fa fa-user-times"></i></h3></a></td>
						</tr>
					<?php else :?>
						<tr class="bg-success">
						<td class="text-white"><?= $no++ ?></td>
						<td class="text-white text-center"><?= $gr->id_tutor ?><br><a href="<?= base_url('Administrator/Kelola_Pengguna/ResetPasswordGuru/'.$gr->id_tutor) ?>" class="btn btn-info">Reset Password</a></td>
						<td class="text-white"><?= $gr->nama_lengkap_tutor ?></td>
						<td class="text-white"><?= $gr->email_tutor ?></td>
						<td class="text-white"><?= $gr->no_whatsapp_tutor ?></td>
						<td class="text-center"><a href="<?= base_url('Administrator/Kelola_Pengguna/Kelola_Kinerja/'.$gr->id_tutor) ?>"><h3><i class="text-dark fa fa-eye"></i></h3></a></td>
						<td class="text-center"><a href="<?= base_url('Administrator/Kelola_Pengguna/HapusGuru/'.$gr->id_tutor) ?>"><h3><i class="text-dark fa fa-trash"></i></h3></a></td>
					</tr>
					<?php
							endif;
						endforeach;
					?>
				</table>
			</div>
		</div>
	</div>
</div>