<?php 

header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_NUCLEO."clases/class-constructor.php");
$fmt = new CONSTRUCTOR;
 
require_once("clases/class-cuenta.php");
$cuenta = new CUENTA_EMPRESA($fmt);

$id_usu = $fmt->sesion->get_variable("usu_id");
$id_rol = $fmt->usuario->id_rol_usuario($id_usu);

$usu_nombre    = $fmt->usuario->nombre_usuario($id_usu);
$usu_apellidos = $fmt->usuario->apellidos_usuario($id_usu);
$usu_imagen    = $fmt->usuario->imagen_usuario_mini($id_usu);
$rol_nombre    = $fmt->usuario->nombre_rol($id_rol);

define("_USU_NOMBRE_COMPLETO",$usu_nombre." ". $usu_apellidos);
define("_USU_IMAGEN",$usu_imagen);
define("_USU_ID",$id_usu);
define("_USU_ID_ROL",$id_rol);

?>

<div class="loading on"><span>Espere por favor.</span></div>
<div class="pub pub-signup pub-<?php echo $pub_nom; ?>">
	<div class="pub-inner pub-inner-signup pub-inner-c animated fadeIn">
		<div class="brand"></div>
		<div class="seccion">
			<label for="">Colaboradores</label>
			<div class="dashboard">
				<div class="agregar"><input type="text" class='' id='inputAgregarColadorador'><a class='btn btn-primary'><i class="icn icn-plus"></i> Agregar Coladorador</a></div>
			</div>
		</div>
	</div>
	<div class="bg-signup"></div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.loading').hide();
	});
</script>