<?php

  areaPrivada();
  $id = $_SESSION['ID'];

  $usuario = UsuarioManager::getById($id);

  print_r($usuario);



?>

  <?php foreach ($usuario  as $fila) { ?>
    <h1> <?=$fila['NOMBRE']?></h1>
    <img src="<?=$fila['IMAGEN']?>" alt="">
    <p> <?=$fila['EMAIL']?> </p>
    <a href="configuracionUsuario.php">Editar</a>

  <?php } ?>
