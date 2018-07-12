<?php
  require_once("../config.php");
  header("Content-Type: text/html;charset=utf-8");
  require_once(_RUTA_NUCLEO."clases/class-constructor.php");
  $fmt = new CONSTRUCTOR;

  $codigo =  $_POST["codigo"];
  $valor = (int) $_POST["valor"];
  $sql="SELECT mod_cnt_id,mod_cnt_usu_id FROM mod_cuenta_empresa WHERE mod_cnt_codigo='".$codigo."' and mod_cnt_estado='1'";
  $rs = $fmt->query->consulta($sql,__METHOD__);
  $num= $fmt->query->num_registros($rs);
  if($num > 0){
    
    $row = $fmt->query->obt_fila($rs);
    $id = $row["mod_cnt_usu_id"];
    $id_e = $row["mod_cnt_id"];
    $nombre = $fmt->usuario->nombre_apellidos($id);
    $email = $fmt->usuario->email_usuario($id);
    $rol = $fmt->usuario->id_rol_usuario($id);
    $fmt->sesion->set_variable("usu_id",$id);
    $fmt->sesion->set_variable("usu_nombre",$nombre);
    $fmt->sesion->set_variable("usu_mail",$email);
    $fmt->sesion->set_variable("usu_rol",$rol);
    $fmt->sesion->set_variable("usu_sitio","zam");

    $sql="UPDATE mod_cuenta_empresa SET
                mod_cnt_estado='2'
                WHERE mod_cnt_id='".$id_e."'";
    $fmt->query->consulta($sql);

    echo "saltar";
  }else{
  	$aux = $valor + 1;
  	echo "error:".$aux;
  }
?>