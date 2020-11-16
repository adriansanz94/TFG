<?php

$idRutina = intval($_GET['idRutina']);

$datosRutina =json_encode( RutinaManager::verMasRutinas(intval($idRutina)));
print_r($datosRutina);
?>
