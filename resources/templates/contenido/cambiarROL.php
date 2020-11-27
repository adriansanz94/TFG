<?php
//En está paǵina cambiamos el Rol del Usuario
$id = "";
if(isset($_GET['id_usuario'])){
  $id = $_GET['id_usuario'];
  $usuario = UsuarioManager::getById($id);
  $rol = $usuario['ROL'];

  if($rol == 'USER'){
    UsuarioManager::updateROL($id,"ADMIN");
  }elseif($rol == 'ADMIN'){
    UsuarioManager::updateROL($id,"USER");
    header("Location:admin.php");
    die();
  }
}
header("Location:admin.php");
die();

?>
