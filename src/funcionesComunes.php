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

  $fichero = file_get_contents($imagen);
  $nombreImg = explode('/',$imagen);

  $dirCarpeta = "$carpeta";
  $dirID = "$id";
  $nombre = $nombreImg[count($nombreImg)-1];

  $rutaSEHDir = "/$dirCarpeta/$dirID/";
  $rutaSEH = "$rutaSEHDir$nombre";

  $rutaURLImagenParaBD = $config['img_in_url'] . $rutaSEH;
  $rutaFísicaDeFichero = $ROOT . $config['img_path'] . $rutaSEH;

  /*as_debug($rutaFísicaDeFichero, "Fichero físico en -> "); // Donde debéis guardar el fichero
  as_debug($rutaURLImagenParaBD, "Ruta imgen en base de datos -> ");
  */

  mkdir($ROOT . $config['img_path'] . $rutaSEHDir, 0777, true);
  file_put_contents($rutaFísicaDeFichero, $fichero);

  return $rutaURLImagenParaBD;

}
?>
