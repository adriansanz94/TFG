<?php
global $ROOT;
global $config;

$datosRutina = RutinaManager::getAll();

?>
<div id="rutinas"class="rutinas">
  <h1> <a href="rutinas.php"> Rutinas:</a></h1>
  <?php foreach ($datosRutina   as $fila) { ?>
    <div id="rutina" class="rutina" data-id="<?=$fila['ID']?> ">
    <h2><a href="rutina.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <P>Dificultad:<?= $fila['DIFICULTAD']?></P>
    <P>Descripcion <br><?= $fila['DESCRIPCION']?></P>
    </div>
  <?php } ?>

</div>
