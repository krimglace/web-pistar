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
		.content-header h5{ font-size: 100%; }
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fas fa-comment mr-1"></i>
						Data Testimoni
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="">
				<form action="<?= base_url('Administrator/Testimoni/SelectTestimoni') ?>" method="post">
				<select class="form-control" name="testimoni">
						<option>~ Pilih Jenis Testimoni ~</option>
						<option value="guru" class="guru">Testimoni Guru</option>
						<option value="siswa" class="siswa">Testimoni Siswa</option>
					</select>
					<br>
					<button class="btn-success btn">Pilih</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
		$(document).ready(function(){
			$('.menu-item').click(function(){
			var menu = $(this).attr('id');
			if(menu == "Dashboard"){
				$('.section').load('dashboard.php');
			} else if(menu == "kegiatan"){
				$('.section').load('kegiatan.php');
			} else if(menu == "daily"){
				$('.section').load('daily.php');
			} else if(menu == "sett" || menu == "sett-user"){
				$('.section').load('sett-user.php');
			}

		});
		$('.section').load('dashboard.php');
		});
</script>