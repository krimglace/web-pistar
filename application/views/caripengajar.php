<?php ?>
<script type="text/javascript">
	var menu = document.querySelectorAll('.cari-pengajar-menu');
	menu[0].classList.add('active-menu');
</script>
<style type="text/css">
	.guru{
		/*border: 1px solid black;*/
		border-radius: 10px;
		box-shadow: -10px 10px 10px 0px rgba(140, 38, 242, 0.6);;
	}
	.content{ background-color: white; padding: 2% 0; }
	.main-content{
		margin: 5% 15%;
	}
	.gurucontent{
		margin-bottom: 1.5%;
	}
	.guru img{
		width: 100px;
		height: 100px;
	}
	u{ text-decoration: none; color: rgb(140, 38, 242) }
	.guru a{ text-decoration: none; }
	.guru a h4, .gurutentang{ color: rgb(140, 38, 242)  }
	.content a{ color: blue }
	@media screen and (min-width: 750px){
		.gurucontent{
			float: left;
			width: 30%;
			margin: 1.5%;
		}
		form .mapel{
			float: left;
			width: 40%;
			margin-right: 2.5%;
		}
		form .form-button{
			float: left;
			width: 15%;
		}
	}
</style>
<br><br>
<div class="content">
	<div class="main-content">
		<h3 class="text-center">Mau Cari Guru Privat Apa ?</h3><br>
		<form action="<?= base_url('Cari_Pengajar/Filter') ?>" method="post">
			<div class="form-group mapel">
				<input type="text" name="mata_pelajaran" placeholder="Ketik Mata Pelajaran" class="form-control">
			</div>
			<div class="form-group mapel">
				<input type="text" name="kabupaten" placeholder="Ketik Lokasi (Kabupaten/Kota)" class="form-control">
			</div>
			<div class="form-button">
				<input type="submit" value="Cari Pengajar" class="btn btn-success form-control">
			</div>
			<div class="clearfix"></div>
		</form>
			<br>
		<h4 class="text-center">Guru guru Terbaik dari <u>PISTAR</u></h4><br>
		<?php 
			foreach( $pengajar as $guru ) : 
				$this->db->select_avg('jumlah_ratting');
				$this->db->from('tb_ratting_tutor');
				$this->db->where('id_tutor', $guru->id_tutor);

				$result = $this->db->get()->result();
				foreach( $result as $res ) {
					
		?>
		<div class="section-1" id="section-1">
			<div class="gurucontent" id="gurucontent">
				<div class="p-2 guru text-center" id="guru">
					<a href="<?= base_url('Cari_Pengajar/Tutor/'.$guru->id_tutor) ?>">
						<img src="<?= base_url('assets/mystyle/img/tutor/'.$guru->gambar_guru )?>">
						<h4><?= $guru->nama_lengkap_tutor ?></h4>
						<br>
						<div class="gurutentang">

							<?php if( $guru->jurusan_tutor == '' ) : ?>
								<i class="fa fa-graduation-cap text-danger"> Belum Mengisi Jurusan</i><br>
							<?php else : ?>
								<i class="fa fa-graduation-cap text-dark"></i> <?= $guru->jurusan_tutor ?><br>
							<?php endif ?>

							<?php if( $guru->universitas_tutor == '' ) : ?>
								<i class="fa fa-building text-danger"> Belum Mengisi Universitas</i><br>
							<?php else : ?>
								<i class="fa fa-building text-success"></i> <?= $guru->universitas_tutor ?><br>
							<?php endif ?>

							<?php if( $res->jumlah_ratting == '' ) : ?>
								<i class="fa fa-star text-danger"> Belum Ada Penilaian</i><br><br>
							<?php else : ?>
								<i class="fa fa-star text-warning"></i> <?= $res->jumlah_ratting ?><br><br>
							<?php endif ?>
							<?= $guru->quotes_tutor ?>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="hello"></div>
		<?php } endforeach;?>
		<div class="clearfix"></div>
	</div>
</div>
<br><br><br>

