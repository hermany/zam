<?php
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_NUCLEO."clases/class-constructor.php");
$fmt = new CONSTRUCTOR;
$email = $_GET["e"];
?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<div class="pub pub-signup">
	<div class="pub-inner pub-inner-signup animated fadeIn">
		 <div class="brand"></div>
		<div class="pub-validacion-correo">
			<div class="icono"></div>
			<div class="contenido">
				<input type="text" id="inputValidar" > 
				<a class="btn btn-success btn-validar" valor='1' >Validar</a>
			</div>		
			<div class="mensaje"></div>
			<div class="texto">Se ha enviado un codigo a tu email para validar la cuenta, por favor ingresa la clave y activa tu usuario. Si el mail no te ha llegado revisa por favor tu spam, sino : <a class="btn-enviar-codigo" email="<?php echo $email; ?>">Volver a enviar código</a></div>
		</div>
		<div class="mensaje-validar">
			<div class="icono"></div>
			<span>Tu cuenta a sido creada exitosamente.</span>
		</div>
	</div>

	<script src="<?php echo _RUTA_WEB; ?>js/signup.js" ></script>	
	<div class="bg-signup"></div>
</div>
