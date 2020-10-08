<?php

class EjercicioManager {


  public static function getAll(){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM  EJERCICIO");
    return $db->obtenDatos();
  }
  public static function getById($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM EJERCICIO WHERE ID = ?",$id);
    return $db->obtenDatos()[0];
  }
  public static function insert(...$campos){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("INSERT INTO EJERCICIO (NOMBRE, GRUPOMUSCULAR , DESCRIPCION ,IMAGEN)
                  VALUES (?, ?, ?, ?)",
                  $campos);
  }
  public static function update($id, ...$campos){
    $parametros = $campos;
    array_push($parametros,$id);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE EJERCICIO
                  SET NOMBRE = ?,
                      GRUPOMUSCULAR = ?,
                      DESCRIPCION = ?,
                      IMAGEN = ?
                  WHERE ID = ?",
                  $parametros);
  }
  public static function delete($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("DELETE FROM EJERCICIO WHERE ID = ?", $id);
  }
}

?>
