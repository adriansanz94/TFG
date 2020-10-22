<?php
global $ROOT;
global $config;
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
$datos = RecetaManager::getById($id);
echo "<pre>";
print_r($datos);


?>

<h1>una receta simple</h1>