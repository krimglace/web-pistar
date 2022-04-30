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
			<?= $this->session->flashdata('pesan') ?>
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
						foreach( $pengajar as $ttr ) :
							$query = "SELECT * FROM tb_pesanan_les as pesanan JOIN tb_siswawali_user as siswa ON siswa.id_siswawali = pesanan.id_siswawali WHERE pesanan.id_tutor = '".$ttr->id_tutor."'";
							$jadwal = $this->db->query($query)->result();

							foreach( $jadwal as $jdwl ) :
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td>
							<b><?= $jdwl->mata_pelajaran ?></b><br>
							<b>Siswa :</b> <?= $jdwl->nama_lengkap_user ?><br>
							<b>Email :</b> <?= $jdwl->email_user ?>
							<b>No. Telepon :</b> <?= $jdwl->no_whatsapp_user ?>

						</td>

						<?php if( $jdwl->hari_senin == '00:00:00' ) : ?>
							<td><i class="text-danger">Tidak Ada Jadwal</i></td>
						<?php else : ?>
							<td>
								<?= $jdwl->hari_senin ?><br>
								<b>Link Meet : </b><br>
								<?= $jdwl->link_senin ?><br>
								<button class="btn btn-info" data-toggle="modal" data-target="#senin<?= $jdwl->id_pesanan ?>">Update Link Meet</button></td>
						<?php endif; ?>

						<?php if( $jdwl->hari_selasa == '00:00:00' ) : ?>
							<td><i class="text-danger">Tidak Ada Jadwal</i></td>
						<?php else : ?>
							<td>
								<?= $jdwl->hari_selasa ?><br>
								<b>Link Meet : </b><br>
								<?= $jdwl->link_selasa ?><br>
								<button class="btn btn-info" data-toggle="modal" data-target="#selasa<?= $jdwl->id_pesanan ?>">Update Link Meet</button></td>
							</td>
						<?php endif; ?>

						<?php if( $jdwl->hari_rabu == '00:00:00' ) : ?>
							<td><i class="text-danger">Tidak Ada Jadwal</i></td>
						<?php else : ?>
							<td>
								<?= $jdwl->hari_rabu ?><br>
								<b>Link Meet : </b><br>
								<?= $jdwl->link_rabu ?><br>
								<button class="btn btn-info" data-toggle="modal" data-target="#rabu<?= $jdwl->id_pesanan ?>">Update Link Meet</button></td>
							</td>
						<?php endif; ?>

						<?php if( $jdwl->hari_kamis == '00:00:00' ) : ?>
							<td><i class="text-danger">Tidak Ada Jadwal</i></td>
						<?php else : ?>
							<td>
								<?= $jdwl->hari_kamis ?><br>
								<b>Link Meet : </b><br>
								<?= $jdwl->link_kamis ?><br>
								<button class="btn btn-info" data-toggle="modal" data-target="#kamis<?= $jdwl->id_pesanan ?>">Update Link Meet</button></td>
							</td>
						<?php endif; ?>

						<?php if( $jdwl->hari_jumat == '00:00:00' ) : ?>
							<td><i class="text-danger">Tidak Ada Jadwal</i></td>
						<?php else : ?>
							<td>
								<?= $jdwl->hari_jumat ?><br>
								<b>Link Meet : </b><br>
								<?= $jdwl->link_jumat ?><br>
								<button class="btn btn-info" data-toggle="modal" data-target="#jumat<?= $jdwl->id_pesanan ?>">Update Link Meet</button></td>
							</td>
						<?php endif; ?>

						<?php if( $jdwl->hari_sabtu == '00:00:00' ) : ?>
							<td><i class="text-danger">Tidak Ada Jadwal</i></td>
						<?php else : ?>
							<td>
								<?= $jdwl->hari_sabtu ?><br>
								<b>Link Meet : </b>
								<?= $jdwl->link_sabtu ?><br>
								<button class="btn btn-info" data-toggle="modal" data-target="#sabtu<?= $jdwl->id_pesanan ?>">Update Link Meet</button></td>
							</td>
						<?php endif; ?>

						<td><a href="" data-toggle="modal" data-target="#exampleModal<?= $jdwl->id_pesanan ?>"><h3><i class="fas fa-eye"></i></h3></a></td>

						<!-- Senin -->
						<div class="modal fade" id="senin<?= $jdwl->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000000">
							<div class="modal-dialog" role="document">
							   	<div class="modal-content" >
							      	<div class="modal-header">
							        	<h5 class="modal-title" id="exampleModalLabel">Link Meet Senin</h5>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          		<span aria-hidden="true">&times;</span>
							        	</button>
							      	</div>
							      	<div class="modal-body text-center">
							      		<form method="post" action="<?= base_url('Tutor/Jadwal_Les/update_senin') ?>">
								      		<div>
								        		<label>ID Les</label>
								        		<input type="text" name="id_pesanan" value="<?= $jdwl->id_pesanan ?>" class="form-control" readonly>
								        		<label>Siswa</label>
								        		<input type="text" name="subjek" class="form-control" value="<?= $jdwl->nama_lengkap_user ?>" readonly>
								        		<label>Link Meet</label>
								        		<input type="text" name="link_senin" value="<?= $jdwl->link_senin ?>" class="form-control">
									      	</div>
									      	<div class="modal-footer">
									      		<button type="submit" class="btn btn-primary">Kirim</button>
									        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									      	</div>
							      		</form>
							    	</div>
							  	</div>
							</div>
						</div>

						<!-- Selasa -->
						<div class="modal fade" id="selasa<?= $jdwl->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000000">
							<div class="modal-dialog" role="document">
							   	<div class="modal-content" >
							      	<div class="modal-header">
							        	<h5 class="modal-title" id="exampleModalLabel">Link Meet Selasa</h5>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          		<span aria-hidden="true">&times;</span>
							        	</button>
							      	</div>
							      	<div class="modal-body text-center">
							      		<form method="post" action="<?= base_url('Tutor/Jadwal_Les/update_selasa') ?>">
								      		<div>
								        		<label>ID Les</label>
								        		<input type="text" name="id_pesanan" value="<?= $jdwl->id_pesanan ?>" class="form-control" readonly>
								        		<label>Siswa</label>
								        		<input type="text" name="subjek" class="form-control" value="<?= $jdwl->nama_lengkap_user ?>" readonly>
								        		<label>Link Meet</label>
								        		<input type="text" name="link_selasa" value="<?= $jdwl->link_selasa ?>" class="form-control">
									      	</div>
									      	<div class="modal-footer">
									      		<button type="submit" class="btn btn-primary">Kirim</button>
									        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									      	</div>
							      		</form>
							    	</div>
							  	</div>
							</div>
						</div>

						<!-- Rabu -->
						<div class="modal fade" id="rabu<?= $jdwl->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000000">
							<div class="modal-dialog" role="document">
							   	<div class="modal-content" >
							      	<div class="modal-header">
							        	<h5 class="modal-title" id="exampleModalLabel">Link Meet Rabu</h5>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          		<span aria-hidden="true">&times;</span>
							        	</button>
							      	</div>
							      	<div class="modal-body text-center">
							      		<form method="post" action="<?= base_url('Tutor/Jadwal_Les/update_rabu') ?>">
								      		<div>
								        		<label>ID Les</label>
								        		<input type="text" name="id_pesanan" value="<?= $jdwl->id_pesanan ?>" class="form-control" readonly>
								        		<label>Siswa</label>
								        		<input type="text" name="subjek" class="form-control" value="<?= $jdwl->nama_lengkap_user ?>" readonly>
								        		<label>Link Meet</label>
								        		<input type="text" name="link_rabu" value="<?= $jdwl->link_rabu ?>" class="form-control">
									      	</div>
									      	<div class="modal-footer">
									      		<button type="submit" class="btn btn-primary">Kirim</button>
									        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									      	</div>
							      		</form>
							    	</div>
							  	</div>
							</div>
						</div>

						<!-- Kamis -->
						<div class="modal fade" id="kamis<?= $jdwl->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000000">
							<div class="modal-dialog" role="document">
							   	<div class="modal-content" >
							      	<div class="modal-header">
							        	<h5 class="modal-title" id="exampleModalLabel">Link Meet Kamis</h5>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          		<span aria-hidden="true">&times;</span>
							        	</button>
							      	</div>
							      	<div class="modal-body text-center">
							      		<form method="post" action="<?= base_url('Tutor/Jadwal_Les/update_kamis') ?>">
								      		<div>
								        		<label>ID Les</label>
								        		<input type="text" name="id_pesanan" value="<?= $jdwl->id_pesanan ?>" class="form-control" readonly>
								        		<label>Siswa</label>
								        		<input type="text" name="subjek" class="form-control" value="<?= $jdwl->nama_lengkap_user ?>" readonly>
								        		<label>Link Meet</label>
								        		<input type="text" name="link_kamis" value="<?= $jdwl->link_kamis ?>" class="form-control">
									      	</div>
									      	<div class="modal-footer">
									      		<button type="submit" class="btn btn-primary">Kirim</button>
									        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									      	</div>
							      		</form>
							    	</div>
							  	</div>
							</div>
						</div>

						<!-- Jumat -->
						<div class="modal fade" id="jumat<?= $jdwl->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000000">
							<div class="modal-dialog" role="document">
							   	<div class="modal-content" >
							      	<div class="modal-header">
							        	<h5 class="modal-title" id="exampleModalLabel">Link Meet Jumat</h5>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          		<span aria-hidden="true">&times;</span>
							        	</button>
							      	</div>
							      	<div class="modal-body text-center">
							      		<form method="post" action="<?= base_url('Tutor/Jadwal_Les/update_jumat') ?>">
								      		<div>
								        		<label>ID Les</label>
								        		<input type="text" name="id_pesanan" value="<?= $jdwl->id_pesanan ?>" class="form-control" readonly>
								        		<label>Siswa</label>
								        		<input type="text" name="subjek" class="form-control" value="<?= $jdwl->nama_lengkap_user ?>" readonly>
								        		<label>Link Meet</label>
								        		<input type="text" name="link_jumat" value="<?= $jdwl->link_jumat ?>" class="form-control">
									      	</div>
									      	<div class="modal-footer">
									      		<button type="submit" class="btn btn-primary">Kirim</button>
									        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									      	</div>
							      		</form>
							    	</div>
							  	</div>
							</div>
						</div>

						<!-- Sabtu -->
						<div class="modal fade" id="sabtu<?= $jdwl->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000000">
							<div class="modal-dialog" role="document">
							   	<div class="modal-content" >
							      	<div class="modal-header">
							        	<h5 class="modal-title" id="exampleModalLabel">Link Meet Sabtu</h5>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          		<span aria-hidden="true">&times;</span>
							        	</button>
							      	</div>
							      	<div class="modal-body text-center">
							      		<form method="post" action="<?= base_url('Tutor/Jadwal_Les/update_sabtu') ?>">
								      		<div>
								        		<label>ID Les</label>
								        		<input type="text" name="id_pesanan" value="<?= $jdwl->id_pesanan ?>" class="form-control" readonly>
								        		<label>Siswa</label>
								        		<input type="text" name="subjek" class="form-control" value="<?= $jdwl->nama_lengkap_user ?>" readonly>
								        		<label>Link Meet</label>
								        		<input type="text" name="link_sabtu" value="<?= $jdwl->link_sabtu ?>" class="form-control">
									      	</div>
									      	<div class="modal-footer">
									      		<button type="submit" class="btn btn-primary">Kirim</button>
									        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									      	</div>
							      		</form>
							    	</div>
							  	</div>
							</div>
						</div>

						<!-- Read -->
						<div class="modal fade" id="exampleModal<?= $jdwl->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000000">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content" >
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Jadwal</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      	<div class="modal-body text-center">
						        	<label>ID Les</label>
						        	<input type="text" name="idsiswa" value="<?= $jdwl->id_pesanan ?>" class="form-control" readonly>
						        	<label>Siswa</label>
						        	<input type="text" name="subjek" class="form-control" value="<?= $jdwl->nama_lengkap_user ?>" readonly>
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
