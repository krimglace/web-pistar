<?php ?>
<script type="text/javascript">
	var menu = document.querySelectorAll('.blog-menu');
	menu[0].classList.add('active-menu');
</script>
<style type="text/css">
	body{
		
		background-image: url(https://s0.smartresize.com/wallpaper/151/613/HD-wallpaper-abstract-dots-glitter-sparkle.jpg);
		background-repeat: no-repeat;
		background-position: bottom;
		background-size: cover;
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
<br><br>
<div class="main-content bg-white">
	<?php foreach( $blog as $bl ) : ?>
		<div class="bg-dark p-5 text-white mc">
			<h1><?= $bl->judul_artikel ?></h1>
			<a href="<?= base_url('Blog') ?>" class="link text-white">Blog/</a><?= $bl->judul_artikel ?>
		</div>
		<div class="text-center blog-blog pt-3 ">
			<img src="<?= base_url('assets/mystyle/img/blog/'.$bl->featured_image) ?>"><br><br>
			<ul class="authorisasi text-justify">
				<li><?= $bl->tanggal_upload ?></li>
				<li><b><?= $bl->author ?></b></li>
				<li><b><?= $bl->kategori_blog ?></b></li>
			</ul>
			<ul class="komentar">
				<?php
					$idblog = $bl->id_blog;
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
			<?= $bl->content_blog ?><br>
		</div>
		<?php if($bl->last_picture != '' || $bl->last_picture != NULL) : ?>
			<div class="last text-center mb-5">
				<img src="<?= base_url('assets/mystyle/img/blog/'.$bl->last_picture) ?>">
			</div>
		<?php endif; ?>

		<div class=" alert-success p-5">
			<h5 class="form-control bg-success text-white p-2"><i class="fa fa-envelope ml-3"></i><b> Hubungi Kami</b></h5>
			<form action="<?= base_url('Blog/Add_Comment/'.$bl->id_blog) ?>" method="post">
				<input type="hidden" name="id_blog" value="<?= $bl->id_blog ?>">
				<label>Email</label>
				<input type="email" name="email_comment" class="form-control" required>
				<label>Pesan</label>
				<textarea name="comment" class="form-control" rows="5"></textarea>
				<button type="submit" class="btn btn-primary mt-2">Simpan</button>
			</form>
		</div>
	<?php endforeach; ?>
</div>