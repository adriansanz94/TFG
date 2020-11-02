<?php 
print_r($_GET);
$idReceta = intval($_GET['idP']);

print_r($idReceta);

$datosReceta =json_encode( RecetaManager::verMasReceta(intval($idReceta)));


print_r($datosReceta);



?>
<h1>VER MAS </h1>
