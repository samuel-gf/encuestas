	<!DOCTYPE html>
<html lang="es" prefix="og: http://ogp.me/ns#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="Encuesta alumnado">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/votacion.css">
	<script type="text/javascript" src="js/voto.js"></script>
	<title>Encuesta alumnado</title>
	</head>
<body>

<header>
	<h1>Encuesta alumnado</h1>
</header>


<main>
<ol>
<?php 
	$txt = file_get_contents("../preguntas.txt");
	$arr = explode("\n", $txt);
	for ($i=0; $arr[$i] !== ""; $i++){
?>

	<li><?php echo $arr[$i]; ?></li>
	<div id="p<?php echo $i+1; ?>" class="voto">
		<div id="p<?php echo $i+1;?>-1" class="voto_item">&#128534;</div>
		<div id="p<?php echo $i+1;?>-2" class="voto_item">&#128551;</div>
		<div id="p<?php echo $i+1;?>-3" class="voto_item">&#128528;</div>
		<div id="p<?php echo $i+1;?>-4" class="voto_item">&#128512;</div>
		<div id="p<?php echo $i+1;?>-5" class="voto_item">&#128151;</div>
	</div>
<?php }	// end for ?>

</ol>


<div id="btn_terminar">Terminar encuesta</div>
</main>

</body>
</html>
