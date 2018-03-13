<?php
//	var_dump($_POST);
	require_once("config.php");

	$ruta_ajax=$_POST["ajax"].".php";
	//echo _RUTA_NUCLEO."ajax/".$ruta_ajax;
	//echo _RUTA_NUCLEO."clases/class-constructor.php";
	require_once(_RUTA_NUCLEO."clases/class-constructor.php");
	$fmt = new CONSTRUCTOR();
	//echo _RUTA_NUCLEO."ajax/".$ruta_ajax;

	$sitio_default = _RUTA_DEFAULT;

	require_once(_RUTA_NUCLEO."ajax/".$ruta_ajax);

?>
