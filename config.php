<?php
header('Content-Type: text/html; charset=utf8');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors','On');

$mostrar_rutas="off";

 
define('_TIPO_CONEXION','localhost');  //localhost - online
define('_TIPO_CONFIGURACION','htaccess'); //htaccess - webconfig
define('_MULTIPLE_SITE', 'off'); // on - off

define('_SMTP',''); //ej:mail.w2.com.bo
define('_CORREO',''); //ej: pedidos@w2.com.bo
define('_PASSWORD_MAIL',''); 
define('_PUERTO',''); //ej: 26
define('_VALIDACION',''); //ej: ssl

if (_TIPO_CONEXION == "localhost"){
  
  define('_TIPO_HTML',"http://");
  define('_HOST','localhost');
  define('_USUARIO','root');
  define('_PASSWORD','');
  define('_BASE_DE_DATOS','hermanyu_zam_1');
  

  define('_RUTA_SERVER',str_replace("","",$_SERVER['DOCUMENT_ROOT'])."/server/");
  define('_RUTA_NUCLEO',_RUTA_SERVER."nucleo/");
  define('_RUTA_HOST',_RUTA_SERVER."zam/");

  define('_RUTA_WEB',"http://localhost/server/zam/");
  define("_RUTA_WEB_DEFAULT","");
  define("_RUTA_WEB_NUCLEO",'http://localhost/server/nucleo/');

  define("_RUTA_IMAGES",_RUTA_WEB);
  define("_RUTA_DOCS",_RUTA_WEB);
  
  define("_THEME_DEFAULT","");
  define("_THEME_DEFAULT_ADMIN","");

}

if (_TIPO_CONEXION == "online"){
  
  define('_TIPO_HTML',"http://");
  define('_HOST','localhost');
  define('_USUARIO','hermanyu_us');
  define('_PASSWORD','qwe123AS');
  define('_BASE_DE_DATOS','hermanyu_zam_1');
  

  define('_RUTA_SERVER',str_replace("zam","",$_SERVER['DOCUMENT_ROOT'])."");
  define('_RUTA_NUCLEO',_RUTA_SERVER."nucleo/");
  define('_RUTA_HOST',_RUTA_SERVER."zam/");

  define('_RUTA_WEB',"http://zam.wappcom.com/");
  define("_RUTA_WEB_NUCLEO",'http://wappcom.com/nucleo/');
  define("_RUTA_IMAGES",_RUTA_WEB);
  define("_RUTA_DOCS",_RUTA_WEB);
  
  define("_THEME_DEFAULT","");
  define("_THEME_DEFAULT_ADMIN","");

}

define('_VZ', "Zundi 2.5+");

if ($mostrar_rutas=="on"){
  
  // echo "_HOST: "._HOST."<br/>";
  // echo "_USUARIO: "._USUARIO."<br/>";
  // echo "_PASSWORD: "._PASSWORD."<br/>";
  // echo "_BASE_DE_DATOS: "._BASE_DE_DATOS."<br/><br/>";

  echo "_TIPO_CONEXION:" ._TIPO_CONEXION."<br/>";
  echo "_TIPO_CONFIGURACION:" ._TIPO_CONFIGURACION."<br/>";
  echo "_MULTIPLE_SITE:" ._MULTIPLE_SITE."<br/>";
  echo "_TIPO_HTML: "._TIPO_HTML."<br/><br/>";
  echo "_RUTA_SERVER: "._RUTA_SERVER."<br/>";
  echo "_RUTA_NUCLEO: "._RUTA_NUCLEO."<br/>";
  echo "_RUTA_HOST: "._RUTA_HOST."<br/><br/>";

  echo "_RUTA_WEB: "._RUTA_WEB."<br/>";
  echo "_RUTA_WEB_NUCLEO: "._RUTA_WEB_NUCLEO."<br/>";
  echo "_RUTA_IMAGES: "._RUTA_IMAGES."<br/>";
  echo "_RUTA_DOCS: "._RUTA_DOCS."<br/><br/>";

  echo "_THEME_DEFAULT:"._THEME_DEFAULT."<br/>";
  echo "_THEME_DEFAULT_ADMIN:"._THEME_DEFAULT_ADMIN."<br/><br/>";

  echo "_SMTP:"._SMTP."<br/>";
  echo "_CORREO:"._CORREO."<br/>";
  echo "_PASSWORD_MAIL:"._PASSWORD_MAIL."<br/>";
  echo "_PUERTO:"._PUERTO."<br/>";
  echo "_VALIDACION:"._VALIDACION."<br/><br/>";
  echo "_VZ: "._VZ."<br/>";
}

?>