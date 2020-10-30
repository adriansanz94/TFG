<?php

$id = "";

if(isset($_GET['id_usuario'])){
  $id = $_GET['id_usuario'];
  $usuario = UsuarioManager::getById($id);
  echo "<pre>";
  echo $usuario['ID'];
  echo $usuario['ROL'];
  echo "</pre>";
  $rol = $usuario['ROL'];
  //printf($usuario);
  if($rol == 'USER'){
    UsuarioManager::updateROL($id,"ADMIN");
  }elseif($rol == 'ADMIN'){
    UsuarioManager::updateROL($id,"USER");
    header("Location:principal.php");
    die();
  }
}

header("Location:admin.php");
die();

?>
