<?php  ?>
<script type="text/javascript">
	var home = document.querySelectorAll('.home-menu');
	home[0].classList.add('active-menu');
</script>
<style>
    .header{
        width="100%";
        background-color: white;
    }
    u{
    	text-decoration: none;
    }
    .header-right{
    	margin-bottom: -10%;
    	margin-right: -10%;
    }
    .header-main{
    	padding-left: 5%;
    	color: white;
    	border-bottom-right-radius: 100px;
    	background-position: bottom;
    	background-repeat: no-repeat;
    	background-size: 100% 100%;
    }
    a.pesan-sekarang{
    	background-color: white;
    	color: rgb(140, 38, 242);
    	border-radius: 10px;
    	margin-bottom: 50px;
    	box-shadow: -10px 10px 20px 1px rgba(140, 38, 242, 0.6);
    	transition: .5s;
    }
    a.pesan-sekarang:hover{
    	box-shadow: 10px -10px 20px 1px white;
    	background-color: rgb(140, 38, 242);
    	color: white;
    	transition: .5s;
    }
    .section-1-right, .section-2-left{
    	font-family: Arial Black;
    }
    .section-3{
    	padding: 5% 0;
    }
    .item-1{
    	border-radius: 20px;
    	padding: 5%;
    	border: 3px double rgb(140, 38, 242);
    	height: 450px;
    }
    .section-4{
    	border-bottom-right-radius: 50px;
    	border-top-right-radius: 50px;
    	width: 90%;
    }
    .head-section{
    	position: relative;
    	align-items: center;
    	justify-content: center;
    	display: flex;
    }
    @media screen and (max-width: 749px){
    	h2.awal{
    		font-size: 120%;
    	}
    	.header-right, h4.awal{
    		display: none;
    	}
    	.section-1-right, .section-2-left{
    		text-align: center;
    	}
    	.section-2-right{
    		display: none;
    	}
    	.item-1 img{
    		width: 20%; margin-left: 40%
    	}
    	a.pesan-sekarang-1{ font-size: 75%; }
    	.head-section img{
            width: 30%;
        }
        .head-section .belajar{
            width: 60%;
        }
    }
    @media screen and (min-width: 750px) and (max-width: 1100px){
    	.header-left{
    		margin-top: 50px;
    		float: left;
    		width: 40%;
    	}
    	.header-left h2{
    		font-size: 300%;
    	}
    	.header-left h3{
    		font-size: 280%;
    	}
    	.header-right{
    		float: right;
    		width: 40%;
    		margin-bottom: -10%;
    		margin-right: -10%;
    		margin-top: 10%;
    	}
    	.section-1, .section-2{
    		position: relative;
    		align-items: center;
    		justify-content: center;
    		display: flex;
    	}
    	.section-2-left{
    		float: left;
    		width: 40%;
    	}
    	h1.text-section{
    		font-size: 280%;
    	}
    	h6.text-section{
    		font-size: 120%;
    	}
    	.section-1-left{
    		float: left;
    		width: 50%;
    	}
    	.section-1-right{
    		float: right;
    		width: 50%;
    	}
    	.section-2-right{
    		float: right;
    		width: 50%;
    	}
    	.section-2-right-1{
    		display: none;
    	}
    	.item-1{
    		height: 320px;
    	}
    	.item-1 img{
    		width: 10%; margin-left: 45%
    	}
    	.blogcontent{
    		float: left;
    		width: 30%;
    		margin: 0 2.5%;
    	}
    	.head-section img{
            width: 25%;
        }
        .head-section .belajar{
            width: 75%;
        }
    }
    @media screen and (min-width: 1101px){

    	.header-left{
    		float: left;
    		width: 40%;
    	}
    	.header-left h2{
    		font-size: 320%;
    	}
    	.header-left h3{
    		font-size: 300%;
    	}
    	.header-right{
    		float: right;
    		width: 40%;
    		margin-bottom: -10%;
    		margin-right: -10%;
    	}
    	.section-1, .section-2{
    		position: relative;
    		align-items: center;
    		justify-content: center;
    		display: flex;
    	}
    	.section-2-left{
    		float: left;
    		width: 40%;
    	}
    	h1.text-section{
    		font-size: 280%;
    	}
    	h6.text-section{
    		font-size: 120%;
    	}
    	.section-1-left{
    		float: left;
    		width: 50%;
    	}
    	.section-1-right{
    		float: right;
    		width: 40%;
    	}
    	.section-2-right{
    		float: right;
    		width: 50%;
    	}
    	.section-2-right-1{
    		display: none;
    	}
    	.item-1{
    		height: 320px;
    	}
    	.item-1 img{
    		width: 10%; margin-left: 45%;
    	}
    	.blogcontent{
    		float: left;
    		width: 30%;
    		margin: 0 2.5%;
    	}
    	.head-section img{
            width: 25%;
        }
        .head-section .belajar{
            width: 75%;
        }
    }
    
    a.pesan-sekarang-1{ background-color: rgb(140, 38, 242); color: white; border-radius: 10px; margin-bottom: 50px; box-shadow: -10px 10px 20px 1px rgba(140, 38, 242, 0.6); transition: .5s; }
	a.pesan-sekarang-1:hover{ box-shadow: 10px -10px 20px 1px rgba(140, 38, 242, 0.6); color: white; transition: .5s; }
