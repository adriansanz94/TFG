<?php

//Página que se usa para borrar datos desde la página admin
$id = "";
if(isset($_GET['id_usuario'])){
  $id = $_GET['id_usuario'];
  UsuarioManager::delete($id);
}

if(isset($_GET['id_receta'])){
  $id = $_GET['id_receta'];
  RecetaManager::delete($id);
}

if(isset($_GET['id_ejercicio'])){
  $id = $_GET['id_ejercicio'];
  EjercicioManager::delete($id);
}

if(isset($_GET['id_rutina'])){
  $id = $_GET['id_rutina'];
  RutinaManager::delete($id);
}

header("Location:admin.php");
die();

?>
