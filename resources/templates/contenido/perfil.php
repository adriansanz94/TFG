<?php

  areaPrivada();
  $id = $_SESSION['ID'];

  $usuario = UsuarioManager::getByIdPerfil($id);

  print_r($usuario);



?>
  <link rel="stylesheet" href="/css/cssComun.css">
  <link rel="stylesheet" href="/css/perfil.css">
  <?php foreach ($usuario  as $fila) { ?>

    <h1> <?=$fila['NOMBRE']?></h1>
    <img src="<?=$fila['IMAGEN']?>" alt="">
    <p class="negrita"> Correo </p>
    <p> <?=$fila['EMAIL']?> </p>
    <p class="negrita"> Descripción </p>
    <p><?=$fila['DESCRIPCION']?> </p>
    <p class="negrita"> Rol </p>
    <p><?=$fila['ROL']?> </p>
    <a href="configuracionUsuario.php">Editar Perfil</a>

  <?php } ?>