</style>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/mystyle/css/home.css') ?>">
<div class="header">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php foreach( $slide1 as $sl1 ) : ?>
        <div class="carousel-item active">
          <img src="<?= base_url('assets/mystyle/img/'.$sl1->gambar_slider) ?>" class="d-block w-100" alt="...">
        </div>
        <?php endforeach ?>
        <?php foreach( $slidenext as $sl2 ) : ?>
        <div class="carousel-item">
          <img src="<?= base_url('assets/mystyle/img/'.$sl2->gambar_slider) ?>" class="d-block w-100" alt="...">
        </div>
        <?php endforeach ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    
</div>
<div style="background-color: rgb(254, 252, 217);z-index: -1;">
	<div class="container head-section">
		<img src="<?= base_url('assets/mystyle/img/siswaSD.png') ?>" width="100%;" class="float-start">
		<div class="float-start belajar" style="margin-top: 7.5%">
			<h2 class="awal"><b>Mau Belajar Apa Hari Ini?</b></h2>
			<i><h4 class="awal">Beragam Guru, Paket dan Pelajaran sedang Menunggu Kehadiranmu</h4></i>
			<a class="text-white btn pesan-sekarang-1" data-toggle="modal" data-target="#RegisterBox">Daftar Sekarang</a>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<br>
<div class="bg-white p-3" style="box-shadow: 20px 20px 20px 1px rgba(140, 38, 242, 0.6);border-bottom-right-radius: 50px; border-top-right-radius: 50px; width: 90%;">
	<div class="container">
		<div class="section-1">
			<div class="section-1-left">
				<img src="https://primaindisoft.com/blog/wp-content/uploads/2018/07/02-12.png" width="80%">
			</div>
			<div class="section-1-right">
				<h1 class="text-section"><b>Pembelajaran Yang Flexibel dan Menyenangkan</b></h1>
				<h6 class="text-section"><i>" Pembelajaran yang menyenangkan dengan berbagai pilihan paket dan diajari oleh guru - guru yang kompeten yang membuat nyaman dan tidak membosankan. "</i></h6>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="clearfix m-5"></div>
<div class="p-3" style="box-shadow: -20px -20px 20px 1px white;background-color: rgb(140, 38, 242); border-bottom-left-radius: 50px;
		border-top-left-radius: 50px; width: 90%; float: right;">
	<div class="container">
		<div class="section-2">
			<div class="section-2-right-1">
				<img src="https://cdn.siap.id/s3/simpkb/asset%20img/guru-praktik-baik/seri-panduan-pembelajaran-di-masa-pandemi-covid-19.png" width="100%">
			</div>
			<div class="section-2-left text-white">
				<h1 class="text-section"><b>Kata Siapa PJJ Itu Sulit ?</b></h1>
				<h6 class="text-section"><i>" Bersama PISTAR, pembelajaran PJJ menjadi gampang lo... Karena diajari oleh guru - guru yang keren dan asik dalam memberikan pembelajaran. "</i></h6>
			</div>
			<div class="section-2-right">
				<img src="https://cdn.siap.id/s3/simpkb/asset%20img/guru-praktik-baik/seri-panduan-pembelajaran-di-masa-pandemi-covid-19.png" width="80%">
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="clearfix m-5"></div>
<div class="bg-white p-3" style="box-shadow: 20px 20px 20px 1px rgba(140, 38, 242, 0.6); border-bottom-right-radius: 50px; border-top-right-radius: 50px; width: 90%;">
	<div class="container">
		<div class="section-1">
			<div class="section-1-left">
				<img src="https://rupayani.files.wordpress.com/2012/12/cartoon-girl-studying-copy-copy.png" width="60%">
			</div>
			<div class="section-1-right">
				<h1 class="text-section"><b>Motivasi Yang Kuat Membukakan Jalan Yang Lebar</b></h1>
				<h6 class="text-section"><i>" Udah punya motivasi? Keren! Terusin semangat belajarnya dengan mengikuti pembelajaran juga latihan soal yang disediakan PISTAR. "</i></h6>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="clearfix m-5"></div>
