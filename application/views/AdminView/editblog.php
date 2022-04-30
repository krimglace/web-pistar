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
						<i class="fa fa-edit mr-1"></i>
						Update Artikel
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<?php foreach( $artikel as $blog ) :?>
			<form method="post" action="<?= base_url('Administrator/Blog/EditAksi') ?>" enctype="multipart/form-data">
				<input type="hidden" name="id_blog" value="<?= $blog->id_blog ?>">
				<div class="form-group text-center">
					<label><strong>Judul Artikel</strong></label>
					<input class="form-control" type="text" name="judul_artikel" value="<?= $blog->judul_artikel ?>"></input>
				</div>
				<div class="left-artikel text-center p-2">
					<div class="form-group">
						<label><strong>Featured Image</strong></label>
						<br>
						<img src="<?= base_url('assets/mystyle/img/blog/'.$blog->featured_image) ?>" width="50%;">
						<input type="file" name="featured_image" class="form-control" value="<?= $blog->featured_image ?>">
					</div>
					<label><strong>Isi Artikel</strong></label>
					<textarea class="ckeditor" id="ckeditor" name="content_blog"><?= $blog->content_blog ?></textarea>
				</div>
				<div class="right-artikel p-2">
					<div class="form-group">
						<label><strong>Author</strong></label>
						<select class="form-control" name="author">
							<?php foreach( $Author as $auth ) : ?>
							<option  value="<?= $auth->nama_panggilan_admin ?>" <?php if($blog->author == "<?= $auth->nama_panggilan_admin ?>") { echo "selected";} ?>><?= $auth->nama_panggilan_admin ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label><strong>Kategori</strong></label>
						<select class="form-control" name="kategori_blog">
							<?php foreach( $Kategori as $ktg ) : ?>
							<option value="<?= $ktg->nama_kategori ?>" <?php if($blog->kategori_blog == "<?= $ktg->nama_kategori ?>") { echo "selected";} ?> ><?= $ktg->nama_kategori ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group text-center">
						<label><strong>Last Image</strong></label>
						<br>
						<img src="<?= base_url('assets/mystyle/img/blog/'.$blog->last_picture) ?>" width="50%;">
						<input type="file" name="last_picture" class="form-control" value="<?= $blog->last_picture ?>">
					</div>
				</div>
				<div class="form-group text-center">
					<input class="form-control btn btn-secondary" type="submit" value="Update Artikel"></input>
				</div>
				<div class="clearfix"></div>
			</form>
			<?php endforeach ?>
		</div>
	</div>
</div>
