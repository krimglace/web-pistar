<?php  ?>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fas fa-dollar-sign mr-1"></i>
						Data Komisi
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="table">
				<table class="table table-bordered table-stripped text-center">
					<tr class="bg-primary">
						<th>No</th>
						<th>Kategori</th>
						<th>Total Komisi</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
					<?php 
						$no = 1;
						foreach( $komisi as $kom ) :
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $kom->kategori_komisi ?></td>
						<td>Rp <?= number_format($kom->total_komisi, 2, ",", ".") ?></td>
						<?php if( $kom->status_komisi == 'Belum Diklaim' ) : ?>
							<td>Komisimi Bisa Diklaim</td>
							<td>
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  									Klaim Komisi
								</button>
							</td>
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position: absolute;z-index: 10000000">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content bg-white">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<form action="<?= base_url('Tutor/Komisi/Klaim/'.$kom->id_komisi) ?>" method="post">
							        	<label>Bank + No. Rekening (exp: BRI 3225....)</label>
							        	<input type="text" name="rekening" class="form-control">
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary">Submit</button>
							        </form>
							      </div>
							    </div>
							  </div>
							</div>

						<?php elseif($kom->status_komisi == 'Sedang Diproses') : ?>
							<td>Menunggu Ditransfer Oleh Admin</td>
							<td></td>
						<?php else : ?>
							<td>Sudah Ditransfer Oleh Admin</td>
							<td></td>
						<?php endif; ?>
					</tr>
					<?php
						endforeach;
					?>
				</table>
			</div>
		</div>
	</div>
</div>