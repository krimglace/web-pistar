<?php  ?>
<style>
    .disclaimer{
        display: none;
    }
    @media screen and (max-width : 750px){
        .footer-main{
            margin-top: 10%;
        }
        .footer-sosmed{
            margin-left: -8%;
        }
    }
</style>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/mystyle/css/footer.css') ?>">
<br><br><br><br>
<div class="footer-main">
	<?php foreach( $tentang as $ttg ) : ?>
	<div class="footer-footer" style="padding-top: 20px">
		<div class="container">
			<div class="footer-copyright text-white animate__animated animate__bounceInUp animate__delay-1s">
				<b>&copy; 2022 Pistar</b>
			</div>
			<div class="footer-sosmed animate__animated animate__bounceInUp animate__delay-1s">
				<ul>
					<li><a href="<?= $ttg->youtube_pistar ?>" style="font-size: 120%;" class="pr-2 pl-2 m-2 border rounded-circle bg-white text-danger"><i class="fa fa-youtube-play"></i></a></li>
					<li><a href="<?= $ttg->instagram_pistar ?>" style="font-size: 120%;" class="pl-2 pr-2 m-2 border rounded-circle bg-white text-warning"><i class="fa fa-instagram"></i></a></li>
					<li><a href="<?= $ttg->facebook_pistar ?>" style="font-size: 120%;" class="pl-2 pr-2 m-2 border rounded-circle bg-white text-primary"><i class="fa fa-facebook-square"></i></a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<a href="https://wa.me/+<?= $ttg->whatsapp_admin_pistar ?>" class="float-end" style="position: fixed;bottom: 25px; right: 25px; z-index: 100000;">
    <img src="https://logodownload.org/wp-content/uploads/2015/04/whatsapp-logo-1.png" width="50px">
</a>
<?php endforeach; ?>
	 <script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script> 
	 <script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/mystyle/js/showpassword.js') ?>"></script>
	 <script type="text/javascript" src="<?= base_url('assets/mystyle/js/responsive-menu.js') ?>"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
</body>
</html>