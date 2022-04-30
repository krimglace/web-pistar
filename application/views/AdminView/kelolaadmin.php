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
						Kelola Admin
					</b>
				</h5>
			</div>
			<br>
			<button type="button" class="text-left btn btn-success mt-2 form-control" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-2"></i> Tambah Admin</button>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<h5 class="text-center"><strong>Administrator</strong></h5>
			<div class="table-post">
				<table class="table table-striped table-bordered">
					<tr>
						<th>No</th>
						<th>Nama Lengkap</th>
						<th>Nama Panggilan</th>
						<th>Email</th>
						<th class="text-center">Aksi</th>
					</tr>
					<?php
						$no = 1;
						foreach( $admin as $adm ) :
							if( $adm->email_admin != 'pepengajah29@gmail.com') :
					?>
					<tr class="bg-success">
						<td class="text-white"><?= $no++ ?></td>
						<td class="text-white"><?= $adm->nama_lengkap_admin ?></td>
						<td class="text-white"><?= $adm->nama_panggilan_admin ?></td>
						<td class="text-white"><?= $adm->email_admin ?></td>
						<td class="text-center"><a href="<?= base_url('Administrator/Kelola_Pengguna/HapusAdmin/'.$adm->id) ?>"><h3><i class="text-dark fa fa-trash"></i></h3></a></td>
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

<!-- Tambah Kategori -->
<div class="modal fade" style="z-index: 10000000" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
    		<form action="<?= base_url('Administrator/Kelola_Pengguna/TambahAdmin') ?>" method="post">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">New Admin</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
        			<div class="form-group">
        				<label>Email Admin</label>
        				<input type="email" name="email_admin" class="form-control" required="">
        			</div>
        			<div class="form-group">
        				<label>Password Admin</label>
        				<input type="password" name="password_admin" class="form-control" required="">
        			</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        		<button type="submit" class="btn btn-primary">Tambahkan</button>
	      		</div>
      		</form>
    	</div>
  	</div>
</div>