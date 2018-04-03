$(document).ready(function() {
	$('.btn-crear-cuenta').click(function(event) {
		/* Act on the event */
		$('.pub-signup').addClass('on');
	});

	$('body').on('click', '.bg-signup', function(event) {
		$('.pub-signup').removeClass('on');
	});
});