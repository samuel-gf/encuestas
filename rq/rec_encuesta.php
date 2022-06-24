<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST');

$json = file_get_contents('php://input');
$data = json_decode($json);


// Este fichero es llamado varias veces, solo una de ellas pasa los datos que necesitamos
if (isset($data->resp)){
	$s = "";
	for ($i=1; $i<sizeof($data->resp); $i++){
		// El separador de campos es |
		$s .= (isset($data->resp[$i])?strval($data->resp[$i]):"_")."|";
	}
	$s = str_replace(array("\r","\n"), "", trim($s)).PHP_EOL;
	//error_log("**$s**");

	$f = fopen("../data/01.r.txt", "a");
	fwrite($f, $s);
	fclose($f);
}
