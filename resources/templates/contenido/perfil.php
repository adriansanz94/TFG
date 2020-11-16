<?php

  areaPrivada();
  $id = $_SESSION['ID'];

  $usuario = UsuarioManager::getByIdPerfil($id);

  



?>

  <div class="perfil">
    <?php foreach ($usuario  as $fila) { ?>
      <h1> <?=$fila['NOMBRE']?></h1>
      <p> <img src="<?=$fila['IMAGEN']?>" alt=""></p>
      <p class="negrita"> Correo </p>
      <p> <?=$fila['EMAIL']?> </p>
      <p class="negrita"> Descripción </p>
      <p><?=$fila['DESCRIPCION']?> </p>
      <p class="negrita"> Rol </p>
      <p><?=$fila['ROL']?> </p>
      <a href="configuracionUsuario.php">Editar Perfil</a>
    <?php } ?>
  </div>
