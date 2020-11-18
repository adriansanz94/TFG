<?php

  areaPrivada();
  $id = $_SESSION['ID'];

  $usuario = UsuarioManager::getByIdPerfil($id);

  $favRutina = RutinaFavoritaManager::getAllByIdUser($id);
  $favReceta = RecetaFavoritaManager::getAllByIdUser($id);

  $recetas = [];
  $receta = false;
  $rutina = false;
  if(count($favRutina) != 0){
    for ($i=0; $i < count($favRutina); $i++) {
      $rutinas[$i]= RutinaManager::getById($favRutina[$i]['ID_RUTINA']);
    }
    $rutina = true;
  }

  if(count($favReceta) != 0){
    for ($i=0; $i < count($favReceta); $i++) {
      $recetas[$i]= RecetaManager::getById($favReceta[$i]['ID_RECETA']);
    }
    $receta = true;
  }
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

  <div class="favoritos">
        <p class="negrita">Tus rutinas favoritas</p>
  <?php if($rutina == true){
          for ($i=0; $i < count($rutinas); $i++) {?>
        <p>-<a href="rutina.php?id=<?=$rutinas[$i]['ID']?>"><?=$rutinas[$i]['NOMBRE']?></a></p>
  <?php
          }
        }
  ?>
  </div>

  <div class="favoritos">
        <p class="negrita">Tus recetas favoritas</p>
  <?php if($receta == true){
          for ($i=0; $i < count($recetas); $i++) {?>
          <p>-<a href="receta.php?id=<?=$recetas[$i]['ID']?>"><?=$recetas[$i]['NOMBRE']?></a></p>
  <?php
          }
        }
  ?>
  </div>