<br>
<br>
<div class="section-3" style="background-color: rgb(140, 38, 242)">
	<div class="m-3 text-center">
		<h1 class="m-3 text-white"><b>Mereka yang Pernah Ikut Kelas PISTAR Bilang...</b></h1>
		<br>
	</div>
	<div class="container">
		<div id="carouselExampleIndicators" class="carousel slide slide-testi text-center" data-ride="carousel">
			<?php $i = 1; ?>
	  		<ol class="carousel-indicators">
	  			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    		<li data-target="#carouselExampleIndicators" data-slide-to="<?= $i++ ?>" class="active"></li>
	  		</ol>
	  		<div class="carousel-inner text-center">
	  			<?php
					$query = "SELECT * FROM tb_testimoni_siswa AS test JOIN tb_siswawali_user AS siswa ON test.id_siswawali = siswa.id_siswawali ORDER BY test.id_testimoni ASC LIMIT 1";
					$que =  $this->db->query($query)->result();
					foreach( $que as $q ) :
				?>

	  			<div>
	  				<div class="carousel-item item-1 active alert alert-primary">
	      				<img class="d-block" src="<?= base_url('assets/mystyle/img/user/'.$q->pp_siswa) ?>">
	    				<h3><?= $q->nama_lengkap_user ?></h3>
	    				<p style="font-size: 75%"><?= $q->isi_testimoni ?></p>
	    			</div>
	    		</div>

	    		<?php endforeach; ?>

	  			<?php
					$query = "SELECT * FROM tb_testimoni_siswa AS test JOIN tb_siswawali_user AS siswa ON test.id_siswawali = siswa.id_siswawali ORDER BY test.id_testimoni DESC LIMIT 4";
					$que =  $this->db->query($query)->result();
					foreach( $que as $q ) :
				?>

	    		<div class="carousel-item item-1 bg-white">
	    			<div class="text-center">
	    				<img class="d-block" src="<?= base_url('assets/mystyle/img/user/'.$q->pp_siswa) ?>">
	    				<h3><?= $q->nama_lengkap_user ?></h3>
	    				<p style="font-size: 75%"><?= $q->isi_testimoni ?></p>
	    			</div>
	    		</div>

	    		<?php endforeach; ?>
	  		</div>
	  		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    		<span class="sr-only"></span>
	  		</a>
	  		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    		<span class="sr-only"></span>
	  		</a>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<br>
<div class="section-4 mb-5 bg-dark">
	<div class="section-4-content pt-5">
		<div class="section-2-top text-center">
			<h1 class="text-white"><b>BLOG PISTAR</b></h1>
			<br>
		</div>
		<?php 
			$query1 = "SELECT * FROM tb_blog AS blog ORDER BY blog.id_blog DESC LIMIT 3";
			$que1 =  $this->db->query($query1)->result();

			foreach( $que1 as $artikel ) :
			date_default_timezone_set('Asia/Jakarta');
			$datetime = date('d M Y - H:i', strtotime($artikel->tanggal_upload));
		?>
		<div class="blogcontent">
			<div class="p-2 artikel text-center">
				<img src="<?= base_url('assets/mystyle/img/blog/'.$artikel->featured_image) ?>" style="width: 75%;height: 200px;">
				<h4 class="text-justify text-white"><strong><?= $artikel->judul_artikel ?></strong></h4>
				<div class="content text-justify text-white">
					<i class="fa fa-clock-o"></i> <?= $datetime ?>
					<?= substr($artikel->content_blog, 0, 75) ?>...
				</div>
			</div>
		</div>
		<?php endforeach;?>
		<div class="clearfix"></div>
		<div class="text-center">
			<a href="<?= site_url('Blog') ?>" class="btn pesan-sekarang">Lihat Blog Lainnya</a>
		</div>

	</div>
</div>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
