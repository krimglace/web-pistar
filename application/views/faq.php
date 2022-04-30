<?php  ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/mystyle/css/faq.css') ?>">
<div class="faq">
	<div class="faq-main">
		<div>
			<div class="kiri-faq mt-4">
				<p>FAQ</p>
				<h2><strong>Pertanyaan Yang Sering Muncul</strong></h2>
				<div class="tanyajawab">
					<?php
						foreach( $faq as $qa ) :
						$no = $qa->id_faq;
					?>
					<div class="faqfaq mt-2 pb-3">
						<a href="javascript:toggle('<?= $no ?>');" id="question" rel="nofollow">
							<h4 class="kanan" id="kanan_<?= $no ?>"> <u>+</u> </h4>
							<h4 class="kiri"><?= $qa->pertanyaan ?><h4>
							<div class="clearfix"></div>
						</a>
						<h6 class="mt-3" id="answer_<?= $no ?>" style="display: none;color: rgb(0,0,0, 0.5);"><?= $qa->jawaban ?></h6>
					</div>
					<?php
						endforeach;
					?>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<script type="text/javascript">
	function toggle(no){
		console.log(no);
		var A = document.getElementById('answer_'+no);
		var R = document.getElementById('kanan_'+no);
		if(A.style.display == 'block'){
			A.style.display = 'none';
			R.innerHTML = '+';
		} else {
			A.style.display = 'block';
			R.innerHTML = '-';
		}
	}
</script>