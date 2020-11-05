<?php

  areaPrivada();
  $id = $_SESSION['ID'];

  $usuario = UsuarioManager::getByIdPerfil($id);

  print_r($usuario);



?>

  <?php foreach ($usuario  as $fila) { ?>
    <img src="<?=$fila['IMAGEN']?>" alt="">
    <h1> <?=$fila['NOMBRE']?></h1>
    <p> <?=$fila['EMAIL']?> </p>
    <p><?=$fila['DESCRIPCION']?> </p>
    <p><?=$fila['ROL']?> </p>
    <a href="configuracionUsuario.php">Editar</a>

  <?php } ?>
