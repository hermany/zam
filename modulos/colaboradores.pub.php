<?php 

header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_NUCLEO."clases/class-constructor.php");
$fmt = new CONSTRUCTOR;
 
require_once(_RUTA_NUCLEO."modulos/adm/cuenta-empresas.class.php");
$cuenta = new CUENTA_EMPRESA($fmt);

// $id_usu = $fmt->sesion->get_variable("usu_id");
$id_usu = $_GET["pag"];
$id_rol = $fmt->usuario->id_rol_usuario($id_usu);

$usu_nombre    = $fmt->usuario->nombre_usuario($id_usu);
$usu_apellidos = $fmt->usuario->apellidos_usuario($id_usu);
$usu_imagen    = $fmt->usuario->imagen_usuario_mini($id_usu);
$rol_nombre    = $fmt->usuario->nombre_rol($id_rol);

define("_USU_NOMBRE_COMPLETO",$usu_nombre." ". $usu_apellidos);
define("_USU_IMAGEN",$usu_imagen);
define("_USU_ID",$id_usu);
define("_USU_ID_ROL",$id_rol);

$cnt_id = $cuenta->id_cuenta_usuario(_USU_ID);
$cntEmp = $cuenta->cuenta_empresa_id($cnt_id);
//var_dump($cntEmp);

// echo $cntEmp['mod_cnt_emp_id'];
$empresa = $cuenta->empresa($cntEmp['mod_cnt_emp_id']);
// var_dump($empresa);
$cnt_nombre = $empresa["emp_nombre"];
 
?>

<div class="loading on"><span>Espere por favor.</span></div>
<div class="pub pub-signup pub-<?php echo $pub_nom; ?>">
	<div class="pub-inner  pub-inner-c animated fadeIn">
		<div class="brand"></div>
		<div class="seccion">
			<div class="tabs-group">
				<div class="tabs">
					<div class="tab active tab-item" item='1' style="border-color:#536DAC">
						<span>Equipo</span>
						<span class="nombre-equipo tab-item" item='1'>1</span>
						<div class="box-tab-color tab-item" item='1' ></div>
						<a class="btn-color tab-item" item='1' style="background-color:#536DAC"></a>
						<input type="hidden" item="1" class="tab-item inputColor" value="#536DAC"> 
						<input type="hidden" item="1" class="tab-item input-equipo" value="1"> 
						<a class="editar btn-editar-equipo tab-item " item="1"><i class="icn icn-pencil"></i></a>
					</div>

				</div>
				<a class="btn-agregar-equipo btn-info-o btn-rounded" item='1'><i class='icn icn-plus'></i></a>
			</div>
		</div>
		<div class="seccion seccion-colaboradores">
			<label for=""><h3>Colaboradores: <?php echo $id_usu; ?></h3></label>
			<div class="box-agregar-colb">
				<span>Agregar Colaborador</span>
				<a class='btn btn-rounded btn-success btn-success-o btn-agregar-colaboradores '>
					<i class="icn icn-plus"></i>
				</a>
			</div>
			<div class="dashboard">				
				<div class="agregar">
						<div class="item-1 item">
							<input type="text" class='form-nombre form-control' id='inputNombre-1' placeholder="Nombre completo del colaborador">
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
			</div>
		</div>
</div>

<script src="<?php echo _RUTA_WEB; ?>js/colaboradores.js" ></script>  