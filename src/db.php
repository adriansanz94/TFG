<?php

$db = DWESBaseDatos::obtenerInstancia();
$db->inicializa($config['db_name'], $config['db_user'], $config['db_pass'], $config['db_engine']);

//mysqli_set_charset($db,'utf8');
?>
