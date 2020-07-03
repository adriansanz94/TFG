<?php 
class Usuario{

  private $id;
  private $nombre;
  private $pass;
  private $emial;

  function __construct($id,$nombre,$pass,$emial){
    $this->id = $id;
    $this->$nombre = $nombre;
    $this->pass = $pass;
    $this->email = $emial;
  }



}



?>