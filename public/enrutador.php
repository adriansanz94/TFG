<?php

$ROOT = realpath(__DIR__."/..");
require_once("$ROOT/config/configuracion.php");
require_once("$ROOT/src/funcionesComunes.php");
/*require_once("$ROOT/src/funcionesApiTwitter.php");*/


if (preg_match('/\.(?:css|js|ico|png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])){

  if(startsWith($_SERVER["REQUEST_URI"], $config['img_in_url'])) {
      // Imagen subida por el usuario

      // Solo aceptamos PNG
      header('Content-Type: imgs/png');

      // Quitamos subir de directorio
      $file_path = str_replace("..","",$_SERVER["REQUEST_URI"]);
      // Quitamos el prefijo de la petición
      $file_path = str_replace($config['img_in_url'],"",$_SERVER["REQUEST_URI"]);
      // Cargamos el fichero y lo enviamos
      readfile($ROOT.$config['img_path'].urldecode($file_path));

  } else {
      return false;    // servir la petición tal cual es.
  }

}else {//si es un fichero php

    // Requerir los ficheros necesarios
    require_once("$ROOT/src/db.php");


    // Enruto la petción
    $uri = $_SERVER['REQUEST_URI'];
    $partes = explode("?", $uri);

    $titulo = $config['title'];

    $fichero = $partes[0];


    if($fichero == "/"){
      header("Location: ".$config['ruta_defecto']);
      die();
    }

    // Aquí es dónde la magia ocurre
    // ver también resources/templates/template.php
    $ruta_contenido = str_replace("..", "", $fichero);
    //echo "<pre>";
    //print_r($_SERVER);
    //echo "</pre>";
  /*  if(
        // Según SO servirá en servidor real
        (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        ||
        // Verificado en el servidor de desarrollo de php
        ($_SERVER['HTTP_SEC_FETCH_MODE'] == 'cors')
      ) {
        require_once("$ROOT/resources/templates/contenido$ruta_contenido");
    } else {*/
        require_once("$ROOT/resources/templates/template.php");
  //  }
}

?>
