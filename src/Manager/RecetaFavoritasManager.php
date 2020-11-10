<?php

class RecetaFavoritaManager implements IDWESEntidadManager{
  
  public static function getAll(){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM  RECETAFAVORITA");
    return $db->obtenDatos();
  }
  public static function getById($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM RECETAFAVORITA WHERE ID = ?",$id);
    return $db->obtenDatos()[0];
  }
  public static function getAllByIdUser($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM RECETAFAVORITA WHERE ID_USUARIO = ?",$id);
    return $db->obtenDatos()[0];
  }
  public static function getByIdReceta(...$campos){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM RECETAFAVORITA WHERE ID_RECETA = ? AND 
                  ID_USUARIO = ? ",$campos);
    return $db->obtenDatos()[0];
  }
  public static function insert(...$campos){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("INSERT INTO RECETAFAVORITA (ID,ID_RECETA,ID_USUARIO )
                  VALUES (?, ?, ?)",
                  $campos);
  }
  public static function delete($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("DELETE FROM RECETAFAVORITA WHERE ID = ?", $id);
  }

}


?>