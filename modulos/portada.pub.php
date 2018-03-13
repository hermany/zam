<?php
	header("Content-Type: text/html;charset=utf-8");
	require_once(_RUTA_NUCLEO."clases/class-constructor.php");
	$fmt = new CONSTRUCTOR;
	$fmt->publicacion->publicacion($fmt,$pub_id);
	$pub_nom=$fmt->publicacion->get_pub_nombre();
	$pub_id_cat=$fmt->publicacion->get_pub_id_cat();
?>
<div class="pub pub-<?php echo $pub_nom; ?>">
	<div class="pub-title"></div>
	<div class="pub-inner">
	</div>
	<div id="stripes" aria-hidden="true">
      <span></span>
  </div>
</div>