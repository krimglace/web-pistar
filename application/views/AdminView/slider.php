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
		.content-header h5{ font-size: 100%; }
	}
</style>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fas fa-camera mr-1"></i>
						Slider Home
					</b>
				</h5>
			</div>
			<br>
			<a style="cursor: pointer;" data-toggle="modal" data-target="#Modal">
				<div class=" tambah-blog alert alert-success">
					<i class="fa fa-plus mr-2"></i> 
					Tambah Slider 
				</div>
			</a>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Gambar Slide</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php $no = 1; foreach( $pistar as $ptr ) : ?>
                    <tr>
                        <form enctype="multipart/form-data" method="post" action="<?= base_url('Administrator/Slider/Edit/'.$ptr->id_slide) ?>">
                            <td style="width: 10%;"><?= $no++ ?></td>
                            <td class="text-center" style="width: 80%"><img src="<?= base_url('assets/mystyle/img/'.$ptr->gambar_slider) ?>" width="60%"><br><br><strong>Ganti Foto ?</strong><br><input type="file" name="gambar_slider" class="form-control" required></td>
                            <td><button style="background: none; border: none" type="submit"><h3><i class="text-primary fa fa-edit"></i></h3</button></td>
    						<td><a href="<?= base_url('Administrator/Slider/Delete/'.$ptr->id_slide) ?>"><h3><i class="text-danger fa fa-trash"></i></h3></a></td>
						</form>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
		</div>
	</div>
</div>
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="RegisterBoxLabel" aria-hidden="true" style="z-index: 100000">
  	<div class="modal-dialog">
		<div class="modal-content">
  			<div class="modal-header bg-secondary">
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
  			</div>
  			<div class="modal-body">
  				<div class="text-center" style="margin-bottom: -10px;">
  					<h4>Tambah Sliderk</h4>
  				</div>
  				<div>
  					<form enctype="multipart/form-data" method="post" action="<?= base_url('Administrator/Slider/Tambah/'.$ptr->id_slide) ?>">
    					<div class="form-login">
    						<div class="form-group">
    							<label class="mt-2" for="gambar_slider">Link Baru</label>
    							<input type="file" name="gambar_slider" class="form-control mt-2" required>
    						</div>
    							<button type="submit" class="mt-2 btn btn-primary w-100">Submit</button>
    						</div>
						</div>
					</form>
				</div>
  			</div>
  			<div class="modal-footer bg-secondary"></div>
		</div>
  	</div>
</div>