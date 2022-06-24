<?php
$arr = explode("---\n", file_get_contents("../data/".$id_encuesta.".p.txt"));
$arr_cabecera_tmp = explode("\n", $arr[0]);

# $arr_cabecera contiene la cabecera del fichero de preguntas
array_pop($arr_cabecera_tmp);	# El último elemento está siempre vacío así que lo quitamos
$arr_cabecera = array();
for ($i=0; $i<sizeof($arr_cabecera_tmp); $i++){
	$registro = explode(":", $arr_cabecera_tmp[$i]);
	$arr_cabecera[trim($registro[0])] = trim($registro[1]);
}


# $arr_cuerpo contiene el conjunto de preguntas
$arr_cuerpo_tmp = explode("\n", $arr[1]);
array_pop($arr_cuerpo_tmp);		# El último elemento está siempre vacío así que lo quitamos
$arr_cuerpo = array();
for ($i=0; $i<sizeof($arr_cuerpo_tmp); $i++){
	$registro = explode(":", $arr_cuerpo_tmp[$i]);
	$arr_cuerpo[$i+1]["tipo"] = trim($registro[0]);
	$arr_cuerpo[$i+1]["enunciado"] = trim($registro[1]);
}

# Ahora tenemos disponibles $arr_cuerpo y $arr_cabecera
