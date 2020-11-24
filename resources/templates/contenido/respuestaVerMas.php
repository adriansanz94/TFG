<?php
//Seleccionamos el $id
$idReceta = intval($_GET['idP']);
//Hacemos el json de ver más y lo pegamos en el html
$datosReceta =json_encode( RecetaManager::verMasReceta(intval($idReceta)));
print_r($datosReceta);
?>
