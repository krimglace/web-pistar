$(document).ready(function(){
	$('#kurikulum-1').hide();
	$('#kurikulum-2').hide();
	$('#kurikulum-3').hide();
	$('#Kelas-sd').hide();
	$('#Kelas-smp').hide();
	$('#Kelas-smak').hide();

	loadlevel();
});

function loadlevel(){

	$('#namaprogram').on('change', function(){

		var kur = document.getElementById('kurikulum-1');
		var kur2 = document.getElementById('kurikulum-2');
		var kur3 = document.getElementById('kurikulum-3');
		var classd = document.getElementById('Kelas-sd');
		var classmp = document.getElementById('Kelas-smp');
		var classmak = document.getElementById('Kelas-smak');

			const selectedPackage = $('#namaprogram').val();

			if(  selectedPackage == 'Toddler' || selectedPackage == 'Playgroup' || selectedPackage == 'TK'
				) {
				classmak.style.display = 'none'; classmp.style.display = 'none'; classd.style.display = 'none'; kur.style.display = 'block'; kur2.style.display = 'none'; kur3.style.display = 'none';

			} else if ( selectedPackage == 'SD' ){
			classmak.style.display = 'none'; classmp.style.display = 'none'; classd.style.display = 'block'; kur.style.display = 'block'; kur2.style.display = 'none'; kur3.style.display = 'none';

			} else if ( selectedPackage == 'SMP' ){
			classmak.style.display = 'none'; classmp.style.display = 'block'; classd.style.display = 'none'; kur.style.display = 'block'; kur2.style.display = 'none'; kur3.style.display = 'none';

			} else if ( selectedPackage == 'SMA' ){
				classmak.style.display = 'block'; classmp.style.display = 'none'; classd.style.display = 'none'; kur.style.display = 'block'; kur2.style.display = 'none'; kur3.style.display = 'none';

			} else if ( selectedPackage == 'SMK' ){
				classmak.style.display = 'block'; classmp.style.display = 'none'; classd.style.display = 'none'; kur.style.display = 'none'; kur2.style.display = 'none'; kur3.style.display = 'none';

			} else if ( selectedPackage == 'English Skill' || selectedPackage == 'Bahasa Asing'){
				classmak.style.display = 'none'; classmp.style.display = 'none'; classd.style.display = 'none'; kur.style.display = 'none'; kur2.style.display = 'block'; kur3.style.display = 'none';
			} else if ( selectedPackage == 'Mengaji'){
				classmak.style.display = 'none'; classmp.style.display = 'none'; classd.style.display = 'none'; kur.style.display = 'none'; kur2.style.display = 'none'; kur3.style.display = 'block';
			} else {
				classmak.style.display = 'none'; classmp.style.display = 'none'; kur.style.display = 'none'; classd.style.display = 'none'; kur2.style.display = 'none'; kur3.style.display = 'none';
			}
			
	});
}