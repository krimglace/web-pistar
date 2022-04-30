<!DOCTYPE html>
<html>
<head>
	<title>PISTAR | Administrator</title>
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
		<div class="form">
		<form method="post" action="<?= base_url('Administrators/proses_lupapassword') ?>">
			<?= $this->session->flashdata('pesan') ?>
			<div class="form-title text-center">
				<h2>Lupa Password ?</h2>
				<h5>Silahkan Lakukan Cek Email Terlebih Dahulu</h5>
			</div>
			<div class="form-group">
				<label class="mt-2" for="email">Email</label>
				<input type="email" name="email" class="form-control mt-2" required>
			</div>
			<div class="form-group">
				<button class="mt-2 btn btn-primary w-100 btn-user btn-block">Cek</button>
			</div>
		</form>
		</div>
	</div>
	<script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/mystyle/js/showpassword.min.js"></script>
</body>
</html>