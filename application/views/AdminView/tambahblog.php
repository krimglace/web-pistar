<?php  ?>

<script type="text/javascript" src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }

	@media screen and (min-width: 751px){
		.left-artikel{ float: left; width: 60%; }
		.right-artikel{ float: left; width: 40%; }
	}

</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fa fa-plus mr-1"></i>
						Tambah Artikel
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<form method="post" action="<?= base_url('Administrator/Blog/TambahBlogAksi') ?>" enctype="multipart/form-data">
				<div class="form-group text-center">
					<label><strong>Judul Artikel</strong></label>
					<input class="form-control" type="text" name="judul_artikel"></input>
				</div>
				<div class="left-artikel text-center p-2">
					<div class="form-group">
						<label><strong>Featured Image</strong></label>
						<input type="file" name="featured_image" class="form-control">
					</div>
					<label><strong>Isi Artikel</strong></label>
					<textarea class="ckeditor" id="ckeditor" name="content_blog"></textarea>
				</div>
				<div class="right-artikel p-2">
					<div class="form-group">
						<label><strong>Author</strong></label>
						<select class="form-control" name="author">
							<?php foreach( $Author as $auth ) : ?>
							<option value="<?= $auth->nama_panggilan_admin ?>"><?= $auth->nama_panggilan_admin ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label><strong>Tanggal Upload</strong></label>
						<input class="form-control" type="datetime-local" name="tanggal_upload"></input>
					</div>
					<div class="form-group">
						<label><strong>Kategori</strong></label>
						<select class="form-control" name="kategori_blog">
							<?php foreach( $Kategori as $ktg ) : ?>
							<option value="<?= $ktg->nama_kategori ?>"><?= $ktg->nama_kategori ?></option>
							<?php endforeach; ?>
						</select>
						<input type="button" class="btn btn-success mt-2 form-control" data-toggle="modal" data-target="#exampleModal" value="Tambah Kategori">
					</div>
					<div class="form-group">
						<label><strong>Last Image</strong></label>
						<input type="file" name="last_picture" class="form-control">
					</div>
				</div>
				<div class="form-group text-center">
					<input class="form-control btn btn-secondary" type="submit" value="Tambah Artikel"></input>
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>
</div>

<!-- Tambah Kategori -->
<div class="modal fade" style="z-index: 10000000" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
    		<form action="<?= base_url('Administrator/Blog/TambahKategori') ?>" method="post">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">New Kategori</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
        			<div class="form-group">
        				<label>Nama Kategori</label>
        				<input type="text" name="nama_kategori" class="form-control">
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