<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	@media screen and (min-width: 751px){

	}
	@media screen and (max-width: 750px){
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
						<i class="fas fa-comment mr-1"></i>
						Beri Testimoni
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="">
				<form action="<?= base_url('Administrator/Testimoni/SelectTestimoni') ?>" method="post">
					<select class="form-control float-left col-8" name="testimoni">
						<option>~ Pilih Jenis Testimoni ~</option>
						<option value="guru" class="guru">Testimoni Guru</option>
						<option value="siswa" class="siswa">Testimoni Siswa</option>
					</select>
					<button class="btn-success btn float-left col-2 ml-4">Pilih</button>
					<div class="clearfix m-4"></div>
				</form>
			</div>
			<div class="section-3">
				<h4 class="mb-4"><strong>Data Testimoni Guru</strong></h4>
				<table class="table table-bordered table-stripped text-center">
					<tr class="bg-primary">
						<th>No</th>
						<th>Testimoni</th>
						<th>Aksi</th>
					</tr>
					<?php $no = 1; foreach( $testimoni_guru as $testi ) :  ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $testi->isi_testimoni ?></td>
							<td><a href="<?= base_url('Administrator/Testimoni/HapusTutor/'.$testi->id_testi_tutor) ?>"><h3><i class="text-danger fa fa-trash"></i></h3></a></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Beri Testimoni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Siswa/Beri_Testimoni/Tambah_Testimoni') ?>" method="post">
      	<div class="modal-body">
        <?php foreach( $siswawali as $siswa ) : ?>
        	<input type="hidden" name="idsiswa" value="<?= $siswa->id_siswawali ?>">
        <?php endforeach;?>
        	<textarea name="isi_testimoni" class="form-control" rows="10"></textarea>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Submit</button>
      	</div>
      </form>
    </div>
  </div>
</div>
