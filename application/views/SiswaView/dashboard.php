<?php  ?>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	.statistik{ border-radius: 20px; border-top: 5px double black;border-right: 5px double black;border-left: 5px double black;}
	.title-statistik{ border-top-right-radius: 20px; border-top-left-radius: 20px; border-bottom: 5px double black}
	.read-statistik{ border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;border-bottom: 5px double black}
	a.read-more:hover{ color: blue; }
	.load-right{ border: 5px double black; background-image: url(https://i.pinimg.com/736x/7d/b6/fc/7db6fcadc416a328d19f5d0ff779500c.jpg); background-position: center;	}
	@media screen and (min-width: 751px){
		.load-left{
			float: left;
			width: 40%;
		}
		.load-right{
			float: right;
			width: 55%;
		}
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fas fa-fire mr-1"></i>
						Dashboard
					</b>
				</h5>
			</div>
			<br>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="p-3">
				<?php foreach( $siswawali as $siswa ) : ?>
					<div class="load-left text-center">
						<img src="<?= base_url('assets/mystyle/img/user/'.$siswa->pp_siswa) ?>" style="width: 100%;">
						<h2><strong><?= $siswa->nama_panggilan_user ?></strong></h2>
					</div>
					<div class="load-right p-3">
						<h4 class="mb-4"><strong>Statistik</strong></h4>
						<div class="float-left col-md-5 mb-3">
							<div class="bg-warning statistik text-center">
								<h5 class="title-statistik p-1 mb-3">Jadwal Les</h5>
								<i class="fas fa-calendar float-left col-5" style="font-size: 300%;"></i>
								<?php 
									$query = "SELECT * FROM tb_pesanan_les WHERE id_siswawali = '".$siswa->id_siswawali."' AND status = 'Success'";
									$que = $this->db->query($query)->num_rows();
								?>
								<h1 class="float-right col-5" style="font-size: 300%;"><strong><?= $que ?></strong></h1>
								<div class="clearfix"></div>
								<h5 class="read-statistik bg-dark p-1"><a class="text-dark" href="<?= site_url('Siswa/Jadwal_Les') ?>" >Read More >> </a></h5>
							</div>
						</div>
						<div class="float-right col-md-5 mb-3">
							<div class="bg-success statistik text-center">
								<h5 class="title-statistik p-1 mb-3">Pesanan Les</h5>
								<i class="fas fa-chalkboard-teacher float-left col-5" style="font-size: 300%;"></i>
								<?php 
									$query = "SELECT * FROM tb_pesanan_les WHERE id_siswawali = '".$siswa->id_siswawali."'";
									$que = $this->db->query($query)->num_rows();
								?>
								<h1 class="float-right col-5" style="font-size: 300%;"><strong><?= $que ?></strong></h1>
								<div class="clearfix"></div>
								<h5 class="read-statistik bg-dark p-1"><a class="text-dark" href="<?= site_url('Siswa/Pemesanan_Les') ?>" >Read More >> </a></h5>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="float-left col-md-5 mb-3">
							<div class="bg-primary statistik text-center">
								<h5 class="title-statistik p-1 mb-3">Testimoni</h5>
								<i class="fas fa-comment float-left col-5" style="font-size: 300%;"></i>
								<?php 
									$query = "SELECT * FROM tb_testimoni_siswa WHERE id_siswawali = '".$siswa->id_siswawali."'";
									$que = $this->db->query($query)->num_rows();
								?>
								<h1 class="float-right col-5" style="font-size: 300%;"><strong><?= $que ?></strong></h1>
								<div class="clearfix"></div>
								<h5 class="read-statistik bg-dark p-1"><a class="text-dark" href="<?= site_url('Siswa/Beri_Testimoni') ?>" >Read More >> </a></h5>
							</div>
						</div>
						<div class="float-right col-md-5 mb-3">
							<div class="bg-danger statistik text-center">
								<h5 class="title-statistik p-1 mb-3">Kotak Saran</h5>
								<i class="fas fa-envelope float-left col-5" style="font-size: 300%;"></i>
								<?php 
									$query = "SELECT * FROM tb_kotaksaran WHERE id = '".$siswa->id_siswawali."'";
									$que = $this->db->query($query)->num_rows();
								?>
								<h1 class="float-right col-5" style="font-size: 300%;"><strong><?= $que ?></strong></h1>
								<div class="clearfix"></div>
								<h5 class="read-statistik bg-dark p-1"><a class="text-dark" href="<?= site_url('Siswa/Kotak_Saran') ?>" >Read More >> </a></h5>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php endforeach; ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
