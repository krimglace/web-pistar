<?php  ?>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	@media screen and (min-width: 751px){
		.pesanan{ float: left; width: 22.5%; margin-right: 2.5% }
		.hari-les{float: left; width: 15%; margin-right: 1.6%;}
		.catatan{ float: right; width: 36%; margin-right: 4% }
		.kode{ float: right; width: 18%; margin-right: 2% }
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fas fa-credit-card mr-1"></i>
						Bayar Pesanan Les
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<a href="<?= base_url('Siswa/Pemesanan_Les/ExportPDF/'.$id_pesanan)?>" class="btn btn-warning"><i class="fas fa-download"> Cetak</i></a>
			<button class="btn btn-info" data-toggle="modal" data-target="#bayar"> Sudah Membayar</i></button>
			<br><br>
			<table class="table table-hover table-striped table-bordered">
				<tr class="text-center">
					<th colspan="3">Pesanan Les</th>
				</tr>
				<?php foreach ($siswawali as $user): ?>
					<tr>
						<th>Nama Pemesan</th>
						<th colspan="2">: <?= $user->nama_lengkap_user ?></th>
					</tr>
				<?php endforeach ?>
				<?php foreach( $pesanan as $les ) : ?>
					<tr>
						<th>ID Pesanan</th>
						<th colspan="2">: <?= $les->id_pesanan ?></th>
					</tr>
					<tr>
						<th>Jenis Pesanan</th>
						<th colspan="2">: <?= $les->nama_paket ?></th>
					</tr>
					<tr>
						<th>Total Bayar</th>
						<th colspan="2">: <?= $les->total_bayar ?></th>
					</tr>
				<?php endforeach ?>
				<tr class="text-center">
					<th colspan="3">Pilihan Transfer : </th>
				</tr>
				<?php foreach ($rekening as $bank): ?>
					<tr>
						<th><?= $bank->jenis_bank ?></th>
						<th><?= $bank->nomor_rekening ?></th>
						<th><?= $bank->atas_nama ?></th>

					</tr>
				<?php endforeach ?>

				<!-- Senin -->
				<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000000">
					<div class="modal-dialog" role="document">
					   	<div class="modal-content" >
					   		<?php foreach( $pesanan as $les ) : ?>
						      	<div class="modal-header">
						        	<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
						        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          		<span aria-hidden="true">&times;</span>
						        	</button>
						      	</div>
						      	<div class="modal-body text-center">
						      		<?php if ( $les->bukti_pembayaran != '' ): ?>
						      		<form enctype="multipart/form-data" method="post" action="<?= base_url('Siswa/Pemesanan_Les/kirim_pembayaran') ?>">
						      			<input type="hidden" name="id_pesanan" value="<?= $les->id_pesanan ?>">
							      		<div class="text-center">
							      			<label>Bukti Pembayaran</label><br>
							      			<img src="<?= base_url('assets/mystyle/img/buktibayar/'.$les->bukti_pembayaran) ?>" width="80%"><br><br>
							      			<input type="file" name="bukti_pembayaran" class="form-control" value="<?= $les->bukti_pembayaran ?>">
							      		</div>
								      	<div class="modal-footer">
								      		<button type="submit" class="btn btn-primary">Update</button>
								        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								      	</div>
						      		</form>
						      		<?php else: ?>
					      			<form enctype="multipart/form-data" method="post" action="<?= base_url('Siswa/Pemesanan_Les/kirim_pembayaran') ?>">
					      				<input type="hidden" name="id_pesanan" value="<?= $les->id_pesanan ?>">
							      		<div class="text-center">
							      			<label>Bukti Pembayaran</label><br>
							      			<input type="file" name="bukti_pembayaran" class="form-control" required>
							      		</div>
								      	<div class="modal-footer">
								      		<button type="submit" class="btn btn-primary">Kirim</button>
								        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								      	</div>
						      		</form>
						      		<?php endif ?>
						    	</div>
						    <?php endforeach ?>
					  	</div>
					</div>
				</div>
			</table>
		</div>
	</div>
</div>