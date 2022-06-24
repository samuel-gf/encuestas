<?php 
$id_encuesta = $argv[1];	# id encuesta

include("lib.php");
?>
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
<body data-id="<?php echo $id_encuesta; ?>">

<main>
<section id="preguntas">
<header><h1><?php echo $arr_cabecera["título"]; ?></h1></header>

<ol>
<?php 
	for ($i=0; $i<sizeof($arr_cuerpo); $i++){
		switch($arr_cuerpo[$i+1]["tipo"]){
		case "u5":
			echo "<li>".$arr_cuerpo[$i+1]["enunciado"]."</li>\n";
			echo "<div id='p".($i+1)."' class='voto' data-respuesta=''>\n";
			echo "<div id='p".($i+1)."-1' class='voto_item'>&#128534;</div>\n";
			echo "<div id='p".($i+1)."-2' class='voto_item'>&#128551;</div>\n";
			echo "<div id='p".($i+1)."-3' class='voto_item'>&#128528;</div>\n";
			echo "<div id='p".($i+1)."-4' class='voto_item'>&#128512;</div>\n";
			echo "<div id='p".($i+1)."-5' class='voto_item'>&#128151;</div>\n";
			echo "</div>\n\n";
			break;
		}
	}	// end for
?>

</ol>


<div id="btn_terminar">Terminar encuesta</div>
</section>	<!-- Preguntas -->





<!-- ********************************************************* -->
<section id="terminado">
<header><h1>Encuesta terminada</h1></header>

<p><?php echo $arr_cabecera["terminado"]; ?></p>
</section>



</main>

</body>
</html>
