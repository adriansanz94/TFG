<?php

class EjercicioRutinaManager {


  public static function getAll(){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM  EJERCICIORUTINA");
    return $db->obtenDatos();
  }
  public static function getById($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM EJERCICIORUTINA WHERE ID = ?",$id);
    return $db->obtenDatos()[0];
  }
  public static function getByIdRutina($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM EJERCICIORUTINA WHERE ID_RUTINA = ?",$id);
    return $db->obtenDatos();
  }
  public static function getByIdEjercicio($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("SELECT * FROM EJERCICIORUTINA WHERE ID_EJERCICIO = ?",$id);
    return $db->obtenDatos();
  }
  public static function insert(...$campos){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("INSERT INTO EJERCICIORUTINA (REPETICIONES,ID_RUTINA,ID_EJERCICIO)
                  VALUES (?, ?, ?)",
                  $campos);
  }
  /*EjercicioRutinaManager::insert(array[i],array2[i]);*/
  public static function update($id, ...$campos){
    $parametros = $campos;
    array_push($parametros,$id);
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("UPDATE EJERCICIORUTINA
                  SET ID_RUTINA = ?,
                      ID_EJERCICIO = ?,
                      REPETICIONES = ?
                  WHERE ID = ?",
                  $parametros);
  }
  public static function delete($id){
    $db = DWESBaseDatos::obtenerInstancia();
    $db->ejecuta("DELETE FROM EJERCICIORUTINA WHERE ID = ?", $id);
  }

}


?>
