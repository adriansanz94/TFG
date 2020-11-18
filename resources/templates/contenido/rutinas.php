<?php
global $ROOT;
global $config;

$datosRutina = RutinaManager::getAll();

?>
<h1 class="tituloR"> <a href="rutinas.php"> Rutinas:</a></h1>
<div id="rutinas"class="rutinas">
  <?php foreach ($datosRutina   as $fila) { ?>
    <div id="rutina" class="rutina" data-id="<?=$fila['ID']?> ">
    <h2><a href="rutina.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <P>Dificultad:<?= $fila['DIFICULTAD']?></P>
    <P>Descripcion <br><?= $fila['DESCRIPCION']?></P>
    </div>
  <?php } ?>

</div>
