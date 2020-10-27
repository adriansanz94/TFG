<?php
function as_debug($que, $msg=""){
  echo "<pre>";
  echo $msg;
  print_r($que);
  echo "</pre>";
}
function clear_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function gestionaErrores($post, &$info, &$errores){
  foreach($post as $key=>$value){
      if ( isset($post[$key]) && $value != '' ){
        $info[$key] = clear_input($value);
      } else{ 
        $errores[$key] = "ERROR ".strtoupper($key);
      }
  }
}
function areaPrivada(){
  if(!isset($_SESSION['autentificado']) || $_SESSION['autentificado'] != true ){
  //if($_SESSION['autentificado'] !=true){
      header('Location: login.php');
      die();
  }
}

function startsWith ($string, $startString) {
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}
 //funciona que guarda las imagenes en la BBDD
 function guardarImagen($carpeta,$id,$imagen){
  global $ROOT;
  global $config;

  $fichero;
  $nombreImg;
  //mete el nombre del fichero como string y luego nombre separa el nombre de la imagen
  

  //metemos la información dentro de las variables 
  $dirCarpeta = "$carpeta";
  $dirID = "$id";
  $nombre = $imagen;//[count($nombreImg)-1];
  //son variables para la ruta
  $rutaSEHDir = "/$dirCarpeta/$dirID/";///3/recetas/nombrecarpeta/
  $rutaSEH = "$rutaSEHDir$nombre";///3/recetas/nombrecarpeta/

  $rutaURLImagenParaBD = $config['img_in_url'] . $rutaSEH;
  $rutaFísicaDeFichero = $ROOT . $config['img_path'] . $rutaSEH;

  //$fichero = file_get_contents($rutaFísicaDeFichero.'/'.$imagen);
  $nombreImg = explode('/',$imagen);

  mkdir($ROOT . $config['img_path'] . $rutaSEHDir, 0777, true);
  //file_put_contents($rutaFísicaDeFichero, $fichero);
  //move_uploaded_file($imagen,$rutaFísicaDeFichero);
  echo $rutaFísicaDeFichero;
  move_uploaded_file($_FILES['imagen']['tmp_name'],$rutaFísicaDeFichero);
  return $rutaURLImagenParaBD;
}
?>
