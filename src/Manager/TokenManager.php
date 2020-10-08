<?php

class TokenManager implements IDWESEntidadManager{


  public static function getToken(){
    return bin2hex(random_bytes(64));
    /*return rand(10000, 90000);*/
  }
  public static function getAll(){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta('SELECT * FROM TOKEN');
    return $db->obtenDatos();
  }

  public static function getById($id){

  }

  public static function getByEmail($email){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM TOKEN WHERE EMAIL = ?",$email);
    return $db->obtenDatos();
  }
  public static function insert(...$campos)
  {
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("INSERT INTO TOKEN (EMAIL, TOKEN)
                    VALUES (?, ?)", $campos);
    return $db->obtenDatos();
  }

  public static function update($id, ...$campos){

  }

  public static function delete($email){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("DELETE FROM TOKEN WHERE EMAIL=?",$email);
  }

}



?>
