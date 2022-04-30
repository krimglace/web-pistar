<?php  ?>
<script type="text/javascript">
	var menu = document.querySelectorAll('.jadi-pengajar-menu');
	menu[0].classList.add('active-menu');
</script>
<style type="text/css">
	.header-left{
		background-color: rgb(140, 38, 242);
		padding-bottom: 50%;
		border-bottom-right-radius: 80%;
	}
	.header-left a.pesan-sekarang{
		background-color: white;
		color: rgb(140, 38, 242);
		transition: .5s;
	}
	a.pesan-sekarang:hover{
		background-color: rgb(140, 38, 242);
		transition: .5s;
		box-shadow: 2px 2px 10px 4px white;
		color: white;
	}
	.header-left h1{
		font-size: 120%;
		margin-top: -10%;
		width: 100%;
	}
	.header-left h6{
		font-size: 80%;
		width: 100%;
	}
	.video-pengajar-right{
		width: 90%; text-align: center; margin-top: -40%; margin-left: 5%;
	}
	.section{
		margin: 0 10%;
	}
	ul.guru-pistar li{
		font-size: 120%;
		display: block;
		margin-left: -10%;
		text-align:left;
	}
	@media screen and (min-width: 1101px){
		ul.guru-pistar img{
			width: 100%;
		}
		li.gambar img{
			width: 10%;
			margin-right: 5%;
		}
		li.text h4{
			width: 80%;
		}
		.video-pengajar-right{
			width: 50%; text-align: center; margin-left: 25%; margin-top: -25%
		}
		.header-left h1{
			width: 70%; margin-left: 15%;margin-top: 0%; font-size: 250%;
		}
		.header-left{
			background-color: rgb(140, 38, 242);
			padding-bottom: 25%;
			border-bottom-right-radius: 100%;
		}
		.section-2{
			justify-content: center;
			align-items: center;
			display: flex;
			position: relative;
		}
		.section-2-right{
			float: right;
			width: 40%;
		}
		.section-2-left{
			float: left;
			width: 55%
		}
		img.pistar{
			width: 20%;
		}
		.section-1-mid h2{
			font-size: 180%;
		}
		.section-2-left h1{
			font-size: 300%;
		}
		.item-3{
			display: none;
		}
		.section-2-left h4{
			font-size: 120%;
		}
	}
	@media screen and (min-width: 750px) and (max-width: 1100px){
		ul.guru-pistar img{
			width: 100%;
		}
		li.gambar img{
			width: 10%;
			margin-right: 5%;
		}
		li.text h4{
			width: 80%;
			font-size: 80%;
		}
		.video-pengajar-right{
			width: 70%; text-align: center; margin-left: 15%; margin-top: -25%
		}
		.header-left h1{
			font-size: 150%; margin-top: 5%;width: 80%; margin-left: 10%;
		}
		.header-left{
			background-color: rgb(140, 38, 242);
			padding-bottom: 25%;
			border-bottom-right-radius: 100%;
		}
		.section-2{
			justify-content: center;
			align-items: center;
			display: flex;
			position: relative;
		}
		.section-2-right{
			float: right;
			width: 40%;
		}
		.section-2-left{
			float: left;
			width: 55%
		}
		img.pistar{
			width: 40%;
		}
		.section-1-mid h2{
			font-size: 180%;
		}
		.item-3{
			display: none;
		}
		.section-1-mid h2{
			font-size: 180%;
		}
		.section-2-left h1{
			font-size: 300%;
		}
	}
	@media screen and (max-width: 749px){
		ul.guru-pistar img{
			width: 100%;
		}
		li.gambar img{
			width: 15%;
			margin-right: 5%;
		}
		li.text h4{
			width: 100%;
			text-align: justify;
		}
		.section-2-left h4{
			font-size: 80%;
		}
		.section-1 h1{
			font-size: 150%;
		}
		img.pistar{
			width: 50%;
		}
		.section-1-mid h2{
			font-size: 120%;
		}
		.section-2-left h2{
			font-size: 150%;
			margin-top: 10%;
		}
		.section-2-left p{
			text-align: justify;
		}
		.item-2{
			display: none;
		}
	}
	.section-4{
		background-image: url(<?= base_url('assets/mystyle/img/bg_caradaftar.png') ?>);
	}
	a.pesan-sekarang{ background-color: rgb(140, 38, 242); color: white; border-radius: 10px; margin-bottom: 50px; box-shadow: -10px 10px 20px 1px rgba(140, 38, 242, 0.6); transition: .5s; }
	a.pesan-sekarang:hover{ box-shadow: 10px -10px 20px 1px rgba(140, 38, 242, 0.6); color: white; transition: .5s; }

