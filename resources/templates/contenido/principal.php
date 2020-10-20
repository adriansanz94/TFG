<h3>Bienvenidos a Fitness club página donde subiremos rutinas de ejercicios y recetas.</h3>
<?php

$datosRutina = RutinaManager::getAll();
$datosReceta = RecetaManager::getAll();



echo "<pre>";
print_r($datosRutina);
echo "<pre>";
print_r($datosReceta);


?>

<div class="rutinas">
  <?php foreach ($datosRutina as $fila) { ?>
    <div class="rutina">
    <h2><a href="rutina.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <P>Dificultad:<?= $fila['DIFICULTAD']?></P>
    <P>Descripcion <br><?= $fila['DESCRIPCION']?></P>
    </div>
  <?php } ?>
</div>
<div class="recetas">
  <?php foreach ($datosReceta as $fila) { ?>
    <div class="rutina">
    <h2><a href="receta.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <P><?= $fila['DESCRIPCION']?></P>
    <P><?= $fila['TIEMPO']?></P>
    <P><?= $fila['IMAGEN']?></P>
    </div>
  <?php } ?>
</div>
