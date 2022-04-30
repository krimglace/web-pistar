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
						<i class="fas fa-comment mr-1"></i>
						Komentar Artikel
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="section-3">
				<h4 class="mb-4"><strong>Komentar</strong></h4>
				<table class="table table-bordered table-stripped text-center">
					<tr class="bg-primary">
						<th>No</th>
						<th>Email</th>
						<th>Isi Komentar</th>
					</tr>
					<?php $no = 1; foreach( $komentar as $com ) :  ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $com->email_comment ?></td>
							<td><?= $com->isi_komentar ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>