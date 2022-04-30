<?php  ?>
<script type="text/javascript">
	var menu = document.querySelectorAll('.biaya-menu');
	menu[0].classList.add('active-menu');
</script>

<style type="text/css">
	@media screen and (min-width: 750px){
		.content-biayales{
			margin-right: 10%;
		}
		.decoration{
			width: 50px;
			height: 50px;
			border-radius: 10px;
			margin-top: -25px;
			background-color: rgb(140, 38, 242);
		}
		.opening{
			margin: 0 15%;
		}
		.programles{
			margin: 10px 10%;
		}
		.programles .nama-program, .JumlahSiswa, .Sistem, .Kelas-sd, .Kelas-smp, .Kelas-smak{
			float: left;
			width: 30%;
			margin-right: 3%;
		}
		.programles .kurikulum{
			float: left;
			width: 50%;
		}
		.paket-paket{
			float: left;
			width: 22%;
			margin-right: 3%;
			box-shadow: 2px 2px 2px 3px black;
			border-radius: 20px;
			transition: .5s;
		}
		.paket-paket:hover{
			margin-top: -10px;
			transition: .5s;
		}

	}
	@media screen and (max-width: 750px){
		.opening h2{
			font-size: 150%;
		}
		.opening p{
			font-size: 90%;
		}
		.paket-paket{
			margin: 5%;
			box-shadow: 2px 2px 2px 3px black;
			border-radius: 20px;
			transition: .5s;
		}
	}
	.opening u{
		text-decoration: none;
		color: rgb(140, 38, 242);
	}
	.content-biayales{
		padding: 30px 10px;
	}
</style>

<br><br><br><br>
<div class="content-biayales bg-white" style="">
	<div class="decoration float-right"></div>
	<div class="clearfix"></div>
	<div class="opening text-center">
		<p>Berikut Ini Biaya Les Bersama <u>Pistar</u></p>
		<h2><strong><u>DISKON 25%</u> BIAYA LES UNTUK SEMUA JENJANG DAN PROGRAM!*</strong></h2>
		<p>Anda dapat memilih program dan mengatur jumlah pertemuan sesuai kebutuhan Putra-Putri Anda</p>
	</div>
	<div class="programles text-center">
		<form action="<?= site_url('BiayaLes/Filter') ?>" method="post">
			<div class="nama-program">
				<label>Program</label>
				<select name="namaprogram" id="namaprogram" class="form-control" onchange="">
					<option value="00">Pilih Program</option>
					<?php foreach( $programname as $nama ) : ?>
					<option value="<?= $nama->nama_program ?>"><?= $nama->nama_program ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="Sistem">
				<label>Sistem Pembelajaran</label>
				<select name="sistempembelajaran" id="sistempembelajaran" class="form-control">
					<option value="Offline">Offline</option>
					<option value="Online">Online</option>
				</select>
			</div>
			<div class="clearfix"></div><br>
			<div class="JumlahSiswa">
				<label>Jumlah Siswa</label>
				<input type="number" name="jumlah" class="form-control" required>
			</div>
			<div class="Kelas-sd" id="Kelas-sd">
				<label>Kelas</label>
				<select name="kelassd" class="form-control">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>
			</div>
			<div class="Kelas-smp" id="Kelas-smp">
				<label>Kelas</label>
				<select name="kelassmp" class="form-control">
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
				</select>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<style type="text/css">
					.cek:hover{
						box-shadow: -5px 5px 10px 0px rgb(140, 38, 242);
						transition: .5s;
					}
				</style>
				<button type="submit" class="btn cek mt-2 text-white" style="border: 5px solid rgb(140, 38, 242);background-color: rgba(140, 38, 242, 0.8); transition: .5s"><i class="fa fa-search"></i> Cek Paket</button>
			</div>
			<div id="paketsaya" class="mt-5">
			</div>
		</form>
	</div>
</div>