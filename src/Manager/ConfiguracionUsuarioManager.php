<?php

class ConfiguracionUsuarioManager {


  // modificar el nombre de usuario
  public static function updateNombre($id,...$campo){
    $parametros = $campo;
    array_push($parametros,$id);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE NOMBRE SET NOMBRE = ? WHERE ID = ? " , $parametros);
  }

  // modificar la contraseña
  public static function updateContraseña($id,$campo){
    $parametros [] = $campo;
    array_push($parametros,$id);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE NOMBRE SET PASS = ? WHERE ID = ? ", $parametros);
  }

  // modificar la contraseña para el recuperar password.php
  public static function updateContraseñaPassword($email,$campo){
    $parametros [] = $campo;
    array_push($parametros,$email);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE NOMBRE SET PASS = ? WHERE EMAIL = ? ", $parametros);
  }
  // modificar el Email
  public static function updateEmail($id,...$campo){
    $parametros = $campo;
    array_push($parametros,$id);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE NOMBRE SET EMAIL = ? WHERE ID = ? " ,$parametros);
  }



}

?>
