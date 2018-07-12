<?php
  require_once("../config.php");
  header("Content-Type: text/html;charset=utf-8");
  require_once(_RUTA_NUCLEO."clases/class-constructor.php");
  $fmt = new CONSTRUCTOR;

  $email =  $_POST["email"];

  $usu = $fmt->usuario->usuario_email($email);

  $sql="SELECT mod_cnt_codigo FROM mod_cuenta_empresa WHERE mod_cnt_usu_id='".$usu."'";
  $rs = $fmt->query->consulta($sql,__METHOD__);
  $row = $fmt->query->obt_fila($rs);
  $codigo = $row["mod_cnt_codigo"];

  $mensaje = "Tu registro es: ".$codigo." </br>Definir activación en: "._RUTA_WEB."activar-cuenta/p=1&e=".$email;
  $fmt->mail->enviar($email,'Registro Zam',$mensaje,'Registro Empresa '.$empresa,'mail@zam.net');

  echo "ok";

?>