</style>
<div class="jadipengajar">
	<div class="header-main">
		<div class="header-left text-center text-white">
			<br> 
			<br>
			<br>
			<h1><b>Anda Seorang Guru Berpengalaman ?</b><br><b>Mau karir yang masa depannya cerah dan berdampak besar?</b></h1>
			<h6>Tambah Penghasilan Anda dengan Menjadi Mitra Pengajar di PISTAR</h6>
			<br>
			<a class="btn pesan-sekarang" data-toggle="modal" data-target="#RegisterBox">Daftar Sekarang</a>
		</div>
		<div class="video-pengajar-right" style="">
			<?php foreach( $panduan as $panduanpengajar ) : ?>
				<iframe width="100%" height="315" src="<?= $panduanpengajar->link ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<br>
<br>
<div class="section">
	<div class="section-1">
		<h1 class="text-center" style="color: rgb(140, 38, 242);"><strong>Apa Itu Pistar ?</strong></h1>
		<div class="section-1-mid text-center">
			<br>
			<h2><strong><i>" PISTAR Adalah Startup Pendidikan Yang Memiliki Visi Untuk Meningkatkan Kualitas Para Siswa Di Indonesia Dengan Menyamaratakan Kualitas Para Pengajarnya. "</i></strong></h2>
			<br>
		</div>
		<div class="clearfix"></div>
		<div class="text-center">
			<?php foreach ($tentang as $ttg): ?>
				<img src="<?= base_url('assets/mystyle/img/'.$ttg->logo_pistar) ?>" class="pistar">
			<?php endforeach ?>
		</div>
	</div>
	<hr>
	<br>
	<div class="section-2 bg-white p-5" style="border-radius: 20px;margin: -30px;">
		<div class="section-2-right">
			<img src="<?= base_url('assets/mystyle/img/jadi_pengajar2.svg') ?>" width="80%">
		</div>
		<div class="section-2-left">
			<h2><strong>Siapa Sajakah Yang Dapat Menjadi Pengajar PISTAR?</strong></h2>
			<br>
			<p>Mitra pengajar PISTAR ialah mereka yang ingin berkarya dan berupaya membantu untuk mencerdaskan anak bangsa terbuka untuk Guru Tetap maupun Guru Honorer di sekolah, selain itu Mahasiswa maupun Karyawan yang memiliki keterampilan dalam mengajar dapat bergabung menjadi mitra pengajar PISTAR.</p>
			<br>
			<a class="btn pesan-sekarang text-white" data-toggle="modal" data-target="#RegisterBox">Daftar Sekarang</a>
		</div>
		<div class="clearfix"></div>
		<br><br><br><br>
	</div>
	<br>
	<br>
	<div class="section-3 text-center">
		<h2><strong>Guru PISTAR itu...</strong></h2>
		<br>
		<i class="fas fa-mic"></i>
		<div>
			<div class="section-2-right">
				<img src="https://i.pinimg.com/originals/ce/7d/a1/ce7da1a2f5c8a89f1537025969dfb1b3.png" width="80%">
			</div>
			<div class="section-2-left" style="text-align: justify;">
				<br>
				<ul class="guru-pistar">
					<li class="gambar"><img src="https://cdn.pixabay.com/photo/2013/07/12/12/46/loudspeaker-146205_960_720.png" class="float-left"></li>
					<li class="text"><h4 class="float-left" style="margin-top: 1%;"><b>Terlatih dalan komunikasi dan public speaking</b></h4></li>
					<div class="clearfix"></div>
				</ul>
				<ul class="guru-pistar">
					<li class="gambar"><img src="https://cdn.pixabay.com/photo/2014/04/03/11/55/rocket-312583_960_720.png" class="float-left"></li>
					<li class="text"><h4 class="float-left" style="margin-top: 1%;"><b>Mewujudkan kelas impian yang nyaman dan menyenangkan bagi siswa</b></h4></li>
					<div class="clearfix"></div>
				</ul>
				<ul class="guru-pistar">
					<li class="gambar"><img src="https://cdn.pixabay.com/photo/2014/04/02/16/24/money-307192_960_720.png" class="float-left"></li>
					<li class="text"><h4 class="float-left" style="margin-top: 1%;"><b>Mendapat kompensasi dan bonus yang menarik</b></h4></li>
					<div class="clearfix"></div>
				</ul>
				<ul class="guru-pistar">
					<li class="gambar"><img src="https://i.pinimg.com/originals/21/62/6a/21626a0c67386eb45ae23deacf49b15a.png" class="float-left"></li>
					<li class="text"><h4 class="float-left" style="margin-top: 1%;"><b>Rendah hati dan tidak sombong dalam membantu siswa</b></h4></li>
					<div class="clearfix"></div>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<a class="btn pesan-sekarang text-white" data-toggle="modal" data-target="#RegisterBox">Daftar Sekarang</a>
	</div>
	<br><br>
</div>

