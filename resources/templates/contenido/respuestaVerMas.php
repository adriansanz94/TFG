<?php

$idReceta = intval($_GET['idP']);

$datosReceta =json_encode( RecetaManager::verMasReceta(intval($idReceta)));
print_r($datosReceta);
?>
