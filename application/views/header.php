<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<title>PISTAR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

<?php foreach($tentang as $ttg) : ?>
	<link rel="shortcut icon" href="<?=base_url('assets/mystyle/img/'.$ttg->logo_pistar) ?>">
<?php endforeach ?>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/animate-css/animate.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
        *{ font-family: Arial; }
        .navbar-brand{
        	width: 10%;
        	margin-right: 5%;
        }
        li.nav-item a.nav-link.top-menu{
        	color: black;
        }
        li.nav-item a.nav-link.active-menu{
        	color: rgb(140, 38, 242);
        	transition: .5s;
        }
        @media screen and (min-width: 750px) and (max-width: 1100px){
            .siswa{
        		float: left;
        		width: 45%;
        	}
        	.tutor{
        		float: right;
        		width: 45%;
        	}
        	.navbar-collapse.menu-menu{
        		padding: 0 0 10% 8%;
        	}
        	.navbar-brand{
        		width: 30%
        	}
        	ul.login-register li {
        		float: right;
        		margin-bottom: 10px;
        		margin-right: 10px;
        	}
        	.menu-bar{
        		margin-left: -5%;
        	}
        }
        @media screen and (max-width: 749px){
        	.navbar-brand{
        		width: 40%
        	}
        	ul.login-register li {
        		float: right;
        		margin-bottom: 10px;
        		margin-right: 10px;
        	}
        	.navbar-collapse{
        		padding-bottom: 20%;
        	}
        	.siswa{
        		width: 100%;
        	}
        	.tutor{
        		width: 100%;
        	}
        }
        li.header-login a.header-login{
        	color: rgb(140, 38, 242);
        	transition: .5s;
        	padding: 10px;
        	border-radius: 10px;
        }
        li.header-register a.header-register{
        	background-color: rgb(140, 38, 242);
        	color: white;
        	padding: 10px;
        	border-radius: 10px;
        	border: 1px;
        	transition: .5s;
        }
        li.header-register a.header-register:hover{
        	box-shadow: 1px 1px 10px 2px rgb(140, 38, 242);
        	color: white;
        }
        li.header-login a.header-login:hover{
        	background-color: white;
        	color: rgb(140, 38, 242);
        	transition: .5s;
        	box-shadow: 1px 1px 10px 2px rgb(140, 38, 242);
        }
        ul.login-register {
        	float: right;
        	position: absolute;
        	right: 20px;
        }
        ul.login-register li {
        	margin-top: 10px;
        	display: inline-block;
        	cursor: pointer;
        }
        ul.login-register li a {
        	text-decoration: none;
        }
        @media screen and (min-width: 1101px){
        	.siswa{
        		float: left;
        		width: 45%;
        	}
        	.tutor{
        		float: right;
        		width: 45%;
        	}
        }
        nav.header-menu li a{
        	 font-family: calibri;
        }
        label.tutor > input, label.siswa > input{ /* Menyembunyikan radio button */
        	visibility: hidden; 
        	z-index: 1000000;
        	border-radius: -100%;
        	position: absolute; 
        	width: 100%;
        	height: 100%;
        }
        label.tutor > input + .guru, label.siswa > input + .student{ /* style gambar */
        	cursor:pointer;
        }
        label.tutor > input:checked + .guru, label.siswa > input:checked + .student{ /* (RADIO CHECKED) style gambar */
        	box-shadow: 2px -2px 20px 1px rgb(140, 38, 242);
        }
	</style>
