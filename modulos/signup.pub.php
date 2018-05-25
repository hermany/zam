<?php
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_NUCLEO."clases/class-constructor.php");
$fmt = new CONSTRUCTOR;
?>
<script src="<?php echo _RUTA_WEB; ?>js/signup.js" ></script>
<div class="pub pub-signup">
	<div class="pub-inner pub-inner-signup">
		 <div class="brand"></div>
		 <h3 class="title" lang="es">Crea una nueva cuenta</h3>
		 <form class="form-signup form" id="form-signup">
		 		<div class="form-group">
		 			<!-- <label for="inputEmail" lang="es">Email</label> -->
		      <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Tu e-mail" lang="es">
		      <small   class="form-text text-muted" lang="es"> Tu e-mail sera tu id de ingreso al sistema.</small>
		    </div>
		    <div class="form-group">
		      <!-- <label for="inputNombre" lang="es">Nombre Competo</label> -->
		      <input type="text" class="form-control" id="inputNombre"  lang="es" placeholder="Tu nombre completo">
		    </div>
		    <div class="form-group">
		      <!-- <label for="exampleInputPassword1" lang="es">Contraseña</label> -->
		      <input type="password" class="form-control" id="inputPassword" lang="es" placeholder="Contraseña">
		    </div>
		    <div class="form-group">
		      <!-- <label for="inputConfirmarPassword" lang="es">Confirma tu Contraseña</label> -->
		      <input type="password" class="form-control" id="inputConfirmarPassword" lang="es" placeholder="Confirma la Contraseña">
		    </div>
		    <div class="form-check">
       
      </div>
		    <div class="form-group">
		      <!-- <label for="inputEmpresa" lang="es">Empresa</label> -->
		      <input type="text" class="form-control" id="inputEmpresa"  lang="es" placeholder="Nombre de tu Empresa">
		    </div>

		    <div class="captcha">
		    	<div id="html_element"></div>
		    </div>

		     <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="" checked>
          Estoy de acuerdo con los <a class='btn-terminos'>terminos y condiciones</a>
        </label>
        
		     <a class="btn btn-primary btn-crear-cuenta-form">Crea tu cuenta en Zam</a>

		 </form>
	</div>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer> </script>
	<div class="bg-signup"></div>
</div>
