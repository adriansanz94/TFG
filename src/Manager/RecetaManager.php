<?php

class RecetaManager {


  public static function getAll(){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM  RECETA");
    return $db->obtenDatos();
  }
  public static function getById($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM RECETA WHERE ID = ?",$id);
    return $db->obtenDatos()[0];
  }
  public static function insert(...$campos){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("INSERT INTO RECETA (NOMBRE, DESCRIPCION , TIEMPO ,IMAGEN, ID_USUARIO)
                  VALUES (?, ?, ?, ?, ?)",
                  $campos);
  }
  public static function update($id, ...$campos){
    $parametros = $campos;
    array_push($parametros,$id);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE RECETA
                  SET NOMBRE = ?,
                      DESCRIPCION = ?,
                      TIEMPO = ?,
                      IMAGEN = ?,
                      ID_USUARIO = ?
                  WHERE ID = ?",
                  $parametros);
  }
  public static function delete($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("DELETE FROM RECETA WHERE ID = ?", $id);
  }
}

?>
