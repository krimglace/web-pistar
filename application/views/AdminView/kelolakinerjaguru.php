<?php  ?>
<script type="text/javascript" src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	@media screen and ( min-width: 750px ){
		.profil-tutor{
			float: left;
			width: 25%;
		}
		.table-post{
			float: left;
			width: 75%;
		}
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fa fa-users mr-1"></i>
						Kelola Kinerja Guru
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<?php
			foreach( $guru as $gr ) :
			$where = array('id_tutor' => $gr->id_tutor);
				$queryTtlMengajar = $this->Admin_Model->GetData($where, 'tb_pesanan_les');
				$queryTtlPolling = $this->Admin_Model->GetData($where, 'tb_ratting_tutor');

				$query = "SELECT AVG(jumlah_ratting) as jml_ratting FROM tb_ratting_tutor WHERE id_tutor = '".$gr->id_tutor."'";
				$queryRerataRatting = $this->db->query($query)->result();
				foreach( $queryRerataRatting as $qrr ) :
			?>
			<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
				<h3 class="text-center"><strong><?= $gr->nama_lengkap_tutor ?></strong></h3>
				<br>
				<div class="profil-tutor">
					<img src="<?= base_url('assets/mystyle/img/tutor/'.$gr->gambar_guru) ?>" width="100%">
				</div>
				<div class="table-post">
					<table class="table table-striped table-hover table-bordered">
						<tr class="text-center">
							<th>Total Mengajar</th>
							<th>Banyak Polling</th>
							<th>Rata - Rata Ratting</th>
						</tr>
						<tr class="text-center">
							<th><?= $queryTtlMengajar->num_rows() ?></th>
							<th><?= $queryTtlPolling->num_rows() ?> Siswa</th>
							<th><?= $qrr->jml_ratting ?></th>
						</tr>
					</table>
					<div class="text-center">
						<?php if( $qrr->jml_ratting > 4 ) : ?>
							<div class="btn btn-success">Sangat Baik</div>
						<?php elseif( $qrr->jml_ratting > 3 ) : ?>
							<div class="btn btn-primary">Baik</div>
						<?php elseif( $qrr->jml_ratting > 2 ) : ?>
							<div class="btn btn-warning">Cukup</div>
						<?php elseif( $qrr->jml_ratting > 1 ) : ?>
							<div class="btn btn-danger">Kurang</div>
						<?php elseif( $qrr->jml_ratting > 0 ) : ?>
							<div class="btn btn-dark">Sangat Kurang</div>
						<?php endif ?>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php endforeach ?>
		<?php endforeach ?>
	</div>
</div>
