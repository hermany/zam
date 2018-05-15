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
		<div class="noticias container">
			<div class="inner">
			<label for="" class="title">Nuevo</label>
			<div class="titulo-nota">
				<?php 
						$consulta = "SELECT not_titulo, not_ruta_amigable FROM nota,nota_categorias WHERE not_cat_not_id=not_id and not_cat_cat_id='3' ORDER BY not_cat_orden ASC LIMIT 0,1"; // cat blog
						$rs =$fmt->query->consulta($consulta);
						$num=$fmt->query->num_registros($rs);
						if($num>0){
							for($i=0;$i<$num;$i++){
								$row=$fmt->query->obt_fila($rs);
								$nota_ra = $row["not_ruta_amigable"];
								$nota_titulo = $row["not_titulo"];
								echo "<a href='"._RUTA_WEB."blog/".$nota_ra.".htm'>$nota_titulo</a>";
							}
						}
						$fmt->query->liberar_consulta($rs);
				?>
			</div>
			</div>
		</div>
		<div class="box-texto container">
			<div class="inner">
				<label for=""><h3>Una plataforma para hacer cotizaciones</h3></label>
				<div class="mensaje">
					Sam sirve gestionar cotizaciones para una empresa en Internet. Damos soporte a los modelos de negocios más innovadores. 
				</div>
				<a class="btn btn-success">Conoce un poco más de nosotros</a>
				<a class="btn btn-full btn-crear-cuenta" href="<?php echo _RUTA_WEB; ?>signup">Crea tu cuenta</a>
			</div>
			<div class="maquina">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/NQ_W3OMUM9w" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div>
		</div>
	</div>
	<div id="stripes" aria-hidden="true">
      <span></span>
  </div>
</div>