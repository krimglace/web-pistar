<?php ?>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	@media screen and (min-width: 751px){
	    .content-content{ border-radius: 10px; margin: 0 30%; }
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fas fa-share-alt mr-1"></i>
						Kode Referral
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-5 pr-3 pl-3 pb-3">
			<div class="content-referral text-center">
				<img src="<?= base_url('assets/mystyle/img/komisi.png') ?>" width="50%">
				<br>
				<h4><strong>Ajak Siswa Les dan Dapatkan Komisi</strong></h4><br>
				<h5>Dapatkan komisi 10% dari paket les yang dipilih untuk setiap siswa yang memesan les di PISTAR menggunakan kode referral kamu</h5><br>
				<h5>Share Kode Referralmu</h5>
				<?php foreach( $pengajar as $tutor ) : ?>
				<form action="<?= base_url('Tutor/Referral/Update/'.$tutor->id_tutor) ?>" method="post">
					<input type="text" name="ref" class="form-control" value="<?= $tutor->kode_referral ?>">
					<button type="submit" class="btn mt-2 btn-success"><i class="fa fa-edit"></i> Update</button>
				</form>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>