<?php  ?>
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
		.section-3{
		  overflow-y:hidden;
		  -ms-overflow-style:-ms-autohiding-scrollbar;
		}
		.section-3 table td, .section-3 table th{
		  white-space:nowrap; 
		}
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fas fa-share mr-1"></i>
						Data Testimoni
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<h4 class="mb-4"><strong>Data Kode Referral</strong></h4>
			<input type="text" name="kode_referral" class="form-control float-left col-6" placeholder="Cari Kode Referral">
			<div class="clearfix m-4"></div>
			<div class="section-3">
				<table class="table table-bordered table-stripped text-center">
					<tr class="bg-primary">
						<th>No</th>
						<th>Id Tutor</th>
						<th>Nama Tutor</th>
						<th>Kode Referral</th>
						<th>Aksi</th>
					</tr>
					<?php $no = 1; foreach( $referral as $ref ) :  ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $ref->id_tutor ?></td>
							<td><?= $ref->nama_lengkap_tutor ?></td>
							<td><?= $ref->kode_referral ?></td>
							<td><a href="<?= base_url('Administrator/Referral/Delete/'.$ref->id_tutor) ?>"><h3><i class="text-danger fa fa-trash"></i></h3></a></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>