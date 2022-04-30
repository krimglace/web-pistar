<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	@media screen and (min-width: 751px){
		.left-about{ float: left;width: 40%; }
		.right-about{ float: left;width: 60%; }
		.tentang-tentang-kiri{float: left; width: 50%}
		.tentang-tentang-kanan{float: left; width: 50%}
	}
	@media screen and (max-width: 750px){
		.content-header h5{ font-size: 100%;}
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
						Pemesanan Les Siswa
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="section-3">
				<h4 class="mb-4"><strong>Data Pemesanan Les</strong></h4>
				<table class="table table-bordered table-stripped text-center">
					<tr class="bg-primary">
						<th>No</th>
						<th>Paket</th>
						<th>Mata Pelajaran</th>
						<th>Pilih Tutor</th>
						<th>Total Siswa</th>
						<th>Referral</th>
						<th>Konfirmasi</th>
						<th>Aksi</th>
					</tr>
					<?php
						$no = 1;
						$count = count($pemesanan);
						if($count > 0) :
							foreach( $pemesanan as $les ) :
					?>
						<tr>
						<td><?= $no++ ?></td>
						<td><?= $les->nama_paket ?></td>
						<td><?= $les->mata_pelajaran ?></td>
						<td>
						<?php if( $les->id_tutor == '' ) : ?>
							<form action="<?= base_url('Administrator/Pemesanan/PilihTutor/'.$les->id_pesanan) ?>" method="post">
								<select name="tutor" class="form-control float-left col-9">
									<?php
										$mapel = $les->mata_pelajaran;
										$wheretutor = array('matapelajaran_tempuh' => $mapel);
										$tutor = $this->Admin_Model->GetData($wheretutor, 'tb_tutor')->result();
										foreach($tutor as $pengajar) :
									?>
									<option><?= $pengajar->nama_lengkap_tutor ?></option>
									<?php var_dump($pengajar) ?>
									<?php endforeach; ?>
								</select>
								<button class="btn btn-info float-right col-3">Pilih</button>
								<div class="clearfix"></div>
							</form>
						<?php else : 
								$id_tutor = $les->id_tutor;
								$wheretutor = array('id_tutor' => $id_tutor);
								$tutor = $this->Admin_Model->GetData($wheretutor, 'tb_tutor')->result();
								foreach($tutor as $pengajar) :
									echo $pengajar->nama_lengkap_tutor;
								endforeach;
							endif;
						?>

						</td>
						<td><?= $les->jumlah_siswa ?></td>

						<?php if( $les->kode_referral == 'Success' ) : ?>
							<td class="bg-success"><b><i>Referral Success</i></b></td>
						<?php elseif( $les->kode_referral == 'No Data' ) : ?> 
							<td class="bg-danger"><b><i>Referral Failed</i></b></td>
						<?php elseif( $les->kode_referral == '' ) : ?>
							<td></td>
						<?php else : ?>
							<td>
								<b><?= $les->kode_referral ?></b>
								<div class="clearfix"></div>
									<button class="btn-success float-left col-6" onclick="success()"><i class="fas fa-check"></i></button>
								<style type="text/css">
									.modal-success{
										position: absolute;
										top: 10%;
										border: 1px solid black;
										border-radius: 20px;
										z-index: 10000;
										width: 50%;
										left: 30%;
									}
									.modal-success.nonaktif{
										display: none;
									}
								</style>
								<script type="text/javascript">
									function success(){
										var success = document.querySelectorAll('.modal-success');
										success[0].classList.remove('nonaktif');
									}
									function closebtn(){
										var success = document.querySelectorAll('.modal-success');
										success[0].classList.add('nonaktif');
									}
								</script>
								<div class="modal-success nonaktif bg-white p-4"style="position: fixed;">
									<form action="<?= base_url('Administrator/Pemesanan/SuccessReferral/'.$les->id_pesanan) ?>" method="post">
										<i class="fas fa-window-close float-right" onclick="closebtn()" style="cursor: pointer;"></i>
										<div class="container-fluid">
											<h3><b>Setujui Kode Referral</b></h3>
											<div class="form-group" style="text-align: justify;">
												<label>Harga Awal : </label>
												<input type="text" name="total_bayar" class="form-control" value="<?= $les->total_bayar ?>" readonly>
												<input type="hidden" name="kode_referral" class="form-control" value="<?= $les->kode_referral ?>" readonly>
											</div>
											<div class="form-group" style="text-align: justify;">
												<label>Beri Diskon (Dalam Persen) : </label>
												<input type="number" name="diskon" class="form-control">
											</div>
											<button class="btn btn-success"> Setujui </button>
										</div>
									</form>
								</div>
								<form class="float-right col-6" action="<?= base_url('Administrator/Pemesanan/FailedReferral/'.$les->id_pesanan) ?>" method="post">
									<button class="btn-danger"><i class="fa fa-window-close"></i></button>
								</form>
								<div class="clearfix"></div>
							</td>
						<?php endif ?>

						<?php if( $les->status == 'On Verified' ) : ?>
							<td>
								<form action="<?= base_url('Administrator/Pemesanan/Payment/'.$les->id_pesanan) ?>" method="post">
									<button class="btn-primary">Go to Payment</button><br><br><br>
									<a href="<?= base_url('Administrator/Pemesanan/SudahBayar/'.$les->id_pesanan) ?>" class="p-2 m-2 btn-success">Sudah Bayar</a>
								</form>
							</td>
						<?php elseif( $les->status == 'On Process' ) : ?>
							<td class="text-center">
								<?php
									if( $les->bukti_pembayaran == '' ){
										echo "<i>Belum Melakukan Pembayaran</i>";
									} else{
								?>
									<img src="<?= base_url('assets/mystyle/img/buktibayar/'.$les->bukti_pembayaran) ?>" width="80%"><br><br>
									<form action="<?= base_url('Administrator/Pemesanan/OnPayment/'.$les->id_pesanan) ?>" method="post">
										<button class="btn-success">On Confirmation</button>
									</form>
								<?php } ?>
							</td>
						<?php else : ?>
							<td class="bg-success"><i><b>Success</b></i></td>
						<?php endif; ?>
						<td><a href="<?= base_url('Administrator/Pemesanan/hapusPesanan/'.$les->id_pesanan) ?>"><h3><i class="text-danger fa fa-trash"></i></h3></a></td>
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
