<?php
  require("src/validar_formulario.php");
  $text = [];
  $check = [];
  $nombre = "";
  $descripcion = "";
  $dificultad = "";
  $id = "";
  print_r($_GET);
  if(isset($_GET) && count($_GET) > 0){
    echo "lo que sea";
    //text
    if(isset($_GET['rutinaText'])){
        $text=$_GET['rutinaText'];
    }
    //check
    if(isset($_GET['rutinaCheck'])){
        $check=$_GET['rutinaCheck'];
    }
    //nombre
    if(isset($_GET['nombre'])){
        $nombre=$_GET['nombre'];

    }
    //descripcion
    if(isset($_GET['descripcion'])){
        $descripcion=$_GET['descripcion'];
    }
    //dificultad
    if(isset($_GET['dificultad'])){
        $dificultad=$_GET['dificultad'];
    }
    //id
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
  }

  echo $nombre;
  RutinaManager::insert($nombre,$dificultad,$descripcion,$id);
  $rutinas = RutinaManager::getByIdAJAX($_SESSION['ID']);
  $ultimaRutina = end($rutinas);
  //Usamos el Explode para separar el text y check
  $textArray = explode(',',$text);
  $checkArray = explode(',',$check);
  //Seleccionamos el último de ID
  $ultimoid = intval($ultimaRutina['ID']);
  $consulta = RutinaManager::consultaExtra($ultimoid);
  for ($i=0; $i < count($textArray); $i++) {
      EjercicioRutinaManager::insert($textArray[$i],$ultimoid,intval($checkArray[$i]));
  }
  header('Location:principal.php');
  die();
?>
