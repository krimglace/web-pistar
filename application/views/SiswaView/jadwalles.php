<?php  ?>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	.h-jadwal{ border-bottom: 3px solid black }
	.end-jadwal{ border-bottom: 1px solid black }
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
						<i class="fas fa-calendar mr-1"></i>
						Jadwal Les
					</b>
				</h5>
			</div>
			<br>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="section-3">
				<h4 class="mb-4"><strong>Jadwal</strong></h4>
				<table class="table table-bordered table-stripped text-center">
					<tr class="bg-primary">
						<th>No</th>
						<th>Mata Pelajaran</th>
						<th>Senin</th>
						<th>Selasa</th>
						<th>Rabu</th>
						<th>Kamis</th>
						<th>Jumat</th>
						<th>Sabtu</th>
						<th colspan="2">Aksi</th>
					</tr>
					<?php
						$no = 1;
						foreach( $siswawali as $ssw ) :
							$query = "SELECT * FROM tb_pesanan_les as pesanan JOIN tb_tutor as tutor ON tutor.id_tutor = pesanan.id_tutor WHERE pesanan.id_siswawali = '".$ssw->id_siswawali."'";
							$jadwal = $this->db->query($query)->result();

							foreach( $jadwal as $jdwl ) :
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td>
							<b><?= $jdwl->mata_pelajaran ?></b><br>
							<b>Tutor :</b> <?= $jdwl->nama_lengkap_tutor ?><br>
							<b>No. Telepon :</b> +<?= $jdwl->no_whatsapp_tutor ?>

						</td>

						<?php if( $jdwl->hari_senin == '00:00:00' ) : ?>
							<td><i class="text-danger">Tidak Ada Jadwal</i></td>
						<?php else : ?>
							<td><?= $jdwl->hari_senin ?><br> <b>Link Meet : </b><?= $jdwl->link_senin ?></td>
						<?php endif; ?>

						<?php if( $jdwl->hari_selasa == '00:00:00' ) : ?>
							<td><i class="text-danger">Tidak Ada Jadwal</i></td>
						<?php else : ?>
							<td><?= $jdwl->hari_selasa ?><br> <b>Link Meet : </b><?= $jdwl->link_selasa ?></td>
						<?php endif; ?>

						<?php if( $jdwl->hari_rabu == '00:00:00' ) : ?>
							<td><i class="text-danger">Tidak Ada Jadwal</i></td>
						<?php else : ?>
							<td><?= $jdwl->hari_rabu ?><br> <b>Link Meet : </b><?= $jdwl->link_rabu ?></td>
						<?php endif; ?>

						<?php if( $jdwl->hari_kamis == '00:00:00' ) : ?>
							<td><i class="text-danger">Tidak Ada Jadwal</i></td>
						<?php else : ?>
							<td><?= $jdwl->hari_kamis ?><br> <b>Link Meet : </b><?= $jdwl->link_kamis ?></td>
						<?php endif; ?>

						<?php if( $jdwl->hari_jumat == '00:00:00' ) : ?>
							<td><i class="text-danger">Tidak Ada Jadwal</i></td>
						<?php else : ?>
							<td><?= $jdwl->hari_jumat ?><br> <b>Link Meet : </b><?= $jdwl->link_jumat ?></td>
						<?php endif; ?>

						<?php if( $jdwl->hari_sabtu == '00:00:00' ) : ?>
							<td><i class="text-danger">Tidak Ada Jadwal</i></td>
						<?php else : ?>
							<td><?= $jdwl->hari_sabtu ?><br> <b>Link Meet : </b><?= $jdwl->link_sabtu ?></td>
						<?php endif; ?>

						<td><a href="" data-toggle="modal" data-target="#exampleModal<?= $jdwl->id_pesanan ?>"><h3><i class="fas fa-eye"></i></h3></a></td>

						<div class="modal fade" id="exampleModal<?= $jdwl->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000000">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content" >
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Jadwal Les</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      	<div class="modal-body text-center">
						        	<label>ID Les</label>
						        	<input type="text" name="idsiswa" value="<?= $jdwl->id_pesanan ?>" class="form-control" readonly>
						        	<label>Tutor</label>
						        	<input type="text" name="subjek" class="form-control" value="<?= $jdwl->nama_lengkap_tutor ?>" readonly>
						        	<label>Jadwal Les</label><br>
						        	<div class="jadwal text-justify">
							        	<div class="float-left col-2"> <b>Hari</b> </div>
							        	<div class="float-left col-4"> <b>Jam</b> </div>
							        	<div class="float-left col-5"> <b>Link Meet</b> </div>
							        	<div class="clearfix h-jadwal"></div>

							        	<div class="float-left col-2"> Senin </div>
							        	<?php if( $jdwl->hari_senin == '00:00:00' ) : ?>
											<div class="float-left col-9"> Tidak Ada Jadwal </div>
										<?php else : ?>
											<div class="float-left col-4"> <?= $jdwl->hari_senin ?> </div>
							        		<div class="float-left col-5"> <?= $jdwl->link_senin ?> </div>
										<?php endif; ?>
										<div class="clearfix end-jadwal"></div>

										<div class="float-left col-2"> Selasa </div>
										<?php if( $jdwl->hari_selasa == '00:00:00' ) : ?>
											<div class="float-left col-9"> Tidak Ada Jadwal </div>
										<?php else : ?>
											<div class="float-left col-4"> <?= $jdwl->hari_selasa ?> </div>
							        		<div class="float-left col-5"> <?= $jdwl->link_selasa ?> </div>
										<?php endif; ?>
							        	<div class="clearfix end-jadwal"></div>

							        	<div class="float-left col-2"> Rabu </div>
										<?php if( $jdwl->hari_rabu == '00:00:00' ) : ?>
											<div class="float-left col-9"> Tidak Ada Jadwal </div>
										<?php else : ?>
											<div class="float-left col-4"> <?= $jdwl->hari_rabu ?> </div>
							        		<div class="float-left col-5"> <?= $jdwl->link_rabu ?> </div>
										<?php endif; ?>
							        	<div class="clearfix end-jadwal"></div>

							        	<div class="float-left col-2"> Kamis </div>
										<?php if( $jdwl->hari_kamis == '00:00:00' ) : ?>
											<div class="float-left col-9"> Tidak Ada Jadwal </div>
										<?php else : ?>
											<div class="float-left col-4"> <?= $jdwl->hari_kamis ?> </div>
							        		<div class="float-left col-5"> <?= $jdwl->link_kamis ?> </div>
										<?php endif; ?>
							        	<div class="clearfix end-jadwal"></div>

							        	<div class="float-left col-2"> Jumat </div>
										<?php if( $jdwl->hari_jumat == '00:00:00' ) : ?>
											<div class="float-left col-9"> Tidak Ada Jadwal </div>
										<?php else : ?>
											<div class="float-left col-4"> <?= $jdwl->hari_jumat ?> </div>
							        		<div class="float-left col-5"> <?= $jdwl->link_jumat ?> </div>
										<?php endif; ?>
							        	<div class="clearfix end-jadwal"></div>

							        	<div class="float-left col-2"> Sabtu </div>
										<?php if( $jdwl->hari_sabtu == '00:00:00' ) : ?>
											<div class="float-left col-9"> Tidak Ada Jadwal </div>
										<?php else : ?>
											<div class="float-left col-4"> <?= $jdwl->hari_sabtu ?> </div>
							        		<div class="float-left col-5"> <?= $jdwl->link_sabtu ?> </div>
										<?php endif; ?>
							        	<div class="clearfix end-jadwal"></div>
							        </div>
						      	</div>
						      	<div class="modal-footer">
						        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        	<a href="https://wa.me/62<?= $jdwl->no_whatsapp_tutor ?>" class="text-white btn btn-primary">Hubungi Tutor</a>
						      	</div>
						    </div>
						  </div>
						</div>

					<?php 
							endforeach;
						endforeach; 
					?>
				</table>
			</div>
		</div>
	</div>
</div>
