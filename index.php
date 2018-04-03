<?php
/**
   * @file
   * Zundi CMS
   * Todo codigo de Zundi esta lanzando bajo GNU General Public License.
   * http://wappcom.com/zundi
   * Creator: @hermany
   * Devs.: Ariel Velazques, Ariel Ortuño, Cidar Veizaga, Cristian Grageda, Carolina Sanchez, Marcelo Garcia
*/
  header('Content-Type: text/html; charset=utf8');

  require_once("config.php");

  require_once(_RUTA_NUCLEO."clases/class-constructor.php");
  $fmt = new CONSTRUCTOR();
  $fmt->autentificacion->index();

?>