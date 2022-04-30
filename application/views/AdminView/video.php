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
						<i class="fas fa-video mr-1"></i>
						Video PISTAR
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
		    <div class="text-center" style="">
	    		<?php foreach( $pistar as $panduanpengajar ) : ?>
    				<iframe width="80%" height="315" src="<?= $panduanpengajar->link ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			    <?php endforeach; ?>
			    <br>
			    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#Modal">Ganti Video</a>
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
  						<h4>Ganti Link</h4>
  					</div>
  					<div>
      					<form method="post" action="<?= base_url('Administrator/Video/Update') ?>">
        					<div class="form-login">
    							<div class="form-group">
    							    <?php foreach( $pistar as $panduanpengajar ) : ?>
        							<label class="mt-2" for="linkprev">Link Sebelumnya</label>
        							<input type="text" name="linkprev" class="form-control mt-2" value="<?= $panduanpengajar->link ?>" readonly>
        							<?php endforeach; ?>
        						</div>
        						<div class="form-group">
        							<label class="mt-2" for="link">Link Baru</label>
        							<input type="text" name="link" class="form-control mt-2" required>
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