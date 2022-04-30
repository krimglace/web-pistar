<!DOCTYPE html>
<html>
<head>
	<title>PISTAR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/animate-css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<style type="text/css">
		body{
			background-color: rgb(140, 38, 242);
		}
		.form{
			background-color: rgba(255, 255, 255, 0.6);
			border-radius: 25px;
			position: fixed;
			top: 20%;
			left: 30%;
			width: 40%;
			padding: 25px;
		}
		.gantipassword{
			position: absolute;
			width: 60%;
			left: 20%;
			text-align: center;
			top: 10%;
		}
		.gantipassword.nonaktif{
			display: none;
		}
		.close{
			cursor: pointer;
		}
		@media screen and (max-width: 749px){
			.form{
				background-color: rgba(255, 255, 255, 0.6);
				border-radius: 25px;
				position: fixed;
				top: 20%;
				left: 5%;
				width: 90%;
				padding: 25px;
			}
		}
	</style>
</head>
<body>
	<div class="body">
		<?php
			foreach( $siswa as $adm ) :
		?>
		<div class="form">
			<?= $this->session->flashdata('pesan') ?>
			<div class="form-title text-center">
				<h5>Apakah akun di bawah ini adalah akun anda ?</h5>
				<div style="position: relative; justify-content: center; align-items: center; display: flex; border-radius: 20px; background-color: white;">
					<img src="<?= base_url('assets/mystyle/img/user/'.$adm->pp_siswa) ?>" style="float: left; width: 50px; height: 50px; border-radius: 50%;">
					<h4 style="float: left; width: 60%"><?= $adm->nama_lengkap_user ?></h4>
					<div class="clearfix"></div>
				</div>
				<div>
					<br>
					<button onclick="gantipassword()" class="btn btn-primary">Ya, ini akun saya</button>
					<a href="<?= base_url('Login/Lupa_Password') ?>" class="btn btn-danger">Tidak, ini bukan akun saya</a>
				</div>
			</div>
		</div>
		<div class="gantipassword nonaktif animate__animated">
			<div class="container bg-white p-3" style="border-radius: 20px;">
				<h4 class="float-start"><strong>Ganti Password</strong></h4>
				<a onclick="closepass()"><i class="float-end fas fa-window-close close"></i></a>
				<div class="clearfix"></div>
				<br>
				<form style="text-align: justify;" action="<?= base_url('Login/proses_gantipassword_user') ?>" method="post">
					<input type="hidden" name="id_siswawali" value="<?= $adm->id_siswawali ?>">
					<div class="form-group">
						<label>Masukkan Password Baru Anda</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Konfirmasi Password Baru Anda</label>
						<input type="password" name="confirmpass" class="form-control" required>
					</div>
					<br>
					<div class="text-center">
						<a class="btn btn-secondary" onclick="closepass()">Close</a>
						<button class="btn btn-success">Ganti Password</button>
					</div>
				</form>
			</div>
		</div>
		<?php endforeach ?>
	</div>
	<script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/mystyle/js/showpassword.min.js"></script>
	<script type="text/javascript">
		function gantipassword(){
			var home = document.querySelectorAll('.gantipassword');
			console.log(home);
			home[0].classList.remove('nonaktif');
			home[0].classList.add('animate__bounceIn');
			home[0].classList.remove('animate__bounceOut');
		}
		function closepass(){
			var home = document.querySelectorAll('.gantipassword');
			console.log(home);
			home[0].classList.add('nonaktif');
			home[0].classList.remove('animate__bounceIn');
			home[0].classList.add('animate__bounceOut');
		}
	</script>
</body>
</html>