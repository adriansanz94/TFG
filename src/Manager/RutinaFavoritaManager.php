<?php

class RutinaFavoritaManager implements IDWESEntidadManager{
  
  public static function getAll(){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM  RUTINAFAVORITA");
    return $db->obtenDatos();
  }
  public static function getById($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM RUTINAFAVORITA WHERE ID = ?",$id);
    return $db->obtenDatos()[0];
  }
  public static function getAllByIdUser($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM RUTINAFAVORITA WHERE ID_USUARIO = ?",$id);
    return $db->obtenDatos()[0];
  }
  public static function getByIdReceta(...$campos){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM RUTINAFAVORITA WHERE ID_RUTINA = ? AND 
                  ID_USUARIO = ? ",$campos);
    return $db->obtenDatos()[0];
  }
  public static function insert(...$campos){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("INSERT INTO RUTINAFAVORITA (ID,ID_RUTINA,ID_USUARIO )
                  VALUES (?, ?, ?)",
                  $campos);
  }
  public static function delete($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("DELETE FROM RUTINAFAVORITA WHERE ID = ?", $id);
  }
  public static function update($id, ...$campos){}
}


?>