<?php
$id_encuesta = $argv[1];	# id encuesta

$arr_lineas = explode("\n", file_get_contents("../data/".$id_encuesta.".r.txt"));
array_pop($arr_lineas);


$arr_data = array();
for ($i=0; $i<sizeof($arr_lineas); $i++){
	// El separador de campos es |
	$linea = explode("|", $arr_lineas[$i]);
	for ($j=0; $j<sizeof($linea); $j++){
		$arr_data[$i+1][$j+1] = $linea[$j];
	}
}

# $arr_data contiene todos los datos de la encuesta
# El primer índice es el número de la pregunta
# El segundo índice es la respuesta
# print_r($arr_data); die();


# Suma todos los valores en el array $arr_res(ultados)
$arr_res = array();
for ($encuesta=1; $encuesta<=sizeof($arr_data); $encuesta++){
	for ($pregunta=1; $pregunta<=sizeof($arr_data[$encuesta]); $pregunta++){
		# Si no existe lo crea
		if (!array_key_exists($pregunta, $arr_res))	$arr_res[$pregunta] = array();
		# Si no existe lo crea
		if (array_key_exists("total", $arr_res[$pregunta])) {
			$arr_res[$pregunta]["total"] += $arr_data[$encuesta][$pregunta];
			$arr_res[$pregunta]["n"]++;
		} else {
			$arr_res[$pregunta]["total"] = $arr_data[$encuesta][$pregunta];
			$arr_res[$pregunta]["n"] = 1;
		}
	}
}
array_pop($arr_res);

# Hace las medias a partir de $arr_res(ultados) y $n (número de respuestas)
for ($i=1; $i<=sizeof($arr_res); $i++){
	$arr_res[$i]["media"] = round($arr_res[$i]["total"] / $arr_res[$i]["n"], 2);
}


# Escribe los resultados en un informe
# ######################################
#
# Lee el archivo con las preguntas
include("lib.php");

echo "# ".$arr_cabecera["título"]."\n\n";
# Ahora tenemos disponibles $arr_cuerpo y $arr_cabecera
for ($i=1; $i<=sizeof($arr_res); $i++){
	echo "## Pregunta $i\n";
	echo $arr_cuerpo[$i]["enunciado"]."\n";
	echo "Media ".$arr_res[$i]["media"]."\t";
	echo "Respuestas recibidas ".$arr_res[$i]["n"]."\n\n";
}
