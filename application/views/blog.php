<?php ?>
<script type="text/javascript">
	var menu = document.querySelectorAll('.blog-menu');
	menu[0].classList.add('active-menu');
</script>
<style type="text/css">
	.artikel{
		border: 1px solid black;
		border-radius: 10px;
	}
	.main-content{
		margin: 5% 5% 0 5% ;
		background-color: white;
	}
	.blogcontent{
		margin-bottom: 1.5%;
	}
	.artikel img{
		width: 75%;
		height: 200px;
	}
	body{
		
		background-image: url(https://s0.smartresize.com/wallpaper/151/613/HD-wallpaper-abstract-dots-glitter-sparkle.jpg);
		background-repeat: no-repeat;
		background-position: bottom;
		background-size: cover;
	}
	.content a{ color: blue }
	@media screen and (min-width: 750px){
		.blogcontent{
			float: left;
			width: 30%;
			margin: 1.5%;
		}
		body{ background-image: url(https://a-static.besthdwallpaper.com/latar-belakang-salju-artistik-wallpaper-1366x768-12135_46.jpg);
		background-size: cover;
		background-attachment: fixed;
		background-repeat: no-repeat; }
	}
</style>
<br><br>
<div class="main-content">
	<?php 
		foreach( $blog as $artikel ) : 
			date_default_timezone_set('Asia/Jakarta');
			$datetime = date('d M Y - H:i', strtotime($artikel->tanggal_upload));
	?>
	<div class="blogcontent">
		<div class="p-2 artikel text-center">
			<img src="<?= base_url('assets/mystyle/img/blog/'.$artikel->featured_image) ?>">
			<h4 class="text-justify"><strong><?= $artikel->judul_artikel ?></strong></h4>
			<div class="content text-justify">
				<i class="fa fa-clock-o"></i> <?= $datetime ?>
				<?= substr($artikel->content_blog, 0, 75) ?>...
				<a href="<?= base_url('Blog/Read/'.$artikel->id_blog); ?>">Baca Selanjutnya</a>
			</div>
		</div>
	</div>
	<?php endforeach;?>
	<div class="clearfix"></div>
</div>
<br><br><br>