</head>
<body style="background-color: rgba(140, 38, 242, 0.1)">
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top" style="box-shadow: 2px -2px 100px 1px rgb(140, 38, 242);">
			<div class="container-fluid">
	  			<a class="navbar-brand float-start" href="<?= base_url('Home') ?>">
	  				<?php foreach ($tentang as $ttg ): ?>
	  					<img src="<?= base_url('assets/mystyle/img/'.$ttg->logo_pistar) ?>" width="100%">
	  				<?php endforeach ?>
	  			</a>
	  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    			<span class="navbar-toggler-icon"></span>
	  			</button>
  			
	  			<div class="collapse navbar-collapse menu-menu" id="navbarSupportedContent">
		    		<ul class="navbar-nav mr-auto menu-bar">
		      			<li class="nav-item" id="home-menu">
		        			<a class="nav-link top-menu home-menu" href="<?= base_url('Home') ?>"> Beranda</a>
		      			</li>
		      			<li class="nav-item" id="home-menu">
		        			<a class="nav-link top-menu biaya-menu" href="<?= base_url('BiayaLes') ?>"> Biaya Les</a>
		      			</li>
		      			<li class="nav-item" id="home-menu">
		        			<a class="nav-link top-menu blog-menu" href="<?= base_url('Blog') ?>"> Blog</a>
		      			</li>
		      			<li class="nav-item" id="home-menu">
		        			<a class="nav-link top-menu referral-menu" href="<?= base_url('Referral') ?>"> Referral</a>
		      			</li>
		      			<li class="nav-item" id="home-menu">
		        			<a class="nav-link top-menu cari-pengajar-menu" href="<?= base_url('Cari_Pengajar') ?>"> Cari Pengajar</a>
		      			</li>
		      			<li class="nav-item" id="home-menu">
		        			<a class="nav-link top-menu jadi-pengajar-menu" href="<?= base_url('Jadi_Pengajar') ?>"> Jadi Pengajar</a>
		      			</li>
		    		</ul>
		    		<ul class="float-end login-register mt-2 menu-bar">
						<li class="header-login"><a class="header-login" data-toggle="modal" data-target="#LoginBox">Masuk</a></li>
		    			<li class="header-register"><a class="header-register" data-toggle="modal" data-target="#RegisterBox">Daftar</a></li>
		    			<div class="clearfix"></div>
		    		</ul>
		    		<div class="clearfix"></div>
	  			</div>
	  		</div>
	  		<div class="clearfix"></div>
		</nav>
		<br><br>
	</header>
