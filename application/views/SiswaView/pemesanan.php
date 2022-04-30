<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	@media screen and (max-width: 751px){
		.section-3{
		  overflow-y:hidden;
		  -ms-overflow-style:-ms-autohiding-scrollbar;
		}
		.section-3 table td, .section-3 table th{
		  white-space:nowrap; 
		}
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fas fa-chalkboard-teacher mr-1"></i>
						Pemesanan Les
					</b>
				</h5>
			</div>
			<br>
			<a href="<?= base_url('Siswa/Pemesanan_Les/Tambah_Pemesanan') ?>">
				<div class=" tambah-blog alert alert-success">
					<i class="fa fa-plus mr-2"></i> 
					Tambah Pemesanan 
				</div>
			</a>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="section-3">
				<h4 class="mb-4"><strong>Data Pemesanan Les</strong></h4>
				<table class="table table-bordered table-stripped text-center">
					<tr class="bg-primary">
						<th>No</th>
						<th>Paket</th>
						<th>Harga</th>
						<th>Mata Pelajaran</th>
						<th>Tanggal Mulai Les</th>
						<th>Status</th>
						<th colspan="2">Aksi</th>
					</tr>
					<?php
						$no = 1;
						$count = count($pesanan);
						if($count > 0) :
							foreach( $pesanan as $les ) :
					?>
						<tr>
						<td><?= $no++ ?></td>
						<td><?= $les->nama_paket ?></td>
						<td><?= $les->total_bayar ?></td>
						<td><?= $les->mata_pelajaran ?></td>
						<td><?= date('d-M-Y', strtotime($les->tanggal_mulai)) ?></td>
						<?php if( $les->kode_referral == 'No Data' ) : 
						 if( $les->status == 'On Verified') : ?>
							<td><p class="bg-danger"><?= $les->status ?></p>
								<p class="bg-danger">Referral Failed</p>
							</td>
						<?php elseif( $les->status == 'On Process') : ?>
							<td><p class="bg-warning">Menunggu Pembayaran</p>
								<p class="bg-danger">Referral Failed</p>
							</td>
							<td><a href="<?= base_url('Siswa/Pemesanan_Les/konfirmasi_pembayaran?id_pesanan='.$les->id_pesanan) ?>"><h3><i class="fa fa-credit-card text-primary"></i></h3></a></td>
						<?php elseif( $les->status == 'Success') : ?>
							<td><p class="bg-success"><?= $les->status ?></p>
								<p class="bg-danger">Referral Failed</p>
							</td>
						<?php
							endif;

							elseif( $les->kode_referral == 'Success' ) : 
								if( $les->status == 'On Verified') : ?>
							<td><p class="bg-danger"><?= $les->status ?></p>
								<p class="bg-success">Referral Success</p>
							</td>
						<?php elseif( $les->status == 'On Process') : ?>
							<td><p class="bg-warning">Menunggu Pembayaran</p>
								<p class="bg-success">Referral Success</p>
							</td>
							<td><a href="<?= base_url('Siswa/Pemesanan_Les/konfirmasi_pembayaran?id_pesanan='.$les->id_pesanan) ?>"><h3><i class="fa fa-credit-card text-primary"></i></h3></a></td>
						<?php elseif( $les->status == 'Success') : ?>
							<td><p class="bg-success"><?= $les->status ?></p>
								<p class="bg-success">Referral Success</p>
							</td>
						<?php
								endif;

							elseif( $les->kode_referral == '' ) : 
								if( $les->status == 'On Verified') : ?>
							<td><p class="bg-danger"><?= $les->status ?></p>
							</td>
						<?php elseif( $les->status == 'On Process') : ?>
							<td><p class="bg-warning">Menunggu Pembayaran</p>
							</td>
							<td><a href="<?= base_url('Siswa/Pemesanan_Les/konfirmasi_pembayaran?id_pesanan='.$les->id_pesanan) ?>"><h3><i class="fa fa-credit-card text-primary"></i></h3></a></td>
						<?php elseif( $les->status == 'Success') : ?>
							<td><p class="bg-success"><?= $les->status ?></p>
							</td>
						<?php
								endif;

							else :
								if( $les->status == 'On Verified') : ?>
							<td><p class="bg-danger"><?= $les->status ?></p>
								<p class="bg-warning">Referral On Process</p>
							</td>
						<?php elseif( $les->status == 'On Process') : ?>
							<td><p class="bg-warning">Menunggu Pembayaran</p>
								<p class="bg-warning">Referral On Process</p>
							</td>
							<td><a href="<?= base_url('Siswa/Pemesanan_Les/konfirmasi_pembayaran?id_pesanan='.$les->id_pesanan) ?>"><h3><i class="fa fa-credit-card text-primary"></i></h3></a></td>
						<?php elseif( $les->status == 'Success') : ?>
							<td><p class="bg-success"><?= $les->status ?></p>
								<p class="bg-warning">Referral On Process</p>
							</td>
						<?php
								endif;
							endif;
						?>
					</tr>
					<?php
							endforeach;
						endif;
					?>
					
				</table>
			</div>
		</div>
	</div>
</div>