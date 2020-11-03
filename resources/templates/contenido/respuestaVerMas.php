<?php
$idReceta = $_POST['idP'];

//print_r($idReceta);

$datosReceta = RecetaManager::verMasReceta($idReceta);


print_r($datosReceta);
//echo $datosReceta;



?>
