<?php


  class UsuarioManager implements IDWESEntidadManager{

    public static function autentificado($nombre){
      $db = DWESBaseDatos::obtenerInstancia();
      $db->ejecuta("SELECT ID,USUARIO,CONTRASEÑA,EMAIL
                    FROM  USUARIO
                    WHERE USUARIO = ? ",
                    $nombre);
      $datos =  $db->obtenDatos();
      if(count($datos)>0) return $datos[0];
    }
    public static function getAll(){
      $db = DWESBaseDatos::obtenerInstancia();
      $db->ejecuta("SELECT * FROM  USUARIO");
      return $db->obtenDatos();
    }
    public static function getById($id){
      $db = DWESBaseDatos::obtenerInstancia();
      $db->ejecuta("SELECT * FROM USUARIO WHERE ID = ?",$id);
      return $db->obtenDatos()[0];
    }
    public static function insert(...$campos){
      $db = DWESBaseDatos::obtenerInstancia();
      $db->ejecuta("INSERT INTO USUARIO (USUARIO, CONTRASEÑA , EMAIL)
                    VALUES (?, ?, ?)",
                    $campos);
    }
    public static function update($id, ...$campos){
      $parametros = $campos;
      array_push($parametros,$id);
      $db = DWESBaseDatos::obtenerInstancia();
      $db->ejecuta("UPDATE USUARIO
                    SET USUARIO = ?,
                        CONTRASEÑA = ?,
                        EMAIL = ?
                    WHERE ID = ?",
                    $parametros);
    }
    public static function delete($id){
      $db = DWESBaseDatos::obtenerInstancia();
      $db->ejecuta("DELETE FROM USUARIO WHERE ID = ?", $id);
    }
  }

?>
