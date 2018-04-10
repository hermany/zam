$(document).ready(function() {
	$('.btn-crear-cuenta').click(function(event) {
		/* Act on the event */
		$('.pub-signup').addClass('on');
	});

	$('body').on('click', '.bg-signup', function(event) {
		$('.pub-signup').removeClass('on');
	});

	$('body').on('focus','#form-signup #inputEmpresa', function(event) {
		if (validar_signup()){
			console.log("validado");
			$(".btn-crear-cuenta-form").removeClass('disabled');
		}else{
			console.log("falta");
		}
	});
 

	function invalido(id,texto){
		$(id).addClass('is-invalid');
		$(id).val('');
		$(id).attr('placeholder',texto);
		return false;
	}

	$('body').on('focus', 'input', function( ) {
		$(this).removeClass('is-invalid');
		$(this).removeClass('is-valid');
	});

	$('body').on('keyup', '#inputEmpresa', function(event) {
		var valor = $(this).val();
		if (valor>3){
			$(".btn-crear-cuenta-form").removeClass('disabled');
		}
	});

	function validar_signup(){
		var email = $("#form-signup #inputEmail").val();
		var nombre = $("#form-signup #inputNombre").val();
		var pw = $("#form-signup #inputPassword").val();
		var cpw = $("#form-signup #inputConfirmarPassword").val();
		var empresa = $("#form-signup #inputEmpresa").val();
		// console.log("email:"+email);
		// console.log(validarEmail(email));
		 if(validar_email(email)){
		 	$("#form-signup #inputEmail").addClass('is-valid');
		 }else{
		 	invalido('#form-signup #inputEmail','Ingresa un e-mail valido :D');
		 }

		 if (nombre!=""){
		 	if (nombre.length > 6){
		 		$("#form-signup #inputNombre").addClass('is-valid');
		 	}else{
		 		 invalido("#form-signup #inputNombre","Ingresa tu nombre completo :D");
		 	}
		 }else{
		 	  invalido("#form-signup #inputNombre","Ingresa tu nombre completo :D");
		 }

		 if (pw!=""){
		 	if (pw.length > 6){
		 		$("#form-signup #inputPassword").addClass('is-valid');
		 	}else{
		 		invalido("#inputPassword", "Ingresa una contraseña valida :D");
		 	}
		 }else{
		 	  invalido("#inputPassword", "Ingresa una contraseña valida :D");
		 }

		 if (cpw!=""){
		 	if (cpw==pw){
		 		$("#form-signup #inputConfirmarPassword").addClass('is-valid');
		 	}else{
		 		invalido("#form-signup #inputConfirmarPassword", "La contraseña no coincide :D");
		 	}
		 }else{
		 	  invalido("#form-signup #inputConfirmarPassword", "La contraseña no coincide :D");
		 }

		 if (empresa!=""){
		 	if (empresa>3){
		 		$("#form-signup #inputEmpresa").addClass('is-valid');
		 	}else{
		 		invalido("#form-signup #inputEmpresa", "Agrega el nombre de tu Empresa");
		 	}
		 }else{
		 	  invalido("#form-signup #inputEmpresa", "Agrega el nombre de tu Empresa");
		 }

		 return true;		

	}

	function validar_email( email ) 
	{
	    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    return regex.test(email) ? true : false;
	}
});