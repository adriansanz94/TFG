<?php

  require("src/validar_formulario.php");

//$text = $_GET['rutinaText'];
//$check = $_GET['rutinaCheck'];
print_r($_GET);
//print_r($text);
//print_r($check);


$text = [];
$check = [];

if(isset($_GET) && count($_GET) > 0){
  //text
  if(isset($_GET['rutinaText'])){
      $text=$_GET['rutinaText'];
  }

  //check
  if(isset($_GET['rutinaCheck'])){
      $check=$_GET['rutinaCheck'];
  }
}
  $rutinas = RutinaManager::getByIdAJAX($_SESSION['ID']);
  $ultimaRutina = end($rutinas);

  $textArray = explode(',',$text);
  $checkArray = explode(',',$check);

  $ultimoid = intval($ultimaRutina['ID']);
  $consulta = RutinaManager::consultaExtra($ultimoid);

  for ($i=0; $i < count($textArray); $i++) {
      EjercicioRutinaManager::insert($textArray[$i],$ultimoid,intval($checkArray[$i]));
  }

  header('Location:principal.php');
  die();

?>