<div class="container-fluid">
	<div class="login-form" id="login-form">
		<div class="modal fade" id="LoginBox" tabindex="-1" aria-labelledby="LoginBoxLabel" aria-hidden="true">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header bg-secondary">
        				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      				</div>
      				<div class="modal-body">
      					<div class="text-center" style="margin-bottom: -10px;">
      						<h4>Masuk</h4>
      						<p>Pilih tipe akun Anda</p>
      					</div>
      					<div>
      						<form method="post" action="<?= base_url('Login/proses_login') ?>">
      							<?= $this->session->flashdata('pesanlogin') ?>
	      						<label class="siswa">
	      							<input type="radio" name="radio" value="siswa">
	      							<div class="student border border-secondary m-1 rounded text-center">
	        							<img class="w-100 float-left" src="<?= base_url('assets/mystyle/img/siswa.png') ?>">
	        							<h5 style="margin-top: -10px">Siswa / Wali</h5>
	        						</div>
	        					</label>
	        					<label class="tutor">
	        						<input type="radio" name="radio" value="guru">
	        						<div class="guru border border-secondary m-1 rounded text-center">
	        							<img class="w-100 float-right" src="<?= base_url('assets/mystyle/img/tutor.png') ?>">
	        							<h5 style="margin-top: -12px">Tutor</h5>
	        						</div>
	        					</label>
	        					<div class="clearfix"></div>
	        					<div class="form-login">
        						<?= $this->session->flashdata('pesan') ?>
	        						<div class="form-group">
	        							<label class="mt-2" for="email">Email</label>
	        							<input type="email" name="email" class="form-control mt-2">
	        							<?= form_error('email', '<div class="text-danger small ml-3">','</div>') ?>
	        						</div>
	        						<div class="form-group">
	        							<label class="mt-2" for="password">Password</label>
	        							<input type="password" id="password-input" name="password" class="form-control mt-2">
	        							<?= form_error('password', '<div class="text-danger small ml-3">','</div>') ?>
	        						</div>
	        						<div class="form-group">
	        							<p class="mt-2"><input type="checkbox" id="enable-show" name="" class="mt-2"> Tampilkan Password</p>
	        						</div>
	        						<div class="form-group">
	        							<p class="mt-2 syarat-login">Dengan login, kamu telah menyetujui <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a> kami</p>
	        						</div>
	        						<div class="form-group" style="margin-top: -10px;">
	        							<a href="<?= base_url('Login/lupa_password') ?>" style="float: right;">Lupa Password ?</a>
	        						</div>
	        						<div class="form-group">
	        							<button class="mt-2 btn btn-primary w-100 btn-user btn-block">Masuk</button>
	        						</div>
        						</div>
        					</form>
        				</div>
      				</div>
      				<div class="modal-footer bg-secondary"></div>
    			</div>
  			</div>
		</div>
	</div>
	<div class="register-form">
		<div class="modal fade" id="RegisterBox" tabindex="-1" aria-labelledby="RegisterBoxLabel" aria-hidden="true">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header bg-secondary">
        				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      				</div>
      				<div class="modal-body">
      					<div class="text-center" style="margin-bottom: -10px;">
      						<h4>Daftar Sekarang</h4>
      						<p>Pilih tipe akun Anda</p>
      					</div>
      					<div>
	      					<form method="post" action="<?= base_url('Register/proses_register') ?>">
	      						<?= $this->session->flashdata('pesanregister') ?>
	      						<label class="siswa">
	      							<input type="radio" name="radioregister" value="siswa">
	      							<div class="student border border-secondary m-1 rounded text-center">
	        							<img class="w-100 float-left" src="<?= base_url('assets/mystyle/img/siswa.png') ?>">
	        							<h5 style="margin-top: -10px">Siswa / Wali</h5>
	        						</div>
	        					</label>
	        					<label class="tutor">
	        						<input type="radio" name="radioregister" value="guru">
	        						<div class="guru border border-secondary m-1 rounded text-center">
	        							<img class="w-100 float-right" src="<?= base_url('assets/mystyle/img/tutor.png') ?>">
	        							<h5 style="margin-top: -12px">Tutor</h5>
	        						</div>
	        					</label>
	        					<div class="clearfix"></div>
	        					<div class="form-login">
        							<div class="form-group">
	        							<label class="mt-2" for="fullname">Nama Lengkap</label>
	        							<input type="text" name="fullname" class="form-control mt-2" required>
	        						</div>
	        						<div class="form-group">
	        							<label class="mt-2" for="nickname">Nama Panggilan</label>
	        							<input type="text" name="nickname" class="form-control mt-2" required>
	        						</div>
	        						<div class="form-group">
	        							<label class="mt-2" for="email">Email</label>
	        							<input type="email" name="email" class="form-control mt-2" required>
	        						</div>
	        						<div class="form-group">
	        							<label class="mt-2" for="no_whatsapp_user">No Whatsapp</label>
	        							<input type="text" name="no_whatsapp_user" class="form-control mt-2" required>
	        						</div>
	        						<div class="form-group">
	        							<label class="mt-2" for="password">Password</label>
	        							<input type="password" name="password" class="form-control mt-2" required>
	        						</div>
	        						<div class="form-group">
	        							<label class="mt-2" for="confirmpassword">Confirm Password</label>
	        							<?= $this->session->flashdata('pesanconfirm') ?>
	        							<input type="password" name="confirmpassword" class="form-control mt-2" required>
	        						</div>
	        						<div class="form-group">
	        							<p class="mt-2 syarat-login">Dengan login, kamu telah menyetujui <a href="">Syarat & Ketentuan</a> serta <a href="">Kebijakan Privasi</a> kami</p>
	        						</div>
	        						<div class="form-group">
	        							<button type="submit" class="mt-2 btn btn-primary w-100">Daftar</button>
	        						</div>
        						</div>
        					</form>
        				</div>
      				</div>
      				<div class="modal-footer bg-secondary"></div>
    			</div>
  			</div>
		</div>
	</div>
</div>


