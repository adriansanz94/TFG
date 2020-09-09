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

?>
