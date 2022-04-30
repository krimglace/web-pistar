<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	@media screen and (min-width: 751px){

	}
	@media screen and (max-width: 750px){
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
						<i class="fas fa-envelope mr-1"></i>
						Kotak Saran
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="section-3">
				<h4 class="mb-4"><strong>Data Saran</strong></h4>
				<table class="table table-bordered table-stripped text-center">
					<tr class="bg-primary">
						<th>No</th>
						<th>Id User</th>
						<th>Subjek</th>
						<th>Isi</th>
						<th>Target</th>
						<th>Aksi</th>
					</tr>
					<?php $no = 1; foreach( $kotaksaran as $saran ) :  ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $saran->id ?></td>
							<td><?= $saran->judul_saran ?></td>
							<td><?= $saran->isi_saran ?></td>
							<td><?= $saran->target ?></td>
							<td><a href="<?= base_url('Administrator/Kotak_Saran/Delete/'.$saran->id_saran) ?>"><h3><i class="text-danger fa fa-trash"></i></h3></a></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
