
<!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" /> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" media="screen" />
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo _RUTA_WEB_NUCLEO; ?>css/animate.css" type="text/css" media="screen" />

<!-- <link href="https://fonts.googleapis.com/css?family=Maitree:300,400,600" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:200,400,600" rel="stylesheet">
<?php
$rand = range(1, 100);
shuffle($rand);
foreach ($rand as $val) {
  $vrand = $val;
}
?>
<link rel="stylesheet" href="<?php echo _RUTA_WEB_NUCLEO; ?>css/icon-font.css?reload=<?php echo $vrand;?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/default.theme.css?reload=<?php echo $vrand;?>" type="text/css" media="screen" />



