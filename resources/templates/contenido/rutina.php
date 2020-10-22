<?php
global $ROOT;
global $config;
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
$datos = RutinaManager::getById($id);
echo "<pre>";
print_r($datos);


?>

<h1>una rutina seleccionada</h1>