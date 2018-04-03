$(document).ready(function() {
	$('.btn-ingresar-cuenta').click(function(event) {
		/* Act on the event */
		$('.pub-signin').addClass('on');
	});

	$('body').on('click', '.bg-signin','.bg-signup', function(event) {
		$('.pub-signup').removeClass('on');
		$('.pub-signin').removeClass('on');
	});

	$('.btn-olvido').click(function(event) {
		 $('.pub-inner-forgot').addClass('on');
		 $('.pub-inner-signin').addClass('off');
	});
	$('.btn-cancelar-olvido').click(function(event) {
		 $('.pub-inner-forgot').removeClass('on');
		 $('.pub-inner-signin').removeClass('off');
	});

	$('.btn-crear-cuenta-nueva').click(function(event) {
		 $('.pub-signin').removeClass('on');
		 $('.pub-signup').addClass('on');
	});

});