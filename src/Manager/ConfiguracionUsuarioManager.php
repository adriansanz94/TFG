<?php

class ConfiguracionUsuarioManager {


  // modificar el nombre de usuario
  public static function updateNombre($id,...$campo){
    $parametros = $campo;
    array_push($parametros,$id);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE USUARIO SET NOMBRE = ? WHERE ID = ? " , $parametros);
  }

  // modificar la contraseña
  public static function updateContraseña($id,$campo){
    $parametros [] = $campo;
    array_push($parametros,$id);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE USUARIO SET PASS = ? WHERE ID = ? ", $parametros);
  }

  // modificar la contraseña para el recuperar password.php
  public static function updateContraseñaPassword($email,$campo){
    $parametros [] = $campo;
    array_push($parametros,$email);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE USUARIO SET PASS = ? WHERE EMAIL = ? ", $parametros);
  }
  // modificar el Email
  public static function updateEmail($id,...$campo){
    $parametros = $campo;
    array_push($parametros,$id);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE USUARIO SET EMAIL = ? WHERE ID = ? " ,$parametros);
  }



}

?>
