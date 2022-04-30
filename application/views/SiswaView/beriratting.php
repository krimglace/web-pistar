<?php  ?>
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
						<i class="fas fa-comment mr-1"></i>
						Beri Ratting
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="section-3">
				<h4 class="mb-4"><strong>Data Ratting Guru</strong></h4>
				<table class="table table-bordered table-stripped text-center">
					<tr class="bg-primary">
						<th>No</th>
						<th>Nama Guru</th>
						<th>Penilaian</th>
						<th>Aksi</th>
					</tr>
					<?php
						$no = 1;
						foreach( $pengajar as $tutor ) :
							$query = "SELECT * FROM tb_pesanan_les INNER JOIN tb_tutor ON tb_pesanan_les.id_tutor = tb_tutor.id_tutor WHERE tb_tutor.id_tutor = '".$tutor->id_tutor."'";
							$queryresult = $this->db->query($query);
							if( $queryresult->num_rows() > 0 ){
								$whereSelect = array('id_tutor' => $tutor->id_tutor, 'id_siswawali_user' => $id_siswawali);
							$rating = $this->AkunSiswa_Model->tampilData($whereSelect, 'tb_ratting_tutor');

							if( $rating->num_rows() > 0 ){
					?>
					<form action="<?= base_url('Siswa/Beri_Ratting/Tambah_Ratting/'.$tutor->id_tutor) ?>" method="post">
						<tr class="text-center bg-success">
							<td><?= $no++ ?></td>
							<td><?= $tutor->nama_lengkap_tutor ?></td>
							<input type="hidden" name="id_tutor" value="<?= $tutor->id_tutor ?>">
							<td>
								<style type="text/css">
									ul.rate li{
										display: inline-block;
										width: 18%;
										/*border: 1px solid black;*/
									}
								</style>
								<ul class="rate">
									<li>
										<input id="nilai?id_tutor=<?= $tutor->id_tutor ?>" type="radio" name="nilai?id_tutor=<?= $tutor->id_tutor ?>" value="1">
										<br>
										<label for="nilai" class="rating">1</label>
									</li>
									<li>
										<input id="nilai?id_tutor=<?= $tutor->id_tutor ?>" type="radio" name="nilai?id_tutor=<?= $tutor->id_tutor ?>" value="2">
										<br>
										<label for="nilai" class="rating">2</label>
									</li>
									<li>
										<input id="nilai?id_tutor=<?= $tutor->id_tutor ?>" type="radio" name="nilai?id_tutor=<?= $tutor->id_tutor ?>" value="3">
										<br>
										<label for="nilai" class="rating">3</label>
									</li>
									<li>
										<input id="nilai?id_tutor=<?= $tutor->id_tutor ?>" type="radio" name="nilai?id_tutor=<?= $tutor->id_tutor ?>" value="4">
										<br>
										<label for="nilai" class="rating">4</label>
									</li>
									<li>
										<input id="nilai?id_tutor=<?= $tutor->id_tutor ?>" type="radio" name="nilai?id_tutor=<?= $tutor->id_tutor ?>" value="5">
										<br>
										<label for="nilai" class="rating">5</label>
									</li>
								</ul>
							</td>
							<td><button type="submit" class="btn btn-info text-white">Nilai</button></td>
						</tr>
					</form>	
					<?php
							}else{
					?>
					<form action="<?= base_url('Siswa/Beri_Ratting/Tambah_Ratting/'.$tutor->id_tutor) ?>" method="post">
						<tr class="text-center">
							<td><?= $no++ ?></td>
							<td><?= $tutor->nama_lengkap_tutor ?></td>
							<input type="hidden" name="id_tutor" value="<?= $tutor->id_tutor ?>">
							<td>
								<style type="text/css">
									ul.rate li{
										display: inline-block;
										width: 18%;
										/*border: 1px solid black;*/
									}
								</style>
								<ul class="rate">
									<li>
										<input id="nilai?id_tutor=<?= $tutor->id_tutor ?>" type="radio" name="nilai?id_tutor=<?= $tutor->id_tutor ?>" value="1">
										<br>
										<label for="nilai" class="rating">1</label>
									</li>
									<li>
										<input id="nilai?id_tutor=<?= $tutor->id_tutor ?>" type="radio" name="nilai?id_tutor=<?= $tutor->id_tutor ?>" value="2">
										<br>
										<label for="nilai" class="rating">2</label>
									</li>
									<li>
										<input id="nilai?id_tutor=<?= $tutor->id_tutor ?>" type="radio" name="nilai?id_tutor=<?= $tutor->id_tutor ?>" value="3">
										<br>
										<label for="nilai" class="rating">3</label>
									</li>
									<li>
										<input id="nilai?id_tutor=<?= $tutor->id_tutor ?>" type="radio" name="nilai?id_tutor=<?= $tutor->id_tutor ?>" value="4">
										<br>
										<label for="nilai" class="rating">4</label>
									</li>
									<li>
										<input id="nilai?id_tutor=<?= $tutor->id_tutor ?>" type="radio" name="nilai?id_tutor=<?= $tutor->id_tutor ?>" value="5">
										<br>
										<label for="nilai" class="rating">5</label>
									</li>
								</ul>
							</td>
							<td><button type="submit" class="btn btn-info text-white">Nilai</button></td>
						</tr>
					</form>	
					<?php }} endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
