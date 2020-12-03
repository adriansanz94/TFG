<?php
	require("src/validar_formulario.php");
//Seleccionamos el $id
$idRutina = limpiarCadena(intval($_GET['idRutina']));
//Hacemos el json de ver más y lo pegamos en el html
$datosRutina =json_encode( RutinaManager::verMasRutinas(intval($idRutina)));
print_r($datosRutina);
?>
