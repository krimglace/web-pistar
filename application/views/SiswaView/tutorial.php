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
						<i class="fa fa-sticky-note mr-1"></i>
						Tutorial
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<form action="<?= site_url('Siswa/Tutorial/Filter') ?>" method="post">
				<div>
					<h5 class="text-center"><strong>Jenis Tutorial</strong></h5>
					<select name="jenis_tutorial" id="jenis_tutorial" class="form-control">
						<?php foreach( $tutorial as $jenis ) : ?>
							<option value="<?= $jenis->jenis_tutorial ?>"><?= $jenis->jenis_tutorial ?></option>
						<?php endforeach; ?>
					</select>
					<div class="form-group">
						<style type="text/css">
							.cek:hover{
								box-shadow: -5px 5px 10px 0px rgb(140, 38, 242);
								transition: .5s;
							}
						</style>
						<button type="submit" class="btn cek mt-2 text-white" style="border: 5px solid rgb(140, 38, 242);background-color: rgba(140, 38, 242, 0.8); transition: .5s"><i class="fa fa-search"></i> Cek Tutorial</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>