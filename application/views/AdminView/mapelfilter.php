<?php  ?>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	@media screen and (max-width: 750px){
		.content-header h5{ font-size: 100%;}
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
						<i class="fa fa-book mr-1"></i>
						Mata Pelajaran
					</b>
				</h5>
			</div>
			<br>
			<a data-toggle="modal" data-target="#TambahPelajaran" style="cursor: pointer;">
				<div class=" tambah-blog alert alert-success">
					<i class="fa fa-plus mr-2"></i> 
					Tambah Pelajaran 
				</div>
			</a>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<form action="<?= site_url('Administrator/Mata_Pelajaran/Filter') ?>" method="post">
				<div>
					<h5 class="text-center"><strong>Nama Program</strong></h5>
					<select name="namaprogram" id="namaprogram" class="form-control">
						<option value="TK">TK</option>
						<option value="SD">SD</option>
						<option value="SMP">SMP</option>
					</select>
					<div class="form-group">
						<style type="text/css">
							.cek:hover{
								box-shadow: -5px 5px 10px 0px rgb(140, 38, 242);
								transition: .5s;
							}
						</style>
						<button type="submit" class="btn cek mt-2 text-white" style="border: 5px solid rgb(140, 38, 242);background-color: rgba(140, 38, 242, 0.8); transition: .5s"><i class="fa fa-search"></i> Cek Paket</button>
					</div>
				</div>
			</form>
			<div class="section-3">
				<table class="table table-striped table-bordered table-hover">
					<tr>
						<th>No</th>
						<th>Tingkat</th>
						<th>Nama Mata Pelajaran</th>
						<th>Aksi</th>
					</tr>
					<?php $no = 1;
					 foreach ($mapel as $mpl): ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $mpl->tingkatan ?></td>
							<td><?= $mpl->nama_mapel ?></td>
							<td><a href="<?= base_url('Administrator/Mata_Pelajaran/hapusPelajaran/'.$mpl->id_mapel) ?>"><h3><i class="text-danger fa fa-trash"></i></h3></a></td>
						</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
<div style="z-index: 100000" class="modal fade" id="TambahPelajaran" tabindex="-1" aria-labelledby="TambahPelajaranLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header bg-secondary">
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="text-center" style="margin-bottom: -10px;">
						<h4><strong>Tambah Mata Pelajaran</strong></h4>
						<br>
					</div>
					<div>
						<form method="post" action="<?= base_url('Administrator/Mata_Pelajaran/TambahPelajaran') ?>">
							<?php foreach ($mapel as $mpl): ?>
								<input type="hidden" name="tingkatan" value="<?= $mpl->tingkatan ?>">
							<?php endforeach ?>
							<div class="form-login">
								<div class="form-group">
									<input type="text" name="mapel" class="form-control mt-2" required>
								</div>
								<div class="form-group">
									<button class="mt-2 btn btn-primary w-100 btn-user btn-block">Tambah</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer bg-secondary"></div>
		</div>
	</div>
</div>