<?php

class RutinaManager {


  public static function getAll(){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM  RUTINA");
    return $db->obtenDatos();
  }
  public static function getById($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM RUTINA WHERE ID = ?",$id);
    return $db->obtenDatos()[0];
  }

  public static function getByIdAJAX($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM RUTINA WHERE ID_USUARIO_RUTINA = ?",$id);
    return $db->obtenDatos();
  }


  public static function getIdByNombre($nombre){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT ID FROM RUTINA WHERE NOMBRE = ?",$nombre);
    return $db->obtenDatos()[0];
  }
  public static function insert(...$campos){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("INSERT INTO RUTINA (NOMBRE,DIFICULTAD,DESCRIPCION,ID_USUARIO_RUTINA)
                  VALUES (?, ?, ?, ?)",
                  $campos);
  }
  public static function update($id, ...$campos){
    $parametros = $campos;
    array_push($parametros,$id);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE RUTINA
                  SET NOMBRE = ?,
                      DIFICULTAD = ?,
                      DESCRIPCION = ?
                  WHERE ID = ?",
                  $parametros);
  }
  public static function delete($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("DELETE FROM RUTINA WHERE ID = ?", $id);
  }

  public static function consultaExtra($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM RUTINA WHERE ID = ?", $id);
  }
  public static function verMasRutinas($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM RUTINA where ID limit ? , 3 ",$id);
    return $db->obtenDatos();
  }


}

?>
