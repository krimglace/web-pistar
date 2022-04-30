<?php  ?>
<script type="text/javascript">
	var menu = document.querySelectorAll('.referral-menu');
	menu[0].classList.add('active-menu');
</script>

<style type="text/css">
	.header{ padding-right: 10%; }
	.header-main{ padding-left: 5%; color: rgb(112, 121, 139); border-bottom-right-radius: 100px; background-image: url(<?= base_url('assets/mystyle/img/bg_top.svg') ?>); background-size: 30%; background-repeat: no-repeat; background-position: right top; }
	.header-left h1{ font-family: monotype corsiva; }
	.header-left h2{ font-size: 300%; color: black; }
	u{ text-decoration: none; color: rgb(140, 38, 242); }
	a.pesan-sekarang{ background-color: rgb(140, 38, 242); color: white; border-radius: 10px; margin-bottom: 50px; box-shadow: -10px 10px 20px 1px rgba(140, 38, 242, 0.6); transition: .5s; }
	a.pesan-sekarang:hover{ box-shadow: 10px -10px 20px 1px rgba(140, 38, 242, 0.6); color: white; transition: .5s; }
	.section-1{ margin-top: 10%; }
	.kode h5{ border-radius: 10px; box-shadow: -10px 10px 0px 1px rgb(140, 38, 242)}
	.section-3 table tr th, .section-3 table tr td{font-family: arial}
	.section-3 table tr td{ padding: 2% 0 }

	@media screen and (min-width: 750px) and (max-width: 1100px){
		.header-left{ float: left; width: 40%; }
		.header-right{ margin-top: 10%; float: right; width: 40%; margin-right: 10%; }
		.section{ margin: 30px 10%; }
		.section-1-left{ float: left; width: 45%; }
		.section-1-right{ float: right; width: 50%; margin-left: 5%; }
		.kode{ width: 50%; }
	}

	@media screen and (min-width: 1101px){
		.header-left{ float: left; width: 40%; }
		.header-right{ margin-top: 10%; float: right; padding-right: 10%; width: 50%; margin-right: 10% }
		.section{ margin: 30px 10%; }
		.section-1-left{ float: left; width: 45%; }
		.section-1-right{ float: right; width: 50%; margin-left: 5%; }
		.kode{ width: 45%; margin: 0 27.5%;}
		.kode h5{ padding: 3% 0 3% 5% }
	}

	@media screen and (max-width: 749px){
		.header-left h2{ font-size: 200%; }
		.section-1-right{ text-align: center; }
		.section-1-right h2{ font-size: 150%; }
		.section{ margin: 30px 5%; }
		.section-2 h2{ font-size: 200%; }
		.section-2 { font-size: 75% }
		.kode h5{ padding: 3% 0 3% 5%; font-size: 150% }
		.section-3{
		  overflow-y:hidden;
		  -ms-overflow-style:-ms-autohiding-scrollbar;
		}
		.section-3 table td, .section-3 table th{
		  white-space:nowrap; 
		}
	}

</style>
<div class="header">
	<div class="header-main bg-white">
		<div class="header-left">
			<br>
			<br>
			<br>
			<h2><b>Panen Cuan Cuma Rebahan</b></h2>
			<h6>Ajak kenalan mu Les Private di PISTAR dan hasilkan jutaan rupiah!</h6>
			<br>
			<a class="btn pesan-sekarang text-white" data-toggle="modal" data-target="#RegisterBox">Daftar Sekarang</a>
		</div>
		<div class="header-right">
			<img src="<?= base_url('assets/mystyle/img/referral1.svg') ?>">
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="section">
	<div class="section-1">
		<div class="content-1">
			<div class="section-1-mid text-center">
				<h2><strong>Apa Itu Program Referral<br><u>PISTAR</u> ?</strong></h2>
				<h5>Program Referral PISTAR diperuntukkan bagi pengajar yang ingin mendapatkan penghasilan tambahan dalam bentuk uang tunai dari hasil membagikan kode referral miliknya di akun website PISTAR.</h5>
			</div>
			<div class="text-center">
			    <img src="https://www.pngmart.com/files/15/Banknote-Vector-Currency-PNG.png" width="20%">
			</div>
			<br><br>
			<div class="clearfix"></div>
		</div>
	</div>
	<br>
	<div class="section-2 text-center">
		<h2><strong>Keuntungan Bergabung Program Referral<br><u>PISTAR</u></strong></h2>
		Dapatkan komisi 5% dari setiap pemesan les siswa baru yang menggunakan kode referal mu.
		<br><br>
		<div class="kode">
			<h5 class="bg-white text-center mr-3 ml-3">Sebarkan kode referral mu, raih cuan mu!</h5>
		</div>
	</div>
</div>
<div class="text-center">
    <a class="btn pesan-sekarang text-white" data-toggle="modal" data-target="#RegisterBox">Daftar Sekarang</a>
</div>