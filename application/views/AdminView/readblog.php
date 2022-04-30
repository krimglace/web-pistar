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

	.main-content{
		border-radius: 20px;
		margin: 0;
	}
	.mc{ border-top-right-radius: 20px; border-top-left-radius: 20px; }
	.blog-blog img { width: 90%; margin: 0 5%;}
	.last img{ width: 90%; margin: 0 5%;}
	@media screen and (min-width: 751px){
		.main-content{ margin: 0 15%; }
		.blog-blog img{ width: 50%;}
		.last img{ width: 50%;}
		.main-content {margin-top: 5%;}
		body{ background-image: url(https://a-static.besthdwallpaper.com/latar-belakang-salju-artistik-wallpaper-1366x768-12135_46.jpg);
		background-size: cover;
		background-attachment: fixed;
		background-repeat: no-repeat; }
	}
	a.link:hover{
		text-decoration: none;
	}
	ul.authorisasi{ float: left; width: 60%;}
	ul.komentar{ float: right; width: 30%;}
	ul.authorisasi li{ display: inline-block; margin-right: 5%; }

</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fa fa-edit mr-1"></i>
						Read Artikel
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-info pt-4 pr-3 pl-3 pb-3">
			<?php foreach( $artikel as $blog ) :?>
				<div class="bg-dark p-5 text-white mc">
					<h1><?= $blog->judul_artikel ?></h1>
					<a class="link text-white">Blog/</a><?= $blog->judul_artikel ?>
				</div>
				<div class="text-center blog-blog pt-3 ">
					<img src="<?= base_url('assets/mystyle/img/blog/'.$blog->featured_image) ?>"><br><br>
					<ul class="authorisasi text-justify">
						<li><?= $blog->tanggal_upload ?></li>
						<li><b><?= $blog->author ?></b></li>
						<li><b><?= $blog->kategori_blog ?></b></li>
					</ul>
					<ul class="komentar">
						<?php
							$idblog = $blog->id_blog;
							$where = array('id_blog' => $idblog);
							$this->db->where($where);
							$query = $this->db->get('tb_blog_comment')->num_rows();

							if( $query == 0 ) {
						?>
							<b><i>No Comment</i></b>
						<?php } else { ?>
							<b><i class="fa fa-comment">  <?= $query ?></i></b>
						<?php } ?>
					</ul>
					<div class="clearfix" style="border-bottom: 1px solid gray"></div>
				</div>
				<div class="content p-3">
					<?= $blog->content_blog ?><br>
				</div>
				<?php if($blog->last_picture != '' || $blog->last_picture != NULL) : ?>
					<div class="last text-center mb-5">
						<img src="<?= base_url('assets/mystyle/img/blog/'.$blog->last_picture) ?>">
					</div>
				<?php endif; ?>
			<?php endforeach ?>
		</div>
	</div>
</div>