<?php  ?>
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
						<i class="fas fa-credit-card mr-1"></i>
						Data Komisi Tutor
					</b>
				</h5>
			</div>
			<br>
			<a href="" data-toggle="modal" data-target="#exampleModal">
				<div class=" tambah-blog alert alert-success">
					<i class="fa fa-plus mr-2"></i> 
					Tambah Komisi 
				</div>
			</a>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="section-3">
				<h4 class="mb-4"><strong>Data Komisi Tutor</strong></h4>
				<table class="table table-bordered table-stripped text-center">
					<tr class="bg-primary">
						<th>No</th>
						<th>Id Tutor</th>
						<th>Total Komisi</th>
						<th>Keterangan</th>
						<th>Rekening</th>
						<th>Status</th>
						<th>Status Pengiriman</th>
						<th>Aksi</th>
					</tr>
					<?php $no = 1; foreach( $komisi_tutor as $komisi ) :  ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $komisi->id_tutor ?></td>
							<td>Rp <?= number_format($komisi->total_komisi, 2, ",", ".") ?></td>
							<td><?= $komisi->kategori_komisi ?></td>
							<td><?= $komisi->rekening ?></td>
							<?php if($komisi->rekening == '') : ?>
								<td>Belum Diklaim</td>
								<td></td>
							<?php else : ?>
								<td>Diproses</td>
								<?php if( $komisi->status_pengiriman == 'Selesai' ) { ?>
									<td class="bg-success"><?= $komisi->status_pengiriman ?></td>
								<?php } else { ?>
									<td>
										Belum Ditransfer
										<form action="<?= base_url('Administrator/Komisi/Ganti_Status/'.$komisi->id_komisi) ?>">
											<button class="alert-info">Sudah Transfer</button>
										</form>
									</td>
								<?php } ?>
							<?php endif ?>
							<td><a href="<?= base_url('Administrator/Komisi/hapuskomisi/'.$komisi->id_komisi) ?>"><h3><i class="text-danger fa fa-trash"></i></h3></a></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000000">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Komisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Administrator/Komisi/Tambah_Komisi') ?>" method="post">
      	<div class="modal-body">
        	<input type="text" name="nama_lengkap_tutor" class="form-control" placeholder="Nama Tutor" required>
        	<br>
        	<input type="email" name="email_tutor" class="form-control" placeholder="Email Tutor" required>
        	<br>
        	<input type="number" name="total_komisi" class="form-control" placeholder="Total Komisi" required>
        	<br>
        	<select class="form-control" name="kategori_komisi">
        		<option value="Fee Bulanan">Fee Bulanan</option>
        		<option value="Klaim Kode Referral">Klaim Kode Referral</option>
        		<option value="Bonus">Bonus</option>
        	</select>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Submit</button>
      	</div>
      </form>
    </div>
  </div>
</div>
