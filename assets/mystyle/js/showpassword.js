$(document).ready(function(){		
	$('#enable-show').click(function(){
		if($(this).is(':checked')){
			$('#password-input').attr('type','text');
		}else{
			$('#password-input').attr('type','password');
		}
	});
});