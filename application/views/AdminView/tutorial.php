<?php  ?>
<script type="text/javascript" src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
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
						<i class="fa fa-sticky-note mr-1"></i>
						Tutorial
					</b>
				</h5>
			</div>
			<br>
			<button type="button" class="text-left btn btn-success mt-2 form-control" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-2"></i> Tambah Tutorial</button>
			<br><br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<h5 class="text-center"><strong>Tutorial</strong></h5>
			<div class="section-3">
				<div class="table-post">
					<table class="table table-striped table-bordered">
						<tr>
							<th>No</th>
							<th>Jenis Tutorial</th>
							<th>Isi Tutorial</th>
							<th colspan="2" class="text-center">Aksi</th>
						</tr>
						<?php
							$no = 1;
							foreach( $tutorial as $tutor ) :
						?>
						<tr class="">
							<td><?= $no++ ?></td>
							<td><?= $tutor->jenis_tutorial ?></td>
							<?php if( $tutor->isi_tutorial == NULL ) : ?>
							    <td>
									<form method="post" action="<?= base_url('Administrator/Tutorial/EditTutorial/'.$tutor->id_tutorial) ?>">
										<textarea class="ckeditor" id="ckeditor" name="isi_tutorial"></textarea>
										<input type="submit" name="" class="btn btn-secondary mt-1" value="Jawab">
									</form>
								</td>
							<?php else : ?>
								<td id="jawaban_<?= $tutor->id_tutorial ?>"><?= $tutor->isi_tutorial ?></td>
								<td id="editjawaban_<?= $tutor->id_tutorial ?>" style="display: none;">
									<div>
										<form method="post" action="<?= base_url('Administrator/Tutorial/EditTutorial/'.$tutor->id_tutorial) ?>">
											<textarea class="ckeditor" id="ckeditor" name="isi_tutorial"><?= $tutor->isi_tutorial ?></textarea>
											<input type="submit" name="" class="btn btn-secondary mt-1" value="Jawab">
											<a href="javascript:close('<?= $tutor->id_tutorial ?>');" type="button" name="" class="btn btn-danger mt-1">Tutup</a>
										</form>
									</div>
								</td>
							<?php endif;?>

							<td>
								<a href="javascript:toggle('<?= $tutor->id_tutorial ?>');" id="edit_<?= $tutor->id_tutorial ?>">
									<h3><i class="fa fa-edit"></i></h3>
								</a>
							</td>
							<td><a href="<?= base_url('Administrator/Tutorial/HapusTutorial/'.$tutor->id_tutorial) ?>"><h3><i class="text-danger fa fa-trash"></i></h3></a></td>
						</tr>
						<?php
							endforeach;
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" style="z-index: 10000000" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
    		<form action="<?= base_url('Administrator/Tutorial/TambahTutorial') ?>" method="post">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">New Tutorial</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
        			<div class="form-group">
        				<label>Jenis Tutorial</label>
        				<input type="text" name="jenis_tutorial" class="form-control" required="">
        			</div>
        			<div class="form-group">
        				<label>Isi Tutorial</label>
        				<textarea class="ckeditor form-control" id="ckeditor" name="isi_tutorial"></textarea>
        			</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        		<button type="submit" class="btn btn-primary">Tambahkan</button>
	      		</div>
      		</form>
    	</div>
  	</div>
</div>
<script type="text/javascript">
	function toggle(jawaban){
		console.log(jawaban);
		var A = document.getElementById('editjawaban_'+jawaban);
		var B = document.getElementById('jawaban_'+jawaban);
		if(A.style.display == 'none'){
			A.style.display = 'block';
			B.style.display = 'none';
		} else {
			A.style.display = 'none';
			B.style.display = 'block';
		}
	}
	function close(jawaban){
		console.log(jawaban);
		var A = document.getElementById('editjawaban_'+jawaban);
		var B = document.getElementById('jawaban_'+jawaban);
		if(A.style.display == 'block'){
			A.style.display = 'none';
			B.style.display = 'block';
		}
	}
</script>