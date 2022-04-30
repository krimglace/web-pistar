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
						<i class="fa fa-inbox mr-1"></i>
						Paket Belajar
					</b>
				</h5>
			</div>
			<br>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<form action="<?= site_url('Administrator/Packet_Belajar/Filter') ?>" method="post">
				<div>
					<h5 class="text-center"><strong>Nama Program</strong></h5>
					<select name="namaprogram" id="namaprogram" class="form-control">
						<?php foreach( $paket as $pkt ) : ?>
							<option value="<?= $pkt->nama_program ?>"><?= $pkt->nama_program ?></option>
						<?php endforeach; ?>
					</select>
					<div class="Kelas-sd" id="Kelas-sd">
					<h5 class="text-center"><strong>Kelas</strong></h5>
						<select name="kelassd" class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
						</select>
					</div>
					<div class="Kelas-smp" id="Kelas-smp">
						<h5 class="text-center"><strong>Kelas</strong></h5>
						<select name="kelassmp" class="form-control">
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
						</select>
					</div>
					<div class="form-group">
						<style type="text/css">
							.cek:hover{
								box-shadow: -5px 5px 10px 0px rgb(140, 38, 242);
								transition: .5s;
							}
						</style>
						<button type="submit" class="btn cek mt-2 text-white" style="border: 5px solid rgb(140, 38, 242);background-color: rgba(140, 38, 242, 0.8); transition: .5s"><i class="fa fa-search"></i> Cek Paket</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>	
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script> 	
<script type="text/javascript" src="<?= base_url('assets/mystyle/js/loadlevel.min.js') ?>"></script>
<script>
    $(document).ready(function(){
	$('#Kelas-sd').hide();
	$('#Kelas-smp').hide();

	loadlevel();
});

function loadlevel(){

	$('#namaprogram').on('change', function(){

		var classd = document.getElementById('Kelas-sd');
		var classmp = document.getElementById('Kelas-smp');

		const selectedPackage = $('#namaprogram').val();

		if(  selectedPackage == 'TK' ) {
			classmp.style.display = 'none'; classd.style.display = 'none';

		} else if ( selectedPackage == 'SD' ){
		classmp.style.display = 'none'; classd.style.display = 'block';

		} else if ( selectedPackage == 'SMP' ){
		classmp.style.display = 'block'; classd.style.display = 'none';

		} else {
			classmp.style.display = 'none'; classd.style.display = 'none';
		}
		
	});
}
</script>