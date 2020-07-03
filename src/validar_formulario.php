<?php

function limpiarCadena($cad){
	return htmlspecialchars(trim($cad));
}

function cadenaValida(string $cad,int $minLen=3){
	$cad = limpiarCadena($cad);
	if (strlen($cad)<$minLen) {
		return false;
	}else{
		return true;
	}
}


function contraseñaValida(string $pswd,int $minLen=4){
	$psdw = limpiarCadena($pswd);
	if (strlen($psdw)<$minLen) {
		return false;
	}else{
		return true;
	}
}

?>
