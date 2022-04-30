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
						<i class="fas fa-envelope mr-1"></i>
						Kotak Saran
					</b>
				</h5>
			</div>
			<br>
			<a href="" data-toggle="modal" data-target="#exampleModal">
				<div class=" tambah-blog alert alert-success">
					<i class="fa fa-plus mr-2"></i> 
					Tambah Saran 
				</div>
			</a>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="">
				<h4 class="mb-4"><strong>Data Saran</strong></h4>
				<div class="section-3">
					<table class="table table-bordered table-stripped text-center float-left col-5">
						<tr>
							<th colspan="3" class="text-justify">Saran Siswa</th>
						</tr>
						<tr class="bg-primary">
							<th>No</th>
							<th>Subjek</th>
							<th>Isi</th>
						</tr>
						<?php $no = 1; foreach( $kotaksaransiswa as $saran ) :  ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $saran->judul_saran ?></td>
								<td><?= $saran->isi_saran ?></td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
				<div class="float-left col-1">
					<p> </p>
				</div>
				<div class="section-3">
					<table class="table table-bordered table-stripped text-center float-left col-6">
						<tr>
							<th colspan="4" class="text-justify">Saran Pengajar</th>
						</tr>
						<tr class="bg-primary">
							<th>No</th>
							<th>Subjek</th>
							<th>Isi</th>
							<th>Aksi</th>
						</tr>
						<?php $no = 1; foreach( $kotaksaranpengajar as $saran2 ) :  ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $saran2->judul_saran ?></td>
								<td><?= $saran2->isi_saran ?></td>
								<td><a href="<?= base_url('Tutor/Kotak_Saran/Hapus/'.$saran2->id_saran) ?>"><h3><i class="text-danger fa fa-trash"></i></h3></a></td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000000">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Beri Saran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Tutor/Kotak_Saran/Tambah_Saran') ?>" method="post">
      	<div class="modal-body">
        <?php foreach( $pengajar as $tutor ) : ?>
        	<input type="hidden" name="idtutor" value="<?= $tutor->id_tutor ?>">
        <?php endforeach;?>
        	<label>Subjek</label>
        	<input type="text" name="subjek" class="form-control">
        	<label>Isi</label>
        	<textarea name="isi" class="form-control" rows="6"></textarea>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Submit</button>
      	</div>
      </form>
    </div>
  </div>
</div>
