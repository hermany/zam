<?php 

header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_NUCLEO."clases/class-constructor.php");
$fmt = new CONSTRUCTOR;
 
require_once(_RUTA_NUCLEO."modulos/adm/cuenta-empresas.class.php");
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

echo $cuenta->id_cuenta_usuario(_USU_ID);
 
?>

<div class="loading on"><span>Espere por favor.</span></div>
<div class="pub pub-signup pub-<?php echo $pub_nom; ?>">
	<div class="pub-inner pub-inner-signup pub-inner-c animated fadeIn">
		<div class="brand"></div>
		<div class="seccion">
			<label for=""><h3>Colaboradores:</h3></label>
			<div class="dashboard">
				<div class="agregar">
						<div class="item-1 item">
							<input type="text" class='form-control' id='inputNombre-1' placeholder="Nombre completo del colaborador">
							<input type="text" class='form-control' id='inputEmail-1' placeholder="E-mail del colaborador">
							<?php 
								$select = $fmt->form->select_nodo(array('label' => '',
																			'id' => 'inputRol-1',
																			'from'=>'rol',
																			'prefijo'=>'rol_',
																			'nivel_hijos' => '1',
																			'label_item_inicial'=>'Seleccionar Rol',
																			'id_inicio'=>'3'));
								echo $select;
							?>
						</div>
						<input type="hidden" value="1" id='inputCantidadColadoradores'>
				</div>
				<a class='btn btn-success btn-agregar-colaboradores'><i class="icn icn-plus"></i> Agregar Coladorador</a>
			</div>
	 		</br>
			<label for=""><h4>Equipos:</h4></label>
			<div class="dash-equipos">
				<div class="agregar-equipo col-md-6">
					<div class="item-equipo-1 item">
						<input type="text" class='form-control' id='inputNombreEquipo-1' placeholder="Nombre del Equipo. Ej. Alfa">
						<div class="btn-color" color="#8197c7"></div>
					</div>
				</div>
				<a class='btn btn-success btn-agregar-equipo'><i class="icn icn-plus"></i> Crear Equipo</a>
			</div>
 			
			<div class="box-botones">
				<a class='btn btn-link btn-saltar-paso'>  Saltar paso </a>
				<a class='btn btn-primary btn-siguiente disabled'> Siguiente</a>
			</div>
		</div>
	</div>
	<div class="bg-signup"></div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.loading').hide();
		
		var cant_col = 1;
		var cant_equ = 1;
		var nom_1=false;
		var email_1=false;
		var rol_1=false;

		$(".btn-agregar-colaboradores").click(function(event) {
		   cant_col= cant_col +1 ;

		   var str = '<?php echo $select; ?>';
		  $('.agregar').append('<div class="item-'+cant_col+' item animated fadeIn"><input type="text" class="form-control"  id="inputNombre-'+cant_col+'" placeholder="Nombre completo del colaborador" name="inputNombre-'+cant_col+'" /><input type="text" class="form-control" placeholder="E-mail del colaborador" id="inputEmail-'+cant_col+'" name="inputEmail-'+cant_col+'">'+ str +' <a class="btn-eliminar-co" item="'+cant_col+'"><i class="icn icn-close"></i></a></div>');
		  $('#inputCantidadColadoradores').attr('value', cant_col);

		  $('.item-'+cant_col+' select').attr('id', 'inputRol-'+cant_col);

		  $('.btn-eliminar-co').click(function(event) {
				var item = $(this).attr('item');
				$('.item-'+item).remove();
			});

		});

		$(".btn-agregar-equipo").click(function(event) {
		   cant_equ= cant_equ +1 ; 
		   $('.agregar-equipo').append('<div class="item-equipo-'+cant_equ+' item animated fadeIn"><input type="text" class="form-control"  id="inputNombreEquipo-'+cant_equ+'" placeholder="Nombre del Equipo" name="inputNombreEquipo-'+cant_equ+'" /><div class="btn-color" color="#8197c7"></div><a class="btn-eliminar-equipo" item="'+cant_equ+'"><i class="icn icn-close"></i></a></div>');

		   $('.btn-eliminar-equipo').click(function(event) {
				var item = $(this).attr('item');
				$('.item-equipo-'+item).remove();
			});
		});

		$('#inputNombre-1').keyup(function(event) {
			 var valor = $(this).val();

			 if (valor.length > 3){
			 	nom_1=true;
			 	activar_btn_siguiente();
			 }else{
			 	nom_1=false;
			 	activar_btn_siguiente();
			 }
		});

		$('body').on('change','.form-select',function(event) {
			/* Act on the event */
			var id = $(this).attr('id');
			var valor = $(this).val();
			console.log(valor);
			if (valor != 0){
				rol_1=true;
			 	activar_btn_siguiente();
			}else{
				rol_1=false;
			 	activar_btn_siguiente();
			}
		});



		$('#inputEmail-1').keyup(function(event) {
			 var valor = $(this).val();
			 console.log(valor);
			 if (validar_email(valor) != false){
			 	email_1=true;
			 	activar_btn_siguiente();
			 }else{
			 	email_1=false;
			 	activar_btn_siguiente();
			 }
		});

		function activar_btn_siguiente(){
			if (nom_1==true && email_1==true  && rol_1==true){
				$(".btn-siguiente").removeClass('disabled');
			}else{
				$(".btn-siguiente").addClass('disabled');
			}
		}

		function validar_email(email) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);
		}

		

	});
</script>