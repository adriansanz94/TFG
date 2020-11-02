<?php 
$idReceta = $_POST['idP'];

print_r($idReceta);

$datosReceta =json_encode( RecetaManager::verMasReceta($idReceta));


print_r($datosReceta);



?>
<h1>VER MAS </h1>
