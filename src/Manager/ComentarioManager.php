<?php

class ComentarioManager {


  public static function getAll(){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM  COMENTARIO");
    return $db->obtenDatos();
  }
  public static function getById($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM COMENTARIO WHERE ID = ?",$id);
    return $db->obtenDatos()[0];
  }
  public static function insert(...$campos){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("INSERT INTO COMENTARIO (CONTENIDO,ID_USUARIO)
                  VALUES (?, ?)",
                  $campos);
  }
  public static function update($id, ...$campos){
    $parametros = $campos;
    array_push($parametros,$id);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE COMENTARIO
                  SET CONTENIDO = ?,
                      ID_USUARIO = ?
                  WHERE ID = ?",
                  $parametros);
  }
  public static function delete($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("DELETE FROM COMENTARIO WHERE ID = ?", $id);
  }
}

?>
